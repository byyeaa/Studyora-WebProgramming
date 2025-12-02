@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h5 class="fw-bold">{{ $quiz->title }}</h5>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf

        {{-- PAKAI COLLECTION YANG SUDAH DI-RANDOM --}}
        @foreach($questions as $i => $q)
        <div class="card shadow-sm p-4 my-4" style="border-radius: 12px;">
            <h6 class="fw-bold">Q{{ $i+1 }}</h6>
            <p>{{ $q->question_text }}</p>

            <div class="row">
                @foreach($q->options as $opt)
                <div class="col-md-6 mb-3">
                    <label class="btn btn-info text-dark w-100 p-3 rounded-3">
                        <input type="radio" name="question_{{ $q->id }}" value="{{ $opt->id }}" required> 
                        {{ $opt->option_text }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <button class="btn btn-success btn-lg px-5">Selesai</button>
        </div>

    </form>

</div>
@endsection
