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
    public function home()
    {
        $user = auth()->user() ?? (object)['name' => 'User'];
        $recommendedQuizzes = Quiz::inRandomOrder()->take(2)->get();
        $lastQuizProgress = Quiz_result::with('quiz')->latest()->first();

        $totalQuizzes = Quiz_result::count();
        $level = floor($totalQuizzes / 10) + 1;

        return view('home', [
            'user' => $user,
            'recommendedQuizzes' => $recommendedQuizzes,
            'lastQuizProgress' => $lastQuizProgress,
            'level' => $level
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $quizzes = Quiz::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })->get();

        return view('quiz-list', compact('quizzes', 'search'));
    }

    public function start($id)
    {
        $quiz = Quiz::with(['questions.options'])->findOrFail($id);

        $questions = $quiz->questions->shuffle();

        session(['quiz_questions_'.$quiz->id => $questions->pluck('id')->toArray()]);
        session(['quiz_current_'.$quiz->id => 0]);
        session()->forget('quiz_result_'.$quiz->id);
        session(['quiz_current_'.$quiz->id => 0]);

        return redirect()->route('quiz.question', $quiz->id);
    }

    public function question($quizId)
    {
        $questionIds = session('quiz_questions_'.$quizId);
        $currentIndex = session('quiz_current_'.$quizId, 0);

        if (!isset($questionIds[$currentIndex])) {
            return redirect()->route('quiz.finish', $quizId);
        }

        $question = Question::with('options')->find($questionIds[$currentIndex]);
        $isLast = $currentIndex === count($questionIds) - 1;

        return view('questions', compact('quizId', 'question', 'currentIndex', 'isLast'));
    }

    public function submit(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        $questionIds = session('quiz_questions_'.$quizId);
        $currentIndex = session('quiz_current_'.$quizId, 0);

        $questionId = $questionIds[$currentIndex];
        $question = Question::with('options')->findOrFail($questionId);

        $selected = $request->input('option');

        $isCorrect = Option::where('id', $selected)
                        ->where('is_correct', 1)
                        ->exists();

        $resultId = session('quiz_result_'.$quizId);
        if (!$resultId) {
            $result = Quiz_result::create([
                'user_id' => null,
                'quiz_id' => $quizId,
                'score' => 0
            ]);
            session(['quiz_result_'.$quizId => $result->id]);
            $resultId = $result->id;
        }

        Quiz_user_answer::create([
            'quiz_result_id' => $resultId,
            'question_id' => $questionId,
            'option_id' => $selected,
            'is_correct' => $isCorrect
        ]);

        $totalCorrect = Quiz_user_answer::where('quiz_result_id', $resultId)
                            ->where('is_correct', 1)
                            ->count();

        Quiz_result::find($resultId)->update(['score' => $totalCorrect]);

        session(['quiz_current_'.$quizId => $currentIndex + 1]);

        if (!isset($questionIds[$currentIndex + 1])) {
            return redirect()->route('quiz.result', $resultId);
        }

        return redirect()->route('quiz.question', $quizId);
    }

    public function result($resultId)
    {
        $result = Quiz_result::with(['quiz', 'answers.option', 'answers.question.options'])
                ->findOrFail($resultId);

        $benar = $result->answers->where('is_correct', 1)->count();
        $total = $result->answers->count();
        $salah = $total - $benar;

        $quiz = $result->quiz;

        return view('quiz-result', [
            'result' => $result,
            'benar' => $benar,
            'salah' => $salah,
            'quizId' => $quiz->id,
            'quiz' => $quiz
        ]);
    }

    public function progress()
    {
        $dates = Quiz_result::selectRaw('DATE(created_at) as d')
            ->pluck('d')
            ->unique();

        $streakIndexes = $dates->map(function($d) {
            return date('N', strtotime($d)) - 1;
        })->toArray();

        $streakDays = count($streakIndexes);

        $totalQuizzes = Quiz_result::count();
        $totalQuestions = Quiz_user_answer::count();

        $ongoing = Quiz_result::with('quiz')
            ->get()
            ->map(function ($r) {
                $total = Quiz_user_answer::where('quiz_result_id', $r->id)->count();
                $benar = Quiz_user_answer::where('quiz_result_id', $r->id)
                            ->where('is_correct', 1)
                            ->count();

                $progress = $total > 0 ? round(($benar / $total) * 100) : 0;

                return (object)[
                    'id' => $r->quiz->id,
                    'title' => $r->quiz->title,
                    'progress' => $progress
                ];
            })
            ->filter(fn($q) => $q->progress < 100)
            ->values();

        $level = floor($totalQuizzes / 10) + 1;

        return view('progress', compact(
            'level',
            'streakIndexes',
            'streakDays',
            'totalQuizzes',
            'totalQuestions',
            'ongoing'
        ));
    }

    public function finish($resultId)
    {
        $result = Quiz_result::with([
            'quiz',
            'answers.question.options',
            'answers.option'
        ])->findOrFail($resultId);

        $answers = $result->answers;
        $benar = $answers->where('is_correct', 1)->count();
        $salah = $answers->count() - $benar;

        return view('result-detail', [
            'result' => $result,
            'answers' => $answers,
            'benar' => $benar,
            'salah' => $salah,
            'quiz' => $result->quiz
        ]);
    }
}
