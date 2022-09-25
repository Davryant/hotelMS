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
                Add Food Item Category
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @include('alerts.success')
                <form id="formadd" action="" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Food Item Category Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="food_category_name"
                                        placeholder="Enter Category name" autofocus autocomplete="off">
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
                Dish Item Category List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
              @csrf
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">id</th>
                            <th class="wd-15p">Menu Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr>
                                <td>{{ $dish->id }}</td>
                                <td>{{ $dish->food_category_name }}</td>
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
                'X-CSRF-Token': $("input[name=_token]").val()
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

    $('#datatable1').Tabledit({
            url:'{{ route("foodCategory.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'id'],
                editable:[[1,'food_category_name']]
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

    $(function() {
        'use strict';

        $('.select2').select2();
    });



    $('#saveBtn').click(function(e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#formadd').serialize(),
            url: "/settup/restaurant/dish-category",
            type: "POST",
            dataType: 'json',
            success: function(responce) {
                // alert('Saved');
                $('#formadd').trigger("reset");
                $('#saveBtn').html('Save');


                swal({
                    title: "Good job!",
                    text: "Data Saved Successfuly",
                    icon: "success",
                    button: "Ok",
                });

                if (swal) { // if true (1)
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                }
            },
            error: function(responce) {
                console.log('erro');
                swal({
                    title: "Error!",
                    text: "Data Not saved Successfuly Or Record allready Exist",
                    icon: "warning",
                    button: "Ok",
                });

                if (swal) { // if true (1)
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                }
                $('#saveBtn').html('Save');
            }
        });
    });

</script>
@endsection
