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
                Receive Item List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="editable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Item ID</th>
                            <th class="wd-15p">Item Name</th>
                            <th class="wd-15p">Item Requested</th>
                            <th class="wd-15p">Item Received</th>
                            <th class="wd-15p">Received</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->item_u_no }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->quantity_recieved }}</td>
                                <td>{{ $item->received }}</td>
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

        $('#editable').Tabledit({
            url:'{{ route("requestEdit.actionReceived") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'item_u_no'],
                editable:[[3, 'quantity_recieved'], [4, 'received', '{"0":"No", "1":"Yes"}']]
            },
            restoreButton:false,
            deleteButton:false,
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


        // $('#datatable1').DataTable({
        //     responsive: true,
        //     language: {
        //         searchPlaceholder: 'Search...',
        //         sSearch: '',
        //         lengthMenu: '_MENU_ items/page',
        //     }
        // });

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
