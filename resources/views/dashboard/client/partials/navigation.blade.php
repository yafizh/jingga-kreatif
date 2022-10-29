<nav>
    <div class="navigation">
        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 1 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Pengenalan</h6>
        </div>

        <div class="line {{ $active_navigation >= 2 ? 'navigation-active' : '' }}"></div>

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 2 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Pendaftaran</h6>
        </div>

        <div class="line {{ $active_navigation >= 3 ? 'navigation-active' : '' }}"></div>

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 3 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Mempelai Pria</h6>
        </div>

        <div class="line {{ $active_navigation >= 4 ? 'navigation-active' : '' }}"></div>

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 4 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Mempelai Wanita</h6>
        </div>

        <div class="line {{ $active_navigation >= 5 ? 'navigation-active' : '' }}"></div>

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 5 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Pemilihan Vendor</h6>
        </div>

        <div class="line {{ $active_navigation >= 6 ? 'navigation-active' : '' }}"></div>

        <div class="circle">
            <div class="outer mb-3 {{ $active_navigation >= 6 ? 'navigation-active' : '' }}">
                <div class="inner"></div>
            </div>
            <h6>Pembayaran</h6>
        </div>
    </div>
</nav>
