<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Store;
use App\Email;
use DB;


class EmailListController extends Controller
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
        $emails = Email::all();
        
        if (!$request->fromDate) {
            return view('email-list.index', compact('emails'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $filterEmailListsQuery = "SELECT e.store_id, e.user_email, s.url FROM email AS e LEFT JOIN stores AS s ON e.store_id = s.id WHERE e.created_at BETWEEN '" .$fromDate. "' AND '".$toDate. "'";
            $filterEmailListsObjs = DB::select($filterEmailListsQuery);

            try {
                return response()->json([
                    'failed' => '0',
                    'email_list_arr' => $filterEmailListsObjs
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
