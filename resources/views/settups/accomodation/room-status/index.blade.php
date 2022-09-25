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
    @include('settups.accomodation.side-bar')  
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
          <div class="card-header card-header-default bg-info">
            Add Room Status
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
                  <form id="formadd" action="" method="post">
                      @csrf
                      <div class="form-layout">
                          <div class="row mg-b-25">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label">Status Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="status_name" placeholder="Enter Room Status" autofocus autocomplete="off">
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
             Room Status List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Status Name</th>
                      <th class="wd-15p">Status code</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($room_status as $rs)
                      <tr>
                          <td>{{ $rs->status_name }}</td>
                          <td>System</td>
                          <td>
                              <div class="row">
                                  <div class="col-md-6">
                                    {{-- <a href="/settup/accomodation/room_status/{{ $rs->id }}/edit" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Edit Status"><div><i class="fa fa-edit"></i></div></a> --}}
                                    <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord" data-id="{{ $rs->id }}" title="Delete Status"><div><i class="fa fa-trash"></i></div></a>
                                   
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
         $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });

            $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });

      $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
            data: $('#formadd').serialize(),
            url: "/settup/accomodation/room-status",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              $('#formadd').trigger("reset");
              $('#saveBtn').html('Save');

              $('#datatable1').append("<tr class='id'"+responce.id+"><td>"+responce.status_name+"</td><td>System</td><td>"+
              "<div class='row'><div class='col-md-6'><a href='/settup/accomodation/room_category/"+responce.id+"/edit' class='btn btn-info btn-icon mg-r-5 mg-b-10' title='Edit Room Status'><div><i class='fa fa-edit'></i></div></a>"+
              "<span class='btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord' data-id='"+responce.id+"' title='Delete Room Status'><div><i class='fa fa-trash'></i></div></span>"+
                       "</div></div> </td></tr>")

                       swal({
                    title: "Good job!",
                    text: "Data Saved Successfuly",
                    icon: "success",
                    button: "Ok",
                  });
            },
            error: function (responce) {
                console.log('erro');
                $('#saveBtn').html('Save');
            }
        });
        });


        $(".deleteRecord").click(function(){

swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

var id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
$.ajax(
{
    url: "/room-status/"+id+"/delete",
    type: 'POST',
    data: {
        "id": id,
        "_token": token,
    },
    success: function (res){
      if(res.success == true){ // if true (1)
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 1000); 
        }
    }
});

      swal("Poof! Your Data has been deleted!", {
        icon: "success",
      });

      if(swal){ // if true (1)
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 1000); 
        }
    } else {
      swal("Your Data is safe!");
    }
  });
});
      
    </script>
@endsection