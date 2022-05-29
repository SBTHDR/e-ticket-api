<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationController extends Controller
{
    public function stations()
    {
        $stations = Station::all();
        $data = [];

        foreach ($stations as $station) {
            $data[] = [
              'label' => $station->name,
              'code' => $station->id,
            ];
        }
        return response()->json($data, Response::HTTP_OK);
    }
}
