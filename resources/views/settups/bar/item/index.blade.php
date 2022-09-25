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
    <div class="col-lg-10">
        <div class="card bd-0 mg-b-10">
            <div class="card-header card-header-default bg-info">
                Add Item Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">

                <form id="formadd" action="/settup/bar/item" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">

                        {{-- <div class="row mg-b-10">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Item Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="item_name"
                                        placeholder="Enter Item name" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mg-b-10">
                            <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                <div class="form-group">
                                    <label class="form-control-label">Item Name: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="item_name"
                                        data-placeholder="Choose Item name">
                                        <option value="" label="Choose Item">--Choose Category--</option>
                                        @foreach ($itemsList as $cat)
                                            <option value="{{ $cat->item_name }}">{{ $cat->item_name }}</option>
                                        @endforeach

                                    </select>
                                </div><!-- col-4 -->
                            </div>
                        </div>

                        <div class="row mg-b-10">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Item Purchase Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="item_purchase_price"
                                        placeholder="Enter Purchase Price" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-10">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Item Sale Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="item_sale_price"
                                        placeholder="Enter Item Sale Price" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row mg-b-10">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Item Quantity: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="item_quantity"
                                        placeholder="Enter Item Quantity" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="form-layout">
                            <div class="row mg-b-10">
                                <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                    <div class="form-group">
                                        <label class="form-control-label">Item Category: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="item_category_id"
                                            data-placeholder="Choose Category">
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
                                            <label class="form-control-label">Item Status: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control select2" name="status_id"
                                                data-placeholder="Choose Status">
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
                                        <label class="form-control-label">Item Picture: <span
                                                class="tx-danger">*</span></label>

                                        <label class="form-control custom-file">
                                            <input type="file" name="item_image" class="form-control custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                    </div>
                                </div>
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

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Item List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Sale Price</th>
                            <th class="wd-15p">Purchase Price</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->item_slug }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_sale_price }}</td>
                                <td>{{ $item->item_purchase_price }}</td>
                                <td>{{ $item->item_quantity }}</td>
                                <td>{{ $item->item_category_name }}</td>
                                <td>{{ $item->status_name }}</td>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function deleteRecord() {
        console.log('sdkf');
    }
    $(".deleteRecord").click(function() {

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var id = $(this).data("slug");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "/item-bar/" + id + "/delete",
                        type: 'POST',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(res) {
                            if (res.success == true) { // if true (1)
                                setTimeout(function() { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1000);
                            }
                        }
                    });

                    swal("Poof! Your Data has been deleted!", {
                        icon: "success",
                    });

                    if (swal) { // if true (1)
                        setTimeout(function() { // wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    }
                } else {
                    swal("Your Data is safe!");
                }
            });
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

        // $('.select2').select2();
    });

    $('.select2').select2();

    $('#datatable1').Tabledit({
            url:'{{ route("barItem.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'item_slug'],
                editable:[[1,'item_name'],[2,'item_sale_price']]
            },
            restoreButton:false,
            // editButton:false,
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
</script>
@endsection
