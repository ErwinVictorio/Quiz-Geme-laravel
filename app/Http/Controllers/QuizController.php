<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    //

        public function show(int $quizId)
    {
        // 1) Quiz
        $quiz = DB::table('quizzes')->where('id', $quizId)->first();
        abort_if(!$quiz, 404, 'Quiz not found');

        // 2) Topic (for breadcrumb/back link)
        $topic = DB::table('topics')->select('id','title')->where('id', $quiz->topic_id)->first();

        // 3) Questions (decode JSON choices into arrays)
        $questions = DB::table('questions')
            ->where('quiz_id', $quizId)
            ->orderBy('order')
            ->get()
            ->map(function ($q) {
                $arr = json_decode($q->choices, true);
                // normalize if numerical array → map to A,B,C,D…
                if (is_array($arr) && array_keys($arr) === range(0, count($arr)-1)) {
                    $letters = range('A', 'Z');
                    $q->choices = collect($arr)->mapWithKeys(fn($v,$i)=>[$letters[$i]=>$v])->toArray();
                } else {
                    $q->choices = $arr ?? [];
                }
                return $q;
            });

        return view('Quizepage', compact('quiz','questions','topic'));
    }


    
    /**
     * Grade and record best score
     * POST /quiz/{quiz}
     */
    public function submit(Request $request, int $quizId)
    {
        //  get the current user login
        $userId = Auth::user()->id;

        // Validate basic payload
        $request->validate([
            'answers' => ['required','array','min:1'],
        ]);

        // Load quiz & questions
        $quiz = DB::table('quizzes')->where('id', $quizId)->first();
        abort_if(!$quiz, 404, 'Quiz not found');

        $questions = DB::table('questions')
            ->where('quiz_id', $quizId)
            ->select('id','correct','points')
            ->get()
            ->keyBy('id');

        // Compute score
        $answers = $request->input('answers', []);      // [question_id => 'A'|'B'|'C'|'D']
        $score   = 0;
        foreach ($answers as $qid => $letter) {
            if (isset($questions[$qid]) &&
                strtoupper($questions[$qid]->correct) === strtoupper($letter)) {
                $score += (int) $questions[$qid]->points;
            }
        }

        // Ensure a row exists (unique user_id+quiz_id)
        DB::table('user_quizzes')->insertOrIgnore([
            'user_id'    => $userId,
            'quiz_id'    => $quizId,
            'score'      => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Keep BEST score
        DB::table('user_quizzes')
            ->where('user_id', $userId)
            ->where('quiz_id', $quizId)
            ->update([
                'score'      => DB::raw('GREATEST(score, '.$score.')'),
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('leaderboard.global') // change if you want to go back to topic/quiz
            ->with('status', "You scored {$score}");
    }
}
