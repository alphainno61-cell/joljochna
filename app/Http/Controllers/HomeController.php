<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Opportunity;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\ContactInfo;
use App\Models\Plot;
use Illuminate\Http\Request;

class HomeController extends Controller
{


public function landingPage()
{
    $heroData = HeroSection::first();
    $opportunities = Opportunity::all();
    $pricings = Pricing::active()->ordered()->get();
    $testimonials = Testimonial::active()->ordered()->get();
    $socialMediaLinks = SocialMedia::active()->ordered()->get()->groupBy('carousel_group');
    $projects = Project::active()->ordered()->paginate(8);
    $contactInfo = ContactInfo::getContactInfo();
    $plots = Plot::active()->ordered()->get();
        
        // Static amenities - no need for database
        $amenities = [
            ['name' => 'ক্লাব হাউজ', 'icon' => '🏠'],
            ['name' => 'জিম', 'icon' => '💪'],
            ['name' => 'মসজিদ', 'icon' => '🕌'],
            ['name' => 'শপিং এরিয়া', 'icon' => '🛍️'],
        ];

    return view('pages.landing', compact('opportunities', 'heroData', 'pricings', 'testimonials', 'socialMediaLinks', 'projects', 'contactInfo', 'plots', 'amenities'));
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
