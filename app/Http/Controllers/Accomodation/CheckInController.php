<?php

namespace App\Http\Controllers\Accomodation;

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
use App\Models\CustomerBill;
use App\Models\ReceivePayment;
use Auth;
use DB;
use DateTime;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accomodation.check_in.index');
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
        $group = CustomerGroup::all();
        // dd($group);
        return view('accomodation.check_in.add_new_customer',compact('idtype','payment_type','room_category','rooms','country','group'));
    }

    public function createGroup()
    {
        $idtype = Id::all();
        $payment_type = PaymentMode::all();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        $country = Country::all();
        $group = CustomerGroup::all();
        return view('accomodation.check_in.add_new_group_customer',compact('idtype','payment_type','room_category','rooms','country','group'));
    }

    public function filterRoom($id)
    {
        $rooms = DB::table('rooms')
        ->join('room_statuses', 'room_statuses.id', '=', 'rooms.room_status_id')
        ->where("room_category_id", $id)
        ->where("status_name", "Vacant")
        ->pluck("rooms.id", "rooms.room_name");
        return response()->json($rooms);
    }

    public function filterPrice($id)
    {
        $price = Room::where("id", $id)
        ->pluck("room_price");
        return response()->json($price[0]);
    }

    public function invoince($id)
    {
       
        $item = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'payment_modes.id', '=', 'accomodation_details.payment_mode_id')
        // ->join('receive_payments', 'accomodation_details.customer_id', '=', 'receive_payments.customer_id')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->first();

        $deniLote = DB::table('receive_payments')->where('customer_id', $id)->first();

        $acc_other_charges= DB::table('customer_bills')
        ->where('customer_id', $id)
        ->get();


        $rest_bill = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'payment_modes.id', '=', 'accomodation_details.payment_mode_id')
        ->join('restaurant_bills', 'restaurant_bills.room_id', '=', 'rooms.id')
        // ->join('receive_payments', 'accomodation_details.customer_id', '=', 'receive_payments.customer_id')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->get();


        // dd($rest_bill);
        return view('accomodation.check_in.invoice', \compact('item','deniLote', 'acc_other_charges','rest_bill'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function checkedIn()
    {
        $customers = DB::table('accomodation_details')
            ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
            ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
            ->join('ids', 'ids.id', '=', 'customers.idtype')
            ->where('customers.acc_status', '=', 1)
            ->orderBy('customers.id','DESC')
            ->get();

            // dd($customers);

        return view('accomodation.check_in.index', \compact('customers'));
    }


      // --------------------- [ Register Customer ] ----------------------
   public function customerPostRegistration(Request $request) {

    
    $this->validate($request, [
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required|email',
        'phone_number'=>'required',
        'gender'=>'required',
        'country'=>'required',
        'idtype'=>'required',
        'id_number'=>'required',
        'customer_type'=>'required',
        // 'payment_mode_id'=>'required',
        'room_category_id'=>'required',
        'room_id'=>'required',
        'room_price_applied'=>'required',
        'check_in_date'=>'required',
        'check_out_date'=>'required'
    ]);

    $input =  $request->all();

    // dd($input);

    if($request->customer_type == "individual"){
    $customer1=Customer::create([
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'email'=>$request->email,
        'phone_number'=>$request->phone_number,
        'gender'=>$request->gender,
        'country'=>$request->country,
        'idtype'=>$request->idtype,
        'id_number'=>$request->id_number,
        'customer_type'=>$request->customer_type,
        'acc_status'=>1
    ]);

        $customer_id=Customer::where('phone_number', $request->phone_number)->pluck('id');
        $recept = 'RT'.rand(1,100000000);

        // dd($customer_id[0]);

        $fdate = $request->check_in_date;
        $tdate = $request->check_out_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        // dd($days);
        $customer2=AccomodationDetail::create([
                'group_id'=>$request->group_id,
                'payment_mode_id'=>$request->payment_mode_id,
                'room_category_id'=>$request->room_category_id,
                'room_id'=>$request->room_id,
                'room_price_applied'=>$request->room_price_applied,
                'check_in_date'=>$request->check_in_date,
                'check_out_date'=>$request->check_out_date,
                'customer_id'=>$customer_id[0],
                'recept_no'=>$recept,
                'no_days' => $days
        ]);

        $status_id=RoomStatus::where('status_name', "Occupied")->pluck('id');
        Room::where('id', $request->room_id)->update(array('room_status_id' => $status_id[0]));

    }else{

        $fdate = $request->check_in_date;
        $tdate = $request->check_out_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        $customer3=Customer::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'idtype'=>$request->idtype,
            'id_number'=>$request->id_number,
            'customer_type'=>$request->customer_type,
            'acc_status'=>1
        ]);
    
            $customer_id=Customer::where('phone_number', $request->phone_number)->pluck('id');
            $payment_mode_id=GroupAccommodation::where('group_id', $request->group_id)->pluck('payment_mode_id');
            // dd($customer_id[0]);
            $customer4=AccomodationDetail::create([
                    'group_id'=>$request->group_id,
                    'payment_mode_id'=>$payment_mode_id[0],
                    'room_category_id'=>$request->room_category_id,
                    'room_id'=>$request->room_id,
                    'room_price_applied'=>$request->room_price_applied,
                    'check_in_date'=>$request->check_in_date,
                    'check_out_date'=>$request->check_out_date,
                    'customer_id'=>$customer_id[0],
                    'no_days' => $days
            ]);
    
            $status_id=RoomStatus::where('status_name', "Occupied")->pluck('id');
            Room::where('id', $request->room_id)->update(array('room_status_id' => $status_id[0]));
    }
        // if registration success then return with success message
        
            return back()->with('success', 'You have registered a Customer Successfully.');

    }


    public function groupPostRegistration(Request $request) {
        // $input =  $request->all();
        // dd($input);
        $this->validate($request, [
            'group_availability'=>'required',
            // 'company_name'=>'required',
            // 'email'=>'required|email',
            // 'phone_number'=>'required',
            // 'address'=>'required',
            // 'group_id'=>'required',
            'payment_mode_id'=>'required',
            'number_of_guests'=>'required',
            'room_category_id'=>'required',
            // 'room_id'=>'required',
            'room_price_applied'=>'required',
            'check_in_date'=>'required',
            'check_out_date'=>'required'
        ]);
    
        
        $input =  $request->all();
            // dd($input);

        if($request->group_availability == "old"){
            $group_status_id=GroupStatus::where('status_name', "Active")->pluck('id');
            
                $group3=GroupAccommodation::create([
                    'group_id'=>$request->group_id,
                    'payment_mode_id'=>$request->payment_mode_id,
                    'number_of_guests'=>$request->number_of_guests,
                    'room_price_applied'=>$request->room_price_applied,
                    // 'room_category_id'=>$request->room_category_id,
                    // 'room_id'=>$request->room_id,
                    'group_status'=>$group_status_id[0],
                    'check_in_date'=>$request->check_in_date,
                    'check_out_date'=>$request->check_out_date
            ]);

        }else{
            $group=CustomerGroup::create([
                'company_name'=>$request->company_name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address,
            ]);

                $group_id=CustomerGroup::where('phone_number', $request->phone_number)->pluck('id');
                $group_status_id=GroupStatus::where('status_name', "Active")->pluck('id');

                // dd($group_id[0]);
                $group2=GroupAccommodation::create([
                        'group_id'=>$group_id[0],
                        'payment_mode_id'=>$request->payment_mode_id,
                        'number_of_guests'=>$request->number_of_guests,
                        'room_price_applied'=>$request->room_price_applied,
                        // 'room_category_id'=>$request->room_category_id,
                        // 'room_id'=>$request->room_id,
                        'group_status'=>$group_status_id[0],
                        'check_in_date'=>$request->check_in_date,
                        'check_out_date'=>$request->check_out_date
                ]);
        }
    
            // if registration success then return with success message
            
                return back()->with('success', 'You have registered the Group Successfully.');
    
        }



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

        // $details = AccomodationDetail::where('customer_id', $id)->orderBy('id','DESC')->get();

        $acc_fee = DB::table('accomodation_details')
        ->where('customer_id', $id)
        ->first();

        $acc_other_charges= DB::table('customer_bills')
        ->where('customer_id', $id)
        ->get();

        $customer_bill= DB::table('receive_payments')
        ->where('customer_id', $id)
        ->first();


        // $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        // ->where('prepared_no', $id)->pluck('name')->first();

        // dd($customer_bill);

        return view('accomodation.check_in.show', \compact('details','acc_fee','acc_other_charges','customer_bill'));
    }


    public function showForReport($id)
    {

        $details = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->get();

        // $details = AccomodationDetail::where('customer_id', $id)->orderBy('id','DESC')->get();

        $acc_fee = DB::table('accomodation_details')
        ->where('customer_id', $id)
        ->first();

        $acc_other_charges= DB::table('customer_bills')
        ->where('customer_id', $id)
        ->get();

        $customer_bill= DB::table('receive_payments')
        ->where('customer_id', $id)
        ->first();


        // $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        // ->where('prepared_no', $id)->pluck('name')->first();

        // dd($customer_bill);

        return view('reports.accomodation_show', \compact('details','acc_fee','acc_other_charges','customer_bill'));
    }


    public function addCharges($id)
    {

        $details = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->get();

        // $details = AccomodationDetail::where('customer_id', $id)->orderBy('id','DESC')->get();

        // $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        // ->where('prepared_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('accomodation.check_in.add-charges', \compact('details'));
    }

     public function storeCharges(Request $request)
    {
        $this->validate($request, [
            'charge_type'=>'required',
            'amount'=>'required',
            'customer_id'=>'required',
        ]);
    
        $charges=CustomerBill::create([
            'bill_from'=>$request->charge_type,
            'amount'=>$request->amount,
            'customer_id'=>$request->customer_id,
            'created_by'=>Auth::user()->id,
        ]);
        
        // $input =  $request->all();

        return back()->with('success', 'You have registered the Group Successfully.');

    }


    public function storeDeni(Request $request)
    {
        $this->validate($request, [
            'customer_id'=>'required',
            'total_dept'=>'required',
        ]);
    
        $charges=ReceivePayment::create([
            'customer_id'=>$request->customer_id,
            'total_dept'=>$request->total_dept,
        ]);
        
        // $input =  $request->all();

        return back()->with('success', 'You have registered the Group Successfully.');
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
        // $customer = Customer::find($id);
        Customer::where('id', $id1)->update(array('acc_status' => '2'));

        $status_id=RoomStatus::where('status_name', "Vacant")->pluck('id');
        Room::where('id', $id2)->update(array('room_status_id' => $status_id[0]));

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
