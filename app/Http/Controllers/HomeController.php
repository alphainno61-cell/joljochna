<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landingPage(){
         return view('pages.landing');
    }

     public function aboutPage(){
         return view('pages.about');
    }

     public function dashboard(){
         return view('admin.dashboard');
    }
}
