<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/bar"><li class="list-group-item {{ request()->is('settup/bar') ? 'active' : '' }}"> Bar</li></a>
        <a href="/settup/bar/item"><li class="list-group-item {{ request()->is('settup/bar/item') ? 'active' : '' }}"> Item</li></a>
        <a href="/settup/bar/item-category"><li class="list-group-item  {{ (request()->is('settup/bar/item-category')) ? 'active' : '' }}"> Item Category</li></a>
        {{-- <a href="/settup/bar/dispatch"><li class="list-group-item  {{ (request()->is('settup/bar/dispatch')) ? 'active' : '' }}"> Dispatch Item</li></a> --}}
        {{-- <a href="/settup/bar/assign-staff"><li class="list-group-item  {{ (request()->is('settup/bar/assign-staff')) ? 'active' : '' }}"> Assign Staff</li></a> --}}
   </ul>
</div>