<?php
// app/Http/Controllers/Admin/ProjectController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->latest()->paginate(10);
        return view('admin.landingpage.projects.index', compact('projects'));
    }

    public function create()
    {
        $icons = $this->getIconOptions();
        return view('admin.landingpage.projects.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|string|max:50',
            'button_link' => 'required|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle checkbox values
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'প্রকল্প সফলভাবে তৈরি করা হয়েছে।');
    }

    public function edit(Project $project)
    {
        $icons = $this->getIconOptions();
        return view('admin.landingpage.projects.edit', compact('project', 'icons'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|string|max:50',
            'button_link' => 'required|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Handle checkbox values
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'প্রকল্প সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(Project $project)
    {
        // Delete image
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'প্রকল্প সফলভাবে মুছে ফেলা হয়েছে।');
    }

    private function getIconOptions()
    {
        return [
            '🏙️' => 'শহর (🏙️)',
            '🏡' => 'বাড়ি (🏡)',
            '🏢' => 'অফিস ভবন (🏢)',
            '🏗️' => 'নির্মাণ (🏗️)',
            '🏘️' => 'আবাসন (🏘️)',
            '🏠' => 'বাড়ি (🏠)',
            '🏤' => 'ডাকঘর (🏤)',
            '🏪' => 'দোকান (🏪)',
            '🏫' => 'বিদ্যালয় (🏫)',
            '🏣' => 'জাপানি ডাকঘর (🏣)',
            '🌳' => 'গাছ (🌳)',
            '🌇' => 'সূর্যাস্ত (🌇)',
            '🌆' => 'সন্ধ্যা (🌆)',
            '🏞️' => 'প্রাকৃতিক দৃশ্য (🏞️)',
            '🛣️' => 'সড়ক (🛣️)',
        ];
    }
}
