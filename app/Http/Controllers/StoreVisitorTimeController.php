<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

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
            // $filterStoreCountQuery = "SELECT store_id, SUM(total_visitor_count) AS total_visitor, SUM(unique_visitor_count) AS unique_visitor FROM storevisitorcount WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id";
            // $filterStoreCountObjs = DB::select($filterStoreCountQuery);
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
