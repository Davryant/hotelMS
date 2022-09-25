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
    <h6 class="card-body-title">Add new Group details.</h6>
    <p class="mg-b-20 mg-sm-b-30">Group Informations</p>

@if(session('success'))

<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{session('success')}}
</div><!-- alert -->
@endif

    <form action="/acc/service/group-store" method="POST" novalidate>
        @csrf
      
        <div class="form-layout">
            <div class="row mg-b-25">
              
            <div class="col-lg-12">
             <div class="row">
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Group Availability: <span class="tx-danger">*</span></label>
                  <select class="form-control select2 type2"  name="group_availability" data-placeholder="Choose Group Availability" onChange="filter_availability_type()" required autocomplete = "off">
                    <option label="Choose Group Availability"></option>
                    <option value="new">New Group</option>
                    <option value="old">Old Group</option>
                  </select>
                </div>
               </div><!-- col-4 -->
               <div class="col-lg-3" id="hidegroup">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Groups: <span class="tx-danger">*</span></label>
                  <select class="form-control group select2" name="group_id" data-placeholder="Choose Group"  onChange="filter_group()" required autocomplete = "off">
                    <option label="Choose Group"></option>
                    @foreach ($group as $item)
                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3" id="hidebox">
              </div><!-- col-4 -->
              <div class="col-lg-3" id="hidebox">
              </div><!-- col-4 -->
              </div>
              </div>


              <div class="col-lg-3" id="hidebox4">
                <div class="form-group">
                  <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name" placeholder="Enter Company Name" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3" id="hidebox1">
                <div class="form-group">
                  <label class="form-control-label">Email address:</label>
                  <input class="form-control" type="text" name="email"  placeholder="Enter email address" autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3" id="hidebox2">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="phone_number" placeholder="Enter Phone Number" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3" id="hidebox3">
                <div class="form-group">
                  <label class="form-control-label">Address:  <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address"  placeholder="Enter Company Address" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Number of Guests: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="number_of_guests" placeholder="Enter Number of Guests" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="payment_mode_id" data-placeholder="Choose Id Type" required autocomplete = "off">
                    <option label="Choose Id Type"></option>
                    @foreach ($payment_type as $item)
                    <option value="{{ $item->id }}">{{ $item->payment_mode_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Room Category: <span class="tx-danger">*</span></label>
                  <select class="form-control room_category select2" name="room_category_id" data-placeholder="Choose Category"  onChange="filter_room()" required autocomplete = "off">
                    <option label="Choose Room Category"></option>
                    @foreach ($room_category as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <!-- <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Room Number: <span class="tx-danger">*</span></label>
                  <select class="form-control rooms select2" name="room_id" data-placeholder="Choose Room Number" onChange="filter_room_price()" required autocomplete = "off">
                    <option label="Choose Room Number"></option>
                  </select>
                </div>
              </div>col-4 -->
             
             <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Price Paid: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="room_price_applied" placeholder="Enter Paid Amount" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6 mg-t-5 mg-lg-t-0">
                  <div class="form-group">
                      <label class="form-control-label">Check In Date: <span class="tx-danger">*</span></label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                      <input type="text" data-date="" data-date-format="DD-MM-YYYY"  name="check_in_date" class="form-control fc-datepicker" placeholder="DD/MM/YYYY"  autocomplete="off">
                  </div>
                  </div>
              </div>


              <div class="col-lg-6 mg-t-5 mg-lg-t-0">
                  <div class="form-group">
                      <label class="form-control-label">Check Out Date: <span class="tx-danger">*</span></label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                      <input type="text" data-date="" data-date-format="DD-MM-YYYY" name="check_out_date" class="form-control fc-datepicker" placeholder="DD-MM-YYYY" autocomplete="off">
                  </div>
                  </div>
              </div>
              <!-- <input type="hidden" name="group_status" value="1"> -->
            </div><!-- row -->

            <!-- <button class="btn btn-success" type="submit">Save Data </button> -->
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
        function filter_room(){
          var category_id = $(".room_category").val()
          // var id = document.getElementByClassName("room_category").value;
          console.log(category_id)
          $.ajax({
            url:'/acc/service/filter-room/'+category_id,
            type: 'get',
            dataType:'html',
            // data:'category_id='+category_id,
            success: function(response) {
              //  console.log(response);
               $(".rooms").empty()
               $(".rooms").append('<option value="">-Choose Room Number-</option>');
               $.each(JSON.parse(response),function(room, key){
                  $(".rooms").append('<option value="'+key+'">'+room+'</option>');
               });

              //  $(".dishData").html(response);
            }
          });
        }

        function filter_room_price(){
          var room_id = $(".rooms").val()
          // var id = document.getElementByClassName("room_category").value;
          console.log(room_id)
          $.ajax({
            url:'/acc/service/room-price/'+room_id,
            type: 'get',
            dataType:'html',
            success: function(response) {
              //  console.log(response);
               $(".price").empty()
               $(".price").val(response);
            }
          });
        }


        function filter_availability_type(){
          var type = $(".type2").val();
          if (type == "new"){
            $('#hidebox4').show();
            $('#hidebox1').show();
            $('#hidebox2').show();
            $('#hidebox3').show();
            $('#hidegroup').hide();
          }else{
            $('#hidebox4').hide();
            $('#hidebox1').hide();
            $('#hidebox2').hide();
            $('#hidebox3').hide();
            $('#hidegroup').show();
          }
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