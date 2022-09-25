<?php

namespace App\Http\Controllers\Settups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomStatus as RS;
use DB;
class RoomStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {

         $this->middleware('permission:room_status-list');

         $this->middleware('permission:room_status-create', ['only' => ['create','store']]);

         $this->middleware('permission:room_status-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:room_status-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $room_status = RS::orderBy('id','DESC')->get();
        return view('settups.accomodation.room-status.index', compact('room_status'));
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

            'status_name' => 'required|unique:room_statuses,status_name',
            // 'permission' => 'required',

        ]);


        $status = RS::create(['status_name' => $request->input('status_name')]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($status);
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
        DB::table("room_statuses")->where('id',$id)->delete();

        return redirect()->back()->with('success','Status deleted successfully');
    }
}
