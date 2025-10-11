<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Bus;

class BookingController extends Controller
{
    /**
     * Step 1: Show booking form
     */
    public function index()
    {
        $buses = \App\Models\Bus::all();
        $selectedBus = null;

        $busName = request('bus_name');
        if ($busName) {
            $selectedBus = (object) [
                'id' => null,
                'name' => $busName,
                'price' => request('price', 500),
                'from' => request('from', 'Dhaka'),
                'to' => request('to', 'Chittagong'),
                'departure_time' => request('departure_time', '10:00 AM'),
                'arrival_time' => request('arrival_time', '2:00 PM'),
            ];
        } elseif (request('bus_id')) {
            $selectedBus = \App\Models\Bus::find(request('bus_id'));
        }

        return view('booking', compact('buses', 'selectedBus')); // resources/views/booking.blade.php
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
            'bus_id'      => 'nullable|integer',
            'bus_name'    => 'nullable|string|max:255',
            'price'       => 'nullable|numeric',
            'departure_time' => 'nullable|string',
            'arrival_time' => 'nullable|string',
        ]);

        // Store booking info temporarily in session
        $sessionData = $request->only(['name', 'email', 'phone', 'from', 'to', 'journey_date']);

        // If virtual bus from form (hidden fields), store bus info in session
        $busName = $request->bus_name;
        if ($busName) {
            $sessionData['selectedBus'] = [
                'bus_id' => 0,
                'bus_name' => $busName,
                'price' => $request->price,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
            ];
        } else {
            $sessionData['selectedBus'] = [
                'bus_id' => $request->bus_id ?? 1,
                'bus_name' => null,
                'price' => null,
                'departure_time' => null,
                'arrival_time' => null,
            ];
        }

        session(['booking' => $sessionData]);

        $targetBusId = $sessionData['selectedBus']['bus_id'];
        return redirect()->route('seat.layout', ['busId' => $targetBusId]); // Go to seat selection page for selected/default bus
    }

    /**
     * Step 3: Show seat layout with already booked seats
     */
    public function showSeatLayout($busId = 1)
    {
        // Resolve bus from DB
        $bus = Bus::find($busId);

        // If no bus from DB, check session for virtual bus (from booking form)
        if (!$bus && session()->has('booking.selectedBus')) {
            $selectedBus = session('booking.selectedBus');
            if ($selectedBus['bus_id'] == 0) {
                $bus = (object) [
                    'id' => 0,
                    'name' => $selectedBus['bus_name'],
                    'price' => $selectedBus['price'],
                    'from' => session('booking.from'),
                    'to' => session('booking.to'),
                    'departure_time' => $selectedBus['departure_time'],
                    'arrival_time' => $selectedBus['arrival_time'],
                ];
                $busId = 0;
            }
        }

        // If still no bus, fallback to first available DB bus
        if (!$bus) {
            $bus = Bus::first();
            if ($bus) {
                $busId = $bus->id;
            }
        }

        // If still no bus, check query params for virtual bus (direct access)
        if (!$bus) {
            $busName = request('bus_name');
            if ($busName) {
                $bus = (object) [
                    'id' => 0, // Virtual bus ID
                    'name' => $busName,
                    'price' => request('price', 500),
                    'from' => request('from', 'Dhaka'),
                    'to' => request('to', 'Chittagong'),
                    'departure_time' => request('departure_time', '10:00 AM'),
                    'arrival_time' => request('arrival_time', '2:00 PM'),
                ];
                $busId = 0; // Use 0 for virtual buses
            }
        }

        // Get already booked seats for this bus
        $bookedSeats = Booking::where('bus_id', $busId)
                              ->pluck('seat_number')
                              ->toArray();

        // For virtual buses or demo, add some booked seats
        if ($busId == 0 || empty($bookedSeats)) {
            $bookedSeats = ['A1', 'A2', 'B3']; // Demo booked seats as in screenshot
        }

        if (!$bus) {
            return redirect()->route('booking')
                             ->with('error', 'No buses available. Please create a bus first.');
        }

        return view('booking.seatlayout', compact('bookedSeats', 'busId', 'bus'));
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
            return redirect()->route('booking')
                             ->with('error', 'Please fill passenger info first.');
        }

        // Save each seat as a booking record
        foreach ($request->seat_numbers as $seat) {
            Booking::create([
                'user_id'        => Auth::check() ? Auth::id() : null,
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

        // Build confirmation payload
        $confirmation = [
            'busName'       => $request->bus_name,
            'from'          => $bookingData['from'],
            'to'            => $bookingData['to'],
            'journeyDate'   => $bookingData['journey_date'],
            'departureTime' => $request->departure_time,
            'passengerName' => $bookingData['name'],
            'phone'         => $bookingData['phone'],
            'email'         => $bookingData['email'],
            'seats'         => $request->seat_numbers,
            'totalAmount'   => $request->price * count($request->seat_numbers),
        ];

        return view('booking.confirmation', compact('confirmation'));
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
 

