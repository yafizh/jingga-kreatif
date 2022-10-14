@extends('dashboard.client.layout.main')

@section('content')
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4 text-center">Ganti Password</h3>
        </div>
        <div class="col-12 col-lg-8 col-xl-4 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="/client/change-password/{{ $client->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="password"
                            placeholder="old password" name="old_password" required>
                        <label for="old_password">Password Lama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="password"
                            placeholder="new password" name="new_password" required>
                        <label for="new_password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="confirm_password"
                            placeholder="confirm password" name="confirm_password" required>
                        <label for="confirm_password">Konfirmasi Password</label>
                    </div>
                    <div class="d-flex justify-content-between w-100 mt-4">
                        <a href="/setting" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary text-white">
                            Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
