<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Bus;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBookings = Booking::count();
        $totalBuses = Bus::count();
        $totalRoutes = Bus::count(); // Assuming routes are buses for simplicity
        $totalRevenue = Booking::join('buses', 'bookings.bus_id', '=', 'buses.id')->sum('buses.price');
        $recentBookings = Booking::with('user')->latest()->take(5)->get();

        return view('dashboard', compact('totalUsers', 'totalBookings', 'totalBuses', 'totalRoutes', 'totalRevenue', 'recentBookings'));
    }
}
