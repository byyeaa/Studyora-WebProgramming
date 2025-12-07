@extends('layouts.landing-nav')

@section('content')

<style>
    .hero-title {
        font-size: 36px;
        font-weight: 700;
        color: #0b1846;
    }

    .hero-btn {
        background: #0b1846;
        border-radius: 10px;
        padding: 10px 25px;
        color: white;
        font-weight: 600;
    }

    .why-title {
        font-size: 28px;
        font-weight: 700;
        color: #0b1846;
    }

    .why-card {
        border-radius: 15px;
        padding: 25px;
        height: 200px;
    }
</style>

{{-- HERO SECTION --}}
<div class="container mt-5">
    <div class="row align-items-center">

        {{-- TEXT --}}
        <div class="col-md-6">
            <h1 class="hero-title">Kuasi Materi, Cara Seru.</h1>
            <p class="mt-3" style="color:#333;">
                Kuis interaktif, penjelasan ringkas, progres belajar yang terlihat.
            </p>
            <button class="hero-btn mt-3">Mulai Sekarang</button>
        </div>

        {{-- IMAGE --}}
        <div class="col-md-6">
            <img src="/landing-hero.png" class="img-fluid">
        </div>
    </div>
</div>

{{-- WHY SECTION --}}
<div class="container mt-5 mb-5">
    <h3 class="why-title mb-4">Kenapa Studyora?</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="why-card" style="background:#b9d7ff;">
                <h5 class="fw-bold">Kuis Interaktif</h5>
                <p>Latihan soal yang seru, penjelasan jelas, langsung bikin paham!</p>
                <img src="/illus1.png" height="80" class="float-end">
            </div>
        </div>

        <div class="col-md-4">
            <div class="why-card" style="background:#e7b6b6;">
                <h5 class="fw-bold">Lihat Progressmu</h5>
                <p>Lihat perkembangan belajarmu dari waktu ke waktu — bikin makin pede!</p>
                <img src="/illus2.png" height="80" class="float-end">
            </div>
        </div>

        <div class="col-md-4">
            <div class="why-card" style="background:#bbeecb;">
                <h5 class="fw-bold">Kumpulkan Poin</h5>
                <p>Jawab kuis, naik level, dan buka badge kece tiap kamu belajar!</p>
                <img src="/illus3.png" height="80" class="float-end">
            </div>
        </div>

    </div>
</div>

@endsection
