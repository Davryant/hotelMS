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
use App\Models\ReceivePayment;
use Carbon;
use Auth;
use DB;

class ReveivePaymentController extends Controller
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
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('receive_payments', 'customers.id', '=', 'receive_payments.customer_id')
        ->orderBy('customers.id','DESC')
        ->get();

        // dd($customers);

        return view('accomodation.payment.index', \compact('customers'));
    }

    public function pending()
    {
        $customers = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('receive_payments', 'customers.id', '=', 'receive_payments.customer_id')
        ->orderBy('customers.id','DESC')
        ->get();

        $lists = DB::table('conference_customers')
            ->join('conferences', 'conference_customers.conference_id', '=', 'conferences.id')
            ->join('ids', 'ids.id', '=', 'conference_customers.idtype')
            ->orderBy('conference_customers.id','DESC')
            ->get();
        // dd($customer);

        return view('accomodation.payment.pending', \compact('customers','lists'));
    }


    public function report_payment()
    {
        $customers = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('receive_payments', 'customers.id', '=', 'receive_payments.customer_id')
        ->orderBy('customers.id','DESC')
        ->get();

        // dd($customers);

        return view('reports.payments', \compact('customers'));
    }


    public function report_hotel_income()
    {
        $customers = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'accomodation_details.payment_mode_id', '=', 'payment_modes.id')
        ->join('receive_payments', 'customers.id', '=', 'receive_payments.customer_id')
        ->orderBy('customers.id','DESC')
        ->get();


        $other_charges = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'accomodation_details.payment_mode_id', '=', 'payment_modes.id')
        ->join('customer_bills', 'customers.id', '=', 'customer_bills.customer_id')
        ->orderBy('customers.id','DESC')
        ->get();


        $rest_bills = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'accomodation_details.payment_mode_id', '=', 'payment_modes.id')
        ->join('restaurant_bills', 'accomodation_details.room_id', '=', 'restaurant_bills.room_id')
        ->orderBy('customers.id','DESC')
        // ->where('restaurant_bills.created_at', \date())
        ->get();

        // dd($rest_bills);

        return view('reports.hotel-income', \compact('customers','other_charges','rest_bills'));
    }


    
    public function report_room_sales()
    {
     
        $rest_bills = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->join('payment_modes', 'accomodation_details.payment_mode_id', '=', 'payment_modes.id')
        ->join('restaurant_bills', 'accomodation_details.room_id', '=', 'restaurant_bills.room_id')
        ->orderBy('customers.id','DESC')
        // ->where('restaurant_bills.created_at', \date())
        ->get();

        // dd($rest_bills);

        return view('reports.room-sales', \compact('rest_bills'));
    }


    public function recievePayment($id)
    {

        $details = DB::table('accomodation_details')
        ->join('rooms', 'rooms.id', '=', 'accomodation_details.room_id')
        ->join('customers', 'customers.id', '=', 'accomodation_details.customer_id')
        ->join('ids', 'ids.id', '=', 'customers.idtype')
        ->where('customer_id', $id)
        ->orderBy('customers.id','DESC')
        ->get();

        $deniLote = DB::table('receive_payments')->where('customer_id', $id)->first();
        // dd($prepared_by);
        return view('accomodation.payment.receive', \compact('details','deniLote'));
    }


    public function recievePayments(Request $request)
    {
        // $customer = Customer::find($id);
       
        $received_amount =ReceivePayment::where('customer_id', $request->customer_id)->pluck('received_amount')->first();
       
        $received_amount = $received_amount + $request->received_amount;

        $balance =ReceivePayment::where('customer_id', $request->customer_id)->pluck('total_dept')->first();
        $balance = $received_amount -$balance;

        ReceivePayment::where('customer_id', $request->customer_id)->update(array('received_amount' => $received_amount, 'check_number' =>$request->check_number, 'balance' => $balance));

        return redirect()->back()->with('success','Customer Payment Received Successfully');
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
