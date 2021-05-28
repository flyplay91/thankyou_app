<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Productcount;
use App\Product;
use App\Brand;
use DB;

class ApiProductCountController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        if (!$domain_url) {
            return;
        }

        if ($domain_url) {
            $store_id = DB::table('stores')->where('url', $domain_url)->pluck('id')->first();

            // Update Total Visitor Count
            Store::where('url', $domain_url)
                ->update([
                    'total_visitor_count' => DB::raw('total_visitor_count + 1'),
                    'total_product_count' => DB::raw('total_product_count + 1')
                ]);

            $total_visitor_count = DB::table('stores')->where('url', $domain_url)->pluck('total_visitor_count')->first();
            $total_product_count = DB::table('stores')->where('url', $domain_url)->pluck('total_product_count')->first();

            // Get Avarage Product Click Count by Total Visitors by Brand
            $product_title = $request->product_title;
            if (isset($product_title)) {
                $brand_id_by_product_title = DB::table('products')->where(['product_title'=>$product_title, 'store_id'=>$store_id])->pluck('brand_id')->first();

                Brand::where('id', $brand_id_by_product_title)
                ->update([
                    'avarage_product_count' => DB::raw('avarage_product_count + 1')
                ]);

                $productCountObj = array('store_id' => $store_id, 'brand_id' => $brand_id_by_product_title, 'click_count' => 1, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
                DB::table('productcount')->insert($productCountObj);
            }
        }
    }
}
