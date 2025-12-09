<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('landing');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/home', [QuizController::class, 'home'])->name('home');
// Route::get('/home', function () {
//     return view('home'); // view home
// })->middleware(['auth', 'verified'])->name('home');

Route::get('/home', [QuizController::class, 'home'])->middleware(['auth', 'verified'])->name('home');


// Halaman daftar kuis
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index')->middleware(['auth', 'verified']);

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
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard')->middleware(['auth', 'verified']);

//progress
Route::get('/progress', [QuizController::class, 'progress'])->name('progress')->middleware(['auth', 'verified']);

//profile
//Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit'); //before: profile.index
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');