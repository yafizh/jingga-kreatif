<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/images/logo.png" alt="AdminLTE Logo" class="w-100">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ in_array($active, ['vendor_type', 'vendor', 'theme']) ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ in_array($active, ['vendor_type', 'vendor', 'theme']) ? 'active' : '' }}">
                        <i class="nav-icon far fa-folder"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/vendor-type"
                                class="nav-link {{ $active == 'vendor_type' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Vendor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/vendor" class="nav-link {{ $active == 'vendor' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/theme" class="nav-link {{ $active == 'theme' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konsep</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/employee" class="nav-link {{ $active == 'employee' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/client" class="nav-link {{ $active == 'client' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Data Klien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/wedding" class="nav-link {{ $active == '' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Pengajuan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
