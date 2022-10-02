<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="portfolio.php">
            <img src="/images/logo.png" width="150" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav w-100 mb-2 mb-lg-0 justify-content-center d-flex">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'home' ? 'text-primary' : 'text-white' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'vendor' ? 'text-primary' : 'text-white' }}" href="/vendor">Vendor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'crew' ? 'text-primary' : 'text-white' }}" href="/crew">Crew</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="/login" class="me-3 btn btn-outline-primary text-white">Login</a>
        </div>
    </div>
</nav>
