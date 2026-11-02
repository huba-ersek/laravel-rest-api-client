<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return redirect()->route('login'); });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-page');
Route::get('/dashboard', function () {
    if (session('api_token'))
    {
        return view('dashboard');
    }
    return redirect()->route('login-page')->with('error', 'Unauthorized.');
})->name('dashboard');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
