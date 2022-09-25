<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>KOT ORDER</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
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
            width: 60px;
            max-width: 120px;
            word-break: break-all;
        }

        td.quantity,
        th.quantity {
            width: 75px;
            max-width: 75px;

        }

        td.price,
        th.price {
            width: 20px;
            max-width: 20px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: 100px;
            width: 100px;

        }

        .ttp {
            width: 120px !important;
            font-weight: bold;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }

        
        }



    </style>

<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
</head>

<body>
    <div class="ticket">
        <center>
            <img src="/img/logo/beaco.png" alt="Logo">

        </center>
        <p class="centered">BEACO HOTEL RESORT
            <br><br><span>Waiter/Waitress:- {{ Auth::user()->name }}</span>
        </p>
        <p class="centered table"></p>
        <p class="centered"><b>KOT No:- <span class="receiptNo"></span></b></p>
        <div class="ticket2">
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Item.</th>
                        <th class="description">Price</th>
                        <th class="price">QT</th>
                    </tr>
                </thead>
                <tbody class="ticket-table">



                </tbody>

                <tr style="margin-top: 20px;">
                    <td class="quantity"><small>Total</small></td>
                    <td class="description ttp"><small> <b>Tsh 0</b></small> </td>
                </tr>
            </table>
            <p class="centered toword"></p>
        </div>
       

        <p class="centered dt"></p>
        <style>
            #qrcode img{
                margin-left: 20px;
            }
        </style>
        <div class="centered" id="qrcode"></div>

    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script src="script.js"></script>
    <script src="/lib/jquery/jquery.js"></script>
    <script src="/js/numberToWorld.js"></script>
    <script src="/js/qrcode.js"></script>
</body>

<script>
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
        window.localStorage.removeItem('ticket');
    });

    var ticket = JSON.parse(window.localStorage.getItem("ticket")); // Retrieving

    var ttp = JSON.parse(window.localStorage.getItem("ttp")); // Retrieving

    var table = JSON.parse(window.localStorage.getItem("table")); // Retrieving

    var qrtxt = JSON.parse(window.localStorage.getItem("qrtxt")); // Retrieving

    var ticketTable = document.getElementsByClassName('ticket-table')[0]
    var q = 0;

    ticket.forEach(tkt => {
        let row = document.createElement('tr');

        Object.values(tkt).forEach(text => {
            let cell = document.createElement('td');
            let textNode = document.createTextNode(text);
            cell.appendChild(textNode);
            row.appendChild(cell);
        })

        ticketTable.appendChild(row);
    });

    document.getElementsByClassName('ttp')[0].innerHTML = ttp
    // var p = ttp
    // converter.toWords(9007199254740992);
    console.log(ticket)
    // console.log(converter.toWords(p))

    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date + ' ' + time;
    document.getElementsByClassName('dt')[0].innerHTML = dateTime

    document.getElementsByClassName('table')[0].innerHTML = table
    document.getElementsByClassName('receiptNo')[0].innerHTML = qrtxt

    var qrcode = new QRCode("qrcode", {
    text: qrtxt,
    width: 120,
    height: 120,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
</script>

</html>
