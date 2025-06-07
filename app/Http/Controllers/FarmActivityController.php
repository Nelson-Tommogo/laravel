<?php

namespace App\Http\Controllers;

use App\Models\FarmActivity;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmActivityController extends Controller
{
    public function index()
    {
        return view('activities.index', [
            'activities' => FarmActivity::where('farmer_id', auth()->user()->farmer->id)
                                ->latest()
                                ->paginate(10)
        ]);
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'activity_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string',
            'priority' => 'required|string'
        ]);

        $request->user()->farmer->activities()->create($validated);

        return redirect()->route('activities.index');
    }

    // Add show(), edit(), update(), destroy() as needed
}