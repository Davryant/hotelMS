@foreach ($menus as $menu)
<div class="col-lg-2">
    <div class="card box menu-item-button img-height ">
        <img class="card-img-top img-fluid" src="/img/menu/{{ $menu->dish_cover }}"
            alt="Menu Image">
        <div class="card-body bd bd-t-0">
            <h6 class="mg-b-3 item_name"><a href="#." class="tx-dark">{{ $menu->food_item_name }}</a></h6>
            <span class="tx-12 item_price">Tsh {{$menu->food_item_price }} </span>
        </div>
    </div>

</div>
<script src="/js/ticket.js" async></script>
@endforeach