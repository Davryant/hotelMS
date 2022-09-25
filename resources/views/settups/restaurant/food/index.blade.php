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
    @include('settups.restaurant.side-bar')
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
            <div class="card-header card-header-default bg-info">
                Add Menu Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @include('alerts.success')

                <form id="formadd" action="/settup/restaurant/food" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Menu Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="food_item_name"
                                        placeholder="Enter Food Item name" autofocus autocomplete="off">
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Food Item Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="food_item_price"
                                        placeholder="Enter Food Item Price" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>


                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                    <div class="form-group">
                                        <label class="form-control-label">Meal Type: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="item_category"
                                            data-placeholder="Choose Meal Type">
                                            @foreach ($dishes as $dish)
                                                <option value="{{ $dish->id }}">{{ $dish->food_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- col-4 -->
                                </div>
                            </div>
                        </div>

                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                    <div class="form-group">
                                      <label class="form-control-label">Menu Image/Cover: <span class="tx-danger">*</span></label>
                                        <label class="custom-file">

                                            <input type="file" id="file" name="dish_cover" class="custom-file-input">
                                            <span class="custom-file-control custom-file-control-primary"></span>
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
                    @csrf
                    <thead>
                        <tr>
                            <th class="wd-15p">Food Item Name</th>
                            <th class="wd-15p">Food Item Price</th>
                            <th class="wd-15p">Food Item Category</th>
                            <th class="wd-15p">Food Cover</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->food_item_name }}</td>
                                <td>Tsh {{ number_format($menu->food_item_price, 2) }} /=</td>
                                <td>{{ $menu->food_category_name }}</td>
                                <td><img class="card-img img-fluid" src="/img/menu/{{ $menu->dish_cover }}" alt="Menu Cover" width="30" height="30"></td>
                              
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


    
    $('#datatable1').Tabledit({
            url:'{{ route("food.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'food_item_name'],
                editable:[[2,'food_category_name']]
            },
            restoreButton:false,
            editButton:false,
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
