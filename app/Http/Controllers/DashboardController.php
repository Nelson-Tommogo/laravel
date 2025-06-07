<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $farmer = $user->farmer;
        
        return view('dashboard', [
            'farmer' => $farmer,
            'activities' => $farmer ? $farmer->activities()->latest()->take(5)->get() : []
        ]);
    }
}