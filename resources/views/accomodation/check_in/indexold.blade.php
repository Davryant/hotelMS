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


   <div class="row">

    <a href="/acc/service/check-in">
          <div class="col-lg-3">
              <div class="card bd-0 wd-xs-300 effect1">
                <img class="card-img-top img-fluid" src="/img/front/chekin.png" alt="Image">
                <div class="card-body bd bd-t-0">
                  <h6 class="mg-b-3"><a href="/acc/service/check-in" class="tx-dark">Check in New Customer</a></h6>
                  <span class="tx-12">Click To check In new Customer</span>
                </div>
              </div>
          </div><!-- col-3 -->
          
    </a>
          
    <a href="/acc/service/reservation">
            <div class="col-lg-3">
                <div class="card bd-0 wd-xs-300 effect1">
                <img class="card-img-top img-fluid" src="/img/front/res.png" alt="Image">
                <div class="card-body bd bd-t-0">
                    <h6 class="mg-b-3"><a href="/acc/service/" class="tx-dark">Make Reservation</a></h6>
                    <span class="tx-12">CLick to Make new Reservation</span>
                </div>
                </div>
            </div><!-- col-3 -->
            
    </a>
         
    </div><!-- row -->

    

    <div class="card pd-20 pd-sm-40 mg-t-30">
        <p class="mg-b-20 ">Today Customer Checkin List </p>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Full Name</th>
                <th class="wd-15p">Room Number</th>
                <th class="wd-20p">ID Type</th>
                <th class="wd-15p">Phone number</th>
                <th class="wd-10p">Check In Date</th>
                <th class="wd-25p">Check Out Date</th>
                <th class="wd-25p">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Emilian Ngatunga</td>
                <td>102</td>
                <td>NIDA</td>
                <td>07676736727</td>
                <td>12/09/2020</td>
                <td>14/09/2020</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                          <a href="#" class="btn btn-info btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="View Details"><div><i class="fa fa-eye"></i></div></a>
                          <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Check Out Customer"><div><i class="fa fa-sign-out"></i></div></a>
                          <a href="#" class="btn btn-success btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Extend Time"><div><i class="fa fa-sign-in"></i></div></a>
                         
                        </div>
                      </div>
                </td>
              </tr>
              <tr>
                <td>Emilian Ngatunga</td>
                <td>102</td>
                <td>NIDA</td>
                <td>07676736727</td>
                <td>12/09/2020</td>
                <td>14/09/2020</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-info btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="View Details"><div><i class="fa fa-eye"></i></div></a>
                            <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Check Out Customer"><div><i class="fa fa-sign-out"></i></div></a>
                            <a href="#" class="btn btn-success btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Extend Time"><div><i class="fa fa-sign-in"></i></div></a>
                           
                        </div>
                      </div>
                </td>
              </tr>
              <tr>
                <td>Emilian Ngatunga</td>
                <td>102</td>
                <td>NIDA</td>
                <td>07676736727</td>
                <td>12/09/2020</td>
                <td>14/09/2020</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-info btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="View Details"><div><i class="fa fa-eye"></i></div></a>
                            <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Check Out Customer"><div><i class="fa fa-sign-out"></i></div></a>
                            <a href="#" class="btn btn-success btn-icon mg-r-5 mg-b-10" data-toggle="tooltip" data-placement="top" title="Extend Time"><div><i class="fa fa-sign-in"></i></div></a>
                           
                        </div>
                      </div>
                </td>
              </tr>
              
           
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

   
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
    </script>
@endsection