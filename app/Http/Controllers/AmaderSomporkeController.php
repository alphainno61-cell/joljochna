<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Founder;
use App\Models\History;
use App\Models\Chairman;
use App\Models\MissionAndVission;
use Illuminate\Support\Facades\Storage;

class AmaderSomporkeController extends Controller
{
    //For Hero Section Function
    public function hero()
    {
        $hero = Hero::first();
        return view('admin.amaderSomporke.hero', compact('hero'));
    }
    public function updateHero(Request $request)
    {
        try {
            // ✅ 1️⃣ Validate incoming data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'shortDescription1' => 'nullable|string|max:500',
                'shortDescription2' => 'nullable|string|max:500',
            ]);

            // ✅ 2️⃣ Get the first hero record or create a new one
            $hero = Hero::firstOrNew();

            // ✅ 3️⃣ Update the fields
            $hero->title = $validated['title'];
            $hero->short_desc_1 = $validated['shortDescription1'] ?? '';
            $hero->short_desc_2 = $validated['shortDescription2'] ?? '';

            // ✅ 4️⃣ Save changes
            $hero->save();

            // ✅ 5️⃣ Redirect with success message
            return redirect()->back()->with('success', 'হিরো সেকশন সফলভাবে আপডেট হয়েছে!');
        } catch (\Exception $e) {
            // ❌ Handle unexpected errors gracefully
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }


    // For History Section Functionality

    public function history()
    {
        $history = History::first();
        return view('admin.amaderSomporke.history', compact('history'));
    }


    public function updateHistory(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'paragraph1' => 'required|string|max:2000',
                'paragraph2' => 'required|string|max:2000',
                'card1_title' => 'nullable|string|max:255',
                'card1_description' => 'nullable|string|max:1000',
                'card2_title' => 'nullable|string|max:255',
                'card2_description' => 'nullable|string|max:1000',
            ]);

            $history = History::firstOrNew();
            $history->fill($validated)->save();

            return redirect()->back()->with('success', 'ইতিহাস বিভাগটি সফলভাবে আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }


    //For Mission Section Functionality
    public function missionAndVission()
    {
        $missionAndVission = MissionAndVission::first();
        return view('admin.amaderSomporke.missionVission', compact('missionAndVission'));
    }

    public function updateMissionAndVission(Request $request)
    {
        try {
            $validated = request()->validate([
                'title1' => 'required|string|max:255',
                'description1' => 'required|string|max:2000',
                'title2' => 'required|string|max:255',
                'description2' => 'required|string|max:2000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                $missionAndVission = MissionAndVission::first();
                if ($missionAndVission && $missionAndVission->image) {
                    Storage::disk('public')->delete($missionAndVission->image);
                }

                $validated['image'] = $request->file('image')->store('mission_vission', 'public');
            }

            $missionAndVission = MissionAndVission::firstOrNew();
            $missionAndVission->fill($validated)->save();

            return redirect()->back()->with('success', 'মিশন ও ভিশন বিভাগটি সফলভাবে আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }


    //For Founder Functionality
    public function founder()
    {
        $founder = Founder::first();
        return view('admin.amaderSomporke.founder', compact('founder'));
    }

    public function updateFounder(Request $request)
    {
        try {
            $validated = request()->validate([
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'description1' => 'required|string|max:2000',
                'description2' => 'required|string|max:2000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                $founder = Founder::first();
                if ($founder && $founder->image) {
                    Storage::disk('public')->delete($founder->image);
                }

                $validated['image'] = $request->file('image')->store('founder', 'public');
            }

            $founder = Founder::firstOrNew();
            $founder->fill($validated)->save();

            return redirect()->back()->with('success', 'ফাউন্ডার বিভাগটি সফলভাবে আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }


    //For Chairman Functionality

    public function chairman()
    {
        $chairman = Chairman::first();
        return view('admin.amaderSomporke.chairman', compact('chairman'));
    }

    public function  updateChairman(Request $request)
    {
        try {
            $validated = request()->validate([
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'description1' => 'required|string|max:2000',
                'description2' => 'required|string|max:2000',
                'description3' => 'required|string|max:2000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                $chairman = Chairman::first();
                if ($chairman && $chairman->image) {
                    Storage::disk('public')->delete($chairman->image);
                }

                $validated['image'] = $request->file('image')->store('chairman', 'public');
            }

            $chairman = Chairman::firstOrNew();
            $chairman->fill($validated)->save();

            return redirect()->back()->with('success', 'চেয়ারম্যান বিভাগটি সফলভাবে আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি ঘটেছে: ' . $e->getMessage());
        }
    }
}
