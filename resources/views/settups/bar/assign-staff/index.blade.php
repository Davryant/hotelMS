@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

        margin-top: -10vh;

        }
    </style>
@endsection


   <div class="row">
    @include('settups.bar.side-bar')  
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
          <div class="card-header card-header-default bg-info">
            Add Stfff To Bar
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
            <form id="formadd" action="" method="post">
                @csrf
              
                    <div class="form-layout">
                      <div class="row mg-b-15">
                          <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                              <div class="form-group">
                              <label class="form-control-label">Bar Name: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" name="bar_name" data-placeholder="Choose Bar Name">
                                  {{-- @foreach ($features as $feature)
                                   <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                  @endforeach --}}
                                  <option value="" label="Choose Bar Name">--Choose Bar Name--</option>
                                  <option value="1">Serengeti</option>
                                  <option value="2">Mikumi Lodge</option>
                                  <option value="3">Magwela Magwela</option>
                              </select>
                            </div><!-- col-4 -->
                          </div>
                      </div>
                  </div>

                  <div class="form-layout">
                    <div class="row mg-b-15">
                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                            <div class="form-group">
                            <label class="form-control-label">Staff Name(s): <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="staff_name" data-placeholder="Choose Category" multiple>
                                {{-- @foreach ($features as $feature)
                                 <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                @endforeach --}}
                                <option value="" label="Choose Category">--Choose Category--</option>
                                <option value="1">Juma</option>
                                <option value="2">Musa</option>
                                <option value="3">Asha</option>
                            </select>
                          </div><!-- col-4 -->
                        </div>
                    </div>
                </div>

                  <div class="form-layout">
                    <div class="row mg-b-15">
                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                            <div class="form-group">
                                <label class="form-control-label">Start Date and Time: <span class="tx-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input type="text" name="start_date_time" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                            </div>
                            </div>
                        </div>


                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                            <div class="form-group">
                                <label class="form-control-label">End Date and Time: <span class="tx-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input type="text" name="end_date_time" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                            </div>
                            </div>
                        </div>
                    </div>
                  </div>


                <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>
              
            </form>
             
          </div><!-- card-body -->
        </div><!-- card -->

  </div>

  <div class="col-lg-7">
      <div class="card bd-0">
          <div class="card-header card-header-default bg-info">
              Item List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Staff Name</th>
                      <th class="wd-15p">Bar Name</th>
                      <th class="wd-15p">Date and Time In</th>
                      <th class="wd-15p">Date and Time Out</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  {{-- <tbody>
                      @foreach ($roles as $role)
                      <tr>
                          <td>{{ $role->name }}</td>
                          <td>System</td>
                          <td>
                              <div class="row">
                                  <div class="col-md-6">
                                    <a href="/role/{{ $role->id }}/assign-persmission" class="btn btn-info btn-icon mg-r-5 mg-b-10"  title="Assign Permission"><div><i class="fa fa-plus"></i></div></a>
                                    <a href="#" class="btn btn-warning btn-icon mg-r-5 mg-b-10" title="Edit Role"><div><i class="fa fa-edit"></i></div></a>
                                   
                                  </div>
                                </div>
                          </td>
                        </tr>
                      @endforeach
                   
                 
                  </tbody> --}}
                </table>  
          </div><!-- card-body -->
        </div><!-- card -->
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

            $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
      

      // Datepicker
      $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });
     

    </script>
@endsection