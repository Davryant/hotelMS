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
                <th style="width:10%">Payment For</th>
                <th style="width:10%">Payment Mode</th>
                <th style="width:10%">Cash Sales</th>
              </tr>
            </thead>
            <tbody>
                  @php
                      $i =1;
                      $tt_dept = 0;
                      $tt_paid = 0;
                      $tt_pending = 0;
                  @endphp
                  @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="width:20%">Payment</td>
                      <td style="width:12%">{{ $customer->created_at }}</td>
                      <td style="width:10%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:10%">ACCOMODATION</td>
                      <td style="width:10%">{{ $customer->payment_mode_name }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->received_amount, 2) }} </td>
                     
                  </tr>
                
                  @endforeach

                  @foreach ($other_charges as $key => $customer)
                  <tr>
                      <td style="width:20%">Payment</td>
                      <td style="width:12%">{{ $customer->created_at }}</td>
                      <td style="width:10%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:10%">{{ $customer->bill_from }}</td>
                      <td style="width:10%">{{ $customer->payment_mode_name }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->amount, 2) }} </td>
                     
                  </tr>
                  
                  @endforeach

                  @foreach ($rest_bills as $key => $customer)
                  <tr>
                      <td style="width:20%">Payment</td>
                      <td style="width:12%">{{ $customer->created_at }}</td>
                      <td style="width:10%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:10%">{{ $customer->bill_from }}</td>
                      <td style="width:10%">{{ $customer->payment_mode_name }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->total, 2) }} </td>
                     
                  </tr>
                  
                  @endforeach

                  
                 
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