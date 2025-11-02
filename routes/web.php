<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'landingPage'])->name('home');

Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');







