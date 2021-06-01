<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Store;
use DB;



class EmailCountController extends Controller
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

        $stores = Store::all();
        
        if (!$request->fromDate) {
            return view('email-counts.index', compact('stores'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $filterEmailCountQuery = "SELECT store_id, COUNT(1) AS email_count FROM email WHERE created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "' GROUP BY store_id";
            $filterEmailCountObjs = DB::select($filterEmailCountQuery);

            $filterEmailCountkArr = [];

            foreach($filterEmailCountObjs as $filterEmailCountObj) {
                $storeId = $filterEmailCountObj->store_id;
                if(!isset($filterEmailCountkArr[$storeId])) {
                    $filterEmailCountkArr[$storeId] = array(
                        'store_url' => "",
                        'email_count' => $filterEmailCountObj->email_count
                    );
                }

                foreach($stores as $store) {
                    if ($store->id == $filterEmailCountObj->store_id) {
                        $filterEmailCountkArr[$storeId]["store_url"] = $store->url;
                    }
                }
            }

            try {
                return response()->json([
                    'failed' => '0',
                    'email_arr' => $filterEmailCountkArr
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
