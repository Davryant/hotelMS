@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

            margin-top: -10vh;

        }

        #beaco-top {
            font-weight: 700;
            font-size: 2.8rem;
            color: #008c80;
            font-family: 'Wide Latin', Arial, sans-serif;
            text-align: center;
        }

        .headings p {
            text-align: center;
            margin-top: -10px;
            color: #008c80;
        }

        #order-book {
            font-family: 'Wide Latin', Arial, sans-serif;
            font-weight: 200;
            font-size: 1rem;
            color: #008c80;
            text-align: center;
        }
        .centereds{
            /* text-align: center; */
            
        }
    </style>
@endsection


<div class="row">
    {{-- @include('settups.store.side-bar') --}}

    <div class="col-lg-12">
        <div class="card bd-0">
            {{-- <div class="card-header card-header-default bg-info">
                Item List
            </div><!-- card-header --> --}}
            <div class="card-body bd bd-t-0 rounded-bottom" id="printableArea">
                <p id="order-book">STOCK STATUS</p>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">No</th>
                                    <th class="wd-15p">Item</th>
                                    <th class="wd-15p">Quantity Available</th>
                                    <th class="wd-15p">Unit Cost</th>
                                    <th class="wd-15p">Total</th>
                                    <th class="wd-15p">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($purchasings as $item)
                                    <tr>
                                        <td>{{$i }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->item_unit }} {{ $item->measurement }}</td>
                                        <td>Tsh {{ number_format($item->unit_price, 2) }}</td>
                                        <td>Tsh {{ number_format($item->unit_price * $item->item_unit, 2) }}/=</td>
                                        <td>
                                            @if ($item->item_unit >= 10)
                                                <button type="button" class="btn btn-primary">Enough</button>
                                            @elseif($item->item_unit >= 5)
                                            <button type="button" class="btn btn-warning">Low Stock</button>
                                            @else
                                            <button type="button" class="btn btn-warning">No stocks available</button>
                                            @endif
                                        </td>
                                        
                                    </tr>


                                    @php
                                        $i++;
                                        $total +=$item->total_value;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>

                   
                    </div>
                </div>
            </div><!-- card-body -->
        </div><!-- card -->
    </div>
</div>

@endsection
@section('script')
<script>


    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });



        $('#datatable1').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print','colvis'
            ],
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
