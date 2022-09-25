<?php

namespace App\Http\Controllers\Settups\Bar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarItemCategory as BIC;
use DB;
class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BIC::orderBy('id','DESC')->get();
        // dd($items);
        return view('settups.bar.item-category.index', compact('items'));
    }

    public function action(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'item_category_name' => $request->item_category_name,
                );

                DB::table('bar_item_categories')->where('cat_slug', $request->cat_slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('bar_item_categories')->where('cat_slug', $request->cat_slug)->delete();
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

            'item_category_name' => 'required',

        ]);

        $form_data = array(
            'item_category_name' => $request->input('item_category_name'),
            'cat_slug' => rand(2,99999),

        );

        BIC::create($form_data);
        
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
