@extends('master')
@section('content')
@section('style')
    <style>
        .period-filter {
            display: none;
        }

    </style>
@endsection

<div class="row row-sm mg-t--20">
    <div class="col-lg-12">
        <div class="card pd-20 pd-sm-40 mg-t-50">
            <h6 class="card-body-title">Sales For a day</h6>
            <p class="mg-b-20 mg-sm-b-30">You can create bill below depending on customer</p>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            {{-- <th class="wd-15p">Item Name</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-20p">Price</th>
                            <th class="wd-15p">Last Sale</th> --}}
                            <th class="wd-10p">No</th>
                            <th class="wd-15p">Order No</th>
                            <th class="wd-15p">Table No</th>
                            <th class="wd-20p">Total Price</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($sales as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><a href="/res/service/{{ $item->qrtxt }}/show">{{ $item->qrtxt }}</a> </td>
                                <td> {{$item->table }}</td>
                                <td>Tsh {{ number_format($item->total_price, 2) }} /=</td>
                                <td> 
                                   <a href="#" title="View Items"> <button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                   <a href="#" title="Create Bill"> <button class="btn btn-warning"><i class="fa fa-list"></i></button></a>
                                </td>
                            </tr>
                            @php
                                $i ++;
                            @endphp
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
