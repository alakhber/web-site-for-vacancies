<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('back.home') }}" class="brand-link">
        <img src="{{ _img('project/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">İdarəetmə Paneli</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ _img('storage/'.auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->fullname }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Bölmə Axtar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ _linkCheck('user/*','menu-open') }}">
                    <a href="#" class="nav-link {{ _linkCheck('user/*') }}">
                        <i class="fas fa-user-shield nav-icon"></i>
                        <p>
                            İstifadəçi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.user.all') }}" class="nav-link {{ _linkCheck('user/all') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>İstifadəçilər</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('back.user.create') }}"  class="nav-link {{ _linkCheck('user/new') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni İstifadəçi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ _linkCheck('lang/*','menu-open') }}">
                    <a href="#" class="nav-link {{ _linkCheck('lang/*') }}">
                        <i class="fas fa-language nav-icon"></i>
                        <p>
                            Dil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.lang.all') }}" class="nav-link {{ _linkCheck('lang/all') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dillər</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('back.lang.create') }}"  class="nav-link {{ _linkCheck('lang/new') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Dil</p>
                            </a>
                            
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item {{ _linkCheck('setting/*','menu-open') }}">
                    <a href="#" class="nav-link {{ _linkCheck('setting/*') }}">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                            Tənzimləmələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.setting.files') }}" class="nav-link {{ _linkCheck('setting/files') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fayllar</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route('back.setting.text') }}" class="nav-link {{ _linkCheck('setting/text') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('back.setting.contact') }}" class="nav-link {{ _linkCheck('setting/contact') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Əlaqə</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ _linkCheck('category/*','menu-open') }}">
                    <a href="#" class="nav-link {{ _linkCheck('category/*') }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>
                            Kateqorya
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.category.all') }}" class="nav-link {{ _linkCheck('category/all') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kateqoryalar</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route('back.category.create') }}" class="nav-link {{ _linkCheck('category/new') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Kateqorya</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('auth.logout')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Çıxış
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>