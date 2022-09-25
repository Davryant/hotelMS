@extends('master')
@section('content')
@section('style')
    <style>
        .modal .modal-dialog {

            margin-top: -10vh;

        }

        .shotbutton {
            border-radius: 5px;
        }

        .top-menu button {
            border-radius: 5px;
        }

        .box {
            box-shadow:
                0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                0 12.5px 10px rgba(0, 0, 0, 0.06),
                0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                0 100px 80px rgba(0, 0, 0, 0.12);

            border-radius: 5px;
            margin-bottom: 10px;

        }

        .choicesBoard {
            height: 75vh;
        }

        .choice-list {
            border: 1px solid #d9d9d9;
            height: 55vh;
            background-color: rgb(250, 247, 244);
            border-radius: 5px;
            overflow: auto;
        }

        .choice-list-content {
            height: 45vh;
            border: 1px solid red;
            overflow: auto;
            border-radius: 5px;
        }

        .total-price-row {
            height: 9vh;
            border: 1px solid black;
            border-radius: 5px;
        }

        .table-list {
            margin-bottom: 10px;
            box-shadow: 0 8px 6px -6px black;
            border: 1px solid #f49917;
            border-radius: 5px;
            margin-left: 5px;

        }

        .modal-lg {
            max-width: 1000px;
            margin-top: -400px !important;
        }
        #cate{
            list-style-type: none;
        }
        #cate li{
            display: inline-block;
        }
        td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 33%;
    /* max-width: 75px; */
}

td.quantity,
th.quantity {
    width: 33%;
    /* max-width: 40px; */
    word-break: break-all;
}

td.price,
th.price {
    width: 33%;
    /* max-width: 40px; */
    word-break: break-all;
    /* float: right; */
    /* margin-right: 20px; */
    text-align: center;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    /* max-width: 155px; */
}

img {
    max-width: inherit;
    width: inherit;
}
.price button{
    margin-left: 52%;
    margin-top: -64px;
}
.price input{
    margin-top: 2px;
}
.img-height img{
        height: 60px !important;
}
    </style>
@endsection

<div class="card pd-10 pd-sm-10 mg-t-1 shotbutton">
    <div class="row">
        <div class="col-md-10">
            <ul id="cate">
               
                @foreach ($dishCate as $item)
                    <li id="cat{{ $item->id }}" value="{{ $item->id }}">

                        <a href="#" class="top-menu">
                            <button type="button" class="btn btn-danger"><i class="fa fa-coffee"
                                    style="font-size: 50px; cursor: pointer;"></i><br>
                                <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">
                                    {{ $item->item_category_name }} </p>
                            </button>
                        </a>
                    </li>
                @endforeach
            </ul>


        </div>

        <div class="col-md-2">
            <a href="#" class="top-menu" data-toggle="modal" data-target="#modaldemo3">
                <button type="button" class="btn btn-warning"><i class="fa fa-table"
                        style="font-size: 50px; cursor: pointer;"></i><br>
                    <p style="display: inline-block; font-size: 12px; margin-bottom: 0px ">Choose Table </p>
                </button>
            </a>
        </div>

    </div>
</div>


