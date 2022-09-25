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
    @include('settups.left-side-menu')  

        <div class="col-lg-7">
            <div class="card bd-0">
                <div class="card-header card-header-default bg-info">
                    General Setting

                    <a href="#" data-toggle="modal" data-target="#editgeneralsettingmodal" class="btn btn-info btn-icon mg-l-10-force"  data-toggle="tooltip" data-placement="top" title="Edit Details"><div><i class="fa fa-edit"></i></div></a>
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td><strong>Hotel Name</strong></td>
                                <td class="mailbox-name"> Hotel Pack</td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td class="mailbox-name"> 443 Mwanjelwa, Tz.</td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td class="mailbox-name"> 9999955555</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td class="mailbox-name"> info@hotelpack.com</td>
                            </tr>
                            <tr>
                                <td><strong>Hotel Code</strong></td>
                                <td class="mailbox-name"> ACT-487438</td>
                            </tr>
                            <tr>
                                <td><strong>Language</strong></td>
                                <td class="mailbox-name"> English</td>
                            </tr>     

                            <tr>
                                <td><strong>Timezone</strong></td>
                                <td class="mailbox-name"> UTC</td>
                            </tr>
                            <tr>
                                <td><strong>Date Format</strong></td>
                                <td class="mailbox-name">
                                    dd/mm/yyyy                                        </td>
                            </tr>
                            <tr>
                                <td><strong>Time Format</strong></td>
                                <td class="mailbox-name">
                                    24 Hour                                        </td>
                            </tr>
                            <tr>
                                <td><strong>Currency</strong></td>
                                <td class="mailbox-name"> Tsh</td>
                            </tr>
                            <tr>
                                <td><strong>Currency Symbol</strong></td>
                                <td class="mailbox-name"> Tsh</td>
                            </tr>
                        </tbody>
                      </table>
                </div><!-- card-body -->
              </div><!-- card -->
        </div>
         

        <div class="col-lg-3">
              <div class="card bd-0 mg-b-10">
                <div class="card-header card-header-default bg-info">
                  Edit Site Logo 
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="/img/logo/logo.png" width="30" height="30" alt="">
                        </div>
                        <div class="col-lg-8">
                            <form action="" method="post">
                                @csrf
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                  </label>
                            </form>
                        </div>
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card bd-0">
                <div class="card-header card-header-default bg-info">
                  Edit Site Favicon
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="/img/logo/logo.png" width="30" height="30" alt="">
                        </div>
                        <div class="col-lg-8">
                            <form action="" method="post">
                                @csrf
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                  </label>
                            </form>
                        </div>
                    </div>
                </div><!-- card-body -->
              </div><!-- card -->
        </div>
    </div><!-- row -->


     <!-- LARGE MODAL -->
     <div id="editgeneralsettingmodal" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-20">
                <form action="" method="post">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Hotel Name: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="hotel_name" placeholder="Enter firstname">
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label">Hotel Code: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="hotel_code" placeholder="Enter lastname">
                            </div>
                          </div><!-- col-4 -->


                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label">Hotel address: <span class="tx-danger">*</span></label>
                              <textarea class="form-control" style="resize: none;" rows="2" id="address" name="hotel_address" placeholder="" autocomplete="off" spellcheck="false"></textarea>
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                          </div><!-- col-8 -->

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Email Address: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="email_address" placeholder="Enter Email address">
                            </div>
                          </div><!-- col-8 -->

                          

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Timezone: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" data-placeholder="Choose Timezone" name="timezone">
                                <option label="Choose Timezone"></option>
                                <option value="USA">United States of America</option>
                                <option value="UK">United Kingdom</option>
                                <option value="China">China</option>
                                <option value="Japan">Japan</option>
                              </select>
                            </div>
                          </div><!-- col-4 -->

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Date Format: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" data-placeholder="Choose Date Format" name="dateformat">
                                <option label="Choose Date Format"></option>
                                <option value="d-m-Y">dd-mm-yyyy</option>
                                <option value="d-M-Y">dd-mmm-yyyy</option>
                                <option value="d/m/Y">dd/mm/yyyy</option>
                                <option value="d.m.Y">dd.mm.yyyy</option>
                                <option value="m-d-Y">mm-dd-yyyy</option>
                                <option value="m/d/Y">mm/dd/yyyy</option>
                                <option value="m.d.Y">mm.dd.yyyy</option>           
                              </select>
                            </div>
                          </div><!-- col-4 -->


                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" data-placeholder="Choose Currency" name="currency">
                                <option label="Choose Currency"></option>
                                <option value="USD">USD</option>
                                <option value="TSH">TSH</option>
                              </select>
                            </div>
                          </div><!-- col-4 -->

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Currency Symbol: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="currency_symbol" placeholder="Enter Email address">
                            </div>
                          </div><!-- col-8 -->

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Time Format: <span class="tx-danger">*</span></label>
                              <select class="form-control select2" data-placeholder="Choose Currency" name="time_format">
                                <option label="Choose Currency"></option>
                                <option value="USD">24 Hrs</option>
                                <option value="TSH">12 Hrs</option>
                              </select>
                            </div>
                          </div><!-- col-4 -->


                        </div><!-- row -->
                      </div><!-- form-layout -->
               
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-info pd-x-20" type="submit">Save changes</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>

        </form>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->
@endsection
@section('script')
    <script>
     
      
    </script>
@endsection