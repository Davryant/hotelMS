<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\AccomodationDetail;

class CheckInContoroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('accomodation.check_in.check_in');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
            'payment_mode_id'=>'required',
            'room_category_id'=>'required',
            'room_id'=>'required',
            'room_price_applied'=>'required',
            'check_in_date'=>'required',
            'check_out_date'=>'required'
        ]);

        $input =  $request->all();

        // dd($input);
  

       
        // register customer
        // $customer=Customer::create($input);
        $customer1=Customer::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'idtype'=>$request->idtype,
            'id_number'=>$request->id_number,
            'acc_status'=>1
    ]);

        $customer_id=Customer::where('phone_number', $request->phone_number)->pluck('id');

        // dd($customer_id[0]);
        $customer2=AccomodationDetail::create([
                'payment_mode_id'=>$request->payment_mode_id,
                'room_category_id'=>$request->room_category_id,
                'room_id'=>$request->room_id,
                'room_price_applied'=>$request->room_price_applied,
                'check_in_date'=>$request->check_in_date,
                'check_out_date'=>$request->check_out_date,
                'customer_id'=>$customer_id[0]
        ]);

        // if registration success then return with success message
        
            return back()->with('success', 'You have registered a Customer Successfully.');




        //     $this->validate($request, [
        //     ]);
    
        //     $input2 =  $request->all();
    
      
    
        //    dd($input2);
    
        //     // if registration success then return with success message
            
        //         return back()->with('success', 'You have registered successfully.');
            
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
