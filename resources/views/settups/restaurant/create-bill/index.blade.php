@extends('master')
@section('content')
@section('style')
    <style>
        .period-filter {
            display: none;
        }

    </style>
@endsection

<div class="card pd-10 pd-sm-10 mg-t-1 shotbutton">
    <div class="row">
        <div class="col-lg-12">
            <form id="filterForm">
                @csrf
                <div class="form-layout">
                    <div class="row">


                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Food Item Category Name: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2 type" name="type"
                                    data-placeholder="Choose Filter Type" onchange="choosePeriod()">
                                    <option value="day">Day</option>
                                    <option value="week">Weekly</option>
                                    <option value="month">Month</option>
                                    <option value="year">Yealy</option>
                                    <option value="period">Period</option>
                                </select>
                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4 period-filter">
                            <div class="form-group">
                                <label class="form-control-label">From: <span class="tx-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" data-date="" data-date-format="DD-MM-YYYY" name="from"
                                        class="form-control fc-datepicker from" placeholder="DD/MM/YYYY"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 period-filter">
                            <div class="form-group">
                                <label class="form-control-label">To: <span class="tx-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" data-date="" data-date-format="DD-MM-YYYY" name="to"
                                        class="form-control fc-datepicker to" placeholder="DD/MM/YYYY"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label class="form-control-label"> <span class="tx-danger"></span></label>
                            <button class="btn btn-warning btn-block mg-b-10" id="sendBtn"><i
                                    class="fa fa-shopping-cart mg-r-10"></i> Filter</button>
                        </div>
                    </div>


                </div>



            </form>
        </div>

    </div>
</div>


<div class="row row-sm mg-t-10">
    <div class="col-lg-12">
        <div class="card pd-20 pd-sm-40 mg-t-50">
            <h6 class="card-body-title">Create Bill For a day</h6>
            <p class="mg-b-20 mg-sm-b-30">Select Filter above to filter based on your need</p>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Order No</th>
                            <th class="wd-20p">Total Price</th>
                            <th class="wd-20p">Table</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $item)
                            <tr>
                                <td><a href="/rest/bill/{{ $item->qrtxt }}/show">{{ $item->qrtxt }}</a></td>
                                <td>Tsh {{ number_format($item->total_price, 2) }} /=</td>
                                <td>{{ $item->table }}</td>
                                <td> 
                                   <a href="/rest/bill/{{ $item->qrtxt }}/show""> <button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- col-8 -->


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

    $('.select2').select2();

    // Datepicker
    $('.fc-datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        showOtherMonths: true,
        selectOtherMonths: true
    });

    function choosePeriod() {

        if ($('.type').val() != 'period') {
            $(".period-filter").hide()
        }
        if ($('.type').val() == 'period') {
            $(".period-filter").show()
        }
    }

    function sendFilter() {
        console.log('clicked')
    }

    $("#sendBtn").on("click", function(e) {
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        var type = $('.type').val()

        $.ajax({

            type: "POST",
            url: "/res/filter",
            data: "type=" + type,
            success: function(msg) {
                console.log(msg)
            }
        });
        // console.log(type)
    });

</script>
@endsection
