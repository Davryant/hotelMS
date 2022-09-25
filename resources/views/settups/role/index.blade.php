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

        <div class="col-lg-3">
              <div class="card bd-0 mg-b-10">
                <div class="card-header card-header-default bg-info">
                  Add Role
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                   
                        <form id="formadd" action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="name" placeholder="Enter Role name" autofocus>
                                    </div>
                                  </div><!-- col-4 -->
                                </div>
                            </div>

                            <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>
                          
                        </form>
                   
                </div><!-- card-body -->
              </div><!-- card -->

        </div>

        <div class="col-lg-7">
            <div class="card bd-0">
                <div class="card-header card-header-default bg-info">
                    Role List
                     </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                  @include('alerts.success')
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Role</th>
                            <th class="wd-15p">Type</th>
                            <th class="wd-5p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>System</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <a href="/role/{{ $role->id }}/assign-persmission" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Assign Permission"><div><i class="fa fa-plus"></i></div></a>
                                          <a href="/role/{{ $role->id }}/edit" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Edit Role"><div><i class="fa fa-edit"></i></div></a>
                                          <a href="/role/{{ $role->id }}/delete" class="btn btn-danger btn-icon mg-r-5 mg-b-10" title="Delete Role"><div><i class="fa fa-trash"></i></div></a>
                                          {{-- <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a> --}}
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
         
    </div><!-- row -->


@endsection
@section('script')
    <script>
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
                url: "{{ route('role.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
            
                    $('#formadd').trigger("reset");
                    // $('#ajaxModel').modal('hide');
                    table.draw();
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
                    console.log('saved');
                
                },
                error: function (data) {
                    // console.log('Error:', data);
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
                }
            });
            });


    </script>
@endsection