<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="{{ route('home.page') }}" target="_blank" class="brand-link d-flex align-items-center">
        <img src="{{ asset('images/logo_simak.svg') }}" width="30" alt="SIMAK Logo" class="m-2">
        <span class="brand-text font-weight-light"><strong>SIMAK</strong> Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="info">
                <div class="user">
                    <h4 class="fw-bold m-0 text-white"><strong>{{ Auth::user()->username }}</strong></h4>
                    <p class="fs-6 text-white">{{ Auth::user()->role }}</p>
                </div>

                <div class="online d-flex align-items-center">
                    <span class="bg-success rounded-circle" style="height: 8px; width: 8px;"></span>
                    <span class="text-success ms-1">Online</span>
                </div>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('client*') ? 'active' : '' }}">
                        <i class="fa-solid fa-database nav-icon"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kuesioner.index') }}"
                                class="nav-link {{ Request::is('client/kuesioner*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kuesioner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.statistic') }}" 
                            class="nav-link {{ Request::is('client/statistic*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistic</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ADMIN --}}
                @if (Auth::user()->role === 'Admin')
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Request::is('administrator*') ? 'active' : '' }}">
                            <i class="fa-solid fa-user-lock nav-icon"></i>
                            <p>
                                Administrator
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ Request::is('administrator/users*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('all.kuesioner') }}"
                                    class="nav-link {{ Request::is('administrator/kuesioner*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Kuesioner</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <hr class="bg-white">
                <li class="nav-item">
                    <a href="{{-- {{ route('home.page') }} --}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-arrow-left"></i>
                        <p>Back to home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logouts') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
