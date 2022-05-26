<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Train;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function searchTicket(Request $request)
    {
        $request->validate([
            'from' => ['required'],
            'to' => ['required'],
            'doj' => ['required'],
        ]);

        $data = [];

        $trains = Train::where('date', $request->doj)->get();

        foreach ($trains as $train) {
            $schedule = Schedule::where('station_id', $request->to)->where('train_id', $train->id)->first();

            if (!empty($schedule)) {
                $data[] = [
                    'train_name' => $train->name,
                    'dept_time' => date('F j, Y', strtotime($train->date)) . ' - ' . date('H:i:a', strtotime($schedule->time)),
                ];
            }
        }

        return response()->json($data, Response::HTTP_OK);
    }
}
