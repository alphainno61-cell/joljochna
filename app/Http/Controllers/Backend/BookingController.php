<?php
// app/Http/Controllers/Admin/BookingController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::recent()->paginate(10);
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::pending()->count(),
            'contacted' => Booking::contacted()->count(),
            'completed' => Booking::completed()->count(),
        ];

        return view('admin.landingpage.bookings.index', compact('bookings', 'stats'));
    }

    public function show(Booking $booking)
    {
        return view('admin.landingpage.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,completed,cancelled',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $booking->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'বুকিং স্ট্যাটাস সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'বুকিং সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
