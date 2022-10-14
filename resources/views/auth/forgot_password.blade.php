@extends('auth.layout.main')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="/images/logo.png" style="width: 100%;">
            </div>
            <div class="card-body">
                <form action="/forgot-password" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukan email tang terdaftar" name="email"
                            autocomplete="off" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <button id="reset-password" type="submit" class="btn btn-primary btn-block mb-3"
                                name="submit">Reset Password</button>
                            <a href="/login">Login</a>
                        </div>
                    </div>
                </form>
                <p class="text-center d-none"><strong>Periksa Email Anda Untuk Melakukan Reset Password Pada Akun
                        Anda</strong></p>
            </div>
        </div>
    </div>
@endsection
