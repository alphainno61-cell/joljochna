<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function landingPage()
     {
          return view('pages.landing');
     }


     public function aboutPage()
     {
          return view('pages.about');
     }

     public function othersProjects()
     {
          return view('pages.othersProject');
     }

     public function dashboard()
     {
          return view('admin.dashboard');
     }

     public function booking()
     {
          return view('admin.booking');
     }

     public function plot()
     {
          return view('admin.plot');
     }

     public function customer()
     {
          return view('admin.customer');
     }

     public function report()
     {
          return view('admin.reports');
     }

     public function setting()
     {
          return view('admin.setting');
     }
}
