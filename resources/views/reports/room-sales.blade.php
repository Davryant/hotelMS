@extends('master')
@section('content')
@section('style')
    <style>
        .effect1{
            -webkit-box-shadow: 0 10px 6px -6px #777;
            -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
            }
    </style>
@endsection
@if(session('success'))

<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{session('success')}}
</div><!-- alert -->
@endif

    <div class="card pd-20 pd-sm-40 mg-t-1">
        <p class="mg-b-20 ">All time Customer Check List </p>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th style="width:20%">Type</th>
                <th style="width:12%">Date</th>
                <th style="width:10%">Customer Name</th>
                <th style="width:10%">Room Name</th>
                <th style="width:10%">Bill No</th>
                <th style="width:10%">Payment For</th>
                <th style="width:10%">Payment Mode</th>
                <th style="width:10%">Cash Sales</th>
              </tr>
            </thead>
            <tbody>
                  @php
                      $i =1;
                      $cash = 0;
                      $mpesa = 0;
                      $credit = 0;
                      $visa = 0;
                  @endphp
               

                  @foreach ($rest_bills as $key => $customer)
                  <tr>
                      @if ($customer->payment_mode_name == 'Cash')
                          @php
                              $cash = $cash + $customer->total;
                          @endphp
                      @endif

                      @if ($customer->payment_mode_name == 'Credit')
                      @php
                          $credit = $credit + $customer->total;
                      @endphp
                      @endif

                      @if ($customer->payment_mode_name == 'Mpesa')
                      @php
                          $mpesa = $mpesa + $customer->total;
                      @endphp
                      @endif

                      @if ($customer->payment_mode_name == 'Visa')
                      @php
                          $visa = $visa + $customer->total;
                      @endphp
                      @endif
                      <td style="width:20%">Payment</td>
                      <td style="width:12%">{{ $customer->created_at }}</td>
                      <td style="width:10%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:10%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->bill_id }}</td>
                      <td style="width:10%">{{ $customer->bill_from }}</td>
                      <td style="width:10%">{{ $customer->payment_mode_name }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->total, 2) }} </td>
                     
                  </tr>
                  
                  @endforeach
                <style>
                    .kulia{
                        float: right;
                    }
                </style>
                  <tr>
                    <td style="width:20%; font-weight:bold" colspan="7" ><span class="kulia">CASH SALES</span></td>
                    <td style="width:20%; font-weight:bold">TZS {{ number_format(floatval($cash),0) }}</td>
                   
                </tr>
                <tr>
                    <td style="width:20%; font-weight:bold" colspan="7"><span class="kulia">CREDIT SALES</span></td>
                    <td style="width:20%; font-weight:bold;">TZS {{ number_format(floatval($credit),0) }}</td>
                   
                </tr>
                <tr>
                    <td style="width:20%; font-weight:bold" colspan="7"> <span class="kulia">M-PESA SALES</span></td>
                    <td style="width:20%; font-weight:bold">TZS {{ number_format(floatval($mpesa),0) }}</td>
                   
                </tr>
                <tr>
                    <td style="width:20%; font-weight:bold" colspan="7"><span class="kulia">VISA SALES</span></td>
                    <td style="width:20%; font-weight:bold">TZS {{ number_format(floatval($visa),0) }}</td>
                   
                </tr>
                  
                <tr>
                    <td style="width:20%; font-weight:bold" colspan="7"><span class="kulia">TOTAL</span></td>
                    <td style="width:20%; font-weight:bold">TZS {{ number_format(floatval($cash+ $visa+ $mpesa +$credit),0)}}</td>
                   
                </tr>
                 
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

   
@endsection
@section('script')
    <script>
       var printCounter = 0;
        $('#datatable1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 
                 {
                extend: 'print',
                messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return 'Hotel Income';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }
                },
                messageBottom: null
            }
            ],
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            },

            
            });
    </script>
@endsection