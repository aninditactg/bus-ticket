@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Available Buses</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Bus Name</th>
                <th>From</th>
                <th>To</th>
                <th>Time</th>
                <th>Book</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GreenLine</td>
                <td>Dhaka</td>
                <td>Chittagong</td>
                <td>7:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
            <head>
                <meta charset="UTF-8">
                <title>Bus Ticket Booking</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            
            <tr>
                <td>Shyamoli</td>
                <td>Dhaka</td>
                <td>Khulna</td>
                <td>9:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
        </tbody>
    </table>
@endsection

