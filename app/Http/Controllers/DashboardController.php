<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('layouts.dashboard');
    }

    public function trains()
    {
        $trains = Train::all();
        return view('layouts.trains', compact('trains'));
    }

    public function show($id)
    {
        $train = Train::findOrFail($id);
        return view('layouts.show', compact('train'));
    }
}
