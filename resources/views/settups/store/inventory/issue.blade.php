@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

            margin-top: -10vh;

        }
        .me {
            float: right;
            /* border:1px solid red; */
            margin-left: 40%;
        }
    </style>
@endsection


<div class="row">
    @include('settups.store.inventory.issue-side-bar')
   
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header card-header-default bg-info">
          Issue an Item  
      </div>

      <div class="card-body bd bd-t-0 rounded-bottom">
        @include('alerts.success')

                <form id="formadd" action="/settup/store/issue" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-layout">

                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Selcet Department to Issue: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" id="issued_to" name="issued_to"
                                                    data-placeholder="Choose Department Type">
                                                    <option value="">--Select Where To Issue --</option>
                                                    <option value="bar">Bar</option>
                                                    <option value="kitchen">Kitchen</option>
                                                    <option value="restaurant">Restaurant</option>
                                                    <option value="conference">Conference</option>
                                                    <option value="house keeping">House Keeping</option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Item: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" id="item_name" name="item_name"
                                                    data-placeholder="Choose Item Name">
                                                    <option value="">--Select Item To Issue --</option>
                                                    @foreach ($itemList as $item)
                                                    <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>



                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Quantity: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="item_quantity"
                                                placeholder="Enter Item Quantity" id="item_quantity" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>


                                
                            </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="form-layout">
                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Measurement: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" id="item_measurement" name="item_measurement"
                                                    data-placeholder="Choose Item Type">
                                                    <option value="litter">Litter</option>
                                                    <option value="kg">Kilogram</option>
                                                    <option value="pc">PC</option>
                                                    <option value="caton">Caton</option>
                                                    <option value="bunch">Bunch</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Issue Comment: <span
                                                    class="tx-danger">*</span></label>
                                                    <textarea rows="2" class="form-control" name="issued_comment" placeholder="Enter your address"></textarea>
                                        </div>
                                    </div><!-- col-4 -->
                                </div>
                            </div>
                        </div>

                       
                    </div>


                    <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Issue</button>

                </form>
      </div>
  </div>
    </div>
  
</div>

<div class="row mg-t-20">
    <div class="col-lg-12">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Issue Order List
                <button type="button" class="btn btn-warning pull-right me">Prepare Issue Order</button>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>

                        <tr>
                            <th class="wd-15p">Issue To</th>
                            <th class="wd-15p">Item Name</th>
                            <th class="wd-15p">Item Quantity</th>
                            <th class="wd-15p">Date Prepared</th>
                            <th class="wd-15p">Date Updated</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($itemToIssue as $item)
                            <tr>
                                <td>{{ $item->issued_to }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_quantity }} {{ $item->item_measurement }}</td>
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


    });

    $('.me').click(function (e) {
            e.preventDefault();

         $.ajax({
            url: "/settup/store/issue/prepare",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              console.log(responce)
             
                  swal({
                    title: "Good job!",
                    text: "Purchasing is now Prepared Successfuly",
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
                console.log(responce);
            }
        });
    });

</script>
@endsection
