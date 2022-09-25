<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishCategory AS DC;
use App\Models\DishMenu AS DM;
use App\Models\RestaurantBill AS RB;
use App\Models\Room;
use DB;
use App\Models\Table AS T;
use App\KotOrder;
use Auth;
use Carbon;

class CreateBill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = KotOrder::groupBy('qrtxt')
        ->where('prepared_by', Auth::user()->id)
        ->select(DB::raw('qrtxt, SUM(price) as total_price, `table`'))
        ->orderBy('id','DESC')
        ->get();

        // $sales = KotOrder::orderBy('id','DESC')
        //         //->groupBy('qrtxt')
        //         ->where('prepared_by', Auth::user()->id)
        //         ->get();

        // dd($sales);
              
        return view('settups.restaurant.create-bill.index', \compact('sales'));
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
    public function show($id, $ids)
    {
        $qrtxt = $id.'/'.$ids;

        $sales = KotOrder::where('prepared_by', Auth::user()->id)
        ->where('qrtxt', $qrtxt)
        ->get();

        $rooms = Room::where('room_status_id', 6)->get();

        $res_bill = RB::where('bill_id', $qrtxt)->first();


        // dd($rooms);
        return view('settups.restaurant.create-bill.show', \compact('sales','qrtxt','rooms','res_bill'));
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
