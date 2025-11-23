<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
})->name('landing');

Route::get('/api/ping', function () {
    return response()->json([
        'pong' => true,
        'time' => now()->toIso8601String(),
        'app' => config('app.name'),
    ]);
})->name('api.ping');

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

