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
    @include('settups.bar.side-bar')  
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
          <div class="card-header card-header-default bg-info">
            Add Item Details
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
            <form id="formadd" action="/settup/bar/item" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-10">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Item Name: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="item_name" placeholder="Enter Item name" autofocus>
                        </div>
                      </div><!-- col-4 -->
                    </div>

                    <div class="row mg-b-10">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Item Purchase Price: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="number" name="item_purchase_price" placeholder="Enter Purchase Price" autofocus>
                        </div>
                      </div><!-- col-4 -->
                    </div>

                    <div class="row mg-b-10">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Item Sale Price: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="number" name="item_sale_price" placeholder="Enter Item Sale Price" autofocus>
                        </div>
                      </div><!-- col-4 -->
                    </div>

                    <div class="row mg-b-10">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Item Quantity: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="number" name="item_quantity" placeholder="Enter Item Quantity" autofocus>
                        </div>
                      </div><!-- col-4 -->
                    </div>

                    <div class="form-layout">
                      <div class="row mg-b-10">
                          <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                              <div class="form-group">
                              <label class="form-control-label">Item Category: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" name="item_category_id" data-placeholder="Choose Category">
                                <option value="" label="Choose Category">--Choose Category--</option> 
                                @foreach ($cats as $cat)
                                   <option value="{{ $cat->id }}">{{ $cat->item_category_name }}</option>
                                  @endforeach
                                 
                              </select>
                            </div><!-- col-4 -->
                          </div>
                      </div>

                      <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                <div class="form-group">
                                <label class="form-control-label">Item Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="status_id" data-placeholder="Choose Status">
                                  <option label="Choose Status"></option>  
                                  @foreach ($meal_statuses as $ms)
                                     <option value="{{ $ms->id }}">{{ $ms->status_name }}</option>
                                    @endforeach
                                   
                                </select>
                              </div><!-- col-4 -->
                            </div>
                        </div>
                    </div>
                     
                  </div>

                  <div class="form-layout">
                    <div class="row mg-b-5">
                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                            <div class="form-group">
                            <label class="form-control-label">Item Picture: <span class="tx-danger">*</span></label>
                            
                        <label class="form-control custom-file">
                          <input type="file" name="item_image" class="form-control custom-file-input">
                          <span class="custom-file-control"></span>
                        </label>
                      </div>
                    </div>
                    </div>
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
              Item List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Name</th>
                      <th class="wd-15p">Sale Price</th>
                      <th class="wd-15p">Purchase Price</th>
                      <th class="wd-15p">Quantity</th>
                      <th class="wd-15p">Category</th>
                      <th class="wd-15p">Status</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($items as $item)
                      <tr>
                          <td>{{ $item->item_name }}</td>
                          <td>{{ $item->item_sale_price }}</td>
                          <td>{{ $item->item_purchase_price }}</td>
                          <td>{{ $item->item_quantity }}</td>
                          <td>{{ $item->item_category_name }}</td>
                          <td>{{ $item->status_name }}</td>
                          <td>
                              <div class="row">
                                  <div class="col-md-6">
                                    <a href="/settup/bar/item/{{ $item->id }}/edit" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Edit Item"><div><i class="fa fa-edit"></i></div></a>
                                    <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Delete Item"><div><i class="fa fa-trash"></i></div></a>
                                   
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
      
      $(document).ready(function (e) {
   
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });

      //     $('#saveBtn').click(function (e) {

      //       e.preventDefault();
      //       // $(this).html('Sending..');

      //       $.ajax({
      //       data: $('#formadd').serialize(),
      //       url: "/settup/bar/item",
      //       type: "POST",
      //       dataType: 'json',
      //       success: function (responce) {
      //         // alert('Saved');
      //         $('#formadd').trigger("reset");
      //         $('#saveBtn').html('Save');

             
      //             swal({
      //               title: "Good job!",
      //               text: "Data Saved Successfuly",
      //               icon: "success",
      //               button: "Ok",
      //             });

      //             if(swal){ // if true (1)
      //                 setTimeout(function(){// wait for 5 secs(2)
      //                     location.reload(); // then reload the page.(3)
      //                 }, 1000); 
      //             }
      //       },
      //       error: function (responce) {
      //           console.log('erro');
      //           $('#saveBtn').html('Save');
      //       }
      //   });
      // });

    });
    </script>
@endsection