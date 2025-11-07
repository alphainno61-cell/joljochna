<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Chairman;
use App\Models\Contactinfo;
use App\Models\FooterSetting;
use App\Models\Founder;
use App\Models\Hero;
use App\Models\HeroSection;
use App\Models\History;
use App\Models\MissionAndVission;
use App\Models\Opportunity;
use App\Models\Plot;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\User;
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
          $footerSetting = FooterSetting::first();

          // Static amenities - no need for database
          $amenities = [
               ['name' => 'ক্লাব হাউজ', 'icon' => '🏠'],
               ['name' => 'জিম', 'icon' => '💪'],
               ['name' => 'মসজিদ', 'icon' => '🕌'],
               ['name' => 'শপিং এরিয়া', 'icon' => '🛍️'],
          ];

          return view('pages.landing', compact('opportunities', 'heroData', 'pricings', 'testimonials', 'socialMediaLinks', 'projects', 'contactInfo', 'plots', 'amenities', 'footerSetting'));
     }

     public function aboutPage()
     {
          $footerSetting = FooterSetting::first();
          return view('pages.about', compact('footerSetting'));
     }

     public function othersProjects()
     {
          $footerSetting = FooterSetting::first();
          return view('pages.othersProject', compact('footerSetting'));
     }


     public function dashboard()
     {
          // Get counts for all models with proper status checks
          $stats = [
               'bookings' => [
                    'total' => Booking::count(),
                    'pending' => Booking::where('status', 'pending')->count(),
                    'contacted' => Booking::where('status', 'contacted')->count(),
                    'completed' => Booking::where('status', 'completed')->count(),
                    'title' => 'বুকিং'
               ],
               'users' => [
                    'total' => User::count(),
                    'title' => 'ব্যবহারকারী'
               ],
               'projects' => [
                    'total' => Project::count(),
                    'active' => Project::where('is_active', true)->count(),
                    'featured' => Project::where('is_featured', true)->count(),
                    'title' => 'প্রকল্প'
               ],
               'plots' => [
                    'total' => Plot::count(),
                    'active' => Plot::where('is_active', true)->count(),
                    'title' => 'প্লট'
               ],
               'pricings' => [
                    'total' => Pricing::count(),
                    'active' => Pricing::where('is_active', true)->count(),
                    'featured' => Pricing::where('is_featured', true)->count(),
                    'title' => 'মূল্য নির্ধারণ'
               ],
               'testimonials' => [
                    'total' => Testimonial::count(),
                    'active' => Testimonial::where('is_active', true)->count(),
                    'title' => 'সন্তুষ্টি মন্তব্য'
               ],
               'opportunities' => [
                    'total' => Opportunity::count(),
                    'title' => 'সুযোগ'
               ],
               'chairmen' => [
                    'total' => Chairman::count(),
                    'title' => 'চেয়ারম্যান'
               ],
               'founders' => [
                    'total' => Founder::count(),
                    'title' => 'প্রতিষ্ঠাতা'
               ],
               'histories' => [
                    'total' => History::count(),
                    'title' => 'ইতিহাস'
               ],
               'mission_visions' => [
                    'total' => MissionAndVission::count(),
                    'title' => 'মিশন ও ভিশন'
               ],
               'heroes' => [
                    'total' => Hero::count(),
                    'title' => 'হিরো'
               ],
               'hero_sections' => [
                    'total' => HeroSection::count(),
                    'title' => 'হিরো সেকশন'
               ],
               'contact_info' => [
                    'total' => Contactinfo::count(),
                    'title' => 'যোগাযোগ তথ্য'
               ],
               'social_media' => [
                    'total' => SocialMedia::count(),
                    'active' => SocialMedia::where('is_active', true)->count(),
                    'title' => 'সোশ্যাল মিডিয়া'
               ],
               'footer_settings' => [
                    'total' => FooterSetting::count(),
                    'active' => FooterSetting::where('is_active', true)->count(),
                    'title' => 'ফুটার সেটিংস'
               ],
          ];


          // Get latest bookings
          $latestBookings = Booking::latest()->take(5)->get();

          // Get plot distribution by category
          $plotCategories = Plot::where('is_active', true)
               ->groupBy('category')
               ->selectRaw('category, count(*) as count')
               ->get();

          return view('admin.layouts.dashboard', compact('stats', 'latestBookings', 'plotCategories'));
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
