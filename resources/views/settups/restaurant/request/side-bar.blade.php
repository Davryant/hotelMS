<div class="col-lg-2">
    <ul class="list-group">
        <a href="/rest/request"><li class="list-group-item {{ request()->is('rest/request') ? 'active' : '' }}"> New Request</li></a>
        <a href="/rest/request/all"><li class="list-group-item {{ request()->is('rest/request/all') ? 'active' : '' }}">All Request</li></a>
        </ul>
</div>