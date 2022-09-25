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
    @include('settups.store.side-bar')

    <div class="col-lg-10">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Edit Item List
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="editable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Item ID</th>
                            <th class="wd-15p">Item Name</th>
                            <th class="wd-15p">Item Unit</th>
                            <th class="wd-15p">Unit Cost</th>
                            <th class="wd-15p">Toatal Cost</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->item_number }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_unit }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->total_value }}</td>
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
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'item_number'],
                editable:[[1,'item_name'], [2,'item_unit'], [3,'unit_price']]
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
