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
            Add Room Category
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
                  <form id="formadd" action="" method="post">
                      @csrf
                      <div class="form-layout">
                          <div class="row mg-b-25">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="category_name" placeholder="Enter Category name" autofocus autocomplete="off">
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
             Room Category List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Category Name</th>
                      <th class="wd-15p">Category code</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($room_cats as $rc)
                      <tr>
                          <td>{{ $rc->category_name }}</td>
                          <td>{{ $rc->category_name }}</td>
                          <td>
                              <div class="row">
                                  <div class="col-md-6">
                                    {{-- <a href="#." class="btn btn-info btn-icon mg-r-5 mg-b-10" id="editCategory" data-id="{{ $rc->id }}" data-cate_name="{{ $rc->category_name }}"  title="Edit Room Category"><div><i class="fa fa-edit"></i></div></a> --}}
                                    <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord" data-id="{{ $rc->id }}" title="Delete Category"><div><i class="fa fa-trash"></i></div></a>
                                   
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

          <!-- LARGE MODAL -->
          <div id="ajaxModel" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Category</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-20">
                  <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</a></h4>
                  <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-info pd-x-20">Save changes</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
  
  
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
            url: "/settup/accomodation/room-category",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              $('#formadd').trigger("reset");
              $('#saveBtn').html('Save');

              $('#datatable1').append("<tr class='id'"+responce.id+"><td>"+responce.category_name+"</td><td>System</td><td>"+
              "<div class='row'><div class='col-md-6'><a href='/settup/accomodation/room_category/"+responce.id+"/edit' class='btn btn-info btn-icon mg-r-5 mg-b-10' title='Edit Room Category'><div><i class='fa fa-edit'></i></div></a>"+
              "<span class='btn btn-warning btn-icon mg-r-5 mg-b-10 deleteRecord' data-id='"+responce.id+"' title='Delete Room Category'><div><i class='fa fa-trash'></i></div></span>"+
                       "</div></div> </td></tr>")

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
            error: function (responce) {
                console.log('erro');
                $('#saveBtn').html('Save');
            }
        });
        });

        $('body').on('click', '#editCategory', function () {

        var id = $(this).data('id');

        $.get("room-category/" + id +'/edit', function (data) {

            $('#modelHeading').html("Edit Category");

            $('#saveBtn').val("edit-category");

            $('#ajaxModel').modal('show');

            $('#cate_id').val(data.id);

            $('#cate_name').val(data.name);


        })

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
              url: "/room-category/"+id+"/delete",
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