@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

            margin-top: -10vh;

        }

        #beaco-top {
            font-weight: 700;
            font-size: 2.2rem;
            color: #008c80;
            font-family: 'Wide Latin', Arial, sans-serif;
            text-align: center;
        }

        .headings p {
            text-align: center;
            margin-top: -10px;
            color: #008c80;
        }

        #receptneno {
            font-family: 'Wide Latin', Arial, sans-serif;
            font-weight: 200;
            font-size: 1rem;
            color: #008c80;
            text-align: right;
            /* margin-left: 60px; */
        }

        #date {
            font-weight: 300 !important;
            font-size: 1.1rem;
            color: 868e96 !important;
            text-align: right;
        }

        .centereds{
            /* text-align: center; */
            
        }

        .details{
            padding:10px;
            
        }
        .recept{
            font-size: 1.1rem;
            
        }
        .date{
            font-weight: 300 !important;
            font-size: 1.1rem;
            border: 40px !important; 
            border-style: solid;
            border-color: red; 
        }
        .details{
            /* font-weight: 300 !important; */
            font-size: 1.1rem;
            /* border: 40px !important;   */
        }
        .thanks{
            text-align:right;
            margin-top:50px;
            margin-bottom:-25px;
        }
        .tsh{
            margin-top:20px;
        }
        .dot{
            text-align:right;
        }
        .tin{
            margin-top:-20px;
        }
        #tin{
            border-style: solid !important;
            padding:10px;
            /* position:center; */
            text-align:center;
        }
        #kny{
            margin-top:-15px;
        }
        #dotname{
            margin-top:-40px;
            /* margin-right:-70px !important; */
        }
    </style>
@endsection


<div class="row">


    <div class="col-lg-4">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
               Customer Details

               @include('alerts.success')
            </div><!-- card-header -->
                <div class="row details">
                    <div class="col-lg-12">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Full Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->firstname }}  {{ $item->lastname }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">ID Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->id_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Id Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->id_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Room Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->room_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->room_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p"> Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p"> Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->phone_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Check-in Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->check_in_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Check-out Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->check_out_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-12">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Accomodation Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>Tsh {{ number_format(floatval($acc_fee->room_price_applied * $acc_fee->no_days ), 0) }} /= ({{ $acc_fee->no_days }} Night(s))</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-12">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Other Charges</th>
                                    <th class="wd-15p">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($acc_other_charges)
                                @php
                                    $deni = 0;
                                    $deni = $deni + $acc_fee->room_price_applied;
                                @endphp
                                    @foreach ($acc_other_charges as $item)
                                    <tr>
                                        <td>{{ $item->bill_from }}</td>
                                        <td>Tsh {{ number_format(floatval($item->amount), 0) }}</td>
                                    </tr>
                                    @php
                                        $deni = $deni + $item->amount;
                                    @endphp
                                    @endforeach
                                @endif
                                   
                                   
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-12">
                        @if ($customer_bill != '')
                                <a href="/acc/service/invoince/{{ Request::segment(4) }}" class="btn btn-warning">Preview Invoice</a>
                        @else
                        <form action="/acc/service/deni-store" method="POST">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{ Request::segment(4) }}" id="">
                            <input type="hidden" name="total_dept" value="{{ $deni }}" id="">
                        <button class="btn btn-primary" type="submit">Generate Bill</button>

                        </form>
                        @endif
                        
                    </div>


            </div><!-- card-body -->
        </div><!-- card -->
    </div>

    <div class="col-lg-8">
        <div class="card bd-0">
            <div class="card-body bd bd-t-0 rounded-bottom" id="printableArea">
                <div class="row">
                    <div class="col-lg-2">
                        <img class="img-thumbnail" src="/img/logo/beaco.png" alt="">
                        <!-- <button class="btn btn-info" onclick="printDiv('printableArea')" type="button">Print Me</button>                       -->
                    </div>
                    <div class="col-lg-10 headings">
                        <h2 id="beaco-top">BEACO RESORT</h2>
                        <p>P.O Box 1688 Mbeya, Tel : +255(0)25 2504441, Fax : +255(0)25 2504366</p>
                        <p style="margin-top: -10px !important;">Call : +255(0)783 804444, +255(0)765 814444, +255(0)655
                            748444</p>
                        <p style="margin-top: -10px !important;">Email : beacoresort@yahoo.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 recept">
                        @foreach ($details as $item)
                        <p>RNo: <span>{{ $item->recept_no }}</span></p>
                        @endforeach
                    </div>
                    <div class="col-lg-4">
                        <p id="receptneno">RECEPT</p>
                    </div>
                    <div class="col-lg-4 date">
                    @php
                    $mytime = Carbon\Carbon::now()->toDateTimeString();
                    $mytime2 = Carbon\Carbon::now()->format('d-m-yy');
                    @endphp
                        <p id="date">Date: <span>{{$mytime}}</span></p>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-12">
                        <!-- <div class="col-lg-1">
                        </div> -->
                        <div class="col-lg-12 details">
                            @foreach ($details as $item)
                            @php
                            $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                            $neno = ucfirst($digit->format( $item->room_price_applied ));
                            @endphp
                            <p>Received From M/S: <span style="font-size:1.2rem">&nbsp&nbsp{{ $item->firstname }} {{ $item->lastname }}</span></p>
                            <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp...................................................................................................................</span></p>
                            <p>The Sum of Shillings: <span style="font-size:1.2rem" id="words">@php echo "$neno" @endphp Only</span></p>
                            <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp...................................................................................................................</span></p>
                            <p>Being Payment of: <span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp Accomodation Checkin</span></p>
                            <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp...................................................................................................................</span></p>
                        </div>

                        <div class="row details">
                            <div class="col-lg-8 ">
                                <p>Cash/Cheque No: <span style="font-size:1.2rem">Cash</span></p>
                                <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp................................................</span></p>
                            </div>
                            <div class="col-lg-4 thanks">
                                <p><span style="font-size:1rem">With Thanks,</span></p>
                            </div>
                        </div>
                        <div class="row details">
                            <div class="col-lg-4 tsh">
                                <p>Tsh: <span style="text-decoration: underline " id="hela">{{ number_format(floatval($item->room_price_applied), 0) }}</span><span>/=</span></p>
                                <!-- <p>Tsh: <span style="text-decoration: underline " id="hela">{{ number_format($item->room_price_applied,2) }}</span><span>/=</span></p> -->
                            </div>
                            <div class="col-lg-4 tin">
                                <p id="tin">
                                <span> TIN:  &nbsp 106-417-113</span><br>
                                <span> VRN:  400-05147-V</span>
                                </p>
                            </div>
                            <div class="col-lg-4 dot ">
                                <p><span style="position:right ">....................</span></p>
                                <p id="kny"><span style="font-size:0.9rem !important ">Kny:BEACO RESORT</span></p>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

//     var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
//     var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

//     function inWords (num) {
//         if ((num = num.toString()).length > 9) return 'overflow';
//         n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
//         if (!n) return; var str = '';
//         str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'million ' : '';
//         str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'hundred and ' : '';
//         str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
//         str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
//         str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
//         return str;
//     }

//     var x = $("#hela").text();
//     var y = inWords(x);
//     console.log(x);
// function capitalizeFirstLetter(string) {
// return string.charAt(0).toUpperCase() + string.slice(1);
// }

//     document.getElementById("words").innerHTML = capitalizeFirstLetter(y); 
</script>
@endsection
