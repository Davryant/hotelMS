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
    @include('settups.finance.side-bar')  
    <div class="col-lg-3">
        <div class="card bd-0 mg-b-10">
          <div class="card-header card-header-default bg-info">
            Add Payment Mode
          </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
             
            <form id="formadd" action="" method="post">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Payment Mode: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="payment_mode" placeholder="Enter Payment Mode" autofocus>
                        </div>
                      </div><!-- col-4 -->
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
              Payment Mode List
               </div><!-- card-header -->
          <div class="card-body bd bd-t-0 rounded-bottom">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Payment Mode</th>
                      <th class="wd-15p">Mode Short Code</th>
                      <th class="wd-15p">Status</th>
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
      
    </script>
@endsection