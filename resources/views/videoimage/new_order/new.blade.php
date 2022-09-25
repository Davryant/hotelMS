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
    <p class="mg-b-20 mg-sm-b-30">Customer Video or Image Booking Informations</p>

@if(session('success'))

<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{session('success')}}
</div><!-- alert -->
@endif

    <form action="/video/service/image-customer" method="POST">
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
                  <label class="form-control-label">Location <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="location" placeholder="Enter Location" required autocomplete = "off">
                </div>
              </div><!-- col-4 -->

            

              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control hall_name select2" name="category" data-placeholder="Choose Category" required autocomplete = "off">
                    <option label="Choose Category"></option>
                    <option value="Video Shooting">Video Shooting</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Harusi">Harusi</option>
                    <option value="Kipaimara">Kipaimara</option>
                    <option value="Komunio">Komunio</option>
                    <option value="Photo Shooting">Photo Shooting</option>
                   
                  </select>
                </div>
              </div><!-- col-4 -->

                          
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