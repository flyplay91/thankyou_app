<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use DB;

class StoreVisitorCountController extends Controller
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
        $storeAll = Store::all();
        $stores = Store::latest()->paginate(25);

        if (!$request->fromDate) {
            return view('visitor-counts.index', compact('stores'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $filterStoreCountQuery = "SELECT store_id, SUM(total_visitor_count) AS total_visitor, SUM(unique_visitor_count) AS unique_visitor FROM storevisitorcount WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id";
            $filterStoreCountObjs = DB::select($filterStoreCountQuery);
            
            $filterStoreCountArr = [];

            foreach($filterStoreCountObjs as $filterStoreCountObj) {
                $storeId = $filterStoreCountObj->store_id;
                if(!isset($filterStoreCountArr[$storeId])) {
                    $filterStoreCountArr[$storeId] = array(
                        'store_url' => "",
                        'total_visitor' => 0,
                        'unique_visitor' => 0
                    );
                }

                foreach($storeAll as $store) {
                    if ($store->id == $filterStoreCountObj->store_id) {
                        $filterStoreCountArr[$storeId]["store_url"] = $store->url;
                        $filterStoreCountArr[$storeId]["total_visitor"] = $filterStoreCountObj->total_visitor;
                        $filterStoreCountArr[$storeId]["unique_visitor"] = $filterStoreCountObj->unique_visitor;
                    }
                }

            }
            

            try {
                return response()->json([
                    'failed' => '0',
                    'store_count_arr' => $filterStoreCountArr
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
