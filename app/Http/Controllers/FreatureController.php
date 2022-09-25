<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feature;
use App\Models\Module;

class FreatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {

         $this->middleware('permission:feature-list|feature-create|feature-edit|feature-delete', ['only' => ['index','show']]);


         $this->middleware('permission:feature-create', ['only' => ['create','store']]);

         $this->middleware('permission:feature-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:feature-delete', ['only' => ['destroy']]);

    }


    public function index(Request $request)
    {
        $features = Feature::orderBy('id','DESC')->get();

        return view('settups.module.feature',compact('features'));
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

            'feature' => 'required|unique:roles,name',

            // 'permission' => 'required',

        ]);


        $feature = Feature::create(['feature' => $request->input('feature')]);

        // $role->syncPermissions($request->input('permission'));


        return redirect()->route('module.feature')

                        ->with('success','Feature created successfully');
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


    public function showFeature($id)
    {
        $features = Feature::get();
        $module = Module::find($id);

        // $permissionNames = Auth::user()->permissions;
        // dd($module);
        return view('settups.module.add-feature-to-module',compact('features','module'));
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
