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
          <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                All Permisions List
                 </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
              @include('alerts.success')
              <form action="/roles/update/{{ Request::segment(2) }}" method="POST">
                @csrf

                <div class="row">
                    @foreach($permission as $value)
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
        
                        {{ $value->name }}</label>
        
                  
                    </div>
                    @endforeach
                </div>
  
                <div class="row">
                  <div class="col-lg-10">
                    {{-- <button type="button" class="btn btn-warning pull-left"onclick="checAll()">Check/Uncheck All</button> --}}
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary pull-right">Assign Permision(s)</button>
                  </div>
                </div>
              </form>
              
              
             
            </div><!-- card-body -->


          </div><!-- card --
        </div>
         
    </div><!-- row -->


@endsection
@section('script')
    <script>

     
      function permision(id,perm){
        console.log(id + '-' + perm);
      }
      $('#datatable1').DataTable({
            ordering:false,
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
                    console.log('saved');
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save');
                }
            });
            });


    </script>
@endsection