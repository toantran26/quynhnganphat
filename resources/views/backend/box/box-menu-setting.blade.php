<div class="card-header box-menu-setting">
    <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{route('config-all') == URL::current()?'active':''}}" href="{{route('config-all')}}" ><i class="fas fa-cog mr-1"></i> Cài đặt chung</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{route('config-menu') == URL::current()?'active':''}}" href="{{route('config-menu')}}" ><i class="fas fa-bars mr-1"></i> Cài đặt menu</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{route('config-management') == URL::current()?'active':''}}" href="{{route('config-management')}}" ><i class="fas fa-users mr-1"></i> Danh sách lãnh đạo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{route('config-page') == URL::current()?'active':''}}" href="{{route('config-page')}}" ><i class="fas fa-file mr-1"></i> Trang tĩnh</a>
        </li>
    </ul>
</div>