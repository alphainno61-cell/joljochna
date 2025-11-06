<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::orderBy('sort_order')->latest()->paginate(10);
        return view('admin.landingpage.pricing.index', compact('pricings'));
    }

    public function create()
    {
        return view('admin.landingpage.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'size_description' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
            'down_payment_percentage' => 'required|numeric|min:0|max:100',
            'installments' => 'required|array',
            'installments.*.installment' => 'required|string',
            'installments.*.amount' => 'required|string',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        // dd($validated);

        // Calculate down payment amount
        $validated['down_payment_amount'] = ($validated['total_price'] * $validated['down_payment_percentage']) / 100;

        Pricing::create($validated);

        return redirect()->route('admin.pricing.index')
            ->with('success', 'প্যাকেজ সফলভাবে তৈরি করা হয়েছে।');
    }

    public function show(Pricing $pricing)
    {
        return view('admin.landingpage.pricing.show', compact('pricing'));
    }

    public function edit(Pricing $pricing)
    {
        return view('admin.landingpage.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, Pricing $pricing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'size_description' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
            'down_payment_percentage' => 'required|numeric|min:0|max:100',
            'installments' => 'required|array',
            'installments.*.installment' => 'required|string',
            'installments.*.amount' => 'required|string',
            'is_featured' => 'sometimes|boolean',
            'sort_order' => 'integer',
            'is_active' => 'sometimes|boolean'
        ]);

        // Handle checkbox values - if not checked, set to false
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Calculate down payment amount
        $validated['down_payment_amount'] = ($validated['total_price'] * $validated['down_payment_percentage']) / 100;

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')
            ->with('success', 'প্যাকেজ সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(Pricing $pricing)
    {
        $pricing->delete();

        return redirect()->route('admin.pricing.index')
            ->with('success', 'প্যাকেজ সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
