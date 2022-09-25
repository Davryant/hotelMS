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
        <p class="mg-b-20 ">All Pending Bills </p>

        <h4 style="margin:20px">Accomodation Pending Bills</h4>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th style="width:3%">#</th>
                <th style="width:20%">Full Name</th>
                <th style="width:12%">Room Name</th>
                <th style="width:10%">Phone number</th>
                <th style="width:10%">Total Amount(Tsh)</th>
                <th style="width:10%">Paid Amount (Tsh)</th>
                <th style="width:10%">Balance Amount</th>
                <th style="width:9%">Check In Date</th>
                <th style="width:9%">Check Out Date</th>
                <th style="width:5%">Action</th>
              </tr>
            </thead>
            <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="width:3%">{{ $i }}</td>
                      <td style="width:20%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:12%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ number_format(floatval($customer->total_dept), 0) }}</td>
                      <td style="width:10%">
                        @if ($customer->received_amount =='')
                            0.00
                        @else
                        {{ number_format($customer->received_amount, 2) }}
                        @endif
                        
                      
                      </td>
                      <td style="width:10%">
                        @if ($customer->received_amount-$customer->total_dept < 0)
                        <span style="color: red;">{{ number_format($customer->received_amount-$customer->total_dept, 2) }}</span>
                        @else
                        {{ number_format($customer->received_amount-$customer->total_dept, 2) }} 
                        @endif
                        
                      
                      </td>
                      <td style="width:9%">{{ $customer->check_in_date }}</td>
                      <td style="width:9%">{{ $customer->check_out_date }}</td>
                      <td style="width:5%">
                        <div class="row">
                          <div class="col-md-6">
                            <a href="/acc/service/customer-check-receive/{{ $customer->customer_id}}" class="btn btn-primary btn-icon mg-r-5 mg-b-10" title="Receive Payment"><div><i class="fa fa-money"></i></div></a>
                           {{-- <a href="/acc/service/customer-check-print/{{ $customer->customer_id}}" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Print Receipt"><div><i class="fa fa-print"></i></div></a>  --}}
                          </div>
                        </div>
                      </td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->


        <h4 style="margin:20px">Conference Pending Bills</h4>
        <div class="table-wrapper">
          <table id="datatable2" class="table display responsive nowrap">
            <thead>
              <tr>
                <th style="width:5%">Booking No</th>
                <th style="width:5%">Full Name</th>
                <th style="width:5%">Phone number</th>
                <th style="width:5%">Check In Date</th>
                <th style="width:5%">Check Out Date</th>
                <th style="width:5%">Conference Name</th>
                <th style="width:5%">Total</th>
                <th style="width:5%">Amount Payed</th>
                <th style="width:5%">Balance</th>
              </tr>
            </thead>
            <tbody>
                
                  @foreach ($lists as $key => $customer)
                    @if ($customer->amount_paid - $customer->conference_price < 0)
                    <tr>
                      <td style="width:5%">{{ $customer->slug_c }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ $customer->datein }}</td>
                      <td style="width:10%">{{ $customer->dateout }}</td>
                      <td style="width:10%">{{ $customer->conference_name }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->conference_price, 2) }} </td>
                      <td style="width:10%">TZS {{ number_format($customer->amount_paid, 2) }} </td>
                      <td style="width:10%; color:red;">TZS {{ number_format($customer->amount_paid - $customer->conference_price,2 ) }}</td>
                      
                  </tr>
                    @endif
                  
                  @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->


      </div><!-- card -->

   
@endsection
@section('script')
    <script>
        $('#datatable1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            },

            
            });


            $('#datatable2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
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