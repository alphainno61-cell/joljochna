<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class HomeController extends Controller
{


     public function landingPage()
     {
          $heroData = HeroSection::first();
          $opportunities = Opportunity::all();
          return view('pages.landing', compact('opportunities', 'heroData'));
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
          return view('admin.layouts.dashboard');
     }

     public function booking()
     {
          return view('admin.booking.booking');
     }

     public function plot()
     {
          return view('admin.plot.plot');
     }

     public function customer()
     {
          return view('admin.customer.customer');
     }

     public function report()
     {
          return view('admin.report.reports');
     }

     public function setting()
     {
          return view('admin.setting.setting');
     }
}
