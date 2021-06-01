<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Brand;
use App\ProductCount;
use DB;

class ProductCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromDate = date('Y-m-d H:i:s', strtotime($request->fromDate));
        $toDate = date('Y-m-d H:i:s', strtotime($request->toDate));

        $stores = Store::all();
        $brands = Brand::all();

        if (!$request->fromDate) {
            return view('product-count.index', compact('brands'))
        	   ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $filterProductCountQuery = "SELECT store_id, brand_id, COUNT(1) AS click_count FROM productcount WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id, brand_id, click_count";
            $filterProductCountObjs = DB::select($filterProductCountQuery);
            
            $filterProductCountArr = [];

            foreach($filterProductCountObjs as $filterProductCountObj) {
                $storeId = $filterProductCountObj->store_id;
                if(!isset($filterProductCountArr[$storeId])) {
                    $filterProductCountArr[$storeId] = [];
                    
                }

                foreach($brands as $brand) {
                    if ($brand->id == $filterProductCountObj->brand_id && $brand->store_id == $filterProductCountObj->store_id) {
                        $filterProductCountArr[$storeId][$brand->brand_title] = array(
                            'store_url' => "",
                            'click_count' => 0
                        );

                        $store_url = DB::table('stores')->where('id', $filterProductCountObj->store_id)->pluck('url')->first();
                        $filterProductCountArr[$storeId][$brand->brand_title]["store_url"] = $store_url;
                        $filterProductCountArr[$storeId][$brand->brand_title]["click_count"] = $filterProductCountObj->click_count;
                    }
                }
            }
            
            try {
                return response()->json([
                    'failed' => '0',
                    'count_arr' => $filterProductCountArr
                ]);
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";

                return response()->json([
                    'failed' => '1',
                    'error_message' => $e->getMessage(),
                ]);
            }
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
