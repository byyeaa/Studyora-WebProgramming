<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/home', [QuizController::class, 'home'])->name('home');

    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{id}/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::get('/quiz/{quizId}/question', [QuizController::class, 'question'])->name('quiz.question');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/result/{resultId}', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/quiz/finish/{resultId}', [QuizController::class, 'finish'])->name('quiz.finish');
    Route::get('/quiz/search', [QuizController::class, 'search'])->name('quiz.search');

    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
    Route::get('/progress', [QuizController::class, 'progress'])->name('progress');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
