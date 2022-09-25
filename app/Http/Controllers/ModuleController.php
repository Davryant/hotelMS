<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Module;
use Spatie\Permission\Models\Permission;

class ModuleController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $permisions = Permission::orderBy('id','DESC')->get();

        return view('settups.module.index',compact('permisions'));
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

            'module_name' => 'required|unique:roles,name',

            // 'permission' => 'required',

        ]);


        $module = Module::create(['module_name' => $request->input('module_name')]);

        // $role->syncPermissions($request->input('permission'));

        for($i = 1; $i <= 4; $i++){
            if($i == 1){
                $form_data = array(
                    'name' => $request->input('module_name').'-list',
                    'guard' => 'web',
                );
        
                Permission::create($form_data);
            }elseif($i == 2){
                $form_data = array(
                    'name' => $request->input('module_name').'-create',
                    'guard' => 'web',
                );
        
                Permission::create($form_data);
            }elseif($i == 3){
                $form_data = array(
                    'name' => $request->input('module_name').'-edit',
                    'guard' => 'web',
                );
        
                Permission::create($form_data);
            }elseif($i == 4){
                $form_data = array(
                    'name' => $request->input('module_name').'-delete',
                    'guard' => 'web',
                );
        
                Permission::create($form_data);
            }
           
        }
        

        return redirect()->route('module.index')->with('success','Module created successfully');
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
