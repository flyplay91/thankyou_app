<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Store;

  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $stores = Store::all();
        $brands = Brand::all();
        return view('products.create', compact('stores', 'brands'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
            'brand_id' => 'required',
            'product_title' => 'required',
            'product_link' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product($request->input()) ;

        if($file = $request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/';
            $file->move($destinationPath,$fileName);
            
            $product->product_image = $fileName ;
        }

        $product->save();
   
        // Product::create($request->all());
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
   
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $stores = Store::all();
        $brands = Brand::all();
        return view('products.edit',compact('product', 'stores', 'brands'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'store_id' => 'required',
            'brand_id' => 'required',
            'product_title' => 'required',
            'product_link' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
        ]);

        $data = $request->all();

        if($file = $request->hasFile('product_image')) {
            
            $file = $request->file('product_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/';
            $file->move($destinationPath,$fileName);

            $data['product_image'] = $fileName ;
        }

        $product->update($data);
  
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    public function drogupdate(Request $request)
    {
        $products = Product::all();
        var_dump($products);exit;
        foreach ($products as $product) {
            foreach ($request->order as $order) {
                if ($order['id'] == $product->id) {
                    $product->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}