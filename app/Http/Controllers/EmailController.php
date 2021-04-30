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



    

class EmailController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        if (!$domain_url) {
            // exception handler
            return;
        }

        
        $user_email = $request->user_email;
        Store::where('url', $domain_url)
            ->update([
                'user_email' => DB::raw("CONCAT(user_email,IF(user_email = '', '', ','),'".$user_email."')")
            ]);

        try {
	        $data = ['message' => 'This is a test!'];
			Mail::to('aarmillr12@gmail.com')->send(new Email($data));

			return response()->json([
			    'failed' => '0'
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
