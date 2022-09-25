<?php

namespace App\Http\Controllers\Settups\Bar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MealStatus as MS;
use App\Models\BarItem as BI;
use App\Models\Item;
use App\Models\BarItemCategory as BC;
Use Alert;
Use DB;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $meal_statuses = MS::orderBy('id','DESC')->get();
        $itemsList = Item::orderBy('id','DESC')->get();
        $cats = BC::orderBy('id','DESC')->get();
        
        $items = DB::table('bar_items')
        ->leftJoin('bar_item_categories', 'bar_items.item_category_id', '=', 'bar_item_categories.id')
        ->leftJoin('meal_statuses', 'bar_items.status_id', '=', 'meal_statuses.id')
        ->get();

        return view('settups.bar.item.index', compact('meal_statuses','cats','items','itemsList'));
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

            'item_name' => 'required',
            'item_purchase_price' => 'required',
            'item_sale_price' => 'required',
            'item_quantity' => 'required',
            'item_category_id' => 'required',
            'status_id' => 'required',
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
    
        // dd( $request->file('item_image'));

        if ($files = $request->file('item_image')) {
            
            $fileName =  "item_image-".time().'.'.$request->item_image->getClientOriginalExtension();
            
            $request->item_image->move(public_path('img/item_image'), $fileName);

            $item = new BI;
            $item->item_name = $request->item_name;
            $item->item_purchase_price = $request->item_purchase_price;
            $item->item_sale_price = $request->item_sale_price;
            $item->item_quantity = $request->item_quantity;
            $item->item_category_id = $request->item_category_id;
            $item->status_id = $request->status_id;
            $item->item_image = $fileName;
            $item->item_slug = rand(1,99999);
            $item->save();
            Alert::success('Record Saved Successfuly');
            

            return back();

        }else{
            $item = new BI;
            $item->item_name = $request->item_name;
            $item->item_purchase_price = $request->item_purchase_price;
            $item->item_sale_price = $request->item_sale_price;
            $item->item_quantity = $request->item_quantity;
            $item->item_category_id = $request->item_category_id;
            $item->status_id = $request->status_id;
            $item->item_slug = rand(1,99999);
            $item->save();
            Alert::success('Record Saved Successfuly');
            

            return back();
        }

        
 
    }


    public function action(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'item_name' => $request->item_name,
                    'item_sale_price' => $request->item_sale_price
                );

                DB::table('bar_items')->where('item_slug', $request->item_slug)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('bar_items')->where('item_slug', $request->item_slug)->delete();
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
        $meal_statuses = MS::orderBy('id','DESC')->get();
        $cats = BC::orderBy('id','DESC')->get();
        $item = DB::table('bar_items')->find('id', $id)->first();

        $item = DB::table('bar_items')
        ->leftJoin('bar_item_categories', 'bar_items.item_category_id', '=', 'bar_item_categories.id')
        ->leftJoin('meal_statuses', 'bar_items.status_id', '=', 'meal_statuses.id')
        ->where('bar_items.id', $id)
        ->first();

        $items = DB::table('bar_items')
        ->leftJoin('bar_item_categories', 'bar_items.item_category_id', '=', 'bar_item_categories.id')
        ->leftJoin('meal_statuses', 'bar_items.status_id', '=', 'meal_statuses.id')
        ->get();

        return view('settups.bar.item.edit', compact('meal_statuses','cats','items','item'));
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
        DB::table("bar_items")->where('item_slug',$id)->delete();

        return redirect()->back()->with('success','Item deleted successfully');
    }
}
