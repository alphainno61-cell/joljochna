<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    public function index()
    {
        $plots = Plot::ordered()->get();
        return view('admin.plots.index', compact('plots'));
    }

    public function create()
    {
        return view('admin.plots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'category_color' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        Plot::create($request->all());

        return redirect()->route('admin.plots.index')->with('success', 'Plot created successfully.');
    }

    public function edit(Plot $plot)
    {
        return view('admin.plots.edit', compact('plot'));
    }

    public function update(Request $request, Plot $plot)
    {
        $request->validate([
            'size' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'category_color' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $plot->update($request->all());

        return redirect()->route('admin.plots.index')->with('success', 'Plot updated successfully.');
    }

    public function destroy(Plot $plot)
    {
        $plot->delete();
        return redirect()->route('admin.plots.index')->with('success', 'Plot deleted successfully.');
    }
}