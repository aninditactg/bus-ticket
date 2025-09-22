<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Step 1: Show booking form
     */
    public function index()
    {
        return view('booking'); // resources/views/booking.blade.php
    }

    /**
     * Step 2: Save basic booking info (name, email, phone, route, date)
     * and move to seat selection
     */
    public function storeBooking(Request $request)
    {
        // Validate Step 1 form
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'nullable|email',
            'phone'       => 'required|string|max:30',
            'from'        => 'required|string|max:255',
            'to'          => 'required|string|max:255',
            'journey_date'=> 'required|date',
        ]);

        // Store booking info temporarily in session
        session([
            'booking' => $request->only(['name', 'email', 'phone', 'from', 'to', 'journey_date'])
        ]);

        return redirect()->route('seat.layout'); // Go to seat selection page
    }

    /**
     * Step 3: Show seat layout with already booked seats
     */
    public function showSeatLayout($busId = 1)
    {
        // Get already booked seats for this bus
        $bookedSeats = Booking::where('bus_id', $busId)
                              ->pluck('seat_number')
                              ->toArray();

        return view('seatlayout', compact('bookedSeats', 'busId'));
    }

    /**
     * Step 4: Handle seat booking
     */
    public function store(Request $request)
    {
        // Validate seat selection
        $request->validate([
            'bus_id'       => 'required|integer',
            'bus_name'     => 'required|string|max:255',
            'seat_numbers' => 'required|array', // Expect an array: ['A1', 'B2']
            'price'        => 'required|numeric',
            'departure_time' => 'required|string',
            'arrival_time'   => 'required|string',
        ]);

        // Retrieve Step 1 info from session
        $bookingData = session('booking');

        if (!$bookingData) {
            return redirect()->route('booking.index')
                             ->with('error', 'Please fill passenger info first.');
        }

        // Save each seat as a booking record
        foreach ($request->seat_numbers as $seat) {
            Booking::create([
                'user_id'        => Auth::id(),
                'bus_id'         => $request->bus_id,
                'bus_name'       => $request->bus_name,
                'seat_number'    => $seat,
                'name'           => $bookingData['name'],
                'email'          => $bookingData['email'],
                'phone'          => $bookingData['phone'],
                'from'           => $bookingData['from'],
                'to'             => $bookingData['to'],
                'journey_date'   => $bookingData['journey_date'],
                'price'          => $request->price,
                'payment_status' => 'pending',
                'departure_time' => $request->departure_time,
                'arrival_time'   => $request->arrival_time,
            ]);
        }

        // Clear session booking data
        session()->forget('booking');

        return redirect()->route('booking.index')
                         ->with('success', 'Seats booked successfully!');
    }

    /**
     * Show current user's bookings
     */
    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('booking.my', compact('bookings'));
    }
}
return view('confirmation', [
    'booking' => $booking,
    'seats'   => $selectedSeats,
]);

