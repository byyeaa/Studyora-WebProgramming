@extends('layouts.landing-nav')

@section('content')

{{-- HERO SECTION --}}
<div class="container-fluid px-0 ">
    <div class="row g-0 align-items-center" style="background-color:#E9FBED;">
        {{-- Text Content --}}
        <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <h1 class="fw-bold" style="font-size: 36px; color:#0b1846;">Kuasai Materi, Cara Seru.</h1>
            <p style="color:#0b1846;">Kuis interaktif, penjelasan ringkas, progres belajar yang terlihat</p>
            <a href="{{ route('login') }}" class="btn btn-dark fw-bold" style="border-radius:10px; padding:10px 25px;">Mulai Sekarang</a>
        </div>

        {{-- Image --}}
        <div class="col-lg-6 p-0">
            <img src="{{ asset('images/LandingPageBanner.png') }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Landing Banner">
        </div>
    </div>
</div>

{{-- WHY SECTION --}}
<div class="container mt-5 mb-5">
    <h3 class="fw-bold mb-4" style="font-size:28px; color:#0b1846;">Kenapa Studyora?</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 rounded-3 d-flex flex-column justify-content-between" style="background:#b9d7ff;">
                <div>
                    <h5 class="fw-bold">Kuis Interaktif</h5>
                    <p>Latihan soal yang seru, penjelasan jelas, langsung bikin paham!</p>
                </div>
                <img src="images/LandingPage1.png" height="150" class="mx-auto" alt="Illustration 1">
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded-3 d-flex flex-column justify-content-between" style="background:#e7b6b6;">
                <div>
                    <h5 class="fw-bold">Lihat Progressmu</h5>
                    <p>Lihat perkembangan belajarmu dari waktu ke waktu — bikin makin pede!</p>
                </div>
                <img src="images/LandingPage2.png" height="150" class="mx-auto" alt="Illustration 2">
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded-3 d-flex flex-column justify-content-between" style="background:#bbeecb;">
                <div>
                    <h5 class="fw-bold">Kumpulkan Poin</h5>
                    <p>Jawab kuis, naik level, dan buka badge kece tiap kamu belajar!</p>
                </div>
                <img src="images/LandingPage3.png" height="150" class="mx-auto" alt="Illustration 3">
            </div>
        </div>

    </div>
</div>


@endsection
