<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use DB;

class StoreVisitorTimeController extends Controller
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
        
        if (!$request->fromDate) {        
            return view('visitor-times.index', compact('stores'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $period = (strtotime($toDate) - strtotime($fromDate)) / 86400 + 1;
            $totalStoreTimeQuery = "SELECT store_id, SUM(store_time) AS total_store_time, SUM(product_time) AS total_product_time FROM storetimes WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id";

            $totalStoreTimeObjs = DB::select($totalStoreTimeQuery);
            
            $filterStoreTimeArr = [];

            foreach($totalStoreTimeObjs as $filterStoreTimeObj) {
                $storeId = $filterStoreTimeObj->store_id;
                if(!isset($filterStoreTimeArr[$storeId])) {
                    $filterStoreTimeArr[$storeId] = array(
                        'store_url' => "",
                        'store_time' => 0,
                        'product_time' => 0
                    );
                }

                foreach($stores as $store) {
                    if ($store->id == $filterStoreTimeObj->store_id) {
                        $filterStoreTimeArr[$storeId]["store_url"] = $store->url;
                        $filterStoreTimeArr[$storeId]["store_time"] = gmdate("H:i:s", $filterStoreTimeObj->total_store_time / $period / 1000);
                        $filterStoreTimeArr[$storeId]["product_time"] = gmdate("H:i:s", $filterStoreTimeObj->total_product_time / $period / 1000);
                    }
                }

            }

            try {
                return response()->json([
                    'failed' => '0',
                    'store_time_arr' => $filterStoreTimeArr
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
