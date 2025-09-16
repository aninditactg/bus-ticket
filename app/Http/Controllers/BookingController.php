<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Default booking page
     */
    public function index()
    {
        return view('booking'); // resources/views/booking.blade.php
    }

    /**
     * Show the booking page with already booked seats
     */
    public function show($busId = 1)
    {
        // Get all seats that are already booked for this bus
        $bookedSeats = Booking::where('bus_id', $busId)
                              ->pluck('seat_number')
                              ->toArray();

        // Send data to the booking view
        return view('booking', compact('bookedSeats', 'busId'));
    }

    /**
     * Handle booking form submission
     */
    public function store(Request $request)
    {
        // Validate all booking form inputs
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'nullable|email',
            'phone'            => 'required|string|max:30',
            'from'             => 'required|string|max:255',
            'to'               => 'required|string|max:255',
            'bus_id'           => 'required|integer',
            'bus_name'         => 'required|string|max:255',
            'seat_numbers'     => 'required|string',   // Comma separated seats like "A1,B2"
            'total_passengers' => 'required|integer|min:1',
            'journey_date'     => 'required|date',
            'price'            => 'required|numeric',
            'departure_time'   => 'required|date',
            'arrival_time'     => 'required|date',
        ]);

        $busId = $request->bus_id;

        // Convert seat_numbers string into an array
        $seats = array_filter(array_map('trim', explode(',', $request->seat_numbers)));

        // Check if any of these seats are already booked
        $alreadyBooked = Booking::where('bus_id', $busId)
                                ->whereIn('seat_number', $seats)
                                ->pluck('seat_number')
                                ->toArray();

        if (!empty($alreadyBooked)) {
            return back()->withErrors([
                'msg' => 'These seats are already booked: ' . implode(', ', $alreadyBooked)
            ])->withInput();
        }

        // Save each seat as a separate booking record
        foreach ($seats as $seat) {
            Booking::create([
                'user_id'          => Auth::id(),   // logged-in user ID
                'bus_id'           => $busId,
                'bus_name'         => $request->bus_name,
                'seat_number'      => $seat,        // store single seat
                'seat_numbers'     => json_encode($seats), // store all selected seats as JSON
                'total_passengers' => $request->total_passengers,
                'name'             => $request->name,
                'email'            => $request->email,
                'phone'            => $request->phone,
                'from'             => $request->from,
                'to'               => $request->to,
                'journey_date'     => $request->journey_date,
                'price'            => $request->price,
                'payment_status'   => 'pending',   // default status
                'departure_time'   => $request->departure_time,
                'arrival_time'     => $request->arrival_time,
            ]);
        }

        // Redirect back to booking page with success message
        return redirect()->route('booking.show', $busId)
                         ->with('success', 'Seats booked successfully!');
    }

    /**
     * Show bookings of the currently logged-in user
     */
    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('booking.my', compact('bookings'));
    }

    /**
     * Handle seat selection form submission
     */
    public function seatStore(Request $request)
    {
        // Example: Save the selected seat(s) into the database
        return back()->with('success', 'Seat booked successfully!');
    }

    /**
     * Show the seat layout page
     */
    public function showSeatLayout($busId = 1)
    {
        // Get all seats that are already booked for this bus
        $bookedSeats = Booking::where('bus_id', $busId)
                              ->pluck('seat_number')
                              ->toArray();

        // Send data to the seat layout view
        return view('seatlayout', compact('bookedSeats', 'busId'));
    }

    /**
     * Book a seat using POST
     */
    public function bookSeat(Request $request)
    {
        // Validate the selected seat(s)
        $request->validate([
            'seat_numbers'   => 'required|string', // Comma separated seats like "A1,B2"
            'bus_id'         => 'required|integer',
            'bus_name'       => 'required|string|max:255',
            'from'           => 'required|string|max:255',
            'to'             => 'required|string|max:255',
            'journey_date'   => 'required|date',
            'price'          => 'required|numeric',
            'departure_time' => 'required|date',
            'arrival_time'   => 'required|date',
        ]);

        // Simple example response
        return back()->with('success', 'Seat booked successfully!');
    }
}
    