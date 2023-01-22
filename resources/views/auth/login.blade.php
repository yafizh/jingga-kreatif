@extends('auth.layout.main')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/">
                    <img src="/images/logo.png" style="width: 100%;">
                </a>
            </div>
            <div class="card-body">
                @if (session()->has('auth'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('auth') }}
                    </div>
                @endif
                @if (session()->has('register'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('register') }}
                    </div>
                @endif
                @if (session()->has('reset_password'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('reset_password') }}
                    </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off"
                            required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-3" name="submit">Login</button>
                            <a href="/forgot-password">Lupa Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
