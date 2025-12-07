<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', [QuizController::class, 'home'])->name('home');

// Halaman daftar kuis
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

// Mulai kuis → halaman pertanyaan
Route::get('/quiz/{id}/start', [QuizController::class, 'start'])->name('quiz.start');

//
Route::get('/quiz/{quizId}/question', [QuizController::class, 'question'])->name('quiz.question');

// Submit jawaban quiz
Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// Halaman hasil
Route::get('/quiz/result/{resultId}', [QuizController::class, 'result'])->name('quiz.result');

//Halaman lihat detail hasil

Route::get('/quiz/finish/{resultId}', [QuizController::class, 'finish'])->name('quiz.finish');

//Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

//progress
Route::get('/progress', [QuizController::class, 'progress'])->name('progress');



