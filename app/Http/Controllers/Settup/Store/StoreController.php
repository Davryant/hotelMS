<?php

namespace App\Http\Controllers\Settup\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPurchasing as OP;
use App\Models\Item;
use App\Models\ItemIssued as II;
use App\Models\ItemCategory;
use DB;
use Auth;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OP::where('prepared', 0)->orderBy('id','DESC')->get();
        $itemList = Item::orderBy('id','DESC')->get();

        return view('settups.store.purchasing.index', \compact('items', 'itemList'));
    }


    public function showCurrent($id)
    {
        $items = OP::where('prepared_no', $id)->orderBy('id','DESC')->get();

        $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        ->where('prepared_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('settups.store.purchasing.bar.show-current', \compact('items','prepared_by'));
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

            'item_name'=> 'required',
            'item_unit' => 'required',
            'unit_price' => 'required',
            'measurement' => 'required',

        ]);
  
        $item_number = 'BEACO/OTHER/'.rand(1,100000000);
        $form_data = array(
            'item_name' => $request->input('item_name'),
            'item_unit' => $request->input('item_unit'),
            'unit_price' => $request->input('unit_price'),
            'measurement' => $request->input('measurement'),
            'item_number' => $item_number,
            'total_value' => $request->input('item_unit') * $request->input('unit_price')

        );

        OP::create($form_data);
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
        $items = OP::where('prepared_no', $id)->orderBy('id','DESC')->get();

        $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        ->where('prepared_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('settups.store.purchasing.bar.show', \compact('items','prepared_by'));
    }

    public function prepare(){

        $id = rand(1000,999999);
    //    $done =  OP::update(array('prepared_no' => $id, 'prepared' => 1));

      

        $form_data = array(
            'prepared_no' => $id,
            'prepared' => 1,
            'prepared_by' => Auth::user()->id,
        );

        // $student = OP::update($form_data);
       $student= DB::table('other_purchasings')->where('prepared', 0)->update($form_data);


        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = OP::where('prepared_no', $id)->orderBy('id','DESC')->get();

        return view('settups.store.purchasing.bar.edit', \compact('items'));
    }

    public function action(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'item_name' => $request->item_name,
                    'item_unit' => $request->item_unit,
                    'unit_price' => $request->unit_price,
                    'total_value' => $request->item_unit * $request->unit_price
                );

                DB::table('other_purchasings')->where('item_number', $request->item_number)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('other_purchasings')->where('item_number', $request->item_number)->delete();
            }

            return request()->json($request);
        }
    }

    
    public function actionReceived(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $received = '';
                if($request->received == 1){
                    $received = 'No';
                }else{
                    $received = 'Yes';
                }
                $data = array (
                    'received' => $received,
                    'comment' => $request->comment,
                    'item_unit' =>$request->item_unit,
                );

                DB::table('other_purchasings')->where('item_number', $request->item_number)->update($data);

            }   

            return request()->json($request);
        }
    }



    public function issueReceived(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){

                $data = array (
                    'received' => $request->received,
                    'comment' => $request->comment,
                );

                DB::table('item_issueds')->where('issue_number', $request->issue_number)->update($data);

            }   

            return request()->json($request);
        }
    }


    public function receive($id)
    {
        $items = OP::where('prepared_no', $id)->orderBy('id','DESC')->get();

        $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        ->where('prepared_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('settups.store.inventory.index', \compact('items','prepared_by'));
    }


    public function issue()
    {
        $items = OP::orderBy('id','DESC')->get();
        $itemList = Item::orderBy('id','DESC')->get();

        $itemToIssue = II::where('prepared', 0)->orderBy('id','DESC')->get();


        $prepared_by = OP::join("users","other_purchasings.prepared_by","=","users.id")
        ->pluck('name')->first();

        $purchasings = OP::groupBy('prepared_no')
        ->join("users","other_purchasings.prepared_by","=","users.id")
        ->where('prepared', 1)
        ->select(DB::raw('other_purchasings.prepared_no, SUM(other_purchasings.item_unit) as total_unit, SUM(other_purchasings.total_value) as total_price, other_purchasings.created_at, other_purchasings.updated_at,other_purchasings.id as puc_id, users.name'))
        ->get();

        // dd($prepared_by);
        return view('settups.store.inventory.issue', \compact('items','prepared_by','purchasings','itemList','itemToIssue'));
    }

    function allIssue(){

        $issues = II::groupBy('prepared_no')
        ->join("users","item_issueds.prepared_by","=","users.id")
        ->where('prepared', 1)
        ->select(DB::raw('item_issueds.prepared_no, item_issueds.created_at, item_issueds.updated_at,item_issueds.id as ii_id, users.name'))
        ->get();


        // dd($prepared_by);
        return view('settups.store.inventory.issue-order-all', \compact('issues'));
    }

    public function storeIssue(Request $request)
    {
        // dd($request->all());

        request()->validate([

            'item_name'=> 'required',
            'issued_to'=> 'required',
            'item_measurement'=> 'required',
            'item_quantity'=> 'required',

        ]);
  
        $item_number = 'BEACO/ISSUE/'.rand(1,9999999);
        
        $form_data = array(
            'item_name' => $request->input('item_name'),
            'issued_to' => $request->input('issued_to'),
            'issued_comment' => $request->input('issued_comment'),
            'item_measurement' => $request->input('item_measurement'),
            'item_quantity' => $request->input('item_quantity'),
            'issue_number' => $item_number,
            'issued_by' => Auth::user()->id,
            'prepared_no' => rand(1,99999)

        );

        II::create($form_data);
        return redirect()->back()->with('success','Data Saved Successfuly');
    }



    public function issuePrepare(){

        $id = rand(1000,999999);
    //    $done =  OP::update(array('prepared_no' => $id, 'prepared' => 1));

      

        $form_data = array(
            'prepared_no' => $id,
            'prepared' => 1,
            'prepared_by' => Auth::user()->id,
        );

        // $student = OP::update($form_data);
       $student= DB::table('item_issueds')->where('prepared', 0)->update($form_data);


        return response()->json($student);
    }

    public function issueEdit($id)
    {
        $items = II::where('prepared_no', $id)->orderBy('id','DESC')->get();

        return view('settups.store.inventory.issue-edit', \compact('items'));
    }


    public function issueEditList(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'issued_to' => $request->issued_to,
                    'item_name' => $request->item_name,
                    'item_quantity' => $request->item_quantity
                );

                DB::table('item_issueds')->where('issue_number', $request->issue_number)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('item_issueds')->where('issue_number', $request->item_number)->delete();
            }

            return request()->json($request);
        }
    }


    public function issueReceive($id)
    {
        $items = II::where('prepared_no', $id)->orderBy('id','DESC')->get();

        $prepared_by = II::join("users","item_issueds.prepared_by","=","users.id")
        ->where('prepared_no', $id)->pluck('name')->first();

        // dd($prepared_by);
        return view('settups.store.inventory.issued-received', \compact('items','prepared_by'));
    }

    function item(){
        // $items = Item::orderBy('id','DESC')->get();
        $cats = ItemCategory::orderBy('id','DESC')->get();

        $items = Item::join("item_categories","items.cat_id","=","item_categories.id")
        ->select(DB::raw('items.*, item_categories.id,item_categories.category_name'))
        ->get();


        // dd($prepared_by);
        return view('settups.store.purchasing.item.index', \compact('items','cats'));
    }   


    function itemCategory(){
        $items = ItemCategory::orderBy('id','DESC')->get();

       
        // dd($prepared_by);
        return view('settups.store.purchasing.item.item-category', \compact('items'));
    }   

    public function storeItem(Request $request)
    {
        request()->validate([

            'item_name'=> 'required',
            'cat_id' => 'required',

        ]);
  
        $item_number = 'BEACO/ITEM/'.rand(1,1000);
        
        $form_data = array(
            'item_name' => $request->input('item_name'),
            'cat_id' => $request->input('cat_id'),
            'item_number' => $item_number

        );

        Item::create($form_data);
        return redirect()->back()->with('success','Data Saved Successfuly');
    }


    public function storeCategory(Request $request)
    {
        request()->validate([

            'category_name'=> 'required',

        ]);
  
        $item_number = 'BEACO/CAT/'.rand(1,1000);
        
        $form_data = array(
            'category_name' => $request->input('category_name'),
            'item_number' => $item_number

        );

        ItemCategory::create($form_data);
        return redirect()->back()->with('success','Data Saved Successfuly');
    }


    public function itemAction(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'item_name' => $request->item_name,
                );

                DB::table('items')->where('item_number', $request->item_number)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('items')->where('item_number', $request->item_number)->delete();
            }

            return request()->json($request);
        }
    }



    public function categoryEdit(Request $request){
        if($request->ajax()){
            if($request->action == 'edit'){
                $data = array (
                    'category_name' => $request->category_name,
                );

                DB::table('item_categories')->where('item_number', $request->item_number)->update($data);

            }   

            if($request->action == 'delete'){
                DB::table('item_categories')->where('item_number', $request->item_number)->delete();
            }

            return request()->json($request);
        }
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
