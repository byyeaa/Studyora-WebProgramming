<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $quiz = Quiz::create([
            'title' => 'Zaman Praaksara di Indonesia',
            'description' => 'Kuis sejarah Indonesia kuno',
            'thumbnail' => 'praaksara.jpg',
        ]);

        $q1 = $quiz->questions()->create([
            'question_text' => 'Zaman praaksara di Indonesia berakhir ketika masyarakat mulai mengenal?'
        ]);

        $q1->options()->createMany([
            ['option_text' => 'Tulisan', 'is_correct' => true],
            ['option_text' => 'Sistem Barter', 'is_correct' => false],
            ['option_text' => 'Logam', 'is_correct' => false],
            ['option_text' => 'Pertanian', 'is_correct' => false],
        ]);
    }
}
