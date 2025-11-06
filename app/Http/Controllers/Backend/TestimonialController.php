<?php
// app/Http/Controllers/Admin/TestimonialController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->latest()->paginate(10);
        return view('admin.landingpage.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.landingpage.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'investor_name' => 'required|string|max:255',
            'investor_title' => 'required|string|max:255',
            'avatar_initials' => 'required|string|max:5',
            'quote_text' => 'required|string|max:1000',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        // Handle checkbox value
        $validated['is_active'] = $request->has('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'টেস্টিমোনিয়াল সফলভাবে তৈরি করা হয়েছে।');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.landingpage.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'investor_name' => 'required|string|max:255',
            'investor_title' => 'required|string|max:255',
            'avatar_initials' => 'required|string|max:5',
            'quote_text' => 'required|string|max:1000',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        // Handle checkbox value
        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'টেস্টিমোনিয়াল সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'টেস্টিমোনিয়াল সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
