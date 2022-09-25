<?php

namespace App\Http\Controllers\Settup\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPurchasing as OP;
use DB;
class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OP::orderBy('id','DESC')->get();
        return view('settups.store.purchasing.other.index', \compact('items'));
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

            'item_name'=> 'required',
            'item_unit' => 'required',
            'unit_price' => 'required',
            'measurement' => 'required',

        ]);
  
        $item_number = 'BEACO/'.rand(1,100000000);
        $form_data = array(
            'item_name' => $request->input('item_name'),
            'item_unit' => $request->input('item_unit'),
            'unit_price' => $request->input('unit_price'),
            'measurement' => $request->input('measurement'),
            'item_number' => $item_number,
            'total_value' => $request->input('item_unit') * $request->input('unit_price')

        );

        OP::create($form_data);
        return redirect()->back()->with('success','Data Saved Successfuly');
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
