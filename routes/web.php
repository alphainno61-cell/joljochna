<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'landingPage'])->name('home');
Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');
Route::get('/projects',[HomeController::class, 'othersProjects'])->name('projects');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
   Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
   Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

