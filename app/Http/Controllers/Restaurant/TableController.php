<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table AS T;
use DB;
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = T::orderBy('id','DESC')->get();

        return view('settups.restaurant.table.index', compact('tables'));
        
    }


    public function actionT(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'table_name' => $request->table_name,
                );

                DB::table('tables')->where('table_slug', $request->table_slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('table')->where('table_slug', $request->table_slug)->delete();
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

            'table_name' => 'required|unique:tables,table_name',
            // 'permission' => 'required',

        ]);


        $table = T::create(['table_name' => $request->input('table_name')]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($table);
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
