<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/restaurant"><li class="list-group-item {{ request()->is('settup/restaurant') ? 'active' : '' }}"> Restaurant</li></a>
        <a href="/settup/restaurant/table"><li class="list-group-item {{ request()->is('settup/restaurant/table') ? 'active' : '' }}"> Table</li></a>
        <a href="/settup/restaurant/food-category"><li class="list-group-item {{ request()->is('settup/restaurant/food-category') ? 'active' : '' }}">Menu Category</li></a>
        <a href="/settup/restaurant/food"><li class="list-group-item {{ request()->is('settup/restaurant/food') ? 'active' : '' }}">Menu</li></a>
        {{-- <a href="/settup/restaurant/meal-type"><li class="list-group-item  {{ (request()->is('settup/restaurant/meal-type')) ? 'active' : '' }}"> Item Type</li></a> --}}
        {{-- <a href="/settup/restaurant/assign-staff"><li class="list-group-item  {{ (request()->is('settup/restaurant/assign-staff')) ? 'active' : '' }}"> Assign Staff</li></a> --}}
   </ul>
</div>