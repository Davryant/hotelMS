if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){
    var removeBtn = document.getElementsByClassName('remove-list')
    for (var i = 0; i < removeBtn.length; i++) {
        var button = removeBtn[i]
        button.addEventListener('click', removeTicketItem)
    }

    var quantityInputs = document.getElementsByClassName('ticket-quantity')
    // console.log(quantityInputs)
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToTicketButtons = document.getElementsByClassName('menu-item-button')
    for (var i = 0; i < addToTicketButtons.length; i++) {
        var button = addToTicketButtons[i]
        button.addEventListener('click', addToTicketClicked)

    }

    document.getElementsByClassName('send-ticket')[0].addEventListener('click', sendClicked)
    
    // document.getElementsByClassName('bar-send-ticket')[1].addEventListener('click', BarsendClicked)
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }

 var qrtxt = makeid(5);

function sendClicked() {
    var table = document.getElementById('table-no').innerText;
    var totalPrice = document.getElementsByClassName('total-price')[0].innerText

    if(table == ''){
        alert('Select Table')
    }else{

    var TableData;
    TableData = storeTblValues();
    // $('#tbTableValuesArray').html('<br>JS Array: <br>' + TableData);
    console.log(TableData)

    window.localStorage.setItem("ticket", JSON.stringify(TableData))
    
    window.localStorage.setItem("ttp", JSON.stringify(totalPrice))

    window.localStorage.setItem("table", JSON.stringify(table))

    window.localStorage.setItem("qrtxt", JSON.stringify('BEACO/'+qrtxt))

    var TableData1;
    TableData1 = storeTblValuesToSave()
    TableData1 = $.toJSON(TableData1);
    
    var TableData2;
    TableData2 = $.toJSON(storeTblValuesToSave());
    
    
    // TableData2 = {'_token': _token}
    console.log(TableData2)  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });           
    $.ajax({

        type: "POST",
        url: "/res/kot",
        data: "pTableData=" + TableData2,
        success: function(msg){
           console.log(msg)
        }
    });
    
        alert('Thank you for your Sell')
    var ticketItems = document.getElementsByClassName('ticket-items')[0]
    while (ticketItems.hasChildNodes()) {
        // console.log(ticketItems.firstChild)

        ticketItems.removeChild(ticketItems.firstChild)
       
    }
    document.getElementById('table-no').innerText='';
    updateTicketTotal()
    
  


    }
    
    window.open('/res/kot','_black')
}

function BarsendClicked() {
    var qrtxt = makeid(5);

    var table = document.getElementById('table-no').innerText;
    var totalPrice = document.getElementsByClassName('total-price')[0].innerText

    if(table == ''){
        alert('Select Table')
    }else{

    var TableData;
    TableData = storeTblValues();
    // $('#tbTableValuesArray').html('<br>JS Array: <br>' + TableData);
    console.log(TableData)

    window.localStorage.setItem("ticket", JSON.stringify(TableData))
    
    window.localStorage.setItem("ttp", JSON.stringify(totalPrice))

    window.localStorage.setItem("table", JSON.stringify(table))

    window.localStorage.setItem("qrtxt", JSON.stringify('BEACO/'+qrtxt))

    var TableData1;
    TableData1 = storeTblValuesToSave()
    TableData1 = $.toJSON(TableData1);
    
    var TableData2;
    TableData2 = $.toJSON(storeTblValuesToSave());
    
    
    // TableData2 = {'_token': _token}
    console.log(TableData2)  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });           
    $.ajax({

        type: "POST",
        url: "/bar/kot",
        data: "pTableData=" + TableData2,
        success: function(msg){
           console.log(msg)
        }
    });
    
        alert('Thank you for your Sell')
    var ticketItems = document.getElementsByClassName('ticket-items')[0]
    while (ticketItems.hasChildNodes()) {
        // console.log(ticketItems.firstChild)

        ticketItems.removeChild(ticketItems.firstChild)
       
    }
    document.getElementById('table-no').innerText='';
    updateTicketTotal()
    
  


    }
    
    window.open('/res/kot','_black')
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
    // console.log(TableData)
    return TableData;
}


function storeTblValuesToSave()
{
    var table = document.getElementById('table-no').innerText;
    var customer = $('.customer').val()

    var TableData = new Array();

    $('.ticket-table tr').each(function (row, tr) {
        TableData[row] = {
            "item": $(tr).find('td:eq(0)').text()
            , "price": $(tr).find('td:eq(1)').text().replace('Tsh ', '')
            , "quantity": $(tr).find('td:eq(2)').find('input').val()
            ,"table": table
            ,"customer": 'Walkin Customer'
            ,"qrtxt": "BEACO/"+qrtxt
        }

    });
    TableData.shift();  // first row will be empty - so remove
    // console.log(TableData)
    return TableData;
}



function quantityChanged(event){
    var input = event.target

    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateTicketTotal()
}

function removeTicketItem(event){
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.remove()
        updateTicketTotal()
}

function addToTicketClicked(event){
    var button = event.target
    var menuItem = button.parentElement
    var title = menuItem.getElementsByClassName('item_name')[0].innerText
    var price = menuItem.getElementsByClassName('item_price')[0].innerText
    addItemToTicket(title, price)
    updateTicketTotal()
    // console.log(title, price)
}

function addItemToTicket(title, price){
    var ticketTr = document.createElement('tr')
    ticketTr.classList.add('ticket-row')
    var ticketItems = document.getElementsByClassName('ticket-items')[0]
    var menuName = ticketItems.getElementsByClassName('menu-name')
    for (var i = 0; i < menuName.length; i++) {
        if(menuName[i].innerText == title){

        }
    }
    
    var ticketTrContent = `
            <td class="quantity menu-name">${title}</td>
            <td class="description ticket-price">${price}</td>
            <td class="price">
                <input type="number" class="form-control ticket-quantity" name="quantity" value="1" id="quantity" autocomplete="off" style="width: 50%">
                <button type="button" class="btn btn-danger pd-x-25 remove-list"><i class="fa fa-times" ></i></button>
            </td>`

    ticketTr.innerHTML = ticketTrContent
    ticketItems.append(ticketTr)

    ticketTr.getElementsByClassName('remove-list')[0].addEventListener('click', removeTicketItem)
    ticketTr.getElementsByClassName('ticket-quantity')[0].addEventListener('change', quantityChanged)
}


function updateTicketTotal(){
    var ticketItemContainer = document.getElementsByClassName('ticket-items')[0]
    var ticketRows = ticketItemContainer.getElementsByClassName('ticket-row')
    // console.log(ticketRows)
    var total = 0;
    for (var i = 0; i < ticketRows.length; i++) {
        var ticketRow = ticketRows[i]
        var priceElement = ticketRow.getElementsByClassName('ticket-price')[0]
        var quantityElement = ticketRow.getElementsByClassName('ticket-quantity')[0]
        var price = parseFloat(priceElement.innerText.replace('Tsh ', ''))
        var quantity = quantityElement.value

        total = total + (price * quantity)
       
        
    }
    total = Math.round(total * 100) / 100
   var jumla = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
    document.getElementsByClassName('total-price')[0].innerText = 'Tsh '+ jumla + '/='

    // console.log(total)
}
