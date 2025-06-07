<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        return view('farmers.index', [
            'farmers' => Farmer::with('user')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'farm_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string',
            'farm_type' => 'required|string'
        ]);

        $request->user()->farmer()->create($validated);

        return redirect()->route('dashboard');
    }

    // Add show(), edit(), update(), destroy() as needed
}