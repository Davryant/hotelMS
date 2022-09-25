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
    {{-- @include('settups.store.side-bar') --}}
    <div class="col-lg-12">
        <div class="card bd-0 mg-b-10">
            <div class="card-header card-header-default bg-info">
                Add Item Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @include('alerts.success')

                <form id="formadd" action="/settup/store/item-category"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-layout">
        
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Name: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="category_name"
                                                placeholder="Enter Item Name" id="category_name" autocomplete="off">
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
</div>

<div class="row mg-t-20">
    <div class="col-lg-12">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Item List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Item Code</th>
                        <th class="wd-15p">Category Name</th>
                        <th class="wd-15p">Date Added</th>
                        <th class="wd-15p">Date Updated</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->item_number }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
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
    $(document).ready(function(){
   
   $.ajaxSetup({
     headers:{
       'X-CSRF-Token' : $("input[name=_token]").val()
     }
   });

   
   $('#datatable1').Tabledit({
            url:'{{ route("categoryEdit.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'item_number'],
                editable:[[1,'category_name']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqHXR ){
                if(data.action == 'delete'){
                    $('#'+data.item_number).remove()
                   
                }

                swal({
                title: "Good job!",
                text: "Operation Complete Successfuly",
                icon: "success",
                button: "Ok",
                });

            }

        });

    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });

    $(function() {
        'use strict';

        $('.select2').select2();
    });


    // $('#saveBtn').click(function (e) {
    //         e.preventDefault();
    //         $(this).html('Sending..');
        
    //         $.ajax({
    //         data: $('#formadd').serialize(),
    //         url: "/settup/store",
    //         type: "POST",
    //         dataType: 'json',
    //         success: function (responce) {
    //           // alert('Saved');
    //           console.log(responce)
    //           $('#formadd').trigger("reset");
    //           $('#saveBtn').html('Save');

             
    //               swal({
    //                 title: "Good job!",
    //                 text: "Data Saved Successfuly",
    //                 icon: "success",
    //                 button: "Ok",
    //               });

    //             //   if(swal){ // if true (1)
    //             //       setTimeout(function(){// wait for 5 secs(2)
    //             //           location.reload(); // then reload the page.(3)
    //             //       }, 1000); 
    //             //   }
    //         },
    //         error: function (responce) {
    //             console.log(responce);
    //             $('#saveBtn').html('Save');
    //         }
    //     });
    //     });

    });
</script>
@endsection
