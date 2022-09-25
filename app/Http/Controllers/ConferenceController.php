<?php

namespace App\Http\Controllers;

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
Use App\Models\Conference;
Use App\Models\ConferenceBill;
use Auth;
use DB;
class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $idtype = Id::all();
        $payment_type = PaymentMode::all();
        $room_category = RoomCategory::all();
        $rooms = Room::all();
        $country = Country::all();
        $group = CustomerGroup::all();
        $confes = Conference::where('room_status_id', 'Vacant')->get();

        return view('conference.new_order.new',compact('idtype','payment_type','room_category','rooms','country','group','confes'));

    }

    
    public function confeAction(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'phone_number' => $request->phone_number,
                    'amount_paid' => $request->amount_paid,
                );

                DB::table('conference_customers')->where('slug_c', $request->slug_c)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('conference_customers')->where('slug_c', $request->slug_c)->delete();
            }

            return request()->json($request);
        }
    }
    
    public function filterPrice($id)
    {
        $price = Conference::where("id", $id)
        ->pluck("conference_price");
        return response()->json($price[0]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = DB::table('conference_customers')
            ->join('conferences', 'conference_customers.conference_id', '=', 'conferences.id')
            ->join('ids', 'ids.id', '=', 'conference_customers.idtype')
            ->orderBy('conference_customers.id','DESC')
            ->get();

            // dd($customers);

            return view('conference.new_order.index', \compact('customers'));
    }

    public function report()
    {
        $customers = DB::table('conference_customers')
            ->join('conferences', 'conference_customers.conference_id', '=', 'conferences.id')
            ->join('ids', 'ids.id', '=', 'conference_customers.idtype')
            ->orderBy('conference_customers.id','DESC')
            ->get();

            return view('reports.conference', \compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'email',
            'phone_number'=>'required',
            'gender'=>'required',
            'country'=>'required',
            'idtype'=>'required',
            'id_number'=>'required',
            'payment_id'=>'required',
            'conference_id'=>'required',
            'amount_paid'=>'required',
            'datein'=>'required',
            'dateout'=>'required',
            'status'=>'required'
        ]);

        $customer1=ConferenceBill::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'idtype'=>$request->idtype,
            'id_number'=>$request->id_number,
            'payment_id'=>$request->payment_id,
            'conference_id'=>$request->conference_id,
            'amount_paid'=>$request->amount_paid,
            'datein'=>$request->datein,
            'dateout'=>$request->dateout,
            'slug_c'=>\rand(999,9999999),
            'status' =>$request->status,
        ]);

        return back()->with('success', 'You have registered a Customer Successfully.');
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
