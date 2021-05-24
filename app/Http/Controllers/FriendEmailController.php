<?php

namespace App\Http\Controllers;

use App\Widget;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Store;
use App\Mail\Email;
use Mail;
use DB;

class FriendEmailController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        if (!$domain_url) {
            return;
        }

        $friend_email = $request->friend_email;
        // $store_id = DB::table('stores')->where('url', $domain_url)->pluck('id')->first();

        // $storeObj = array('store_id' => $store_id, 'user_email' => $user_email, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
        // DB::table('email')->insert($storeObj);
        
        // // Get Total Email Count
        // $email_count = DB::table('email')->where('store_id', $store_id)->count();
        
        // Store::where('id', $store_id)
        //     ->update([
        //         'email_count' => $email_count
        //     ]);

        $store = Store::firstWhere('url', $domain_url);


        try {
	        $data = ['store' => $store, 'domain_url' => $domain_url];
            Mail::to($friend_email)->send(new Email($data));

			return response()->json([
			    'failed' => '0',
                'email' => $friend_email
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
