<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\AccomodationDetail;
use App\Models\Reserver;
use App\Models\Id;
use App\Models\PaymentMode;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Country;
use App\Models\CustomerGroup;
use Auth;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('reservers', 'reservers.id', '=', 'accomodation_details.reserver_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customers.acc_status', '=', 0)
        ->where('accomodation_details.room_price_applied', '!=', 0)
        ->orderBy('customers.id','DESC')
        ->get();
        
        // dd($customers);
        return view('accomodation.booking.index', \compact('customers'));
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
        Customer::where('id', $id)->update(array('acc_status' => '1'));
        $status_id=RoomStatus::where('status_name', "Occupied")->pluck('id');
        Room::where('id', $request->room_id)->update(array('room_status_id' => $status_id[0]));

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
        DB::table("accomodation_details")->where('customer_id',$id)->delete();
        return redirect()->back()->with('success','Customer Deleted Successfully');
    }
}
