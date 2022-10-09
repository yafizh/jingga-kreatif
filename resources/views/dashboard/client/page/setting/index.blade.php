@extends('dashboard.client.layout.main')

@section('content')
    <style>
        .col-6:hover {
            color: var(--primary-color);
            cursor: pointer;
        }
    </style>
    <div class="row w-100">
        <div class="col-12">
            <h3 class="my-4">Perbaharui Data</h3>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 mb-3">
            <a href="/client/{{ $client }}/edit" class="text-reset text-decoration-none">
                <div
                    class="p-4 bg-white jingga-shadow rounded-2 text-center w-100 h-100 d-flex align-items-center justify-content-center">
                    <div>
                        <i class="sidebar-icon fa-solid fa-user mb-2"></i>
                        <h6 class="m-0">Profil</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 mb-3">
            <a href="/groom/{{ $groom }}/edit" class="text-reset text-decoration-none">
                <div
                    class="p-4 bg-white jingga-shadow rounded-2 text-center w-100 h-100 d-flex align-items-center justify-content-center">
                    <div>
                        <i class="sidebar-icon fa-solid fa-child mb-2"></i>
                        <h6 class="m-0">Identitas Mempelai Pria</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 mb-3">
            <a href="/bride/{{ $bride }}/edit" class="text-reset text-decoration-none">
                <div
                    class="p-4 bg-white jingga-shadow rounded-2 text-center w-100 h-100 d-flex align-items-center justify-content-center">
                    <div>
                        <i class="sidebar-icon fa-solid fa-child-dress mb-2"></i>
                        <h6 class="m-0">Identitas Mempelai Wanita</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 mb-3">
            <a href="/theme-vendor/{{ $wedding }}/edit" class="text-reset text-decoration-none">
                <div
                    class="p-4 bg-white jingga-shadow rounded-2 text-center w-100 h-100 d-flex align-items-center justify-content-center">
                    <div>
                        <i class="sidebar-icon fa-solid fa-clipboard mb-2"></i>
                        <h6 class="m-0">Konsep dan Vendor</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 mb-3">
            <a href="/client/{{ $client }}/edit?q=change-password" class="text-reset text-decoration-none">
                <div
                    class="p-4 bg-white jingga-shadow rounded-2 text-center w-100 h-100 d-flex align-items-center justify-content-center">
                    <div>
                        <i class="sidebar-icon fa-solid fa-lock mb-2"></i>
                        <h6 class="m-0">Ganti Password</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
