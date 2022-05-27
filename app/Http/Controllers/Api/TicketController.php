<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Seat;
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

                $available_type = [];
                $seatsAvailable = Seat::where('train_id', $train->id)->where('status', 0)->get();

                foreach ($seatsAvailable as $seatAvailable) {
                    $available_type[] = $seatAvailable->type;
                }

                $unique_available_type = array_merge($available_type);


                $total_seats = 0;
                $available = [];

                foreach ($unique_available_type as $type) {
                    $seatsAvailable = Seat::where('train_id', $train->id)->where('status', 0)->where('type', $type)->get();

                    if ($type == 0) {
                        $fare = $schedule->ac_a_price;
                    } else {
                        $fare = $schedule->nac_a_price;
                    }

                    $available[] = [
                      'type' => eTicketSeatTypes()[$type],
                      'quantity' => count($seatsAvailable),
                      'fare' => $fare,
                    ];

                    $total_seats = count($seatsAvailable);
                }

                $data[] = [
                    'train_name' => $train->name,
                    'dept_time' => date('F j, Y', strtotime($train->date)) . ' - ' . date('H:i:a', strtotime($schedule->time)),
                    'seats_available' => $total_seats,
                    'available' => $available,
                ];

            }
        }

        return response()->json($data, Response::HTTP_OK);
    }
}
