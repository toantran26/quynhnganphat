<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-menu">
    <!-- Brand Logo -->
    
        <a href="{{ route('admin') }}" class="brand-link" style="float: right">
            
                <span class="brand-text font-weight-light">
                    <img src="{{asset('frontend/images/logo.svg')}}" alt="PC1 Logo" class="brand-image"
                    style="opacity: .8">
                </span>
        </a>
 

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: 57px">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item  {{route('create-post')== URL::current() ||
                            route('list-post', 0) == URL::current() ||
                             route('list-post', 1) == URL::current()||
                             route('list-post', 2) == URL::current()||
                             route('list-post', 3) == URL::current()||
                             route('list-post',4) == URL::current()||
                             route('list-post', 5) == URL::current() ?'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link
                        {{route('create-post')== URL::current() ||
                            route('list-post', 0) == URL::current() ||
                             route('list-post', 1) == URL::current()||
                             route('list-post', 2) == URL::current()||
                             route('list-post', 3) == URL::current()||
                             route('list-post', 4) == URL::current()||
                             route('list-post', 5) == URL::current() ?'active':''}}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview edit_news">
                        <li class="nav-item ">
                            <a href="{{route('create-post')}}" class="nav-link {{route('create-post') == URL::current()?'active':''}}">
                                <p>Viết bài</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_draft'))}}" class="nav-link
                                    {{route('list-post', config('constant.post_draft')) == URL::current() ?'active':''}}">
                                <p>Bài đang viết<span class="badge badge-info right">{{ConfigSite::count()['countPostDraft']}}</span></p>
                            </a>
                        </li>
                        {{-- <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_waiting'))}}" class="nav-link
                                    {{route('list-post', config('constant.post_waiting')) == URL::current() ?'active':''}}">
                                <p>Bài viết chờ duyệt<span class="badge badge-info right">{{ConfigSite::count()['countPostWaiting']}}</span></p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_reject'))}}" class="nav-link
                                     {{route('list-post', config('constant.post_reject')) == URL::current() ?'active':''}} ">
                                <p>Bài viết bị từ chối<span class="badge badge-danger right">{{ConfigSite::count()['countPostReject']}}</span></p>
                            </a>
                        </li> --}}
                        <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_approved'))}}" class="nav-link
                                    {{route('list-post', config('constant.post_approved')) == URL::current() ?'active':''}} ">
                                <p>
                                    Bài viết đã xuất bản
                                    <span class="badge badge-info right">{{ConfigSite::count()['countPostApproved']}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_remove'))}}" class="nav-link
                                    {{route('list-post', config('constant.post_remove')) == URL::current() ?'active':''}} ">
                                <p>Bài viết đã gỡ<span class="badge badge-danger right">{{ConfigSite::count()['countPostRemove']}}</span></p>
                            </a>
                        </li>
                        {{-- <li class="nav-item ">
                            <a href="{{route('list-post', config('constant.post_delete'))}}" class="nav-link
                                    {{route('list-post', config('constant.post_delete')) == URL::current() ?'active':''}}">
                                <p>Bài viết đã xóa<span class="badge badge-danger right">{{ConfigSite::count()['countPostDelete']}}</span></p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('cate-list')}}" class="nav-link {{route('cate-list') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Chuyên mục
                            {{-- <span class="badge badge-info right"></span> --}}
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item d-none">
                    <a href="{{route('tag-list')}}" class="nav-link {{route('tag-list') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Từ khoá
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('account-list')}}" class="nav-link {{route('account-list') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản trị viên
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('client-list')}}" class="nav-link {{route('client-list') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Đối tác - Liên kết
                            {{-- <span class="badge badge-info right">10</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item  {{route('create-jobs')== URL::current() ||
                             route('list-jobs', 2) == URL::current()||
                             route('list-jobs',4) == URL::current() ?'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link
                        {{route('create-jobs')== URL::current() ||
                             route('list-jobs', 2) == URL::current()||
                             route('list-jobs', 4) == URL::current() ?'active':''}}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Tuyển dụng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview edit_news">
                        <li class="nav-item ">
                            <a href="{{route('list-jobs', config('constant.post_approved'))}}" class="nav-link
                                    {{route('list-jobs', config('constant.post_approved')) == URL::current() ?'active':''}} ">
                                <p>
                                    Bài tuyển dụng đã đăng
                                    <span class="badge badge-info right">{{ConfigSite::count()['countJobsApproved']}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('list-jobs', config('constant.post_remove'))}}" class="nav-link
                                    {{route('list-jobs', config('constant.post_remove')) == URL::current() ?'active':''}} ">
                                <p>Bài tuyển dụng đã gỡ<span class="badge badge-danger right">{{ConfigSite::count()['countJobsRemove']}}</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact-list')}}" class="nav-link {{route('contact-list') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>
                            Email liên hệ
                            {{-- <span class="badge badge-info right"></span> --}}
                        </p>
                    </a>
                </li>
                
                <li class="nav-header">Cấu hình</li>
                <li class="nav-item">
                    <a href="{{ route('banner-list',1) }}"
                        class="nav-link {{ route('banner-list',1) == URL::current() ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('config-all')}}" class="nav-link {{route('config-management') == URL::current()?'active':''}} {{route('config-all') == URL::current()?'active':''}} {{route('config-menu') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Cài đặt chung
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('list-role')}}" class="nav-link {{route('list-role') == URL::current()?'active':''}}">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Cài đặt phân quyền
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fab fa-adversal"></i>
                        <p>
                            Quảng cáo
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
