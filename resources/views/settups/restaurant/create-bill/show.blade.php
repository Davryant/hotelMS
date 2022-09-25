@extends('master')
@section('content')
@section('style')
    <style>
        .period-filter {
            display: none;
        }

        @media print {
    #printa {
        background-color: white;
        height: inherit%;
        width: 50%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
    .bb{
        background-color: rgb(156, 196, 243);
    }
    .bb img{
        height: 30px;
    }
    .juujuu{
        /* border: 1px solid rebeccapurple; */
        width: 100%;
        margin: 0 !important;
    }
    #date{
        margin-left: 5px !important;
    }
    #vrn{
        margin-left: -2px !important;
        float: right;
    }

    #table table{
        width: 100% !important;
        margin: 0 !important;
    }
    #chiniiii{
        width: 100% !important;
        margin: 0 !important;
    }
}
    </style>
@endsection

<div class="row row-sm mg-t-10">
    <div class="col-lg-5">
        <div class="card pd-20 pd-sm-40 mg-t-50">
            <h6 class="card-body-title">Bill Details</h6>
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Order No</th>
                            <th class="wd-20p">Total Price</th>
                            <th class="wd-20p">Table</th>
                            {{-- <th class="wd-10p">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($sales as $item)
                            <tr>
                                <td >{{ $item->qrtxt }}</a></td>
                                <td>Tsh {{ number_format($item->price, 2) }} /=</td>
                                <td>{{ $item->table }}</td>
                                {{-- <td> 
                                   <a href="#"> <button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- col-8 -->

  
    <div class="col-lg-7">
        <button class="btn btn-teal pull-right mg-r-10" id="print" onclick="printContent('printa');" ><i class="fa fa-print"></i></button>
        <div class="card pd-20 pd-sm-40 mg-t-10" id="printa">
            {{-- <h6 class="card-body-title">Bill Ticket</h6> --}}
       

            <div style="text-align:center" class="bb">
                <img src="/img/logo/beaco.png" width="20%" height="80" alt="">
                <p>P.O Box 1688 Mbeya</p>
                        <p style="margin-top: -10px !important;">Tel : +255(0)25 2504441, Fax : +255(0)25 2504366</p>
                        <p style="margin-top: -10px !important;">Call : +255(0)783 804444, +255(0)765 814444, +255(0)655
                            748444</p>
                        <p style="margin-top: -10px !important;">Email : beacoresort@yahoo.com</p>
                        <h5 style="ctext-decoration: underline">CAPTAIN ORDER</h5>
            </div>
            <div style="margin-left:10%;margin-right:20px;" class="juujuu">
                <p>No: <span style="text-decoration: underline; font-weight:bold">{{ $qrtxt }}</span> </p>
                <p style="padding : 0;margin : 0;line-height : 20px;">Time: <span style="text-decoration: underline; font-weight:bold; margin-bottom:-10px !important">20:21 AM</span> <span style="margin-left: 30%" id="date">Date: </span> <span style="text-decoration: underline; font-weight:bold">30-12-2020</span> </p>
                <p style="padding : 0;margin : 0;line-height : 20px;">Waiter: <span style="text-decoration: underline; font-weight:bold; margin-bottom:-10px !important">{{ Auth::user()->name }}</span> <span style="margin-left: 30%" id="date">Table No:</span> <span style="text-decoration: underline; font-weight:bold">3</span> </p>
                <p style="padding : 0;margin : 0;line-height : 20px;">TIN: <span style="font-weight:bold; margin-bottom:-10px !important">106 - 417 - 113</span> <span style="margin-left: 30%" id="vrn">VRN:</span> <span style="font-weight:bold">40 - 005147 - V</span> </p>
            </div>
            
            <div id="table">

                <table style="width: 80%; margin-left:10%; border-collapse: collapse; text-align:center">
                    <thead style="text-align: center">
                        <th style="border: solid 1px black; text-align: center">QTY</th>
                        <th style="border: solid 1px black; text-align: center">PARTICULARS</th>
                        <th style="border: solid 1px black; text-align: center">@</th>
                        <th style="border: solid 1px black; text-align: center">AMOUNT</th>
                    </thead>
                    <tbody>

                        @php
                            $total = 0;
                        @endphp
                        @foreach ($sales as $item)
                        <tr>
                            <td style="border: solid 1px black;">{{ $item->quantity }}</td>
                            <td style="border: solid 1px black;">{{ $item->item_name }}</td>
                            <td style="border: solid 1px black;">{{ number_format($item->price, 2) }}</td>
                            <td style="border: solid 1px black;">{{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                        @php
                            $total = $total + ($item->quantity * $item->price);
                        @endphp
                        @endforeach
                       


                        <tr style="margin-top:10px !important">
                            <td></td>
                            <td></td>
                            <td><b>TOTAL</b></td>
                            <td><b>{{ number_format($total, 2) }}</b></td>
                        </tr>
                    </tbody>
                                        
                </table>

                <div style="width: 80%; margin-left:10%; margin-top:20px" id="chiniiii">
                    <p>Guest Name ..........................................</p>
                    <p>Room Number: <span style="text-decoration: underline">SERENGETI</span> <span style="margin-left:40%">Signature  <span style="text-decoration: underline">....................</span></span> </p>
                </div>

                <p>
                    <input type="hidden" name="bill_id" id="bill_id" value="{{ Request::segment(3) }}/{{ Request::segment(4) }}">
                    @if ($res_bill == "")
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modaldemo2">Post Rooms Credit </button> 
                    <button class="btn btn-danger">Post Individual Credit </button> 
                        
                    @endif
                    <button class="btn btn-success pull-right">Generate Bill</button></p>
                
            </div>
        </div><!-- card -->
    </div><!-- col-8 --> 

</div>

<div id="modaldemo2" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <span id="total"></span>
                @foreach ($rooms as $key => $room)
                <a name="" id="" class="btn btn-primary mg-l-10" href="#" role="button" onclick="postsasa({{ $room->id }}, {{ $total }})">{{ $room->room_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

<script>


function postsasa(id, total){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var bill_id = $('#bill_id').val()

        var bill_from = 'Restautant';
        
        var data = { 
                 'bill_from': bill_from,
                 'room_id':id,
                 'total':total,
                 'bill_id':bill_id
               };

        $.ajax({
        type: "POST",
        url: "/res/bill",
        data: data,
        success: function(msg) {
            console.log(msg)


                    swal({
                            title: "Good job!",
                            text: "Bill Posted Successfuly",
                            icon: "success",
                            button: "Ok",
                        });

                        if(swal){ // if true (1)
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000); 
                        }

                }
        });

    // console.log(id, total);


}
// $('#total').val()

function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}


    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });

    $('.select2').select2();

    // Datepicker
    $('.fc-datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        showOtherMonths: true,
        selectOtherMonths: true
    });

    function choosePeriod() {

        if ($('.type').val() != 'period') {
            $(".period-filter").hide()
        }
        if ($('.type').val() == 'period') {
            $(".period-filter").show()
        }
    }

    function sendFilter() {
        console.log('clicked')
    }

    $("#sendBtn").on("click", function(e) {
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        var type = $('.type').val()

        $.ajax({

            type: "POST",
            url: "/res/filter",
            data: "type=" + type,
            success: function(msg) {
                console.log(msg)
            }
        });
        // console.log(type)
    });

</script>
@endsection
