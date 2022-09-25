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
use Carbon;
use Auth;
use DB;
// use Illuminate\Support\Str;

class ReservationController extends Controller
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
        ->where('accomodation_details.room_price_applied', '=', 0)
        ->orderBy('customers.id','DESC')
        ->get();
        // dd($customers);
        return view('accomodation.reservation.index', \compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idtype = Id::all();
        $payment_type = PaymentMode::all();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        $country = Country::all();
        // $group = CustomerGroup::all();
        return view('accomodation.reservation.add_new_reservation',compact('idtype','payment_type','room_category','rooms','country'));
    }

    public function filterRoom($id)
    {
        $rooms = DB::table('rooms')
        ->join('room_statuses', 'room_statuses.id', '=', 'rooms.room_status_id')
        ->where("room_category_id", $id)
        ->where("status_name", "Vacant")
        ->pluck("rooms.id", "rooms.room_number");
        return response()->json($rooms);
    }

    public function filterPrice($id)
    {
        $price = Room::where("id", $id)
        ->pluck("room_price");
        return response()->json($price[0]);
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

    public function reserverPostRegistration(Request $request) {

        // $input =  $request->all();
    
        // dd($input);
        // if($request){
        $this->validate($request, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required',
            'gender'=>'required',
            'country'=>'required',
            'idtype'=>'required',
            'id_number'=>'required',
            'payment_mode_id'=>'required',
            'room_category_id'=>'required',
            'room_id'=>'required',
            // 'room_price_applied'=>'required',
            'check_in_date'=>'required',
            'check_out_date'=>'required',
            'reserver_firstname'=>'required',
            'reserver_lastname'=>'required',
            'reserver_phone_number'=>'required',
            'reserver_gender'=>'required'
        ]);
    
        $input =  $request->all();
        $recept = 'RT'.rand(1,100000000);
    
        // dd($input);
        $customer1=Customer::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'idtype'=>$request->idtype,
            'id_number'=>$request->id_number,
            'customer_type'=>"Individual",
            'acc_status'=>0
        ]);
    
            // dd($customer_id[0]);
        $Reserver=Reserver::create([
            'reserver_firstname'=>$request->reserver_firstname,
            'reserver_lastname'=>$request->reserver_lastname,
            'reserver_phone_number'=>$request->reserver_phone_number,
            'reserver_gender'=>$request->reserver_gender
        ]);


            $customer_id=Customer::where('phone_number', $request->phone_number)->pluck('id');
            $reserver_id=Reserver::where('reserver_phone_number', $request->reserver_phone_number)->pluck('id');
    
            // dd($customer_id[0]);
            $customer2=AccomodationDetail::create([
                    'group_id'=>0,
                    'payment_mode_id'=>$request->payment_mode_id,
                    'room_category_id'=>$request->room_category_id,
                    'room_id'=>$request->room_id,
                    'room_price_applied'=>$request->room_price_applied,
                    'advanced_payment' => $request->room_price_applied,
                    'check_in_date'=>$request->check_in_date,
                    'check_out_date'=>$request->check_out_date,
                    'customer_id'=>$customer_id[0],
                    'reserver_id'=>$reserver_id[0],
                    'recept_no'=>$recept,
            ]);
    
            
            $mytime = Carbon\Carbon::now()->format('d-m-yy');

            if($request->check_in_date == $mytime){
                if($request->room_price_applied == 0){
                    $status_id=RoomStatus::where('status_name', "Reserved")->pluck('id');
                    Room::where('id', $request->room_id)->update(array('room_status_id' => $status_id[0]));
                }else{
                    $status_id=RoomStatus::where('status_name', "Booked")->pluck('id');
                    Room::where('id', $request->room_id)->update(array('room_status_id' => $status_id[0]));
                }
            }
            // if registration success then return with success message
            
                return back()->with('success', 'You have registered the Reservation Successfully.');
    
        }
    
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
