<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishCategory AS DC;
use App\Models\DishMenu AS DM;
use DB;
use App\Models\Room;
use App\Models\Table AS T;
use App\Models\RestaurantBill AS RB;
use App\KotOrder;
use App\BarOrder;
use Auth;
use Carbon;
class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('dish_menus')
        ->leftJoin('dish_categories', 'dish_menus.item_category', '=', 'dish_categories.id')
        ->get();
        $dishCate = DC::orderBy('id','DESC')->get();
        $tables = T::orderBy('id','ASC')->get();
        return view('settups.restaurant.pos.index', \compact('menus', 'dishCate','tables'));
    }

    public function kot(){
        return view('settups.restaurant.pos.ticket');
    }

    public function report(){

        $sales = KotOrder::groupBy('qrtxt')
        ->where('prepared_by', Auth::user()->id)
        ->select(DB::raw('qrtxt, SUM(price) as total_price'))
        ->orderBy('id','DESC')
        ->get();

        // $sales = KotOrder::orderBy('id','DESC')
        //         //->groupBy('qrtxt')
        //         ->where('prepared_by', Auth::user()->id)
        //         ->get();

        // dd($sales);
              
        return view('settups.restaurant.pos.report', \compact('sales'));

    }


    public function showReport($id, $qr){

        $qrtxt = $id."/".$qr;

        $sales = KotOrder::where('qrtxt', $qrtxt)->get();

        $customer = RB::where('bill_id', $qrtxt)->first();



        $muda = KotOrder::where('qrtxt', $qrtxt)->pluck('created_at');
        $table_no = KotOrder::where('qrtxt', $qrtxt)->pluck('table');

        $rooms = Room::where('room_status_id', 6)->get();

        // dd($sales);
              
        return view('reports.restaurant', \compact('sales','rooms','qrtxt','muda','table_no'));

    }


    public function createBill(){

        $sales = KotOrder::groupBy('qrtxt')
        ->where('prepared_by', Auth::user()->id)
        ->select(DB::raw('qrtxt, SUM(price) as total_price'))
        ->get();

        // $sales = KotOrder::orderBy('id','DESC')
        //         //->groupBy('qrtxt')
        //         ->where('prepared_by', Auth::user()->id)
        //         ->get();

        // dd($sales);
              
        return view('settups.restaurant.pos.create-bill', \compact('sales'));

    }

    public function filter(Request $request){

        $days = KotOrder::whereDate('created_at', \today())->get();

        // $month = KotOrder::whereYear('created_at', now()->year)
        //         ->whereMonth('created_at', now()->month)
        //         ->get();

        // $byweek = Reservation::all()
        //     ->groupBy(DB::raw('WEEK(created_at)'))
        //     ->orderBy(DB::raw('COUNT(id)','desc'));
        

        
                
        return response()->json($days);

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
        $tableData = stripcslashes($_POST['pTableData']);

        // Decode the JSON array
        $tableData = json_decode($tableData,TRUE);

        // now $tableData can be accessed like a PHP array
        // echo $tableData[1]['description'];

        foreach($tableData as $data){ 
            $order=new KotOrder;
            $order->item_name=$data['item'];
            $order->quantity=$data['quantity'];
            $order->price = $data['price'];
            $order->table = $data['table'];
            $order->customer = $data['customer'];
            $order->qrtxt = $data['qrtxt'];
            // $order->status = $data['status'];
            $order->prepared_by = Auth::user()->id;
            $order->save();
         }

        return response()->json('Done');
    }


    public function Barstore(Request $request)
    {
        $tableData = stripcslashes($_POST['pTableData']);

        // Decode the JSON array
        $tableData = json_decode($tableData,TRUE);

        // now $tableData can be accessed like a PHP array
        // echo $tableData[1]['description'];

        foreach($tableData as $data){ 
            $order=new BarOrder;
            $order->item_name=$data['item'];
            $order->quantity=$data['quantity'];
            $order->price = $data['price'];
            $order->table = $data['table'];
            $order->customer = $data['customer'];
            $order->qrtxt = $data['qrtxt'];
            // $order->status = $data['status'];
            $order->prepared_by = Auth::user()->id;
            $order->save();
         }

        return response()->json('Done');
    }

    public function storeBill(Request $request)
    {

        // $data = $request->all();
        // $bill_from = $request->bill_from;

        $foodCate = RB::create(['bill_from' => $request->bill_from,'room_id' => $request->room_id, 'total' => $request->total, 'bill_id'=> $request->bill_id]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($foodCate);
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
