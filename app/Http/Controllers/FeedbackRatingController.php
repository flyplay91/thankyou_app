<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Feedback;
use DB;

class FeedbackRatingController extends Controller
{
    public function index(Request $request)
    {
     
        $domain_url = $request->domain_url;
        if (!$domain_url) {
            // exception handler
            return;
        }

        $feedback_raging_val = $request->feedback_raging_val;
        $feedback_comment_val = $request->feedback_comment_val;
        $store_id = DB::table('stores')->where('url', $domain_url)->pluck('id')->first();

        $feedbackObj = array('store_id' => $store_id, 'feedback_rating' => $feedback_raging_val, 'feedback_comment' => $feedback_comment_val, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now());
        DB::table('feedback')->insert($feedbackObj);
        
        // Get 5 Feedback Count per store
        $feedback_count_5 = DB::table('feedback')->where(['store_id'=>$store_id, 'feedback_rating'=>'rating-5' ])->count();
        $feedback_count_4 = DB::table('feedback')->where(['store_id'=>$store_id, 'feedback_rating'=>'rating-4' ])->count();
        $feedback_count_3 = DB::table('feedback')->where(['store_id'=>$store_id, 'feedback_rating'=>'rating-3' ])->count();
        $feedback_count_2 = DB::table('feedback')->where(['store_id'=>$store_id, 'feedback_rating'=>'rating-2' ])->count();
        $feedback_count_1 = DB::table('feedback')->where(['store_id'=>$store_id, 'feedback_rating'=>'rating-1' ])->count();
        
        Store::where('id', $store_id)
            ->update([
                'feedback_rating_1' => $feedback_count_1,
                'feedback_rating_2' => $feedback_count_2,
                'feedback_rating_3' => $feedback_count_3,
                'feedback_rating_4' => $feedback_count_4,
                'feedback_rating_5' => $feedback_count_5
            ]);

        try {
	        return response()->json([
			    'failed' => '0',
                'success_message' => '200'
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
