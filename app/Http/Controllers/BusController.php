<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_number' => 'required|unique:buses,bus_number',
            'bus_name' => 'required',
            'type' => 'required',
            'total_seat' => 'required|integer'
        ]);

        Bus::create($request->all());

        return redirect()->route('buses.index')->with('success', 'Bus added successfully');
    }
}
