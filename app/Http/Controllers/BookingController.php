<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // show the booking page with booked seats
    public function show($busId = 1)
    {
        $bookedSeats = Booking::where('bus_id', $busId)
                             ->pluck('seat_number')
                             ->toArray();

        return view('booking', compact('bookedSeats'))->with('busId', $busId);
    }

    // handle booking form submit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:30',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'journey_date' => 'required|date',
            'bus_id' => 'required|integer',
            'selected_seats' => 'required|string',
        ]);

        $busId = $request->bus_id;
        $seats = array_filter(array_map('trim', explode(',', $request->selected_seats)));

        // check if seats already booked
        $already = Booking::where('bus_id', $busId)->whereIn('seat_number', $seats)->pluck('seat_number')->toArray();
        if (!empty($already)) {
            return back()->withErrors(['msg' => 'These seats were just booked: ' . implode(', ', $already)])->withInput();
        }

        foreach ($seats as $seat) {
            Booking::create([
                'bus_id' => $busId,
                'seat_number' => $seat,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'from' => $request->from,
                'to' => $request->to,
                'journey_date' => $request->journey_date,
            ]);
        }

        return redirect()->route('booking.show', $busId)->with('success', 'Seats booked successfully!');
    }
}

