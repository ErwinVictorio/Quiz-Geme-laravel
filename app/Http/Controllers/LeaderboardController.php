<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // --- Overall leaders (sum of best scores per quiz) ---
        // Overall leaders (SAFE for ONLY_FULL_GROUP_BY)
        $leaders = DB::table('user_quizzes as uq')
            ->leftJoin('users as u', 'u.id', '=', 'uq.user_id')
            ->selectRaw('uq.user_id as id')
            ->selectRaw('MAX(COALESCE(u.name, CONCAT("User #", uq.user_id))) as name')
            ->selectRaw('SUM(uq.score) as score')
            ->groupBy('uq.user_id')
            ->orderByDesc('score')
            ->orderBy('name')
            ->get();

        // Per-topic rows for leaderboard
        $byTopic = DB::table('user_quizzes as uq')
            ->leftJoin('users as u', 'u.id', '=', 'uq.user_id')
            ->join('quizzes as q', 'q.id', '=', 'uq.quiz_id')
            ->leftJoin('topics as t', 't.id', '=', 'q.topic_id')
            ->selectRaw('COALESCE(u.id, uq.user_id) as user_id')
            ->selectRaw('COALESCE(u.name, CONCAT("User #", uq.user_id)) as name')
            ->selectRaw('COALESCE(t.title, CONCAT("Quiz #", q.id)) as topic')
            ->addSelect('uq.score', 't.id as topic_id', 'q.id as quiz_id')
            // IMPORTANT: order by the expressions, not the aliases
            ->orderByRaw('COALESCE(u.name, CONCAT("User #", uq.user_id)) ASC')
            ->orderByRaw('COALESCE(t.title, CONCAT("Quiz #", q.id)) ASC')
            ->get();


        // Optional filter: /leaderboard?user=1 → show only that user's topic scores
        if ($request->filled('user')) {
            $byTopic = $byTopic->where('user_id', (int) $request->query('user'))->values();
        }

        // Group by user for easy rendering
        $byUser = $byTopic->groupBy('user_id');

        return view('LeaderBoard', compact('leaders', 'byUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
