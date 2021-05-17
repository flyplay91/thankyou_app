<?php

namespace App\Http\Controllers;

use App\Widget;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Store;
use App\Iplist;
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
        $ip = $request->ip;

        if (!$domain_url) {
            return;
        }

        $ipArr = DB::table('iplists')->where('store_url', $domain_url)->pluck('ip_address')->toArray();
        if (!$ipArr || !in_array($ip, $ipArr)) {
            $storeIpObj=array('store_url'=>$domain_url, 'ip_address'=>$ip,"created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now());
            DB::table('iplists')->insert($storeIpObj);

            Store::where('url', $domain_url)
            ->update([
                'unique_visitor_count' => DB::raw('unique_visitor_count + 1')
            ]);
        }
        

        Store::where('url', $domain_url)
            ->update([
                'total_visitor_count' => DB::raw('total_visitor_count + 1')
            ]);

        
        
        
        
               

        $user_email = $request->user_email;
        if ($user_email) {
            Store::where('url', $domain_url)
                ->update([
                    'user_email' => DB::raw("CONCAT(user_email,IF(user_email = '', '', ','),'".$user_email."')")
                ]);
        }

        $store = Store::firstWhere('url', $domain_url);

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
