<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{

    public function heroSection()
    {
        $priceSection = HeroSection::first();
        return view('admin.landingpage.herosection', compact('priceSection'));
    }


    public function updateOrCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_url' => 'required|max:255',
            'secondary_button_text' => 'required|string|max:255',
            'secondary_button_url' => 'required|max:255',
        ], [
            'main_title.required' => 'প্রধান শিরোনাম প্রয়োজন',
            'main_title.string' => 'প্রধান শিরোনাম বৈধ টেক্সট হতে হবে',
            'main_title.max' => 'প্রধান শিরোনাম ২৫৫ অক্ষরের বেশি হতে পারবে না',

            'subtitle.required' => 'উপ-শিরোনাম প্রয়োজন',
            'subtitle.string' => 'উপ-শিরোনাম বৈধ টেক্সট হতে হবে',
            'subtitle.max' => 'উপ-শিরোনাম ২৫৫ অক্ষরের বেশি হতে পারবে না',

            'description.required' => 'বিবরণ প্রয়োজন',
            'description.string' => 'বিবরণ বৈধ টেক্সট হতে হবে',

            'primary_button_text.required' => 'প্রাথমিক বাটন টেক্সট প্রয়োজন',
            'primary_button_text.string' => 'প্রাথমিক বাটন টেক্সট বৈধ টেক্সট হতে হবে',
            'primary_button_text.max' => 'প্রাথমিক বাটন টেক্সট ২৫৫ অক্ষরের বেশি হতে পারবে না',

            'primary_button_url.required' => 'প্রাথমিক বাটন URL প্রয়োজন',
            'primary_button_url.url' => 'প্রাথমিক বাটন URL বৈধ URL হতে হবে',
            'primary_button_url.max' => 'প্রাথমিক বাটন URL ২৫৫ অক্ষরের বেশি হতে পারবে না',

            'secondary_button_text.required' => 'সেকেন্ডারি বাটন টেক্সট প্রয়োজন',
            'secondary_button_text.string' => 'সেকেন্ডারি বাটন টেক্সট বৈধ টেক্সট হতে হবে',
            'secondary_button_text.max' => 'সেকেন্ডারি বাটন টেক্সট ২৫৫ অক্ষরের বেশি হতে পারবে না',

            'secondary_button_url.required' => 'সেকেন্ডারি বাটন URL প্রয়োজন',
            'secondary_button_url.url' => 'সেকেন্ডারি বাটন URL বৈধ URL হতে হবে',
            'secondary_button_url.max' => 'সেকেন্ডারি বাটন URL ২৫৫ অক্ষরের বেশি হতে পারবে না',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'আপনার ইনপুটে কিছু ত্রুটি রয়েছে। দয়া করে সংশোধন করুন।');
        }

        try {
            // Use updateOrCreate to handle both create and update
            HeroSection::updateOrCreate(
                [
                    'id' => 1
                ],
                [
                    'main_title' => $request->main_title,
                    'subtitle' => $request->subtitle,
                    'description' => $request->description,
                    'primary_button_text' => $request->primary_button_text,
                    'primary_button_url' => $request->primary_button_url,
                    'secondary_button_text' => $request->secondary_button_text,
                    'secondary_button_url' => $request->secondary_button_url,
                ]
            );

            $message = $request->id ? 'মূল্য সেকশন সফলভাবে আপডেট করা হয়েছে' : 'মূল্য সেকশন সফলভাবে তৈরি করা হয়েছে';

            return redirect()->route('admin.price-section.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'সিস্টেম ত্রুটি: ' . $e->getMessage());
        }
    }
}
