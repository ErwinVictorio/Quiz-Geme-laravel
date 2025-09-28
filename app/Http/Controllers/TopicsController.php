<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\Quiz;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $topics = \App\Models\Topics::orderBy('order')->get();

        $grouped = $topics->groupBy('category');

        return view('tupic-list', [
            'grouped' => $grouped,
        ]);
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
        $topicInfo  = Topics::select('content', 'title')->where('id', $id)->first();
        $quiz = \Illuminate\Support\Facades\DB::table('quizzes')->select('id', 'title')->where('topic_id', $id)->first();

        return view('tupic-info', [
            'topic_info' => $topicInfo,
            'quiz' => $quiz
        ]);
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
