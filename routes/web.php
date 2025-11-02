<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

Route::get('/slider1',function(){
    return view('slider1');
});