<div class="row row-sm mg-t-10">
    <div class="col-lg-8">
        <div class="card pd-20 pd-sm-40">
            <div class="row row-sm mg-t-10 dishData">
                @foreach ($menus as $menu)
                    <div class="col-lg-2">
                        <div class="card box menu-item-button img-height">
                            <img class="card-img-top img-fluid" src="/img/item_image/{{ $menu->item_image }}" alt="Menu Image">
                            <div class="card-body bd bd-t-0">
                                <h6 class="mg-b-3 item_name"><a href="#." class="tx-dark">{{ $menu->item_name }}</a></h6>
                                <span class="tx-12 item_price">Tsh {{ $menu->item_sale_price }} </span>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>

        </div><!-- card -->
    </div><!-- col-8 -->

    <div class="col-lg-4">
        <div class="card pd-20 pd-sm-40 choicesBoard">
            <div class="row customer-board">
                <div class="col-lg-10">
                    <select class="form-control select2" data-placeholder="Choose Browser">
                        <option value="Walkin Customer">Walkin Customer</option>

                    </select>
                </div>
                <div class="col-lg-2">
                    <a href="#" class="btn btn-outline-primary btn-icon rounded-circle mg-r-5">
                        <div><i class="fa fa-plus" data-toggle="tooltip" data-placement="top"
                                title="Add Customer name"></i></div>
                    </a>

                </div>
            </div>

            <div class="row customer-board">
                <div class="col-lg-12 mg-t-20 choice-list">
                    <div class="row choice-list-content">
                        <div class="col-lg-12 mg-t-20">
                            <div class="menu-list">
      

                                <div class="ticket">
                                    
                                    <table class="ticket-table">
                                        <thead>
                                            <tr>
                                                <th class="quantity">Item.</th>
                                                <th class="description">Price</th>
                                                <th class="price">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ticket-items">
                                     

                                        </tbody>
                                    </table>
                                   
                                </div>

                            </div>




                        </div>
                    </div>

                    <div class="row total-price-row mg-t-5">
                        <div class="col-lg-6">
                            <h6 class="card-body-title mg-t-5">Table No:  <span id="table-no"></span> </h6>
                            <input type="hidden" name="customer" value="Walkin Customer" id="customer">
                            <h6 class="card-body-title">Total Price:- </h6>
                        </div>
                        <div class="col-lg-6">

                            <h6 class="card-body-title mg-t-30 pull-right total-price" style="color: brown">Tsh 0.00 /=</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7"></div>
                <div class="col-lg-5 mg-t-5 mg-r--5 pull-right">
                    <button class="btn btn-primary btn-block mg-b-10" onclick="BarsendClicked();"><i class="fa fa-send mg-r-10"></i> Sale</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Table Selections</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    @foreach ($tables as $table)
                        <div class="col-lg-2 table-list" onclick="selectTable('{{ $table->table_name }}')">
                            <div class="card bd-0">
                                <img class="card-img img-fluid" src="/img/tables/table3.png" id="table-list" alt="Image"
                                    width="100" height="100">
                                <div class="card-img-overlay pd-30 d-flex align-items-start flex-column">
                                    <h6 class="tx-white mg-t-30 mg-l-10" style="text-align: center; color:#f49917">
                                        {{ $table->table_name }}</h6>
                                </div><!-- card-img-overlay -->
                            </div><!-- card -->
                        </div>
                    @endforeach


                </div>

            </div><!-- modal-body -->

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

@endsection
@section('script')
@include('settups.bar.pos.ourjs')

<script>
    $(function() {
        'use strict';

        $('.select2').select2();
    });

    function selectTable(name) {

    //    alert(name)
    $('#modaldemo3').modal('hide')

    document.getElementById('table-no').innerHTML = name
    }


    function readTblValues()
        {
            var TableData = '';

            $('#tbTableValues').val('');    // clear textbox
            $('.ticket-table tr').each(function (row, tr,input) {
                TableData = TableData
                        + $(tr).find('td:eq(0)').text() + ' '  // Task No.
                        + $(tr).find('td:eq(1)').text() + ' '  // Date
                        + $(tr).find('td:eq(2)').find('input').val() + ' '  // Description
                        + '\n';
            });
            $('#tbTableValues').html(TableData);
        }


        function storeAndShowTableValues()
        {
            var TableData;
            TableData = storeTblValues();
            // $('#tbTableValuesArray').html('<br>JS Array: <br>' + TableData);
            console.log(TableData)

            window.localStorage.setItem("ticket", JSON.stringify(TableData)); // Saving
        }

        function storeTblValues()
        {
            var TableData = new Array();

            $('.ticket-table tr').each(function (row, tr) {
                TableData[row] = {
                    "item": $(tr).find('td:eq(0)').text()
                    , "price": $(tr).find('td:eq(1)').text()
                    , "quantity": $(tr).find('td:eq(2)').find('input').val()
                }
            });
            TableData.shift();  // first row will be empty - so remove
            return TableData;
        }

</script>
@endsection
