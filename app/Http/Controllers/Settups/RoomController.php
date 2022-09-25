<?php

namespace App\Http\Controllers\Settups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomStatus as RS;
use App\Models\RoomCategory as RC;
use App\Models\Room as R;
use DB;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $room_cats = RC::orderBy('id','DESC')->get();
        $room_status = RS::orderBy('id','DESC')->get();
        // $rooms = R::orderBy('id','DESC')->get();

        $rooms = DB::table('rooms')
            ->leftJoin('room_categories', 'rooms.room_category_id', '=', 'room_categories.id')
            ->leftJoin('room_statuses', 'rooms.room_status_id', '=', 'room_statuses.id')
            ->select(DB::raw('rooms.room_name,rooms.room_category_id,rooms.room_price,rooms.room_status_id,rooms.room_number, rooms.id as roomid, room_categories.*, room_statuses.*'))
            ->get();

            // dd($rooms);

        return view('settups.accomodation.room.index', compact('room_cats','room_status','rooms'));
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

            'room_name' => 'required',
            'room_category_id' => 'required',
            'room_price' => 'required',
            'room_status_id' => 'required',
            'room_number' => 'required'

        ]);


        $input = $request->all();


        $rooms = R::create($input);
        

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
        DB::table("rooms")->where('id',$id)->delete();

        return redirect()->back()->with('success','Room deleted successfully');

    }
}
