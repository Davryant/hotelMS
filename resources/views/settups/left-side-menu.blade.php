<div class="col-lg-2">
    <ul class="list-group">
        <a href="/settup/settings"><li class="list-group-item  {{ (request()->is('settup/settings')) ? 'active' : '' }}"> General Setting</li></a>
        <a href="{{ route('role.index') }}"><li class="list-group-item {{ (request()->is('role')) ? 'active' : '' }}">Roles And Permision </li></a>
        <a href="{{ route('module.index') }}"><li class="list-group-item  {{ (request()->is('module')) ? 'active' : '' }}"> Permision</li></a>
        {{-- <a href="/settup/bacres"><li class="list-group-item {{ (request()->is('settup/bacres')) ? 'active' : '' }}"> Backup / Restore</li></a> --}}
        <a href="/settup/staff"><li class="list-group-item {{ (request()->is('settup/staff')) ? 'active' : '' }}"> Users</li></a>
        {{-- <a href="{{ route('feature.index') }}"><li class="list-group-item  {{ (request()->is('feature')) ? 'active' : '' }}"> Feature</li></a> --}}

    </ul>
</div>