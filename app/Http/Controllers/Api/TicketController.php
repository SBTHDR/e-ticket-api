<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function searchTicket()
    {
        return response()->json('Tickets info', '200');
    }
}
