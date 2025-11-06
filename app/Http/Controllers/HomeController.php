<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Opportunity;
use App\Models\Pricing;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{


     public function landingPage()
     {
          $heroData = HeroSection::first();
          $opportunities = Opportunity::all();
          $pricings = Pricing::active()->ordered()->get();
          $testimonials = Testimonial::active()->ordered()->get();
          $socialMediaLinks =  SocialMedia::active()->ordered()->get()->groupBy('carousel_group');

          return view('pages.landing', compact('opportunities', 'heroData', 'pricings', 'testimonials', 'socialMediaLinks'));
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
