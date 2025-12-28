<?php

namespace App\Http\Controllers;

use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaders = User::withSum('quizResults', 'score')
                       ->get()
                       ->sortByDesc(fn($user) => $user->quiz_results_sum_score) 
                       ->values();

        foreach ($leaders as $user) {
            $user->final_points = $user->total_points;
        }

        return view('leaderboard', compact('leaders'));
    }
}
