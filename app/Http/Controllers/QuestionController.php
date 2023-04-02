<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function index()
    {
        $user_id = Session::get('user_id');
        if (empty($user_id)) {
            return redirect()->route('user.index');
        }

        return view('question.index');
    }

    public function answer(Request $request)
    {
        $user_id = Session::get('user_id');
        $question_id = $request->input('question_id');
        $answer_id = $request->input('answer_id');

        $result = new Result();
        $result->user_id = $user_id;
        $result->question_id = $question_id;
        $result->answer_id = $answer_id;
        $result->is_skipped = false;
        $result->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function skip(Request $request)
    {
        $user = User::find(Session::get('user_id'));
        $question_id = $request->question_id;

        // Check if this question has already been answered
        $result = Result::where('user_id', $user->id)
            ->where('question_id', $question_id)
            ->first();

        if ($result) {
            $result->update(['is_skipped' => true]);
        } else {
            $result = new Result();
            $result->user_id = $user->id;
            $result->question_id = $question_id;
            $result->is_skipped = true;
            $result->save();
        }

        return response()->json(['status' => 'success']);
    }

    public function results()
    {
        $user = User::findOrFail(session('user_id'));

        $results = Result::with(['question', 'answer'])
            ->where('user_id', $user->id)
            ->get();

        $totalQuestions = Question::count();

        $correctAnswers = $results->filter(function ($result) {
            return $result->answer && $result->answer->is_correct;
        })->count();

        $skippedQuestions = $results->where('is_skipped', true)->count();
        $wrongAnswers = $totalQuestions - $correctAnswers - $skippedQuestions;

        return view('user.result', [
            'results' => $results,
            'correctAnswers' => $correctAnswers,
            'wrongAnswers' => $wrongAnswers,
            'skippedQuestions' => $skippedQuestions,
            'totalQuestions' => $totalQuestions,
        ]);
    }

    public function loadQuestion(Request $request)
    {
        $user = User::find(Session::get('user_id'));

        $next_question = Question::with(['answers' => function ($query) {
            $query->select('id', 'question_id', 'answer');
        }])->select('id', 'question')
            ->whereNotIn('id', function ($query) use ($user) {
                $query->select('question_id')
                    ->from('results')
                    ->where('user_id', $user->id);
            })
            ->inRandomOrder()
            ->first();


        if ($next_question) {
            return response()->json([
                'status' => 'success',
                'question' => $next_question
            ]);
        } else {

            return response()->json([
                'status' => 'finished'
            ]);
        }
    }
}
