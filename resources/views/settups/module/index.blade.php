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
                  Add Module
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                   
                        <form id="formadd">
                            @csrf
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label">Permission: <span class="tx-danger">*</span></label>
                                      <input class="form-control" type="text" name="module_name" placeholder="Enter Permision name" autofocus autocomplete="off">
                                    </div>
                                  </div><!-- col-4 -->
                                </div>
                            </div>

                            <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>
                          
                        </form>
                   
                </div><!-- card-body -->
              </div><!-- card -->

        </div>

       
         
    </div><!-- row -->


    <div class="row mg-t-20">
      <div class="col-lg-12">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                All permisions List
                 </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
              <div class="row">
                @foreach($permisions  as $value)

                <div class="col-lg-3 col-sm-3 col-md-3">
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
    
                    {{ $value->name }}</label>
                </div>
                @endforeach
              </div>
             
            </div><!-- card-body -->
          </div><!-- card -->
    </div>
    </div>
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
                url: "{{ route('module.store') }}",
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