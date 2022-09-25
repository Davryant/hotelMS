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
                  Add Feature for Module
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                   
                        <form id="formadd">
                            @csrf
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Feature: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="feature" placeholder="Enter Module name" autofocus>
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
                    Feature List
                     </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Feature Name</th>
                            <th class="wd-15p">Type</th>
                            <th class="wd-5p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                            <tr>
                                <td>{{ $feature->feature }}</td>
                                <td>System</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <a href="/feature/{{ $feature->id }}/lock" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Lock Feature"><div><i class="fa fa-lock"></i></div></a>
                                          <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Edit Feature"><div><i class="fa fa-edit"></i></div></a>
                                         
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
                url: "{{ route('feature.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
            
                    $('#formadd').trigger("reset");
                    // $('#ajaxModel').modal('hide');
                    table.draw();
                    console.log('saved');
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save');
                    $('#formadd').trigger("reset");
                }
            });
            });


    </script>
@endsection