<?php

namespace App\Http\Controllers\Settups\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant AS R;
use DB;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rests = R::orderBy('id','DESC')->get();
        return view('settups.restaurant.index', compact('rests'));
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

            'restaurant_name' => 'required',
            // 'status_id' => 'required',

        ]);


        $input = $request->all();
        
        $rest_slug = rand(1,999999);

        // $rest = R::create($input, except('_token'));
        $rest = R::create(['restaurant_name' => $request->input('restaurant_name'), 'rest_slug' => $rest_slug]);

        return response()->json(['code'=>200, 'message'=>'Restaurant Created successfully','data' => $rest], 200);

    }

    public function action(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'restaurant_name' => $request->restaurant_name,
                );

                DB::table('restaurants')->where('rest_slug', $request->rest_slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('restaurants')->where('rest_slug', $request->rest_slug)->delete();
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
