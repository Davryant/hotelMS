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
                <th style="width:3%">#</th>
                <th style="width:20%">Full Name</th>
                <th style="width:12%">Room Name</th>
                <th style="width:10%">Phone number</th>
                <th style="width:10%">Total Amount(Tsh)</th>
                <th style="width:10%">Paid Amount (TZS)</th>
                <th style="width:10%">Balance Amount</th>
                <th style="width:9%">Check In Date</th>
                <th style="width:9%">Check Out Date</th>
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
                      <td style="width:3%">{{ $i }}</td>
                      <td style="width:20%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:12%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ number_format($customer->total_dept, 2) }}</td>
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
                     
                  </tr>
                  
                  @php
                      $i++;
                      $tt_dept = $tt_dept + $customer->total_dept;
                      $tt_paid = $tt_paid + $customer->received_amount;
                      $tt_pending = $tt_pending + ($customer->received_amount-$customer->total_dept);
                  @endphp
                  @endforeach
                  
                  <tr>
                    <td colspan="4"><span class="pull-right"><b>Total Amount:</b> </span></td>
                    <td><b>TZS {{  number_format($tt_dept, 2) }}</b></td>
                    <td><b>TZS {{  number_format($tt_paid, 2) }}</b></td>
                    <td colspan="3"><span style="color: red;"><b>TZS {{  number_format($tt_pending, 2) }}</b></span></td>
                </tr>
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
    </script>
@endsection