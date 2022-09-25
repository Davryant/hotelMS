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
        <div class="row">
            <div class="col-md-10 pull-right"></div>
            <div class="col-md-2 pull-right">
                <a href="/video/service/booking" class="btn btn-primary pull-right">New Order</a>
            </div>
        </div>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
              @csrf
            <thead>
              <tr>
                <th style="width:5%">Booking No</th>
                <th style="width:5%">Full Name</th>
                <th style="width:5%">Phone number</th>
                <th style="width:5%">Category</th>
                <th style="width:5%">Location</th>
                <th style="width:5%">Total</th>
                <th style="width:5%">Amount Payed</th>
                <th style="width:5%">Balance</th>
              </tr>
            </thead>
            <tbody>
                
                  @foreach ($vidim as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $customer->slug_vid }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->phone_number }}</td>
                      <td style="width:10%">{{ $customer->category }}</td>
                      <td style="width:10%">{{ $customer->location }}</td>
                      <td style="width:10%">TZS  </td>
                      <td style="width:10%">TZS  </td>
                      <td style="width:10%">TZS  </td>
                      
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


    //         $('#datatable1').Tabledit({
    //     url: '{{ route('custo.action') }}',
    //     dataType: "json",
    //     columns: {
    //         identifier: [0, 'slug_c'],
    //         editable: [
    //             [2, 'phone_number', ],[7, 'amount_paid']
    //         ]
    //     },
    //     restoreButton: false,
    //     // editButton:false,
    //     onSuccess: function(data, textStatus, jqHXR) {
    //         if (data.action == 'delete') {
    //             $('#' + data.item_number).remove()

    //         }

    //         swal({
    //             title: "Good job!",
    //             text: "Operation Complete Successfuly",
    //             icon: "success",
    //             button: "Ok",
    //         });

    //     }

    // });
    </script>
@endsection