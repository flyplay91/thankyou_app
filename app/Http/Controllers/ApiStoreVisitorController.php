<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Storetime;
use DB;

class ApiStoreVisitorController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        $ip = $request->ip;
        
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

            // Insert Store Visit Time per Store
            if (isset($request->store_time)) {
                $store_time = $request->store_time;

                $storeVisitTimeObj = array('store_id' => $store_id, 'store_time' => $store_time, 'product_time' => 0, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
                DB::table('storetimes')->insert($storeVisitTimeObj);    
            }

            $firstDayQuery = "SELECT MIN(created_at) AS min_date FROM storetimes WHERE store_id = " . $store_id;
            $firstDayTime = DB::select($firstDayQuery)[0]->min_date;
            
            $endDayQuery = "SELECT MAX(created_at) AS max_date FROM storetimes WHERE store_id = " . $store_id;
            $endDayTime = DB::select($endDayQuery)[0]->max_date;;
            
            $firstDay = (new \DateTime($firstDayTime))->format('Y-m-d');
            $endDay = (new \DateTime($endDayTime))->format('Y-m-d');
            $period = (strtotime($endDay) - strtotime($firstDay)) / 86400 + 1;

            $totalStoreTimeQuery = "SELECT store_id, SUM(store_time) AS total_store_time, SUM(product_time) AS total_product_time FROM storetimes WHERE created_at BETWEEN '" .$firstDayTime. "' AND '".$endDayTime. "' GROUP BY store_id";
            
            $totalStoreTime = DB::select($totalStoreTimeQuery)[0]->total_store_time;
            $avarageStoreTime = $totalStoreTime / $period / 1000;
            $totalProductTime = DB::select($totalStoreTimeQuery)[0]->total_product_time;
            $avarageProductTime = $totalProductTime / $period / 1000;

            Store::where('id', $store_id)
            ->update([
                'avarage_store_time' => $avarageStoreTime,
                'avarage_product_time' => $avarageProductTime
            ]); 
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
