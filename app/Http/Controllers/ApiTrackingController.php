<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use DB;

class ApiTrackingController extends Controller
{
    public function index(Request $request)
    {
     
        $targetUrl = $request->targetUrl;
        $sourceUrl = $request->sourceUrl;
        $productTitle = $request->productTitle;
        $productQty = $request->productQty;
        $productPrice = $request->productPrice;

        if ($targetUrl) {
            // $store_id = DB::table('stores')->where('url', $targetUrl)->pluck('id')->first();

            $trackingObj = array('target_url' => $targetUrl, 'source_url' => $sourceUrl, 'product_title' => $productTitle, 'product_price' => $productPrice, 'product_qty' => $productQty, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
            DB::table('tracking')->insert($trackingObj);

        }
    }
}
