@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Halo User --}}
    <h4 class="fw-bold mb-3">Halo, {{ $user->name ?? 'Username' }}!</h4>

    {{-- Card Lanjutkan Mengerjakan --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                <img src="/images/illustration-progress.png" class="img-fluid" alt="Progress">
            </div>
            <div class="col-md-8 p-4 d-flex flex-column justify-content-center">
                <h6 class="fw-semibold">Lanjutkan Mengerjakan</h6>

                <p class="mb-3 text-secondary">
                    {{ $lastQuizProgress->quiz->title ?? 'Belum ada progress' }}
                </p>

                <a href="{{ isset($lastQuizProgress) ? route('quiz.start', $lastQuizProgress->quiz->id) : '#' }}"
                   class="btn btn-primary btn-sm {{ isset($lastQuizProgress) ? '' : 'disabled' }}">
                   {{ isset($lastQuizProgress) ? 'Lanjutkan' : 'Belum Ada' }}
                </a>
            </div>
        </div>
    </div>

    {{-- Rekomendasi Kuis --}}
    <h5 class="fw-semibold mb-3">Rekomendasi Kuis Untukmu</h5>

    <div class="row g-3 mb-5">
        @foreach ($recommendedQuizzes as $quiz)
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <img src="{{ $quiz->thumbnail ?? '/images/default-thumb.jpg' }}" class="card-img-top" alt="thumbnail">
                <div class="card-body">
                    <h6 class="fw-semibold">{{ $quiz->title }}</h6>
                    <a href="{{ route('quiz.start', $quiz->id) }}" class="btn btn-dark btn-sm mt-2">Mulai Sekarang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pilih Mata Pelajaran --}}
    <h5 class="fw-semibold mb-3">Pilih Mata Pelajaran</h5>

    <div class="row g-3">
        @foreach($subjects as $subject)
        <div class="col-md-4 col-6">
            <a href="#" class="text-decoration-none">
                <div class="p-4 rounded text-center shadow-sm"
                     style="background-color: {{ $subject->color }};">
                    <span class="fw-semibold text-dark">{{ $subject->name }}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>

</div>
@endsection
