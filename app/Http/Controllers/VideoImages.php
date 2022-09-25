<?php

namespace App\Http\Controllers;

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
Use App\Models\VideoImage;
use Auth;
use DB;

class VideoImages extends Controller
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

        return view('videoimage.new_order.new',compact('idtype','payment_type','room_category','rooms','country','group','confes'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vidim = DB::table('video_images')->get();

            // dd($customers);

            return view('videoimage.new_order.index', \compact('vidim'));
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
            'phone_number'=>'required',
            'category'=>'required',
            'location'=>'required',
            'gender'=>'required',
        ]);

        $customer1=VideoImage::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'location'=>$request->location,
            'category'=>$request->category,
            'slug_vid'=>\rand(999,9999999)
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
