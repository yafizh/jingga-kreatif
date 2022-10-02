@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Detail Karyawan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card card-primary shadow">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-center pt-4">
                                    <img src="{{ asset('storage/' . $employee->photo) }}"
                                        style="max-width: 240px; aspect-ratio: 3 / 4; object-fit: cover;">
                                </div>
                                <div class="p-4">
                                    <h4 class="text-center mb-0">{{ $employee->name }}</h4>
                                    <h6 class="text-center text-muted">{{ $employee->position }}</h6>
                                    <br>
                                    <h5><i class="fas fa-mobile-alt"></i> {{ $employee->phone_number }}</h5>
                                    <h5><i class="fa-regular fa-envelope"></i> {{ $employee->email }}</h5>
                                    <div class="mt-5 d-flex justify-content-between">
                                        <a href="/dashboard/employee" class="btn btn-secondary">Kembali</a>
                                        <div class="d-flex">
                                            <a href="/dashboard/employee/{{ $employee->id }}/edit"
                                                class="btn btn-warning mr-1">Edit</a>
                                            <form action="/dashboard/employee/{{ $employee->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Hapus </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
