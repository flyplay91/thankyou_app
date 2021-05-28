<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Feedback;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromDate = date('Y-m-d H:i:s', strtotime($request->fromDate));
        $toDate = date('Y-m-d H:i:s', strtotime($request->toDate));
        
        $stores = Store::latest()->paginate(25);
        
        $storeAll = Store::all();

        if (!$request->fromDate) {
            
            return view('feedback.index', compact('stores'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            
            $filterFeedBackQuery = "SELECT store_id, feedback_rating, COUNT(1) AS rating_count FROM feedback WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id, feedback_rating";
            $filterFeedBackObjs = DB::select($filterFeedBackQuery);

            $filterFeedBackArr = [];

            foreach($filterFeedBackObjs as $filterFeedBackObj) {
                $storeId = $filterFeedBackObj->store_id;
                if(!isset($filterFeedBackArr[$storeId])) {
                    $filterFeedBackArr[$storeId] = array(
                        'store_url' => "",
                        'rating_1' => 0,
                        'rating_2' => 0,
                        'rating_3' => 0,
                        'rating_4' => 0,
                        'rating_5' => 0
                    );
                }

                foreach($storeAll as $store) {
                    if ($store->id == $filterFeedBackObj->store_id) {
                        $filterFeedBackArr[$storeId]["store_url"] = $store->url;
                    }
                }

                if($filterFeedBackObj->feedback_rating == "rating-1") {
                    $filterFeedBackArr[$storeId]["rating_1"] += $filterFeedBackObj->rating_count;
                }

                if($filterFeedBackObj->feedback_rating == "rating-2") {
                    $filterFeedBackArr[$storeId]["rating_2"] += $filterFeedBackObj->rating_count;
                }

                if($filterFeedBackObj->feedback_rating == "rating-3") {
                    $filterFeedBackArr[$storeId]["rating_3"] += $filterFeedBackObj->rating_count;
                }

                if($filterFeedBackObj->feedback_rating == "rating-4") {
                    $filterFeedBackArr[$storeId]["rating_4"] += $filterFeedBackObj->rating_count;
                }

                if($filterFeedBackObj->feedback_rating == "rating-5") {
                    $filterFeedBackArr[$storeId]["rating_5"] += $filterFeedBackObj->rating_count;
                }

            }

            try {
                return response()->json([
                    'failed' => '0',
                    'feedback_arr' => $filterFeedBackArr
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
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
