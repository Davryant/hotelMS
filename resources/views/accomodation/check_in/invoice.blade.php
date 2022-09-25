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
                               
                                    <tr>
                                        <td>{{ $item->firstname }}  {{ $item->lastname }}</td>
                                    </tr>
                             
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
                               
                                    <tr>
                                        <td>{{ $item->id_name }}</td>
                                    </tr>
                              
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
                               
                                    <tr>
                                        <td>{{ $item->id_number }}</td>
                                    </tr>
                               
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
                               
                                    <tr>
                                        <td>{{ $item->room_name }}</td>
                                    </tr>
                               
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
                               
                                    <tr>
                                        <td>{{ $item->room_number }}</td>
                                    </tr>
                               
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
                               
                                    <tr>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                              
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
                               
                                    <tr>
                                        <td>{{ $item->phone_number }}</td>
                                    </tr>
                               
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
                               
                                    <tr>
                                        <td>{{ $item->check_in_date }}</td>
                                    </tr>
                                
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
                               
                                    <tr>
                                        <td>{{ $item->check_out_date }}</td>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>
            </div><!-- card-body -->
        </div><!-- card -->
    </div>

    <div class="col-lg-8">
        <div class="card bd-0">
            <div class="card-body bd bd-t-0 rounded-bottom">
                <button class="btn btn-danger pull-right mg-r-10" id="print" onclick="printDiv('printableArea');" ><i class="fa fa-print"></i></button>
                
                <div class="printableArea" id="printableArea">

                   <div class="row">
                    <div style="width:100%; margin-bottom:30px !important">
                        <div style="width: 50%; float: left; position: absolute; margin-bottom:20px !important">
                        <img src="/img/logo/beaco.png" alt="" width="50%">
                        </div>
                        
                        <div style="width: 50%; float: right;">
                            <h1 style="text-align: center; font-size:20px !important">BEACO RESORT</h1>
                            <h2  style="text-align: center; font-size:20px !important">P.O. Box 1688</h2>
                            <h2  style="text-align: center; font-size:20px !important">MBEYA</h2>
                        </div>
                    </div>
                   </div>
                    

                    <table border="1" width="100%" style="margin-top:5vh">
                        <tr>
                        <td colspan="4">Invoice To</td>
                       
                        <td >TIN</td>
                        <td>106-417-113</td>
                        </tr>

                        <tr>
                        <td colspan="4">
                            INDIVIDUAL<br>
                            [ {{ $item->firstname }} {{ $item->lastname }} ]
                        </td>
                        <td>VRN</td>
                        <td>40-005147-V</td>

                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td>Date</td>
                            <td>{{ $item->check_in_date }}</td>
    
                            </tr>

                            <tr>
                                <td colspan="4">&nbsp;</td>
                                <td>INVOICE NUMBER</td>
                                <td>{{ $item->recept_no }}</td>
        
                                </tr>
                    </table>


                    <table width="100%" border="1" style="margin-top:15px">
                        <tbody>
                            <tr>
                                <td width="50%"><b>No of Days</b></td>
                                <td width="50%">1</td>
                            </tr>
                        </tbody>
                       </table>


                   <table width="100%" border="1" style="margin-top:15px">
                    <thead>
                        <tr>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{  $item->check_in_date }}</td>
                            <td>{{  $item->check_out_date }}</td>
                        </tr>
                    </tbody>
                   </table>
                    <table width="100%" border="1" style="margin-top:15px">
                      <thead>
                        <tr>
                            <th>Room</th>
                            <th>Description</th>
                            <th>Rate</th>
                            <th>Serviced</th>
                            <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{  $item->room_name }}</td>
                              <td>Accomodation for one night</td>
                              <td style="text-align: center"> {{ number_format(floatval($item->room_price_applied * $item->no_days), 0) }} </td>
                              <td>{{ date('y/d/Y') }}</td>
                              <td style="text-align: center"> {{ number_format(floatval($item->room_price_applied), 0) }}</td>
                          </tr>

                          @php
                            $total_bil = $item->room_price_applied;
                        @endphp
                         @foreach ($acc_other_charges as $item)
                          <tr >
                            <td></td>
                            <td>Other Charges [{{ $item->bill_from }}]</td>
                            <td style="text-align: center"> {{ number_format(floatval($item->amount), 0) }}</td>
                            <td>{{ date('y/d/Y') }}</td>
                            <td style="text-align: center"> {{ number_format(floatval($item->amount), 0) }}</td>
                        </tr>
                        
                        @php
                        $total_bil = $total_bil + $item->amount;
                        @endphp
                        @endforeach

                        @foreach ($rest_bill as $item)
                             <tr >
                            <td></td>
                            <td>Restaurant Bill [{{ $item->bill_from }}]</td>
                            <td style="text-align: center"> {{ number_format(floatval($item->total), 0) }}</td>
                            <td>{{ date('y/d/Y') }}</td>
                            <td style="text-align: center"> {{ number_format(floatval($item->total), 0) }}</td>
                        </tr>

                        @php
                        $total_bil = $total_bil + $item->total;
                        @endphp

                        @endforeach
                        <tr style="margin-top:10vh;">
                            <td colspan="2"  rowspan="5" style="text-align: center; font-weight:bold">
                                
                                All Payment to be made through Bank:<br>
                                Name: BEACO RESORT<br>
                                A/c : 01J1066700700 <br>
                                Bank : CRDB <br>
                                Branch : MBEYA

                            </td>
                            
                            <td colspan="3">
                                
                                <span style="font-weight:bold;  ">Total VAT Exclusive </span>    <span style="float: right">TZS {{ number_format(floatval($total_bil - ($total_bil*18)/100), 0) }}</span>
                            </td>
                        </tr>

                        <tr>
                            
                            <td colspan="3">
                                <span style="font-weight:bold;  ">Total VAT</span>    <span style="float: right">TZS {{ number_format(floatval(($total_bil*18)/100), 0) }}</span>
                            </td>
                            
                        </tr>

                        <tr>
                            
                            <td colspan="3">
                                <span style="font-weight:bold;  ">Total VAT Inclusive</span>    <span style="float: right">TZS {{ number_format(floatval($total_bil), 0) }}</span>
                            </td>
                            
                        </tr>

                        <tr>
                            
                            <td colspan="3">
                                <span style="font-weight:bold;  ">Paid Amount</span>    <span style="float: right">TZS {{ number_format(floatval($deniLote->received_amount), 0) }}</span>
                            </td>
                            
                        </tr>

                        <tr>
                            
                            
                            <td colspan="3">
                                <span style="font-weight:bold;  ">Balance Due</span>    <span style="float: right"><b>TZS {{ number_format(floatval($total_bil - $deniLote->received_amount), 0) }}</b> </span>
                            </td>
                        </tr>
                      </tbody>
                    </table>

                    <p style="text-align: center; margin-top:20px">Customer Signature --------------------------------------------------</p>

                    <div style="width: 100% !important;">

                        <div style="width: 24% !important; display:inline-block !important; border:1px solid rgb(0, 0, 0)">
                            <p style="text-align: center; margin:0px">Phone Number</p>
                            <p style="text-align: center; margin:0px; border-top:1px solid rgb(0,0,0)">+255765814444</p>
                        </div>
                        <div style="width: 24% !important; display:inline-block !important;  border:1px solid rgb(0, 0, 0)">
                            <p style="text-align: center;margin:0px">Fax Number</p>
                            <p style="text-align: center;margin:0px; border-top:1px solid rgb(0,0,0)">+255(0)252504366</p>
                        </div>
                        <div  style="width: 24% !important ; display:inline-block;  border:1px solid rgb(0, 0, 0)">
                            <p style="text-align: center;margin:0px">Email</p>
                            <p style="text-align: center;margin:0px; border-top:1px solid rgb(0,0,0)">beacoresort@yahoo.com</p>
                        </div>
                        <div  style="width: 24% !important;  display:inline-block;  border:1px solid rgb(0, 0, 0)">
                            <p style="text-align: center;margin:0px">Website</p>
                            <p style="text-align: center;margin:0px;  border-top:1px solid rgb(0,0,0)">www.beacoresort.com</p>
                        </div>
                    </div>

                    <p style="margin-top:20px"><span style="float: left">Prepared By .............................</span>  <span style="float: right">Printed By <u><span>{{ Auth::user()->name }}</span></u></span>  </p>


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