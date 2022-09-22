<nav>
    <div class="navigation">

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 1 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Pengenalan</h6>
        </div>

        <div class="line {{ $active_navigation >= 2 ? 'navigation-active' : '' }}"></div>

        <a href="/dashboard/registration" class="text-decoration-none text-reset">
            <div class="circle">
                <div class="outer mb-3 {{ $active_navigation >= 2 ? 'navigation-active' : '' }}">
                    <div class="inner"></div>
                </div>
                <h6>Pendaftaran</h6>
            </div>
        </a>

        <div class="line {{ $active_navigation >= 3 ? 'navigation-active' : '' }}"></div>

        <a href="/dashboard/vendor" class="text-decoration-none text-reset">
            <div class="circle">
                <div class="outer mb-3 {{ $active_navigation >= 3 ? 'navigation-active' : '' }}">
                    <div class="inner"></div>
                </div>
                <h6>Pemilihan Vendor</h6>
            </div>
        </a>

        <div class="line {{ $active_navigation >= 4 ? 'navigation-active' : '' }}"></div>

        <a href="/dashboard/groom" class="text-decoration-none text-reset">
            <div class="circle">
                <div class="outer mb-3 {{ $active_navigation >= 4 ? 'navigation-active' : '' }}">
                    <div class="inner"></div>
                </div>
                <h6>Mempelai Pria</h6>
            </div>
        </a>

        <div class="line {{ $active_navigation >= 5 ? 'navigation-active' : '' }}"></div>

        <a href="/dashboard/bride" class="text-decoration-none text-reset">
            <div class="circle">
                <div class="outer mb-3 {{ $active_navigation >= 5 ? 'navigation-active' : '' }}">
                    <div class="inner"></div>
                </div>
                <h6>Mempelai Wanita</h6>
            </div>
        </a>


        <div class="line {{ $active_navigation >= 6 ? 'navigation-active' : '' }}"></div>

        <a href="/dashboard/meeting" class="text-decoration-none text-reset">
            <div class="circle">
                <div class="outer mb-3 {{ $active_navigation >= 6 ? 'navigation-active' : '' }}">
                    <div class="inner"></div>
                </div>
                <h6>Riwayat Meeting</h6>
            </div>
        </a>

        <div class="line"></div>

        <div class="circle">
            <div class="outer mb-3">
                <div class="inner"></div>
            </div>
            <h6>Bukti Pembayaran</h6>
        </div>
    </div>
</nav>
