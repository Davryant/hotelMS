<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\AccomodationDetail;
use App\Models\Reserver;
use App\Models\Room;
use App\Models\RoomStatus;
use Carbon;
use Auth;
use DB;

class FrontContoroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $customers1 = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customers.acc_status', '=', 1)
        ->orderBy('customers.id','DESC')
        ->get();

        $customers2 = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customers.acc_status', '=', 2)
        ->orderBy('customers.id','DESC')
        ->get();

        $customers3 = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customers.acc_status', '=', 0)
        ->where('accomodation_details.room_price_applied', '!=', 0)
        ->orderBy('customers.id','DESC')
        ->get();

        $customers4 = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customers.acc_status', '=', 0)
        ->where('accomodation_details.room_price_applied', '=', 0)
        ->orderBy('customers.id','DESC')
        ->get();

        $rooms = DB::table('rooms')
        ->join('room_statuses', 'room_statuses.id', '=', 'rooms.room_status_id')
        ->orderBy('rooms.room_number','ASC')
        ->get();

        $mytime = Carbon\Carbon::now()->format('d-m-yy');

        $acc_date = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('reservers', 'reservers.id', '=', 'accomodation_details.reserver_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('accomodation_details.check_in_date', '=', $mytime)
        ->orderBy('customers.id','DESC')
        ->get();

        // dd($acc_date);
        foreach($acc_date as $value){
// print_r($value->room_name);
            if($value->room_price_applied == 0){
                $status_id=RoomStatus::where('status_name', "Reserved")->pluck('id');
                Room::where('room_name', $value->room_name)->update(array('room_status_id' => $status_id[0]));
            }else{
                $status_id=RoomStatus::where('status_name', "Booked")->pluck('id');
                Room::where('room_name', $value->room_name)->update(array('room_status_id' => $status_id[0]));
            }
                
        }

        return view('accomodation.front', \compact('customers1','customers2','customers3','customers4','rooms','acc_date'));
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
        $customers = DB::table('accomodation_details')
            ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
            ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
            ->where('customers.acc_status', '=', 1)
            ->get();

        Room::where('id', $id)->update(array('room_status_id' => '2'));

        return redirect()->back()->with('success','Customer Checked out Successfully');
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
