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


    <div class="col-lg-7">
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

                    <div class="col-lg-4">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Total Bill Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td >Tsh{{ number_format($deniLote->total_dept, 2) }} /=</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Total Payed Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td  style="color: green">Tsh{{ number_format($deniLote->received_amount, 2) }} /=</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="col-lg-4">
                        <table class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Total Balance Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td style="color: red">Tsh{{ number_format($deniLote->balance, 2) }} /=</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    
            </div><!-- card-body -->
        </div><!-- card -->
    </div>

    <div class="col-lg-5">
        <div class="card bd-0">
            @include('alerts.success')
            <div class="card-body bd bd-t-0 rounded-bottom" id="printableArea">
                <form action="/acc/service/receive-store" method="POST" novalidate>
                    @csrf
                    <div class="form-layout">

                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="number" name="received_amount" placeholder="Enter Recieved Amount" required autocomplete = "off">
                            </div>
                          </div><!-- col-4 -->

                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Check NO:</label>
                              <input class="form-control" type="text"  name="check_number" placeholder="Enter Cheque number" required autocomplete = "off">
                            </div>
                          </div><!-- col-4 -->

                          <input type="hidden" name="customer_id" value="{{ Request::segment(4) }}" id="">
                    </div>

                    <button class="btn btn-primary pull-right">Receive Payment</button>
                </form>


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


        $(function() {
            'use strict';

            $('.select2').select2();
        });

</script>
@endsection
