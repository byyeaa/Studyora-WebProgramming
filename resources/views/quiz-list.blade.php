@extends('layouts.app')

@section('content')
<div class="container py-4">

    @if($quizzes->count())
        <h4 class="fw-bold mb-3">Kuis Populer</h4>

        <div class="card mb-5 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0 align-items-stretch">

                <div class="col-md-4">
                    <img src="{{ asset('images/' . $quizzes[0]->thumbnail) }}"
                         class="w-100 object-fit-cover"
                             style="height:160px;"
                             alt="thumbnail">
                </div>

                <div class="col-md-8 d-flex flex-column justify-content-center p-4">
                    <h5 class="fw-bold mb-1">
                        {{ $quizzes[0]->title }}
                    </h5>

                    <p class="text-muted">
                        {{ $quizzes[0]->description }}
                    </p>

                    <a href="{{ route('quiz.start', $quizzes[0]->id) }}"
                       class="btn rounded-pill px-4 w-auto align-self-start text-white"
                       style="background-color:#1A2A4F;">
                        Mulai
                    </a>
                </div>
            </div>
        </div>

        <h4 class="fw-bold mb-3">Rekomendasi Kuis Untukmu</h4>

        <div class="row">
            @foreach($quizzes as $quiz)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm rounded-4 overflow-hidden">

                        <img src="{{ asset('images/' . $quiz->thumbnail) }}"
                             class="w-100 object-fit-cover"
                             style="height:160px;"
                             alt="thumbnail">

                        <div class="card-body">
                            <h6 class="fw-bold">{{ $quiz->title }}</h6>
                            <p class="text-muted small">{{ $quiz->description }}</p>

                            <a href="{{ route('quiz.start', $quiz->id) }}"
                               class="btn rounded-pill px-3 py-1 mt-2 w-auto text-white"
                               style="background-color:#1A2A4F;">
                                Mulai Sekarang
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <img src="{{ asset('images/notfound.png') }}" width="140" class="mb-3">
            <p class="text-muted fw-semibold">Kuis tidak ditemukan</p>
        </div>
    @endif

</div>
@endsection
