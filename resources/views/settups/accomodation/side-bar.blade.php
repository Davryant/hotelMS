<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/accomodation/id"><li class="list-group-item {{ request()->is('settup/accomodation/id') ? 'active' : '' }}"> ID Type</li></a>
        <a href="/settup/accomodation/room"><li class="list-group-item  {{ (request()->is('settup/accomodation/room')) ? 'active' : '' }}"> Room</li></a>
        <a href="/settup/accomodation/room-category"><li class="list-group-item  {{ (request()->is('settup/accomodation/room-category')) ? 'active' : '' }}"> Room Category</li></a>
        <a href="/settup/accomodation/room-status"><li class="list-group-item  {{ (request()->is('settup/accomodation/room-status')) ? 'active' : '' }}"> Room Status</li></a>

    </ul>
</div>