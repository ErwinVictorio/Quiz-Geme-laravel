<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicsController;
use App\Models\Topics;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaygroundController;



Route::middleware(['authGate:guest'])->group(function () {

    Route::get('/', [AuthController::class, 'showLogin'])->name('login.view');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.view');
});
 Route::post('/register-account', [AuthController::class, 'Register'])->name('register');
 Route::post('/login-account', [AuthController::class, 'login'])->name('login');
 Route::get('/logout',[AuthController::class,'logout'])->name('logout');



// Route::middleware()      
Route::middleware(['authGate'])->group(function () {

    // routes/web.php


Route::get('/playground', [PlaygroundController::class, 'index'])->name('playground.index');
Route::post('/playground/run', [PlaygroundController::class, 'run'])->name('playground.run'); // POST from the page

    Route::get('/home', function () {
        return view('Home');
    })->name('home.view');
    Route::get('/topics', [TopicsController::class, 'index'])->name('topics.view');
    Route::get('/topic-info/{id}', [TopicsController::class, 'show'])->name('viewTopic_info');
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.global');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.global');
});
