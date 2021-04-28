<?php
  
namespace App\Http\Controllers;
  
use App\Brand;
use App\Store;
use Illuminate\Http\Request;
  
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('brands.index',compact('brands'))
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
        return view('brands.create', compact('stores'));
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
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_title' => 'required',
            'brand_tag' => 'required',
            'brand_description' => 'required',
        ]);
  
        $brand = new Brand($request->input()) ;

        if($file = $request->hasFile('brand_image')) {
            $file = $request->file('brand_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/';
            $file->move($destinationPath,$fileName);
            
            $brand->brand_image = $fileName ;
        }

        $brand->save();
   
        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully.');
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $stores = Store::all();
        return view('brands.edit', compact('stores', 'brand'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'store_id' => 'required',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_title' => 'required',
            'brand_tag' => 'required',
            'brand_description' => 'required',
        ]);

        $data = $request->all();

        if($file = $request->hasFile('brand_image')) {
            
            $file = $request->file('brand_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/';
            $file->move($destinationPath,$fileName);

            $data['brand_image'] = $fileName ;
        }

        $brand->update($data);
  
        // $brand->update($request->all());
  
        return redirect()->route('brands.index')
                        ->with('success','Brand updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
  
        return redirect()->route('brands.index')
                        ->with('success','Brand deleted successfully');
    }
}