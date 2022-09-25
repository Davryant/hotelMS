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
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
            <div class="card-header card-header-default bg-info">
                Add Confernece Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">

                <form id="formadd" action="" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Conference Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="conference_name"
                                        placeholder="Enter Conference name" autofocus autocomplete="off">
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Conference Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="conference_price"
                                        placeholder="Enter Conference Price" autofocus autocomplete="off">
                                </div>
                            </div><!-- col-4 -->
                        </div>

                        <div class="row mg-b-25">
                          <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                              <div class="form-group">
                                  <label class="form-control-label">Room Status: <span
                                          class="tx-danger">*</span></label>
                                  <select class="form-control select2" name="room_status_id"
                                      data-placeholder="Choose Status">
                                      <option label="Choose Status"></option>
                                      @foreach ($room_status as $rs)
                                          <option value="{{ $rs->status_name }}">{{ $rs->status_name }}</option>
                                      @endforeach

                                  </select>
                              </div><!-- col-4 -->
                          </div>
                      </div>
                    </div>

                    <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>

                </form>

            </div><!-- card-body -->
        </div><!-- card -->

    </div>

    <div class="col-lg-9">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Confernece List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                <table id="datatable1" class="table display responsive nowrap">
                  @csrf
                    <thead>
                        <tr>
                            <th class="wd-5p">Confe No:</th>
                            <th class="wd-5p">Name</th>
                            <th class="wd-5p">Price</th>
                            <th class="wd-15p">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($confes as $conf)
                      <tr>
                          <td>{{ $conf->slug }}</td>
                          <td>{{ $conf->conference_name }}</td>
                          <td>Tsh {{ $conf->conference_price }}</td>
                          <td>{{ $conf->room_status_id }}</td>
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


    $('#saveBtn').click(function(e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#formadd').serialize(),
            url: "/settup/conference",
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


    $('#datatable1').Tabledit({
        url: '{{ route('confe.action') }}',
        dataType: "json",
        columns: {
            identifier: [0, 'slug'],
            editable: [
                [1, 'conference_name', ],[2,'conference_price'],[3, 'room_status_id', '{"Vacant":"Vacant", "Ocupied":"Ocupied", "Reserved":"Reserved", "Booked":"Booked", "Out Of Order":"Out Of Order"}']
            ]
        },
        restoreButton: false,
        // editButton:false,
        onSuccess: function(data, textStatus, jqHXR) {
            if (data.action == 'delete') {
                $('#' + data.item_number).remove()

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
