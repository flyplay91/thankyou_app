<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Store;


class GetBrandsController extends Controller
{
    public function index(Request $request)
    {
    	$brand_ids = [];
		$store_id = $request->store_id;
        $brand_objs = Brand::where('store_id', $store_id)->get();
        foreach ($brand_objs as $brand_obj) {
        	$brand_id = $brand_obj->id;
        	$brand_title = $brand_obj->brand_title;
        	$brand_ids[] = array('brand_id' => $brand_id, 'brand_title' => $brand_title);
        }

        return $brand_ids;
    }
}
