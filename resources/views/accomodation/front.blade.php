@extends('master')
@section('content')
@section('style')
    <style>
        .effect1{
            -webkit-box-shadow: 0 10px 6px -6px #777;
            -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
            }
            .btn{
              margin-bottom: 5px;
            }

            .top-menu{
              margin-left: 5px;
              cursor: pointer;
             
            }
            .top-menu button{
              border-radius: 5px;
            }
            .shotbutton{
              border-radius: 5px;
            }

            .badge {
    margin-right: 5px;
    margin-left: 5px;
    height: 15px;
    width: 15px;
    border-radius: 50%;
}
.badge {
    font-size: 80%;
    padding: 0.35em 0.6em;
    font-weight: 600;
}
    </style>
@endsection
<div class="card pd-20 pd-sm-40 mg-t-1 shotbutton">
  <div class="row">
    <div class="col-md-12" style="text-align:center">
      <a href="/acc/service/check-in/all" class="top-menu">
        <button type="button" class="btn btn-primary"><i class="fa fa-sign-in" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Check-in </p>
        </button>
      </a>
  
      <a href="/acc/service/check-out/all" class="top-menu">
        <button type="button" class="btn btn-secondary"><i class="fa fa-sign-out" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Check-Out </p>
        </button>
      </a>
  
      {{-- <a href="/acc/service/reservation/all" class="top-menu">
        <button type="button" class="btn btn-success"><i class="fa fa-address-card" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Reservation </p>
        </button>
      </a> --}}
  
      <a href="/acc/service/check-in" class="top-menu">
        <button type="button" class="btn btn-warning"><i class="fa fa-user-plus" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Individual Customer </p>
        </button>
      </a>
  
      <a href="/acc/service/check-in/group" class="top-menu">
        <button type="button" class="btn btn-success"><i class="fa fa-users" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Group Customer </p>
        </button>
      </a>

      <a href="/acc/service/reservation" class="top-menu">
        <button type="button" class="btn btn-warning"><i class="fa fa-user-plus" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Reservation / Booking </p>
        </button>
      </a>

  
      <a href="/acc/service/check-in/all" class="top-menu">
        <button type="button" class="btn btn-info"><i class="fa fa-shower" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Other Charges </p>
        </button>
      </a>
  
   
      <a href="/video/service/booking" class="top-menu">
        <button type="button" class="btn btn-success"><i class="fa fa-image" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Video and Photo </p>
        </button>
      </a>
      
      <a href="/confe/service/booking" class="top-menu">
        <button type="button" class="btn btn-warning"><i class="fa fa-podcast" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Conference </p>
        </button>
      </a>
  
  
      <a href="/bar/service/pos" class="top-menu">
        <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Bar Sale </p>
        </button>
      </a>
  
      
  
      <a href="/res/service/pos" class="top-menu">
        <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Restaurant Sale </p>
        </button>
      </a>
      
      <a href="#" class="top-menu">
        <button type="button" class="btn btn-warning"><i class="fa fa-money" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Hotel Income </p>
        </button>
      </a>
  
  
      <a href="/acc/service/payments/all/pending" class="top-menu">
        <button type="button" class="btn btn-info"><i class="fa fa-money" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Pending Payments </p>
        </button>
      </a>
      
       <a href="#" class="top-menu">
        <button type="button" class="btn btn-success"><i class="fa fa-print" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Print </p>
        </button>
      </a>

      <a href="{{ route('logout') }}" class="top-menu">
        <button type="button" class="btn btn-secondary"><i class="fa fa-sign-out" style="font-size: 50px; cursor: pointer;"></i><br>
          <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Logout </p>
        </button>
      </a>
    </div>

  </div>
