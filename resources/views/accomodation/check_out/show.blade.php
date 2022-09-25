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
                                    <th class="wd-15p">ID Number</th>
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
                            <p>The Sum of Shillings: <span style="font-size:1.2rem" id="words">@php echo "$neno" @endphp</span></p>
                            <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp...................................................................................................................</span></p>
                            <p>Being Payment of: <span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp Accomodation Checkin</span></p>
                            <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp...................................................................................................................</span></p>
                        </div>

                        <div class="row details">
                            <div class="col-lg-8 ">
                                <p>Cash/Cheque No: <span style="font-size:1.2rem">Cash</span></p>
                                <p id="dotname"><span style="font-size:1.2rem">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp............................................................................................</span></p>
                            </div>
                            <div class="col-lg-4 thanks">
                                <p><span style="font-size:1rem">With Thanks,</span></p>
                            </div>
                        </div>
                        <div class="row details">
                            <div class="col-lg-4 tsh">
                                <p>Tsh: <span style="text-decoration: underline " id="hela">{{ number_format(floatval($item->room_price_applied),0) }}</span><span>/=</span></p>
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

    });

</script>
@endsection
