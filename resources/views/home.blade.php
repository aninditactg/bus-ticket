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
            <tr>
                <td>Hanif</td>
                <td>Dhaka</td>
                <td>Rajshahi</td>
                <td>8:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
            <tr>
                <td>Saudia</td>
                <td>Dhaka</td>
                <td>Barisal</td>
                <td>10:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
            <tr>
                <td>Volvo</td>
                <td>Sylhet</td>
                <td>Dhaka</td>
                <td>6:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
            <tdr>
                <td>Sohag</td>
                <td>Dhaka</td>
                <td>Cox's Bazar</td>
                <td>5:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
            </tdr>
                <td>BRTC</td>
                <td>Dhaka</td>
                <td>Rangamati</td>
                <td>11:00 AM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
        </tr>
            <tdr>
                <td>ExpressLine</td>
                <td>Dhaka</td>
                <td>Comilla</td>
                <td>4:00 PM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
        </tr>
        <tdr>
                <td>S.Alam</td>
                <td>Chittagong</td>
                <td>Dhaka</td>
                <td>3:00 PM</td>
                <td><a href="/book" class="btn btn-success btn-sm">Book Now</a></td>
            </tr>
                
        </tbody>
    </table>
@endsection

