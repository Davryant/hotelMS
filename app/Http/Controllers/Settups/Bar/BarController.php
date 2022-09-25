<?php

namespace App\Http\Controllers\Settups\Bar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Bar as B;
use App\Models\RoomStatus as RS;
use DB;
class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bars = B::get();
        $room_status = RS::orderBy('id','DESC')->get();

        return view('settups.bar.index', compact('bars','room_status'));
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

            'bar_name' => 'required',
            'status_id' => 'required',

        ]);


        // $input = $request->all();
        $rooms = new B;
        $rooms->bar_name = $request->bar_name;
        $rooms->status_id = $request->status_id;
        $rooms->bar_slug = rand(1,99999);
        $rooms->save();

        // $rooms = B::create($input);
        

        return response()->json($rooms);
    }


    public function barAction(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'bar_name' => $request->bar_name,
                );

                DB::table('bars')->where('bar_slug', $request->bar_slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('bars')->where('bar_slug', $request->bar_slug)->delete();
            }

            return request()->json($request);
        }
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
        // public function scopeWhereRoleIs($query, $role = '', $team = null) { 
        //     return $query->whereHas('roles', function ($roleQuery) use ($role, $team) { 
        //         $roleQuery->where('name', $role); 
        //         if (!is_null($team)) 
        //         $roleQuery->where('team_id', $team->id); }); 
        //     }
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
