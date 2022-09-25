<?php

namespace App\Http\Controllers\Settups\Bar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarItemCategory AS BC;
use App\Models\BarItem AS BI;
use DB;
use App\KotOrder;
use App\BarOrder;
use Auth;

use App\Models\Room;
use App\Models\Table AS T;
use App\Models\RestaurantBill AS RB;


class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('bar_items')
        ->leftJoin('bar_item_categories', 'bar_items.item_category_id', '=', 'bar_item_categories.id')
        ->where('bar_items.status_id', 1)
        ->get();
        
        $dishCate = BC::orderBy('id','DESC')->get();

        $tables = T::orderBy('id','ASC')->get();
        return view('settups.bar.pos.index', \compact('menus','dishCate','tables'));
    }

    public function report(){

        $sales = BarOrder::groupBy('qrtxt')
        ->where('prepared_by', Auth::user()->id)
        ->select(DB::raw('qrtxt, SUM(price) as total_price'))
        ->orderBy('id','DESC')
        ->get();

        // $sales = KotOrder::orderBy('id','DESC')
        //         //->groupBy('qrtxt')
        //         ->where('prepared_by', Auth::user()->id)
        //         ->get();

        // dd($sales);
              
        return view('settups.bar.pos.report', \compact('sales'));

    }


    public function showReport($id, $qr){

        $qrtxt = $id."/".$qr;

        $sales = BarOrder::where('qrtxt', $qrtxt)->get();

        $customer = RB::where('bill_id', $qrtxt)->first();



        $muda = BarOrder::where('qrtxt', $qrtxt)->pluck('created_at');
        $table_no = BarOrder::where('qrtxt', $qrtxt)->pluck('table');

        $rooms = Room::where('room_status_id', 6)->get();

        // dd($sales);
              
        return view('reports.bar', \compact('sales','rooms','qrtxt','muda','table_no'));

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


    public function barCate(Request $request){
        $cat_id = $request->cat_id;

        $menus = DB::table('bar_items')
        ->leftJoin('bar_item_categories', 'bar_items.item_category_id', '=', 'bar_item_categories.id')
        // ->where('bar_items.status_id', 1)
        ->where('bar_items.item_category_id', $cat_id)
        ->get();

        return view('settups.bar.pos.dishcatepage', \compact('menus'));
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
