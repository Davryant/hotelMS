<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPurchasing as OP;
use App\Models\RestaurantRequest as RR;
use App\Models\Item;
use Auth;
use DB;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = RR::where('prepared', 0)->orderBy('id','DESC')->get();
        $items = RR::join("items","restaurant_requests.item_id","=","items.id")
        ->where('request_send', 0)
        ->get();

        // dd($items);
        $itemList = Item::orderBy('id','DESC')->get();

        return view('settups.restaurant.request.index', \compact('items','itemList'));
    }

    
    public function prepare(){

        $id = rand(1000,999999);
    //    $done =  OP::update(array('prepared_no' => $id, 'prepared' => 1));

      

        $form_data = array(
            'request_no' => $id,
            'request_send' => 1,
        );

        // $student = OP::update($form_data);
       $request= DB::table('restaurant_requests')->where('request_send', 0)->where('requester_id', Auth::user()->id)->update($form_data);


        return response()->json($request);
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
        request()->validate([

            'item_id'=> 'required',
            'quantity' => 'required',
            'measurement' => 'required',

        ]);
  
        $item_u_no = 'RN/'.rand(1,99999);
        $form_data = array(
            'item_id' => $request->input('item_id'),
            'measurement' => $request->input('measurement'),
            'quantity' => $request->input('quantity'),
            'item_u_no' => $item_u_no,
            'requester_id' => Auth::user()->id,

        );

        RR::create($form_data);
        return redirect()->back()->with('success','Data Saved Successfuly');
    }


    public function requestEdit(Request $request){
        if($request->ajax()){
            

            if($request->action == 'delete'){
                DB::table('restaurant_requests')->where('item_u_no', $request->item_u_no)->delete();
            }

            return request()->json($request);
        }
    }


    public function allRequest()
    {
      
        $prepared_by = RR::join("users","restaurant_requests.requester_id","=","users.id")
        ->pluck('name')->first();

        $requests = RR::groupBy('request_no')
        ->join("users","restaurant_requests.requester_id","=","users.id")
        ->where('request_send', 1)
        ->select(DB::raw('restaurant_requests.request_no, restaurant_requests.created_at, restaurant_requests.updated_at,restaurant_requests.id as rr_id, users.name'))
        ->get();

        // dd($prepared_by);
        return view('settups.restaurant.request.all-request', \compact('prepared_by','requests'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $items = RR::join("items","restaurant_requests.item_id","=","items.id")
        ->join("other_purchasings", "items.item_name", "=", "other_purchasings.item_name")
        ->where('restaurant_requests.request_no', $id)
        ->get();

        $prepared_by = RR::join("users","restaurant_requests.requester_id","=","users.id")
        ->where('request_no', $id)->pluck('name')->first();

        $formNo = RR::where('request_no', $id)->pluck('request_no')->first();

        // dd($items);
        return view('settups.restaurant.request.show', \compact('items','prepared_by','formNo'));
    }

    
    public function receive($id)
    {
        $items = RR::join("items","restaurant_requests.item_id","=","items.id")
        ->join("other_purchasings", "items.item_name", "=", "other_purchasings.item_name")
        ->where('restaurant_requests.request_no', $id)
        ->get();


        $prepared_by = RR::join("users","restaurant_requests.requester_id","=","users.id")
        ->where('request_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('settups.restaurant.request.receive', \compact('items','prepared_by'));
    }

    public function actionReceived(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $received = '';
                if($request->received == 1){
                    $received = 'No';
                }else{
                    $received = 'Yes';
                }

                $items = Item::join("restaurant_requests","restaurant_requests.item_id","=","items.id")
                ->join("other_purchasings", "items.item_name", "=", "other_purchasings.item_name")
                ->where('restaurant_requests.item_u_no', $request->item_u_no)
                ->pluck('items.item_name');

                $quantity = OP::where('item_name', $items[0])->pluck('item_unit');

                $toUpdate = array(
                    'item_unit' => $quantity[0] - $request->quantity_recieved,
                );

                DB::table('other_purchasings')->where('item_name', $items[0])->update($toUpdate);


                $data = array (
                    'quantity_recieved' =>  $request->quantity_recieved,
                    'received' =>$received,
                );

                DB::table('restaurant_requests')->where('item_u_no', $request->item_u_no)->update($data);


            }   

            return request()->json($request);
        }
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = RR::join("items","restaurant_requests.item_id","=","items.id")
        ->where('restaurant_requests.request_no', $id)
        ->get();

        return view('settups.restaurant.request.edit', \compact('items'));
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
