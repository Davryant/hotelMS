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


<div class="card pd-20 pd-sm-40 mg-t-1">
    <h6 class="card-body-title">Add new Customer details.</h6>
    <p class="mg-b-20 mg-sm-b-30">Customer Booking Informations</p>

@if(session('success'))

<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{session('success')}}
</div><!-- alert -->
@endif

    <form action="/confe/service/hall-customer" method="POST">
        @csrf
      
        <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="firstname" placeholder="Enter firstname" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="lastname" placeholder="Enter lastname" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Email address:</label>
                  <input class="form-control" type="text" name="email"  placeholder="Enter email address" autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Phone Number <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                  <select class="form-control select2"  name="gender" data-placeholder="Choose Gender" required autocomplete = "off">
                    <option label="Choose Gender"></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2"  name="country" data-placeholder="Choose country" required autocomplete = "off">
                    <option label="Choose country"></option>
                    @foreach ($country as $item)
                    <option value="{{ $item->CountryName }}">{{ $item->CountryName }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Id Type: <span class="tx-danger">*</span></label>
                  <select class="form-control select2"  name="idtype" data-placeholder="Choose Id TYpe" required autocomplete = "off">
                    <option label="Choose Id Type"></option>
                    @foreach ($idtype as $item)
                    <option value="{{ $item->id }}">{{ $item->id_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">ID Number <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="id_number" placeholder="Enter Id number" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->

            
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="payment_id" data-placeholder="Choose Id Type" required autocomplete = "off">
                    <option label="Choose Payment Type"></option>
                    @foreach ($payment_type as $item)
                    <option value="{{ $item->id }}">{{ $item->payment_mode_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Conference Hall: <span class="tx-danger">*</span></label>
                  <select class="form-control hall_name select2" name="conference_id" data-placeholder="Choose Hall"  onChange="filter_price()" required autocomplete = "off">
                    <option label="Choose Hall"></option>
                    @foreach ($confes as $item)
                    <option value="{{ $item->id }}">{{ $item->conference_name }}</option>
                    @endforeach
                 
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Conference Reserve Type: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status" data-placeholder="Reserve Type" required autocomplete = "off">
                    <option label="Choose Reserve Type"></option>
                   
                    <option value="Booking">Booking</option>
                    <option value="Reservation">Reservation</option>
                                    
                  </select>
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-3">
             <div class="row">
             <div class="col-lg-5">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Total Cost: <span class="tx-danger">*</span></label>
                  <input class="form-control price" type="text" name="room_price" value="" readonly>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-7">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Cost Paid: <span class="tx-danger"> </span></label>
                  <input class="form-control" type="text" name="amount_paid" placeholder="100,000" autocomplete = "off">
                </div>
              </div><!-- col-4 -->
             </div>
              </div>

              <div class="col-lg-6 mg-t-5 mg-lg-t-0">
                  <div class="form-group">
                      <label class="form-control-label">Check In Date: <span class="tx-danger">*</span></label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                      <input type="text" data-date="" data-date-format="DD-MM-YYYY"  name="datein" class="form-control fc-datepicker" placeholder="DD/MM/YYYY"  autocomplete="off">
                  </div>
                  </div>
              </div>


              <div class="col-lg-6 mg-t-5 mg-lg-t-0">
                  <div class="form-group">
                      <label class="form-control-label">Check Out Date: <span class="tx-danger">*</span></label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                      <input type="text" data-date="" data-date-format="DD-MM-YYYY" name="dateout" class="form-control fc-datepicker" placeholder="DD-MM-YYYY" autocomplete="off">
                  </div>
                  </div>
              </div>
              </div>


             
            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Save</button>
                <button class="btn btn-secondary" type="reset">Cancel</button>
            </div><!-- form-layout-footer -->

        </div><!-- form-layout -->


       

    </form>
  </div><!-- card -->
    

   
@endsection
@section('script')
    <script>
        function filter_price(){
          var room_id = $(".hall_name").val()
          // var id = document.getElementByClassName("room_category").value;
          console.log(room_id)
          $.ajax({
            url:'/confe/service/hall-price/'+room_id,
            type: 'get',
            dataType:'html',
            success: function(response) {
               console.log(response);
               response = response.replace(/\"/g, "")
               $(".price").empty()
               $(".price").val(response);
            }
          });
        }

        $(document).ready(function(){
        'use strict';
        $('#wizard3').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          stepsOrientation: 1
        });
        });

        $(function(){
        'use strict';

        $('.select2').select2();
      });

       // Datepicker
       $('.fc-datepicker').datepicker({
          dateFormat: 'dd-mm-yy',
          showOtherMonths: true,
          selectOtherMonths: true
        });


      $("input").on("change", function() {
      this.setAttribute(
      "data-date",
      moment(this.value, "DD-MM-YYYY")
      .format( this.getAttribute("data-date-format") )
      )
      }).trigger("change")
      
    </script>
@endsection