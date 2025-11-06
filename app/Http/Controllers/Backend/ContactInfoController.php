<?php
// app/Http/Controllers/Admin/ContactInfoController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::getContactInfo();
        $icons = $this->getIconOptions();
        
        return view('admin.landingpage.contact-info.edit', compact('contactInfo', 'icons'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone_title' => 'required|string|max:255',
            'phone_content' => 'required|string|max:1000',
            'phone_icon' => 'required|string|max:50',
            'phone_active' => 'boolean',

            'email_title' => 'required|string|max:255',
            'email_content' => 'required|string|max:1000',
            'email_icon' => 'required|string|max:50',
            'email_active' => 'boolean',

            'website_title' => 'required|string|max:255',
            'website_content' => 'required|string|max:1000',
            'website_icon' => 'required|string|max:50',
            'website_active' => 'boolean',

            'address_title' => 'required|string|max:255',
            'address_content' => 'required|string|max:1000',
            'address_icon' => 'required|string|max:50',
            'address_active' => 'boolean',
        ]);

        // Prepare contact data
        $contactData = [
            'phone' => [
                'title' => $validated['phone_title'],
                'content' => $validated['phone_content'],
                'icon' => $validated['phone_icon'],
                'type' => 'phone',
                'is_active' => $request->has('phone_active')
            ],
            'email' => [
                'title' => $validated['email_title'],
                'content' => $validated['email_content'],
                'icon' => $validated['email_icon'],
                'type' => 'email',
                'is_active' => $request->has('email_active')
            ],
            'website' => [
                'title' => $validated['website_title'],
                'content' => $validated['website_content'],
                'icon' => $validated['website_icon'],
                'type' => 'website',
                'is_active' => $request->has('website_active')
            ],
            'address' => [
                'title' => $validated['address_title'],
                'content' => $validated['address_content'],
                'icon' => $validated['address_icon'],
                'type' => 'address',
                'is_active' => $request->has('address_active')
            ]
        ];

        ContactInfo::saveContactInfo($contactData);

        return redirect()->route('admin.contact-info.edit')
            ->with('success', 'যোগাযোগের তথ্য সফলভাবে সংরক্ষণ করা হয়েছে।');
    }

    private function getIconOptions()
    {
        return [
            '📞' => 'ফোন (📞)',
            '📧' => 'ইমেইল (📧)',
            '🌐' => 'ওয়েবসাইট (🌐)',
            '📍' => 'ঠিকানা (📍)',
            '📱' => 'মোবাইল (📱)',
            '💬' => 'মেসেজ (💬)',
            '🏢' => 'অফিস (🏢)',
            '👥' => 'সোশ্যাল মিডিয়া (👥)',
            '⏰' => 'সময় (⏰)',
        ];
    }
}