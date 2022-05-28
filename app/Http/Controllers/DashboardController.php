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
}
