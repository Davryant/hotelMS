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
        <p class="mg-b-20 ">Today's Customer Booking List </p>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th style="width:5%">#</th>
                <th style="width:20%">Guest Name</th>
                <th style="width:12%">Room Name</th>
                <th style="width:10%">Phone number</th>
                <th style="width:13%">Reserver Name</th>
                <th style="width:10%">Deposit</th>
                <th style="width:9%">Check In Date</th>
                <th style="width:9%">Check Out Date</th>
                <th style="width:12%">Action</th>
              </tr>
            </thead>
            <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $i }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ $customer->reserver_firstname }} {{ $customer->reserver_lastname }}</td>
                      <td style="width:10%">TZS {{ number_format($customer->advanced_payment, 2) }}</td>
                      <td style="width:10%">{{ $customer->check_in_date }}</td>
                      <td style="width:10%">{{ $customer->check_out_date }}</td>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="/acc/service/customer-view/{{ $customer->customer_id }}" class="btn btn-info btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="View Details"><div><i class="fa fa-eye"></i></div></a>
                            <a href="/acc/service/delete-reservation/{{ $customer->customer_id }}/delete" class="btn btn-danger btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Delete the Booking"><div><i class="fa fa-trash"></i></div></a>
                            <a href="/acc/service/customer-check-in/{{ $customer->customer_id }}" class="btn btn-success btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Check In Customer"><div><i class="fa fa-sign-in"></i></div></a>

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
            }
            });
    </script>
@endsection