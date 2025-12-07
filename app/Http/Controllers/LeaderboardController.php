<?php

namespace App\Http\Controllers;

use App\Models\Quiz_result;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
{
    // Ambil hasil quiz, urutkan dari yang paling tinggi
    $leaders = Quiz_result::with('user')
        ->orderByDesc('score')
        ->get();

    // Kalikan 10 di sini
    foreach ($leaders as $item) {
        $item->final_points = $item->score * 10;
    }

    return view('leaderboard', compact('leaders'));
}


}
