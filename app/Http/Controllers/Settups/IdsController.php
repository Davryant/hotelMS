<?php

namespace App\Http\Controllers\Settups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Id;
use RealRashid\SweetAlert\Facades\Alert;

class IdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {

         $this->middleware('permission:id-list');

         $this->middleware('permission:id-create', ['only' => ['create','store']]);

         $this->middleware('permission:id-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:id-delete', ['only' => ['destroy']]);

    }


    public function index()
    {
        $ids = Id::get();
        return view('settups.accomodation.ids.index', compact('ids'));
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

            'id_name' => 'required|unique:ids,id_name',
            // 'permission' => 'required',

        ]);


        $idty = Id::create(['id_name' => $request->input('id_name')]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($idty);
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
        //s
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
        // $ids = Id::find($id);
        // $ids = $request->id_name;
        // $ids->save();

        $UpdateDetails = Id::where('id', $id)->first();

        if (is_null($UpdateDetails)) {
            return false;
        }

        return response()->json($ids);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idty = Id::find($id)->delete();

        return response()->json(['success' => true]);
    }
}
