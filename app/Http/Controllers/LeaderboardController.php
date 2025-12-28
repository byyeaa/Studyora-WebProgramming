<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Ambil user beserta total score dari semua quiz_result
        $leaders = User::withSum('quiz_results', 'score') // hitung total score
                       ->orderByDesc('quiz_results_sum_score') // urut dari tinggi ke rendah
                       ->get();

        // Kalikan 10 jika sesuai logika final_points
        foreach ($leaders as $user) {
            $user->final_points = ($user->quiz_results_sum_score ?? 0) * 10;
        }

        return view('leaderboard', compact('leaders'));
    }
}