</div>

    <div class="card pd-20 pd-sm-40 mg-t-10 shotbutton">
        <h5>Rooms</h5>

        <div class="d-flex align-items-center text-capitalize">
          <span class="badge" value="Occupied" style="background-color:#0866c6; color:white; border-color:#fff"> </span> Occupied |
          <span class="badge" value="Vacant" style="background-color:green; color:white; border-color:#fff"> </span> Vacant |
          <span class="badge" value="Dirty" style="background-color:#f49917; color:white; border-color:#fff"> </span>Check Out Dirty |
          <span class="badge" value="Out of Order" style="background-color:#dc3545; color:white; border-color:#fff"> </span> Out Of Order |
          <span class="badge" value="Booked" style="background-color:#5b93d3; color:white; border-color:#fff"> </span> Booked |
          <span class="badge" value="Reserved" style="background-color:#e41f99; color:white; border-color:#fff"> </span> Reserved |
       </div>
       
        <div class="row">
          <div class="col-md-12 mg-t-10">
          
                  @foreach ($rooms as $key => $room)

                  @if ($room->status_name == "Occupied")
                  <a name="" id="" class="btn btn-primary" href="#" role="button">{{ $room->room_name }}</a>
                  @elseif ($room->status_name === "Vacant")
                  <a name="" id="" class="btn btn-success" href="#" role="button">{{ $room->room_name }}</a>
                  @elseif ($room->status_name === "Out of Order")
                  <a name="" id="" class="btn btn-danger" href="#" role="button">{{ $room->room_name }}</a>
                  @elseif ($room->status_name === "Check out Dirty")
                  <a name="" id="" class="btn btn-warning" href="#" role="button">{{ $room->room_name }}</a>
                  @elseif ($room->status_name === "Booked")
                  <a name="" id="" class="btn btn-info" href="#" role="button">{{ $room->room_name }}</a>
                  @elseif ($room->status_name === "Reserved")
                  <a name="" id="" class="btn btn-pink" href="#" role="button">{{ $room->room_name }}</a>

                  @endif 

                  @endforeach

          </div>
        </div>
    </div><!-- card -->

   <div class="row">

     <div class="col-md-6">
        <div class="card pd-20 pd-sm-40 mg-t-10 shotbutton">
          <div class="card-header">
            <h5>Checked Inn Guests</h5>
        </div>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th style="width:5%">#</th>
                  <th style="width:25%">Name</th>
                  <th style="width:25%">Room Name</th>
                  <th style="width:22%">Check In Date</th>
                  <th style="width:23%">Check Out Date</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers1 as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $i }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->check_in_date }}</td>
                      <td style="width:10%">{{ $customer->check_out_date }}</td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
     </div>

     <div class="col-md-6">
       <div class="card pd-20 pd-sm-40 mg-t-10 shotbutton">
          <div class="card-header">
            <h5>Check Out Guests</h5>
        </div>
        
        <div class="carrd-body">
          <div class="table-wrapper">
            <table id="datatable2" class="table display responsive nowrap">
            <thead>
                <tr>
                  <th style="width:5%">#</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Room Name</th>
                  <th class="wd-20p">Check In Date</th>
                  <th class="wd-15p">Check Out Date</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers2 as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $i }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->check_in_date }}</td>
                      <td style="width:10%">{{ $customer->check_out_date }}</td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
         
        </div>
     </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card pd-20 pd-sm-40 mg-t-10 shotbutton">
          <div class="card-header">
            <h5>Bookings</h5>
          </div>
        
        <div class="carrd-body">
          <div class="table-wrapper">
            <table id="datatable3" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th style="width:5%">#</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Room Name</th>
                  <th class="wd-20p">Check In Date</th>
                  <th class="wd-15p">Check Out Date</th>
                  <!-- <th class="wd-15p">No of Males</th>
                  <th class="wd-15p">No of Females</th>
                  <th class="wd-15p">No of Kids</th> -->
                </tr>
              </thead>
              <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers3 as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $i }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->check_in_date }}</td>
                      <td style="width:10%">{{ $customer->check_out_date }}</td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>

       </div>
      </div>
 

      <div class="col-md-6">
        <div class="card pd-20 pd-sm-40 mg-t-10 shotbutton">
          <div class="card-header">
            <h5>Reservations</h5>
          </div>
        
        <div class="carrd-body">
          <div class="table-wrapper">
            <table id="datatable4" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th style="width:5%">#</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Room Name</th>
                  <th class="wd-20p">Check In Date</th>
                  <th class="wd-15p">Check Out Date</th>
                  <!-- <th class="wd-15p">No of Males</th>
                  <th class="wd-15p">No of Females</th>
                  <th class="wd-15p">No of Kids</th> -->
                </tr>
              </thead>
              <tbody>
                  @php
                      $i =1;
                  @endphp
                  @foreach ($customers4 as $key => $customer)
                  <tr>
                      <td style="width:5%">{{ $i }}</td>
                      <td style="width:30%">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                      <td style="width:15%">{{ $customer->room_name }}</td>
                      <td style="width:10%">{{ $customer->check_in_date }}</td>
                      <td style="width:10%">{{ $customer->check_out_date }}</td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
        
         
       </div>
      </div>

     </div>
@endsection
@section('script')
    <script>
        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });

            $('#datatable2').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });

            $('#datatable3').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });

            $('#datatable4').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
            });

            
    </script>
@endsection