<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show profile page with total score.
     */
    public function index()
    {
        $userId = Auth::id();

        $user = DB::table('users as u')
            ->leftJoin('user_quizzes as uq', 'uq.user_id', '=', 'u.id')
            ->where('u.id', $userId)
            ->select(
                'u.id',
                'u.name',
                'u.email',
                'u.avatar_path',
                DB::raw('COALESCE(SUM(uq.score), 0) as score')
            )
            ->groupBy('u.id','u.name','u.email','u.avatar_path')
            ->first();

        abort_if(!$user, 404);

        $avatarUrl = $user->avatar_path
            ? asset('storage/' . $user->avatar_path)
            : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'U') . '&background=8B2D2D&color=fff';

        // Use the Blade you made at resources/views/profile/edit.blade.php
        return view('userProfile', compact('user','avatarUrl'));
    }

    /**
     * Upload / replace avatar image.
     * Form action: route('profile.avatar'), enctype="multipart/form-data"
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048','dimensions:min_width=100,min_height=100'],
        ]);

        $userId = Auth::id();

        // delete old avatar if present
        $old = DB::table('users')->where('id', $userId)->value('avatar_path');
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        // store new file
        $path = $request->file('avatar')->store('avatars', 'public');

        // persist
        DB::table('users')->where('id', $userId)->update([
            'avatar_path' => $path,
            'updated_at'  => now(),
        ]);

        return back()->with('status', 'Avatar updated!');
    }

    /**
     * Update text fields (name, email).
     * Form action: route('profile.update')
     */
    public function updateProfile(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'name'  => ['required','string','max:120'],
            'email' => ['required','email','max:190',"unique:users,email,{$userId}"],
        ]);

        DB::table('users')->where('id', $userId)->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'updated_at' => now(),
        ]);

        return back()->with('status', 'Profile saved!');
    }
}
