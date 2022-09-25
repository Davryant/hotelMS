<?php

namespace App\Http\Controllers\accomodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\AccomodationDetail;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Id;
use App\Models\PaymentMode;
use App\Models\RoomCategory;
use App\Models\Country;
use App\Models\CustomerGroup;
use App\Models\GroupStatus;
use App\Models\GroupAccommodation;
use Auth;
use DB;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers = DB::table('accomodation_details')
        // ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        // ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        // ->join('ids', 'ids.id', '=', 'customers.idtype')
        // ->where('customers.acc_status', '=', 2)
        // ->orderBy('customers.id','DESC')
        // ->get();


        $customers = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('receive_payments', 'customers.id', '=', 'receive_payments.customer_id')
        ->where('customers.acc_status', '=', 2)
        ->orderBy('customers.id','DESC')
        ->get();

        return view('accomodation.check_out.index', \compact('customers'));
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
        $details = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->get();

        return view('accomodation.check_out.show', \compact('details'));
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
    public function update(Request $request, $id1, $id2)
    {
        Customer::where('id', $id1)->update(array('acc_status' => '1'));
        // Room::where('id', $id2)->update(array('room_status_id' => '1'));
        $status_id=RoomStatus::where('status_name', "Occupied")->pluck('id');
        Room::where('id', $id2)->update(array('room_status_id' => $status_id[0]));


        return redirect()->back()->with('success','Customer Checked in Successfully');
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
