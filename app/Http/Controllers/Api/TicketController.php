<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        return response()->json('Tickets info', Response::HTTP_OK);
    }
}
