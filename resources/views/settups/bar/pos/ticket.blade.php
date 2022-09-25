<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
		<title>Receipt example</title>
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
	max-width: 60px;
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

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
		</style>
    </head>
    <body>
        <div class="ticket">
			<center>
				<img src="/img/logo/logo.png" alt="Logo">

			</center>
            <p class="centered">BEACO HOTEL RESORT
                <br>Mbeya Tanzania
				<br>0780020202 / 020202020</p>
				<div class="ticket2">
            <table>
                <thead>
					<tr>
						<th class="quantity">Item.</th>
						<th class="description">Price</th>
						<th class="price">QT</th>
					</tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">Kuku Choma</td>
                        <td class="description">Tsh 3000</td>
                        <td class="price">2</td>
                    </tr>
                   
                    <tr>
                        <td class="quantity"><small>Total</small></td>
                        <td class="description"><small>Tsh 3000.00</small> </td>
                    </tr>
                </tbody>
			</table>
				</div>
            <p class="centered">Thanks for your purchase!
                <br>Welcome Again</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script>
	</body>
	<script>
		const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});

document.getElementById("myDiv2").innerHTML=sessionStorage.getItem("page1content");
	</script>
</html>