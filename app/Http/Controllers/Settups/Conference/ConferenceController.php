<?php

namespace App\Http\Controllers\Settups\Conference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Conference;
use App\Models\RoomStatus as RS;
use DB;
class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confes = DB::table('conferences')->get();

        $room_status = RS::orderBy('id','DESC')->get();
        return view('settups.conference.index', \compact('room_status','confes'));
    }


    public function confeAction(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'conference_name' => $request->conference_name,
                    'conference_price' => $request->conference_price,
                    'room_status_id' => $request->room_status_id,
                );

                DB::table('conferences')->where('slug', $request->slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('conferences')->where('slug', $request->slug)->delete();
            }

            return request()->json($request);
        }
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
        $this->validate($request, [

            'conference_name' => 'required',
            'conference_price' => 'required',
            'room_status_id' => 'required',

        ]);


        // $input = $request->all();
        $rooms = new Conference;
        $rooms->conference_name = $request->conference_name;
        $rooms->conference_price = $request->conference_price;
        $rooms->slug = rand(1,99999);
        $rooms->room_status_id = $request->room_status_id;
        $rooms->save();

        
        

        return response()->json($rooms);
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
