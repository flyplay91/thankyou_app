<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use DB;

class ApiStoreVisitorController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        $ip = $request->ip;
        $store_time = $request->store_time;

        if (!$domain_url) {
            return;
        }

        // Get Store Url from Domain ID
        if ($domain_url) {
            $store_id = DB::table('stores')->where('url', $domain_url)->pluck('id')->first();

            Store::where('url', $domain_url)
                ->update([
                    'total_visitor_count' => DB::raw('total_visitor_count + 1')
                ]);

            $storeTotalVisitorCountObj = array('store_id' => $store_id, 'total_visitor_count' => 1, 'unique_visitor_count' => 0, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
            DB::table('storevisitorcount')->insert($storeTotalVisitorCountObj);

        }
        
        if ($domain_url && $ip) {
            // Get Ip Address for unique visitors
            $ipArr = DB::table('iplists')->where('store_url', $domain_url)->pluck('ip_address')->toArray();
            if (!$ipArr || !in_array($ip, $ipArr)) {
                $storeIpObj = array('store_url'=>$domain_url, 'ip_address'=>$ip,"created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now());
                DB::table('iplists')->insert($storeIpObj);

                Store::where('url', $domain_url)
                ->update([
                    'unique_visitor_count' => DB::raw('unique_visitor_count + 1')
                ]);

                $storeUniqueVisitorCountObj = array('store_id' => $store_id, 'total_visitor_count' => 0, 'unique_visitor_count' => 1, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
                DB::table('storevisitorcount')->insert($storeUniqueVisitorCountObj);
            }    
        }
    }
}
