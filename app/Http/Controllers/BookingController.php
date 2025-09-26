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
     * Step 2: Save basic booking info in session
     */
    public function storeBooking(Request $request)
    {
        // Validate Step 1 form
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'nullable|email',
            'phone'        => 'required|string|max:30',
            'from'         => 'required|string|max:255',
            'to'           => 'required|string|max:255',
            'journey_date' => 'required|date',
        ]);

        // Store passenger info temporarily in session
        session([
            'booking' => $request->only(['name', 'email', 'phone', 'from', 'to', 'journey_date'])
        ]);

        // Go to seat selection
        return redirect()->route('seat.layout');
    }

    /**
     * Step 3: Show seat layout page
     */
    public function showSeatLayout($busId = 1)
    {
        // Fetch already booked seats from database
        $bookedSeats = Booking::where('bus_id', $busId)
                              ->pluck('seat_number')
                              ->toArray();

        return view('seatlayout', compact('bookedSeats', 'busId'));
    }

    /**
     * Step 4: Handle final booking + show confirmation
     */
    public function store(Request $request)
    {
        // Validate seat selection form
        $request->validate([
            'bus_id'         => 'required|integer',
            'bus_name'       => 'required|string|max:255',
            'seat_numbers'   => 'required|array', // Example: ['A1', 'B2']
            'price'          => 'required|numeric',
            'departure_time' => 'required|string',
            'arrival_time'   => 'required|string',
        ]);

        // Step 1 info from session
        $bookingData = session('booking');

        if (!$bookingData) {
            return redirect()->route('booking.index')
                             ->with('error', 'Please fill passenger info first.');
        }

        $selectedSeats = $request->seat_numbers;
        $lastBooking   = null;

        // Save each seat in database
        foreach ($selectedSeats as $seat) {
            $lastBooking = Booking::create([
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

        // Clear session
        session()->forget('booking');

        // Show confirmation page
        return view('confirmation', [
            'booking' => $lastBooking,
            'seats'   => $selectedSeats,
        ]);
    }

    /**
     * Step 5: Show logged-in user's bookings
     */
    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('booking.my', compact('bookings'));
    }
}
