<?php

namespace App\Http\Controllers\Settups\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishCategory AS DC;
use App\Models\DishMenu AS DM;
use DB;
class FoodRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = DC::orderBy('id','DESC')->get();

        $menus = DB::table('dish_menus')
        ->leftJoin('dish_categories', 'dish_menus.item_category', '=', 'dish_categories.id')
        ->get();

        return view('settups.restaurant.food.index', compact('dishes', 'menus'));
    }

    public function action(Request $request){
        if($request->ajax()){
           

            if($request->action == 'delete'){
                DB::table('dish_menus')->where('food_item_name', $request->food_item_name)->delete();
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
        
        request()->validate([

            'dish_cover' => 'required',
            'item_category' => 'required',
            'food_item_price' => 'required',
            'food_item_name' => 'required',

        ]);
  // Handle the user upload of avatar
            if($request->hasFile('dish_cover')){
                $cover = $request->file('dish_cover');
                $filename = time() . '.' . $cover->getClientOriginalExtension();

                $cover->move(public_path('img/menu'), $filename);
            }

        $form_data = array(
            'dish_cover' => $filename,
            'item_category' => $request->input('item_category'),
            'food_item_price' => $request->input('food_item_price'),
            'food_item_name' => $request->input('food_item_name'),

        );

        DM::create($form_data);
                
        
                return redirect()->back()->with('success','Data Saved Successfuly');
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
