@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h5 class="fw-bold">Pertanyaan {{ $currentIndex + 1 }}</h5>

    <div class="card shadow-sm p-4 my-4" style="border-radius: 12px;">
        <p>{{ $question->question_text }}</p>

        <form action="{{ route('quiz.submit', $quizId) }}" method="POST">
            @csrf

            <div class="row">
                @foreach($question->options as $opt)
                <div class="col-md-6 mb-3">
                    <label class="btn btn-info text-dark w-100 p-3 rounded-3">
                        <input type="radio" name="option" value="{{ $opt->id }}" required> 
                        {{ $opt->option_text }}
                    </label>
                </div>
                @endforeach
                </div>

            <div class="text-center">
                <button class="btn btn-success btn-lg px-5">
                    @if($isLast)
                        Selesai
                    @else
                        Selanjutnya
                    @endif
                </button>

            </div>

        </form>
    </div>

</div>
@endsection
