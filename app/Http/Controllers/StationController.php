<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationController extends Controller
{
    public function stations()
    {
        return response()->json(Station::all(), Response::HTTP_OK);
    }
}
