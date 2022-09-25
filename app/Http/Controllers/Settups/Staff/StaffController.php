<?php

namespace App\Http\Controllers\Settups\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\ModalHasRole;
use App\Staff;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->get();

        $staffs = DB::table('staff')
        ->leftJoin('roles', 'staff.role_id', '=', 'roles.id')
        ->get();

        return view('settups.staff.index', \compact('roles', 'staffs'));
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

            'fullname' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'phone_number' => 'required',

        ]);
    
        // dd( $request->file('item_image'));

     

            $user = new User;
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            
            $role_data= array(
                'role_id' => $request->role_id,
                'model_type' => 'App\User',
                'model_id' => $user->id
               );
               $response = DB::table('model_has_roles')->insert($role_data);
               
            // $user_id = User::where('email', $request->email)->pluck('id');
            
            // $staff_details = array(
            //     'fullname'
            //     'email'
            //     'password'
            //     'gender'
            //     'phone_number'
            //     'role_id'
            //     'user_id'
            // );
            $staff = new Staff;
            $staff->fullname = $request->fullname;
            $staff->email = $request->email;
            $staff->password = Hash::make($request->password);
            $staff->gender = $request->gender;
            $staff->role_id = $request->role_id;
            $staff->phone_number = $request->phone_number;
            $staff->user_id = $user->id;
            $staff->save();

           

            return redirect()->back()->with('success','Staff created successfully');

            

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
