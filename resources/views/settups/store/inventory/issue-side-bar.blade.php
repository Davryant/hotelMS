<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/store/issue"><li class="list-group-item  {{ (request()->is('settup/store/issue')) ? 'active' : '' }}"> Prepare Item To issue</li></a>
        <a href="/settup/store/issue/all"><li class="list-group-item {{ (request()->is('settup/store/issue/all')) ? 'active' : '' }}">Issue Order </li></a>
        <a href="/settup/store/rest/req"><li class="list-group-item {{ (request()->is('/settup/store/rest/req')) ? 'active' : '' }}">Restaurant Request(s) </li></a>
        {{-- <a href="{{ route('module.index') }}"><li class="list-group-item  {{ (request()->is('module')) ? 'active' : '' }}"> Permision</li></a> --}}
        {{-- <a href="/settup/bacres"><li class="list-group-item {{ (request()->is('settup/bacres')) ? 'active' : '' }}"> Backup / Restore</li></a> --}}
        {{-- <a href="/settup/staff"><li class="list-group-item {{ (request()->is('settup/staff')) ? 'active' : '' }}"> Users</li></a> --}}
        {{-- <a href="{{ route('feature.index') }}"><li class="list-group-item  {{ (request()->is('feature')) ? 'active' : '' }}"> Feature</li></a> --}}

    </ul>
</div>