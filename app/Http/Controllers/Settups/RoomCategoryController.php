<?php

namespace App\Http\Controllers\Settups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomCategory as RC;
use DB;
class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $room_cats = RC::orderBy('id','DESC')->get();
        return view('settups.accomodation.room-category.index', compact('room_cats'));
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

            'category_name' => 'required|unique:room_categories,category_name',
            // 'permission' => 'required',

        ]);


        $category_name = RC::create(['category_name' => $request->input('category_name')]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($category_name);
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
        $roomCategory = RC::find($id);

        return response()->json($roomCategory);
        
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
        DB::table("room_categories")->where('id',$id)->delete();

        return redirect()->back()->with('success','Category deleted successfully');
    }
}
