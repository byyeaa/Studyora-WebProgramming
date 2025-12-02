<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});


// Halaman daftar kuis
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

// Mulai kuis → halaman pertanyaan
Route::get('/quiz/{id}/start', [QuizController::class, 'start'])->name('quiz.start');

// Submit jawaban quiz
Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// Halaman hasil
Route::get('/quiz/result/{resultId}', [QuizController::class, 'result'])->name('quiz.result');

