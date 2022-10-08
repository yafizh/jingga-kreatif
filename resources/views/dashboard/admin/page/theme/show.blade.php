@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Detail Konsep</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <div class="card-body p-0">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($theme->themeImages as $i => $theme_image)
                                            @if (!$i)
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('storage/' . $theme_image->image) }}"
                                                        class="d-block w-100" style="height: 320px; object-fit: cover;">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img src="{{ asset('storage/' . $theme_image->image) }}"
                                                        class="d-block w-100" style="height: 320px; object-fit: cover;">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-target="#carouselExampleControls" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-target="#carouselExampleControls" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </button>
                                </div>
                                <div class="p-4">
                                    <h5>{{ $theme->name }}</h5>
                                    {!! $theme->description !!}
                                    <div class="mt-4 d-flex justify-content-between">
                                        <a href="/dashboard/theme" class="btn btn-secondary">Kembali</a>
                                        <div class="d-flex">
                                            <a href="/dashboard/theme/{{ $theme->id }}/edit"
                                                class="btn btn-warning mr-1">Edit</a>
                                            <form action="/dashboard/theme/{{ $theme->id }}" method="POST">
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
