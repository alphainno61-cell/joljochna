<?php
// app/Http/Controllers/Admin/FooterSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterSettingController extends Controller
{
    public function index()
    {
        $footerSetting = FooterSetting::first();
        return view('admin.landingpage.footer.form', compact('footerSetting'));
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'phone_numbers' => 'required|string',
            'email' => 'required|email',
            'project_address' => 'required|string',
            'contact_address' => 'required|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'google_map_url' => 'required|url',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'qr_code_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'project_roadmap_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'show_payment_methods' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Remove boolean fields if not present
        $validated['show_payment_methods'] = $request->has('show_payment_methods');
        $validated['is_active'] = $request->has('is_active');

        $footerSetting = FooterSetting::first();

        // Handle logo image upload
        if ($request->hasFile('logo_image')) {
            // Delete old logo if exists
            if ($footerSetting && $footerSetting->logo_image) {
                Storage::delete('public/' . $footerSetting->logo_image);
            }
            $logoPath = $request->file('logo_image')->store('footer', 'public');
            $validated['logo_image'] = $logoPath;
        }

        // Handle project roadmap image upload
        if ($request->hasFile('project_roadmap_image')) {
            // Delete old logo if exists
            if ($footerSetting && $footerSetting->project_roadmap_image) {
                Storage::delete('public/' . $footerSetting->project_roadmap_image);
            }
            $roadmapPath = $request->file('project_roadmap_image')->store('footer', 'public');
            $validated['project_roadmap_image'] = $roadmapPath;
        }

        // Handle QR code image upload
        if ($request->hasFile('qr_code_image')) {
            // Delete old QR code if exists
            if ($footerSetting && $footerSetting->qr_code_image) {
                Storage::delete('public/' . $footerSetting->qr_code_image);
            }
            $qrPath = $request->file('qr_code_image')->store('footer', 'public');
            $validated['qr_code_image'] = $qrPath;
        }

        if ($footerSetting) {
            // Update existing
            $footerSetting->update($validated);
            $message = 'Footer settings updated successfully.';
        } else {
            // Create new
            FooterSetting::create($validated);
            $message = 'Footer settings created successfully.';
        }

        return redirect()->route('admin.footer-settings.index')
            ->with('success', $message);
    }
}
