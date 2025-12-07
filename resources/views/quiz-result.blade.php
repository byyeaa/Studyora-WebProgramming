@extends('layouts.app')

@section('content')

<style>
    .summary-card {
        max-width: 520px;
        width: 100%;
        border-radius: 14px;
        border: 2px solid #cfe8ff;
        box-shadow: 0 6px 10px rgba(0,0,0,0.05);
        padding: 30px;
        background: #fff;
    }

    .small-pill {
        border-radius: 999px;
        padding: 8px 20px;
        box-shadow: 0 6px 8px rgba(0,0,0,0.12);
        border: 1px solid rgba(0,0,0,0.08);
        background: white;
    }

    .big-finish {
        border-radius: 999px;
        padding: 14px 24px;
        width: 80%;
        background: #bfe0ff;
        color: #0b1846;
        font-weight: 700;
        border: none;
        box-shadow: inset 0 6px 0 rgba(0,0,0,0.06);
    }

    .bottom-actions { 
        margin-top: 40px; 
        display:flex; 
        gap:20px; 
        justify-content:center; 
    }

    .finish-wrapper { 
        margin-top: 40px; 
        display:flex; 
        justify-content:center; 
    }
</style>


<div class="container py-5">

    {{-- Judul --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold">Kuis selesai!</h2>
    </div>

    {{-- Summary Card --}}
    <div class="d-flex justify-content-center mb-4">
        <div class="summary-card text-center">
            <h4 class="mb-3">Summary</h4>

            <div class="d-flex justify-content-between px-5 mb-2">
                <span class="fw-semibold text-success">Benar:</span>
                <span class="fw-bold text-success">{{ $benar }}</span>
            </div>

            <div class="d-flex justify-content-between px-5 mb-3">
                <span class="fw-semibold text-danger">Salah:</span>
                <span class="fw-bold text-danger">{{ $salah }}</span>
            </div>

            {{-- Lihat hasil --}}
            <div class="mt-3">
                <a href="{{ route('quiz.finish', $result->id ?? 0) }}" class="small-pill text-decoration-none">
                    Lihat hasil
                </a>
            </div>
        </div>
    </div>

    {{-- Tombol kecil --}}
    <div class="bottom-actions">
    <a href="{{ route('quiz.index') }}" class="btn btn-outline-primary small-pill text-decoration-none">
        Next quiz
    </a>

    <a href="{{ route('quiz.start', $quiz->id) }}" class="btn btn-outline-primary small-pill text-decoration-none">
        Ulangi kuis
    </a>
</div>

<div class="finish-wrapper">
    <a href="{{ route('home') }}" class="btn big-finish text-center text-decoration-none">
        Selesai
    </a>
</div>


</div>

@endsection
