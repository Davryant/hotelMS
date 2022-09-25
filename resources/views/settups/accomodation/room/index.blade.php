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
                Add Room Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">

                <form id="formadd" action="" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Room Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="room_name"
                                        placeholder="Enter Room name" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Room Number: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="room_number"
                                        placeholder="Enter Room number" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Room Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="room_price"
                                        placeholder="Enter Room Price" autofocus>
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                    <div class="form-group">
                                        <label class="form-control-label">Room Category: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="room_category_id"
                                            data-placeholder="Choose Category">
                                            <option label="Choose Category"></option>
                                            @foreach ($room_cats as $rc)
                                                <option value="{{ $rc->id }}">{{ $rc->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div><!-- col-4 -->
                                </div>
                            </div>

                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                        <div class="form-group">
                                            <label class="form-control-label">Room Status: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control select2" name="room_status_id"
                                                data-placeholder="Choose Status">
                                                <option label="Choose Status"></option>
                                                @foreach ($room_status as $rs)
                                                    <option value="{{ $rs->id }}">{{ $rs->status_name }}</option>
                                                @endforeach

                                            </select>
                                        </div><!-- col-4 -->
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
                Room List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @include('alerts.success')
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Room Name</th>
                            <th class="wd-15p">Room Number</th>
                            <th class="wd-15p">Room Category</th>
                            <th class="wd-15p">Room Price</th>
                            <th class="wd-15p">Room Status</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_name }}</td>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->category_name }}</td>
                                <td>Tsh {{ number_format($room->room_price, 2) }}</td>
                                <td>{{ $room->status_name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10"
                                                title="Edit Role">
                                                <div><i class="fa fa-edit"></i></div>
                                            </a>
                                            <a href="/room/{{ $room->roomid }}/delete"
                                                class="btn btn-danger btn-icon mg-r-5 mg-b-10" title="Delete Room">
                                                <div><i class="fa fa-trash"></i></div>
                                            </a>

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



    $(function() {
        'use strict';

        $('.select2').select2();
    })


    $('#saveBtn').click(function(e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#formadd').serialize(),
            url: "/settup/accomodation/room",
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
                $('#saveBtn').html('Save');
            }
        });
    });

</script>
@endsection
