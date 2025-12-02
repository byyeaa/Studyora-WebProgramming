<!-- resources/views/quiz-list.blade.php -->
@extends('layouts.app')

@section('content')
<style>
.section-title {
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 12px;
}
.category-title {
    font-weight: 700;
    margin: 20px 0 10px 0;
}
.quiz-thumb {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 15px;
}
.quiz-card {
    border-radius: 15px;
    padding: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: .2s;
}
.quiz-card:hover {
    transform: translateY(-3px);
}
.popular-box {
    border-radius: 18px;
    padding: 20px;
    background: #faf7ef;
}
.popular-img {
    width: 160px;
    height: auto;
}
</style>

<div class="container py-4">

    <h4 class="fw-bold mb-3">Kuis Populer</h4>

    <div class="card popular-card mb-5">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/praaksara.jpg" class="img-fluid popular-img" alt="cover">
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-center p-4">
                <h5 class="fw-bold mb-1">{{ $quizzes[0]->title ?? 'Belum Ada Kuis' }}</h5>
                <p class="text-muted">{{ $quizzes[0]->description ?? 'Tambahkan kuis di seeder' }}</p>

                @if(isset($quizzes[0]))
                <a href="{{ route('quiz.start', $quizzes[0]->id) }}" class="btn btn-primary px-4 py-2 w-25 rounded-pill">
                    Mulai
                </a>
                @endif
            </div>
        </div>
    </div>


    <h4 class="fw-bold mb-3">Rekomendasi Kuis Untukmu</h4>

    <div class="row">
        @foreach($quizzes as $quiz)
        <div class="col-md-6 mb-4">
            <div class="card quiz-card shadow-sm p-0">
                <img src="/img/praaksara.jpg" class="quiz-item-img w-100" />

                <div class="p-3">
                    <h6 class="fw-bold">{{ $quiz->title }}</h6>
                    <p class="text-muted small">{{ $quiz->description }}</p>

                    <a href="{{ route('quiz.start', $quiz->id) }}" class="btn btn-outline-primary rounded-pill px-3 py-1 mt-2">
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
