@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Detail Meeting</h1>
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
                                <img src="{{ asset('storage/' . $meeting_history->photo) }}"
                                    style="width: 100%; height: 320px; object-fit: cover;">
                                <div class="p-4">
                                    <h4>{{ $meeting_history->topic }}</h4>
                                    <h6 class="text-muted">{{ $meeting_history->meeting_day }},
                                        {{ $meeting_history->meeting_date }}, Pukul {{ $meeting_history->meeting_time }}
                                    </h6>
                                    <p>{{ $meeting_history->body }}</p>
                                    <div class="mt-4 d-flex justify-content-between">
                                        <a href="/dashboard/wedding/{{ $meeting_history->wedding_id }}"
                                            class="btn btn-secondary">Kembali</a>
                                        @if (is_null($meeting_history->wedding->id))
                                            <div class="d-flex">
                                                <a href="/dashboard/meeting-history/{{ $meeting_history->id }}/edit"
                                                    class="btn btn-warning mr-1">Edit</a>
                                                <form action="/dashboard/meeting-history/{{ $meeting_history->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Hapus </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
