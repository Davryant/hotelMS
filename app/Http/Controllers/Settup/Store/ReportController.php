<?php

namespace App\Http\Controllers\Settup\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPurchasing as OP;
use Auth;
use DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasings = OP::groupBy('prepared_no')
        ->join("users","other_purchasings.prepared_by","=","users.id")
        ->where('prepared', 1)
        ->select(DB::raw('other_purchasings.prepared_no, SUM(other_purchasings.item_unit) as total_unit, SUM(other_purchasings.total_value) as total_price, other_purchasings.created_at, other_purchasings.updated_at,other_purchasings.id as puc_id, users.name'))
        ->get();

        return view('settups.store.report.index', \compact('purchasings'));
    }

    public function filterReportDay(Request $request){

        if($request->type == 'day'){
            $results = OP::groupBy('prepared_no')->whereDate('created_at', \today())->get();
        }elseif($request->type == 'month'){

            $results = OP::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->get();
        }else{
            $results = OP::groupBy('prepared_no')->get();

        }
        

        

        // $byweek = Reservation::all()
        //     ->groupBy(DB::raw('WEEK(created_at)'))
        //     ->orderBy(DB::raw('COUNT(id)','desc'));
        
                
        return response()->json($results);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
