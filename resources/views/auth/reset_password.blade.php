@extends('auth.layout.main')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="/images/logo.png" style="width: 100%;">
            </div>
            <div class="card-body">
                @if (session()->has('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('failed') }}
                    </div>
                @endif
                <form action="/reset-password/{{ $email }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password Baru" name="new_password"
                            autocomplete="new-password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                            name="confirm_new_password" autocomplete="new-password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-3" name="submit">Perbaharui
                                Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
