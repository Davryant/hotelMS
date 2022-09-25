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
        }
        .centereds{
            /* text-align: center; */
            
        }
        @media print {
      .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
      .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
           float: left;               
      }

      .col-sm-12 {
           width: 100%;
      }

      .col-sm-11 {
           width: 91.66666666666666%;
      }

      .col-sm-10 {
           width: 83.33333333333334%;
      }

      .col-sm-9 {
            width: 75%;
      }

      .col-sm-8 {
            width: 66.66666666666666%;
      }

       .col-sm-7 {
            width: 58.333333333333336%;
       }

       .col-sm-6 {
            width: 50%;
       }

       .col-sm-5 {
            width: 41.66666666666667%;
       }

       .col-sm-4 {
            width: 33.33333333333333%;
       }

       .col-sm-3 {
            width: 25%;
       }

       .col-sm-2 {
              width: 16.666666666666664%;
       }

       .col-sm-1 {
              width: 8.333333333333332%;
        }            
}
    </style>
@endsection


<div class="row">
    @include('settups.store.side-bar')

    <div class="col-lg-10">
        <div class="card bd-0">
            {{-- <div class="card-header card-header-default bg-info">
                Item List
            </div><!-- card-header --> --}}
            <div class="card-body bd bd-t-0 rounded-bottom" id="printableArea">
                <div class="row">
                    <div class="col-lg-2">
                        <img class="img-thumbnail" src="/img/logo/beaco.png" alt="">
                        {{-- <button class="btn btn-info clickMea" type="button">Print Me</button> --}}
                    </div>
                    <div class="col-lg-10 headings">
                        <h2 id="beaco-top">BEACO RESORT</h2>
                        <p>P.O Box 1688 Mbeya, Tel : +255(0)25 2504441, Fax : +255(0)25 2504366</p>
                        <p style="margin-top: -10px !important;">Call : +255(0)783 804444, +255(0)765 814444, +255(0)655
                            748444</p>
                        <p style="margin-top: -10px !important;">Email : beacoresort@yahoo.com</p>
                        <p id="order-book">ORDER BOOK</p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">No</th>
                                    <th class="wd-15p">Particular</th>
                                    <th class="wd-15p">Quantity Required</th>
                                    <th class="wd-15p">Quantity Aproved</th>
                                    <th class="wd-15p">Unit Cost</th>
                                    <th class="wd-15p">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{$i }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->item_unit }} {{ $item->measurement }}</td>
                                        <td></td>
                                        <td>Tsh {{ number_format($item->unit_price, 2) }}</td>
                                        <td>Tsh {{ number_format($item->total_value, 2) }}/=</td>
                                        
                                    </tr>


                                    @php
                                        $i++;
                                        $total +=$item->total_value;
                                    @endphp
                                @endforeach

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><h5><span style="color:#e40707">Sub Total</span></h5></td>
                                        <td> <h5><span style="color:#e40707"> {{ number_format($total, 2) }}/=</span></h5></td>
                                    </tr>
    
    
                            </tbody>
                        </table>

                        <div class="row centereds mg-t-20">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4">
                                <p>Prepared By <span style="text-decoration: underline">{{ $prepared_by }}</span></p>
                                <p>Reviewed By ---------------------------------------------------</p>
                                <p>Approved By ---------------------------------------------------</p>
                            </div>
                            <div class="col-lg-2">
                                <p>Sign --------------------------</p>
                                <p>Sign --------------------------</p>
                                <p>Sign --------------------------</p>
                            </div>
                            <div class="col-lg-4">
                                <p>Date --------------------------</p>
                                <p>Date --------------------------</p>
                                <p>Date --------------------------</p>
                            </div>
                            <div class="col-lg-1"></div>

                        </div>
                    </div>
                </div>
            </div><!-- card-body -->
        </div><!-- card -->
    </div>
</div>

@endsection
@section('script')
<script>


//     function printDiv(divName) {
//      var printContents = document.getElementById(divName).innerHTML;
//      var originalContents = document.body.innerHTML;

//      document.body.innerHTML = printContents;

//      window.print();

//      document.body.innerHTML = originalContents;
// }



$(function () {
 $(".clickMea").click(function () {
 var contents = $("#printableArea").html();
 var frame1 = $('<iframe />');
 frame1[0].name = "frame1";
 frame1.css({ "position": "absolute", "top": "-1000000px" });
 $("body").append(frame1);
 var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
 frameDoc.document.open();
 //Create a new HTML document.
 frameDoc.document.write('<html><head><title>Title</title>');
 frameDoc.document.write('</head><body>');
 //Append the external CSS file.
 frameDoc.document.write('<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
  
 var source = 'bootstrap.min.js';
 var script = document.createElement('script');
 script.setAttribute('type', 'text/javascript');
 script.setAttribute('src', source);
 //Append the DIV contents.
 frameDoc.document.write(contents);
 frameDoc.document.write('</body></html>');
 frameDoc.document.close();
 setTimeout(function () {
 window.frames["frame1"].focus();
 window.frames["frame1"].print();
 frame1.remove();
 }, 500);
 });
});




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
