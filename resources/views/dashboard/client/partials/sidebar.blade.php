<aside class="jingga-shadow pt-3 px-4 closed">
    <div class="brand mb-3">
        <div class="brand-logo"></div>
        <h6 class="text-primary">Jingga Kreatif</h6>
        <button type="button" class="btn btn-primary" id="navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <hr>
    <div class="menu w-100">
        <div class="sidebar-item my-3 sidebar-active">
            <div class="mb-2">
                <i class="sidebar-icon fa-solid fa-house"></i>
            </div>
            <h6 class="m-0">Utama</h6>
        </div>
        <div class="sidebar-item my-3">
            <div class="mb-2">
                <i class="sidebar-icon fa-solid fa-user"></i>
            </div>
            <h6 class="m-0 text-center">Perbaharui Data</h6>
        </div>
        <div class="sidebar-item my-3" onclick="return confirm('Are You Sure?')">
            <div class="mb-2">
                <i class="sidebar-icon fa-solid fa-right-from-bracket"></i>
            </div>
            <h6 class="m-0">Keluar</h6>
        </div>
    </div>
</aside>
<script>
    document.querySelector('#navbar-toggle').addEventListener('click', () => {
        document.querySelector('aside').classList.toggle("open");
    });
</script>
