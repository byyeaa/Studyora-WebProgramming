<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Quiz_result;
use App\Models\Quiz_user_answer;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz-list', compact('quizzes'));
    }

    public function start($id)
    {
        $quiz = Quiz::with(['questions.options'])->findOrFail($id);

        // RANDOM QUESTION
        $questions = $quiz->questions->shuffle();

        // Save order used by this user
        session(['quiz_questions_'.$quiz->id => $questions->pluck('id')->toArray()]);

        return view('questions', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        // AMBIL PERTANYAAN YANG DITAMPILKAN DI START()
        $questionIds = session('quiz_questions_'.$id);

        $questions = Question::with('options')->whereIn('id', $questionIds)->get();

        $score = 0;

        $result = QuizResult::create([
            'user_id' => null,
            'quiz_id' => $quiz->id,
            'score' => 0,
        ]);

        foreach ($questions as $q) {
            $selected = $request->input('question_'.$q->id);

            $correct = Option::where('id', $selected)
                             ->where('is_correct', 1)
                             ->exists();

            if ($correct) $score++;

            QuizUserAnswer::create([
                'quiz_result_id' => $result->id,
                'question_id' => $q->id,
                'option_id' => $selected,
                'is_correct' => $correct
            ]);
        }

        $result->update(['score' => $score]);

        return redirect()->route('quiz.result', $result->id);
    }

    public function result($resultId)
    {
        $result = QuizResult::with('quiz')->findOrFail($resultId);
        return view('result', compact('result'));
    }
}
