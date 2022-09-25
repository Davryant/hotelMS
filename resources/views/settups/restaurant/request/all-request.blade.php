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
    @include('settups.restaurant.request.side-bar')

    <div class="col-lg-10">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Item List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Request Code</th>
                            <th class="wd-15p">Requested By Name</th>
                            <th class="wd-15p">Date Prepared</th>
                            <th class="wd-15p">Date Updated</th>
                            <th class="wd-5p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $item)
                            <tr>
                                <td>{{ $item->request_no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="/rest/request/{{ $item->request_no }}/edit"
                                                class="btn btn-info btn-icon mg-r-5 mg-b-10" title="Edit Item">
                                                <div><i class="fa fa-edit"></i></div>
                                            </a>
                                            <a href="/rest/request/{{ $item->request_no }}/show"
                                                class="btn btn-success btn-icon mg-r-5 mg-b-10" title="Show Item">
                                                <div><i class="fa fa-eye"></i></div>
                                            </a>
                                            <a href="/rest/request/{{ $item->request_no }}/receive"
                                                class="btn btn-warning btn-icon mg-r-5 mg-b-10"
                                                title="Receive Inventory">
                                                <div><i class="fa fa-sign-in"></i></div>
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
    $(document).ready(function() {

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
