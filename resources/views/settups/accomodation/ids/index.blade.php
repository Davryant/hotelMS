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
            Add ID'S To be used
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
                  <form id="formadd">
                      @csrf
                      <div class="form-layout">
                          <div class="row mg-b-25">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label">ID Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="id_name" id="idtype" placeholder="Enter Role name" autofocus>
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
              ID List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Name</th>
                      <th class="wd-15p">Short Code</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($ids as $id)
                      <tr>
                          <td>{{ $id->id_name }}</td>
                          <td>System</td>
                          <td>
                              <div class="row">
                                  <div class="col-md-6">
                                    <span onclick="clickMe('{{ $id->id }}', '{{ $id->id_name }}');" data-id="{{ $id->id }}" data-id_name="{{ $id->id_name }}" class="btn btn-info btn-icon mg-r-5 mg-b-10" title="Edit ID Type"><div><i class="fa fa-edit"></i></div></span>
                                    <span class="btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord" data-id="{{ $id->id }}" title="Delete ID Type"><div><i class="fa fa-trash"></i></div></span>
                                   
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
      })
      

      $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
            data: $('#formadd').serialize(),
            url: "/settup/accomodation/idAdd",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              $('#formadd').trigger("reset");
              $('#saveBtn').html('Save');

              $('#datatable1').append("<tr class='id'"+responce.id+"><td>"+responce.id_name+"</td><td>System</td><td>"+
              "<div class='row'><div class='col-md-6'><a href='/settup/accomodation/id/"+responce.id+"/edit' class='btn btn-info btn-icon mg-r-5 mg-b-10' title='Edit ID Type'><div><i class='fa fa-edit'></i></div></a>"+
              "<span class='btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord' data-id='"+responce.id+"' title='Delete ID Type'><div><i class='fa fa-trash'></i></div></span>"+
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
              url: "/settup/accomodation/iddelete/"+id,
              type: 'DELETE',
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
              } else {
                swal("Your Data is safe!");
              }
            });
          });

     function clickMe(id,name){
       $('#idtype').val(name);
       $('#saveBtn').html('Edit');

       var e = document.getElementById("saveBtn");
       e.id = "editBtn";

       
      }


       $('#editBtn').click(function (e) {
        $.ajax({
            data: {'id':id,'name':name},
            url: "/settup/accomodation/idupdate",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              console.log(responce)
              var ed = document.getElementById("editBtn");
              ed.id = "saveBtn";
              $('#formadd').trigger("reset");

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


    </script>
@endsection