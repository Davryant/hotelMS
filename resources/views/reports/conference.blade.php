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
        <p class="mg-b-20 ">Conference Customer List </p>
       
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
              @csrf
            <thead>
              <tr>
                <th style="width:5%">Booking No</th>
                <th style="width:5%">Full Name</th>
                <th style="width:5%">Phone number</th>
                <th style="width:5%">Check In Date</th>
                <th style="width:5%">Check Out Date</th>
                <th style="width:5%">Conference Name</th>
                <th style="width:5%">Payment Status</th>
                <th style="width:5%">Amount Payed</th>
              </tr>
            </thead>
            <tbody>
                
                  @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $customer->slug_c }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ $customer->datein }}</td>
                      <td style="width:10%">{{ $customer->dateout }}</td>
                      <td style="width:10%">{{ $customer->conference_name }}</td>
                      <td style="width:10%">
                        @if ($customer->conference_price == $customer->amount_paid )
                            <button class="btn btn-success">PAID</button>
                        @elseif($customer->conference_price > $customer->amount_paid)
                        <button class="btn btn-warning">PATIAL PAYMENT</button>
                        @elseif($customer->amount_paid <= 0)
                        <button class="btn btn-danger">NOT PAID</button>
                        @endif
                    
                    </td>
                      <td style="width:10%">{{ $customer->amount_paid }}</td>
                      
                  </tr>
                  @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

   
@endsection
@section('script')
    <script>
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
            }
            });



    </script>
@endsection