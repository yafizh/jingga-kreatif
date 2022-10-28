@extends('dashboard.client.layout.main')

@section('content')
    <div class="row w-100 justify-content-start h-100">
        <div class="col-12">
            <h3 class="my-4">Riwayat Meeting</h3>
        </div>
        @if ($meetings->count())
            @foreach ($meetings as $meeting)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                    <div class="bg-white jingga-shadow rounded-2 w-100 h-100">
                        <img src="{{ asset('storage/' . $meeting->photo) }}"
                            style="height: 192px; width: 100%; object-fit: cover;">
                        <div class="p-3">
                            <h4 class="line-champ">{{ $meeting->topic }}</h4>
                            <h6 class="text-muted">{{ $meeting->meeting_day }}, {{ $meeting->meeting_date }}</h6>
                            <p class="line-champ">{{ $meeting->body }}</p>
                            <div class="d-flex justify-content-end pt-3">
                                <button class="btn-detail btn btn-primary rounded-0">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <h5 class="text-center text-muted">Tidak Ada Riwayat Pertemuan</h5>
            </div>
        @endif
    </div>

    {{-- Detail Modal --}}
    <div class="modal fade" id="meetingDetailModal" tabindex="-1" aria-labelledby="meetingDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="meetingDetailModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <img src="" style="height: 192px; width: 100%; object-fit: cover;">
                    <p class="p-3"></p>
                </div>
            </div>
        </div>
    </div>
@endsection
