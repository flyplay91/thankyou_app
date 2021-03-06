<?php

namespace App\Http\Controllers;

use App\Widget;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Store;
use App\Iplist;
use App\Storetime;
use DB;



class WidgetController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $domain_url = $request->domain_url;
        
        // $product_time = $request->product_time / 1000;
        // $product_time = date("H:i:s", $product_time);
        
        // if ($domain_url) {
        //     // Update Total Visitor Count
        //     Store::where('url', $domain_url)
        //         ->update([
        //             'total_visitor_count' => DB::raw('total_visitor_count + 1'),
        //             'total_product_count' => DB::raw('total_product_count + 1')
        //         ]);

        //     $total_visitor_count = DB::table('stores')->where('url', $domain_url)->pluck('total_visitor_count')->first();
        //     $total_product_count = DB::table('stores')->where('url', $domain_url)->pluck('total_product_count')->first();

        //     // Get Avarage Product Click Count by Total Visitors by Brand
        //     $product_title = $request->product_title;
        //     if (isset($product_title)) {
        //         $brand_id_by_product_title = DB::table('products')->where(['product_title'=>$product_title, 'store_id'=>$store_id])->pluck('brand_id')->first();

        //         Brand::where('id', $brand_id_by_product_title)
        //         ->update([
        //             'avarage_product_count' => DB::raw('avarage_product_count + 1')
        //         ]);
        //     }
            
        // }

        
        

        // Get avarage visit time
        // if ($store_time) {
        //     $visitTimeObj = array('store_id' => $store_id, 'store_time' => $store_time, 'product_time' => 0,  "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now());
        //     DB::table('storetimes')->insert($visitTimeObj);
        // }
        // $store_time_count = DB::table('storetimes')->where('store_id', $store_id)->count();
        // $total_store_times = DB::table('storetimes')->where('store_id', $store_id)->sum('store_time');
        // if ($store_time_count > 0 && $total_store_times > 0) {
        //     $avarage_store_time = intval($total_store_times / $store_time_count);    
        // } else {
        //     $avarage_store_time = 0;
        // }
        

        
        // if ($product_time) {
        //     $visitTimeObj = array('store_id' => $store_id, 'store_time' => 0, 'product_time' => $product_time,  "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now());
        //     DB::table('storetimes')->insert($visitTimeObj);
        // }
        
        // $product_time_count = DB::table('storetimes')->where('store_id', $store_id)->count();
        // $total_product_times = DB::table('storetimes')->where('store_id', $store_id)->sum('product_time');
        // if ($product_time_count > 0 && $total_product_times > 0) {
        //     $avarage_product_time = intval($total_product_times / $product_time_count);
        // } else {
        //     $avarage_product_time = 0;
        // }
        
        // Store::where('id', $store_id)
        //     ->update([
        //         'avarage_store_time' => $avarage_store_time,
        //         'avarage_product_time' => $avarage_product_time
        //     ]);
        
        
        // Get Total Product Click Count
        // Store::where('url', $domain_url)
        //     ->update([
        //         'total_click_count' => DB::raw('total_click_count + 1')
        //     ]);

        // // Get Daily Product Click Count
        // $timestamp = strtotime('2021-05-16');
        // $today = strtotime('now');
        // $today_days = intval(($today - $timestamp)/86400);
        // $total_click_count = DB::table('stores')->where('url', $domain_url)->pluck('total_click_count')->first();    
        // $daily_click_count = (int)$total_click_count / $today_days;

        // Store::where('id', $store_id)
        //     ->update([
        //         'daily_click_count' => $daily_click_count
        //     ]);



        $store = Store::where('url', $domain_url)->first();
        
        return view('widget.index', compact('store', 'domain_url'));
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
     * @param  \App\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function show(Widget $widget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widget $widget)
    {
        //
    }
}
