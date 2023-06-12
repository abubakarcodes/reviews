<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        {{-- <img loading="lazy" src="{{ asset('assets/img/logo/favicon-32x32.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> --}}
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex mt-3 mb-3 pb-3">
            <div class="image">
                <img loading="lazy" src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name . ' ' . auth()->user()->last_name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.company.index') }}" class="nav-link {{ request()->routeIs('admin.company.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Companies
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.review.index') }}" class="nav-link {{ request()->routeIs('admin.review.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Reviews
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
