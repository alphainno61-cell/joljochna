<?php
// app/Http/Controllers/Backend/SocialMediaController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMediaLinks = SocialMedia::ordered()->latest()->paginate(10);
        return view('admin.landingpage.socialmedia.index', compact('socialMediaLinks'));
    }

    public function create()
    {
        return view('admin.landingpage.socialmedia.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'url' => 'nullable|url|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'sort_order' => 'integer',
            'carousel_group' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('carousels', 'public');
        }

        // Handle checkbox value
        $validated['is_active'] = $request->has('is_active');

        SocialMedia::create($validated);

        return redirect()->route('admin.socialmedias.index')
            ->with('success', 'Carousel item created successfully.');
    }

    public function edit(SocialMedia $socialmedia)
    {
        return view('admin.landingpage.socialmedia.edit', compact('socialmedia'));
    }

    public function update(Request $request, SocialMedia $socialmedia)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'sort_order' => 'integer',
            'carousel_group' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($socialmedia->image) {
                Storage::disk('public')->delete($socialmedia->image);
            }
            $validated['image'] = $request->file('image')->store('social_media', 'public');
        }

        // Handle checkbox value
        $validated['is_active'] = $request->has('is_active');

        $socialmedia->update($validated);

        return redirect()->route('admin.socialmedias.index')
            ->with('success', 'Carousel item updated successfully.');
    }

    public function destroy(SocialMedia $socialmedia)
    {
        // Delete image
        if ($socialmedia->image) {
            Storage::disk('public')->delete($socialmedia->image);
        }

        $socialmedia->delete();

        return redirect()->route('admin.socialmedias.index')
            ->with('success', 'Carousel item deleted successfully.');
    }
}
