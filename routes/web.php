<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;

Route::middleware('auth')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks/{task}/markAsCompleted', [TaskController::class, 'markAsCompleted']);
    Route::post('/tasks/{task}/markAsNotCompleted', [TaskController::class, 'markAsNotCompleted']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);

    Route::post('/logout', Logout::class);

    Route::view('/', 'home');
});

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Register::class);
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Login::class);
});