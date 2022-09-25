<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/store"><li class="list-group-item {{ request()->is('settup/store') ? 'active' : '' }}"> New Purchasing Order</li></a>
        <a href="/settup/store/item-category"><li class="list-group-item {{ request()->is('settup/store/item-category') ? 'active' : '' }}"> Add Item Category</li></a>
        <a href="/settup/store/item"><li class="list-group-item {{ request()->is('settup/store/item') ? 'active' : '' }}"> Add Item</li></a>
        <a href="/settup/store/bar" ><li class="list-group-item {{ request()->is('settup/store/bar') ? 'active' : '' }}"> All Purchasing Order</li></a>
        <a href="/settup/store/current-status" ><li class="list-group-item {{ request()->is('settup/store/current-status') ? 'active' : '' }}"> Physical Stock</li></a>
        {{-- <a href="/settup/restaurant/food"><li class="list-group-item {{ request()->is('settup/restaurant/food') ? 'active' : '' }}">Conference</li></a> --}}
        {{-- <a href="/settup/store/other"><li class="list-group-item  {{ (request()->is('settup/store/other')) ? 'active' : '' }}"> Other Item</li></a> --}}
        {{-- <a href="/settup/restaurant/assign-staff"><li class="list-group-item  {{ (request()->is('settup/restaurant/assign-staff')) ? 'active' : '' }}">Accomodation</li></a> --}}
   </ul>
</div>