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

        /* .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    } */
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    } 
    
     /* .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    } */
    
    /* .invoice-box table tr td:nth-child(2) {
        text-align: right;
    } */
    
    /* .invoice-box table tr.top table td {
        padding-bottom: 20px;
    } */
    
    /* .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    } */
    
    /* .invoice-box table tr.information table td {
        padding-bottom: 40px;
    } */
    
    /* .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    } */
    
    /* .invoice-box table tr.details td {
        padding-bottom: 20px;
    } */
    
    /* .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    } */
    
    /* .invoice-box table tr.item.last td {
        border-bottom: none;
    } */
    
    /* .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    } */
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
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
                
                <div class="invoice-box" id="printableArea" style="max-width: 800px; margin: auto; padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, .15);font-size: 16px;line-height: 24px;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color: #555;">
                    <table style="width: 100%;line-height: inherit;text-align: left;" cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td style="padding: 5px;vertical-align: top; padding-bottom: 20px;  font-size: 45px;line-height: 45px;color: #333;" class="title">
                                            <img src="/img/logo/beaco.png" style="width:80%; max-width:250px;">
                                        </td>
                                        
                                        <td style="width:19%;line-height: inherit;text-align: left;padding: 5px;vertical-align: top; text-align: right; padding-bottom: 20px;">
                                            Invoice #: {{ $item->recept_no }}<br>
                                            Created:{{ $item->created_at }}<br>
                                            {{-- Due: February 1, 2015 --}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td style="padding: 5px;vertical-align: top;padding-bottom: 40px;">
                                            BEACO RESORT.<br>
                                            P.O Box 1688<br>
                                            Mbeya, Tanzania
                                        </td>
                                        
                                        <td style="width:10%;line-height: inherit;text-align: leftpadding: 5px;vertical-align: top; text-align: right;padding-bottom: 40px;">
                                            {{ $item->firstname }} {{ $item->lastname }}.<br>
                                            {{ $item->phone_number }}<br>
                                            {{ $item->email }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr class="heading">
                            <td style="padding: 5px;vertical-align: top; background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                                Payment Method
                            </td>
                            
                            @if ($item->payment_mode_name != 'Cash')
                            <td style="padding: 5px;vertical-align: top; text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                                Check #
                            </td>
                            @endif
                            
                        </tr>
                        
                        <tr class="details">
                            <td style="padding: 5px;vertical-align: top;padding-bottom: 20px;">
                                {{ $item->payment_mode_name }}
                            </td>
                            @if ($item->payment_mode_name != 'Cash')
                            <td style="padding: 5px;vertical-align: top;  text-align: right;padding-bottom: 20px;">
                               
                            </td>
                            @endif
                        </tr>
                        
                        <tr class="heading">
                            <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                                Item
                            </td>
                            
                            <td style="padding: 5px;vertical-align: top; text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                                Price
                            </td>
                        </tr>
                        
                        <tr class="item">
                            <td style="padding: 5px;vertical-align: top; border-bottom: 1px solid #eee;">
                                Accomodation  ( {{  $item->room_name }} Room)
                            </td>
                            
                            <td style="padding: 5px;vertical-align: top; text-align: right; border-bottom: 1px solid #eee;">
                                Tsh {{ number_format(floatval($item->room_price_applied), 0) }} 
                            </td>
                        </tr>
                        @php
                            $total_bil = $item->room_price_applied;
                        @endphp
                        
                        @foreach ($acc_other_charges as $item)
                        <tr class="item">
                            <td style="padding: 5px;vertical-align: top; border-bottom: 1px solid #eee;">
                                {{ $item->bill_from }}
                            </td>
                            
                            <td style="padding: 5px;vertical-align: top; text-align: right; border-bottom: 1px solid #eee;">
                                Tsh {{ number_format(floatval($item->amount), 0) }}
                            </td>
                        </tr>
                        @php
                             $total_bil = $total_bil + $item->amount;
                        @endphp
                        @endforeach
                        
                        
                        <tr class="total">
                            <td></td>
                            
                            <td style="padding: 5px;vertical-align: top; text-align: right; border-top: 2px solid #eee;font-weight: bold;">
                               Total: Tsh {{ number_format(floatval($total_bil), 0) }}
                            </td>
                        </tr>
                    </table>
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