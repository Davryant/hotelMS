@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

        margin-top: -10vh;

        }
    </style>
@endsection


   <div class="row">
   
   @include('settups.left-side-menu')      

        <div class="col-lg-10">
              <div class="card bd-0 mg-b-10">
                <div class="card-header card-header-default bg-info">
                  Add Role
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                   
                        <form id="formadd" action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Full Name: <span class="tx-danger">*</span></label>
                                              <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Enter Full name" autofocus autocomplete="off">
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>

                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                              <input class="form-control" type="text" name="email" id="email" placeholder="Enter Email" autocomplete="off">
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>

                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                                              <input class="form-control" type="text" name="phone_number" id="phone_number" placeholder="Enter Phone Number" autocomplete="off">
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>


                                </div>
    
    
                                <div class="col-lg-6">
                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                              <input class="form-control" type="password" name="password" id="password" placeholder="Enter Passwold"  autocomplete="off">
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>

                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                              <select class="form-control select2" name="gender" id="gender" data-placeholder="Choose Gender">
                                                <option value="">--Select Gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                              </select>
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>

                                    <div class="form-layout">
                                        <div class="row mg-b-25">
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                              <select class="form-control select2" name="role_id" id="role_id" data-placeholder="Choose Role" >
                                                  @foreach ($roles as $role)
                                                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                  @endforeach
                                                
                                                
                                              </select>
                                            </div>
                                          </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>
                               
    
                            </div>
                                                     

                            <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>
                          
                        </form>
                   
                </div><!-- card-body -->
              </div><!-- card -->

        </div>
         
    </div><!-- row -->

    <div class="row mg-t-10">
        <div class="col-lg-12">
            <div class="card bd-0">
                <div class="card-header card-header-default bg-info">
                    Role List
                     </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Staff Name</th>
                            <th class="wd-15p">Role</th>
                            <th class="wd-15p">Phone Number</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Gender</th>
                            <th class="wd-15p">Last Sign in</th>
                            <th class="wd-5p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                            <tr>
                                <td>{{ $staff->fullname }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->phone_number }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->gender }}</td>
                                <td>23423</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <a href="/settup/staff/{{ $staff->id }}/edit" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Edit Staff"><div><i class="fa fa-edit"></i></div></a>
                                          <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Delete Staff"><div><i class="fa fa-trash"></i></div></a>
                                         
                                        </div>
                                      </div>
                                </td>
                              </tr>
                            @endforeach
                         
                       
                        </tbody>
                      </table>  
                </div><!-- card-body -->
              </div><!-- card -->
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.select2').select2();

      $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });
      
        

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
            
                $.ajax({
                data: $('#formadd').serialize(),
                url: "/settup/staff",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#formadd').trigger("reset");
                    $('#saveBtn').html('Save');

                
                    swal({
                        title: "Good job!",
                        text: "Data Saved Successfuly",
                        icon: "success",
                        button: "Ok",
                    });

                    if(swal){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                          location.reload(); // then reload the page.(3)
                      }, 1000); 
                  }

                },
                error: function (data) {
           swal({
                        title: "Good job!",
                        text: "Data Saved Successfuly",
                        icon: "success",
                        button: "Ok",
                    });
                  if(swal){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                          location.reload(); // then reload the page.(3)
                      }, 1000); 
                  }
                $('#saveBtn').html('Save');
                    $('#saveBtn').html('Save');
                }
            });
            });


    </script>
@endsection