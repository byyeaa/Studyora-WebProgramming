@extends('layouts.app')

@section('content')

<div class="container py-5 d-flex justify-content-center">

    <div class="card shadow-sm rounded-4 p-4 text-center" style="max-width:520px; width:100%;">

        <h3 class="fw-bold mb-2" >Kuis Selesai!</h3>
        <p class="text-muted mb-4">Ini hasil pengerjaan kuismu</p>

        <div class="border rounded-4 p-4 mb-4">

            <div class="d-flex justify-content-between mb-2">
                <span class="fw-semibold text-success">Benar</span>
                <span class="fw-bold text-success" >{{ $benar }}</span>
            </div>

            <div class="d-flex justify-content-between">
                <span class="fw-semibold text-danger">Salah</span>
                <span class="fw-bold text-danger">{{ $salah }}</span>
            </div>

            <div class="mt-4">
                <a href="{{ route('quiz.finish', $result->id ?? 0) }}"
                   class="btn btn-sm rounded-pill px-4 border-2"
                   style="color:#1A2A4F; border-color:#A3D7FF;">
                    Lihat Detail
                </a>
            </div>

        </div>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="{{ route('quiz.index') }}"
               class="btn btn-sm rounded-pill px-4 border-2"
               style="color:#1A2A4F; border-color:#A3D7FF;">
                Quiz Lain
            </a>

            <a href="{{ route('quiz.start', $quiz->id) }}"
               class="btn btn-sm rounded-pill px-4 border-2"
               style="color:#1A2A4F; border-color:#A3D7FF;">
                Ulangi
            </a>
        </div>

        <a href="{{ route('home') }}"
           class="btn btn-lg w-100 rounded-pill fw-bold text-white "
           style="background-color:#1A2A4F;">
            Selesai
        </a>

    </div>

</div>

@endsection
