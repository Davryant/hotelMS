<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishCategory AS DC;
use DB;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = DC::orderBy('id','DESC')->get();
        return view('settups.restaurant.food-category.index', compact('dishes'));
    }

    
    public function requestEdit(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'food_category_name' => $request->food_category_name,
                );

                DB::table('dish_categories')->where('id', $request->id)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('dish_categories')->where('id', $request->id)->delete();
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

            'food_category_name' => 'required|unique:dish_categories,food_category_name',
            // 'permission' => 'required',

        ]);


        $foodCate = DC::create(['food_category_name' => $request->input('food_category_name')]);

        // $role->syncPermissions($request->input('permission'));

        return response()->json($foodCate);
    }

    public function dishCate(Request $request)
    {
        $cat_id = $request->cat_id;

        $menus = DB::table('dish_menus')
        ->join('dish_categories', 'dish_categories.id', '=', 'dish_menus.item_category')
        ->where('dish_menus.item_category', $cat_id)
        ->get();

        return view('settups.restaurant.pos.dishcatepage', \compact('menus'));
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
