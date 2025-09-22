<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatBooking; 

class SeatController extends Controller
{
    /**
     * Show seat layout page
     */
    public function index()
    {
        return view('seatlayout'); // resources/views/seatlayout.blade.php
    }

    /**
     * Store selected seats
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'seats' => 'required|array|min:1',
        ]);

        $selectedSeats = $request->input('seats'); // array of seats (A1, B3...)

        // Save each seat to database
        foreach ($selectedSeats as $seat) {
            SeatBooking::create([
                'user_id'     => auth()->id() ?? null, // If user is logged in
                'seat_number' => $seat,
                'status'      => 'booked',
            ]);
        }

        return redirect()->route('confirmation')
                         ->with('success', 'Seats booked successfully!')
                         ->with('seats', $selectedSeats);
    }
}
