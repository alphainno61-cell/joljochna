<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'plot_size' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'দয়া করে সমস্ত প্রয়োজনীয় তথ্য সঠিকভাবে পূরণ করুন।');
        }

        Booking::create($request->all());

        return redirect()->back()
            ->with('success', 'আপনার বুকিং তথ্য সফলভাবে জমা হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
    }
}
