<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="/images/logo.png" alt="AdminLTE Logo" class="w-100">
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li
                    class="nav-item {{ in_array($active, ['vendor_type', 'vendor', 'theme', 'bank']) ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ in_array($active, ['vendor_type', 'vendor', 'theme', 'bank']) ? 'active' : '' }}">
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
                        <li class="nav-item">
                            <a href="/dashboard/bank" class="nav-link {{ $active == 'bank' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/employee" class="nav-link {{ $active == 'employee' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-tie" aria-hidden="true"></i>
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
                <li class="nav-item {{ in_array($active, ['wedding', 'finish', 'cancel']) ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ in_array($active, ['wedding', 'finish', 'cancel']) ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data wedding
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/wedding?q=a"
                                class="nav-link {{ $active == 'wedding' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/wedding?q=finish"
                                class="nav-link {{ $active == 'finish' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/wedding?q=cancel"
                                class="nav-link {{ $active == 'cancel' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batal</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
