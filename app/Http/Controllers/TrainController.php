<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
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

    public function addTrain()
    {
        $stations = Station::all();
        return view('trains.add-train', compact('stations'));
    }

    public function storeTrain(Request $request)
    {
        $request->validate([
           'name' => ['required'],
           'date' => ['required', 'date'],
           'start_time' => ['required'],
           'station_id' => ['required'],
        ]);

        $train = new Train();

        $train->name = $request->name;
        $train->date = $request->date;
        $train->station_id = $request->station_id;
        $train->start_time = $request->start_time;

        $train->save();

        return redirect(route('trains'));
    }
}
