@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

            margin-top: -10vh;

        }

        .me {
            float: right;
            /* border:1px solid red; */
            margin-left: 2%;
        }

        .me-add {
            margin-left: 40%;
        }

    </style>
@endsection


<div class="row">
    {{-- @include('settups.store.side-bar') --}}
    {{-- <div class="col-lg-10">
        <div class="card bd-0 mg-b-10">
            <div class="card-header card-header-default bg-info">
                Add Item Details
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @include('alerts.success')

                <form id="formadd" action="/settup/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Code: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="item_number" placeholder=""
                                                id="item_number" readonly autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>

                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Name: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="item_name"
                                                placeholder="Enter Item Name" id="item_name" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>


                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Measurement: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control select2" id="measurement" name="measurement"
                                                    data-placeholder="Choose Measurement Type">
                                                    <option value="litter">Litter</option>
                                                    <option value="kg">Kilogram</option>
                                                    <option value="pc">PC</option>
                                                    <option value="caton">Caton</option>
                                                    <option value="bunch">Bunch</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Unit: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" id="item_unit" name="item_unit"
                                                placeholder="Enter Item Unit" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Purchase Pirce / Unit: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="number" id="unit_price" name="unit_price"
                                                placeholder="Enter Purchase Price Per Unit" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>


                            </div>
                        </div>
                    </div>


                    <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>

                </form>


            </div><!-- card-body -->
        </div><!-- card -->

    </div> --}}

    <div class="col-lg-12">
        <div class="card bd-0">
            <div class="card-header card-header-default bg-info">
                Item List
                <button data-toggle="modal" data-target="#modaldemo3" type="button" class="btn btn-success me-add">Add
                    New</button>
                <button type="button" class="btn btn-warning pull-right me">Prepare Purchasing order</button>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0 rounded-bottom">
                @csrf
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>

                        <tr>
                            <th class="wd-15p">Item Name</th>
                            <th class="wd-15p">Item Unit</th>
                            <th class="wd-15p">Unit Cost</th>
                            <th class="wd-15p">Toatal Cost</th>
                            <th class="wd-15p">Date Prepared</th>
                            <th class="wd-15p">Date Updated</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_unit }} {{ $item->measurement }}</td>
                                <td>Tsh {{ number_format($item->unit_price, 2) }}</td>
                                <td>Tsh {{ number_format($item->total_value, 2) }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                              
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                  </table> 
                </table>
                  </table> 
                </table>
            </div><!-- card-body -->
        </div><!-- card -->
    </div>
</div>

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Creating Purchasing Order</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                @include('alerts.success')

                <form id="formadd" action="/settup/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-layout">

                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Name: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control" id="item_name" name="item_name"
                                                data-placeholder="Choose Measurement Type">
                                                @foreach ($itemList as $item)
                                                <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div><!-- col-4 -->
                                </div>


                                <div class="form-layout">
                                    <div class="row mg-b-25">
                                        <div class="col-lg-12 mg-t-5 mg-lg-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Measurement: <span
                                                        class="tx-danger">*</span></label>
                                                <select class="form-control" id="measurement" name="measurement"
                                                    data-placeholder="Choose Measurement Type">
                                                    <option value="litter">Litter</option>
                                                    <option value="kg">Kilogram</option>
                                                    <option value="pc">PC</option>
                                                    <option value="caton">Caton</option>
                                                    <option value="bunch">Bunch</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Item Unit: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" id="item_unit" name="item_unit"
                                                placeholder="Enter Item Unit" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-layout">
                                <div class="row mg-b-25">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Purchase Pirce / Unit: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="number" id="unit_price" name="unit_price"
                                                placeholder="Enter Purchase Price Per Unit" autocomplete="off">
                                        </div>
                                    </div><!-- col-4 -->
                                </div>


                            </div>
                        </div>
                    </div>


                    <button id="saveBtn" class="btn btn-info pd-x-10 mg-t--7 pull-right" type="submit">Save</button>

                </form>
            </div><!-- modal-body -->

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection
@section('script')
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });



        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $(function() {
            'use strict';

            $('.select2').select2();
        });




    });

    $('.me').click(function (e) {
            e.preventDefault();

         $.ajax({
            url: "/settup/store/prepare",
            type: "POST",
            dataType: 'json',
            success: function (responce) {
              // alert('Saved');
              console.log(responce)
             
                  swal({
                    title: "Good job!",
                    text: "Purchasing is now Prepared Successfuly",
                    icon: "success",
                    button: "Ok",
                  });

                  if(swal){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                          location.reload(); // then reload the page.(3)
                      }, 1000); 
                  }
            },
            error: function (responce) {
                console.log(responce);
            }
        });
    });

</script>
@endsection
