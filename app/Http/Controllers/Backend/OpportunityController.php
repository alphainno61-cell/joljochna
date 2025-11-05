<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use App\Models\Opportunity;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the features.
     */
    public function index(): View
    {
        $opportunity = Opportunity::paginate(10);
        return view('admin.landingpage.oppotunity.index', compact('opportunity'));
    }

    /**
     * Show the form for creating a new feature.
     */
    public function create(): View
    {
        return view('admin.landingpage.oppotunity.create');
    }

    /**
     * Store a newly created feature in storage.
     */
    public function store(FeatureRequest $request): RedirectResponse
    {
        try {
            Opportunity::create([
                'icon' => $request->icon,
                'title' => $request->title,
                'description' => $request->description,

            ]);

            return redirect()->route('opportunity.index')
                ->with('success', 'ফিচার সফলভাবে তৈরি হয়েছে।');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'ফিচার তৈরি করতে সমস্যা হয়েছে। আবার চেষ্টা করুন।');
        }
    }


    /**
     * Show the form for editing the specified feature.
     */
    public function edit(Opportunity $opportunity): View
    {
        return view('admin.landingpage.oppotunity.edit', compact('opportunity'));
    }

    /**
     * Update the specified feature in storage.
     */
    public function update(FeatureRequest $request, Opportunity $opportunity): RedirectResponse
    {
        try {
            $opportunity->update([
                'icon' => $request->icon,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('opportunity.index')
                ->with('success', 'ফিচার সফলভাবে আপডেট হয়েছে।');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'ফিচার আপডেট করতে সমস্যা হয়েছে। আবার চেষ্টা করুন।');
        }
    }

    /**
     * Remove the specified feature from storage.
     */
    public function destroy(Opportunity $opportunity): RedirectResponse
    {
        $opportunity->delete();

        return redirect()->route('opportunity.index')
            ->with('success', 'ফিচার সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
