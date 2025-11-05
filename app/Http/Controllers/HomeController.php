<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

     public function form()
     {
          return view('admin.landingpage.herosection.form');
     }
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
