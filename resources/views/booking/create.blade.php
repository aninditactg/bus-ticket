@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book Your Seat</h2>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div>
            <label>Bus Name</label>
            <input type="text" name="bus_name" value="{{ old('bus_name') }}">
        </div>

        <div>
            <label>From</label>
            <input type="text" name="from" value="{{ old('from') }}">
        </div>

        <div>
            <label>To</label>
            <input type="text" name="to" value="{{ old('to') }}">
        </div>

        <div>
            <label>Seats</label>
            <input type="text" name="seat_numbers" placeholder="e.g. B1,B2" value="{{ old('seat_numbers') }}">
        </div>

        <div>
            <label>Total Passengers</label>
            <input type="number" name="total_passengers" value="{{ old('total_passengers') }}">
        </div>

        <div>
            <label>Price</label>
            <input type="number" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label>Departure Time</label>
            <input type="datetime-local" name="departure_time" value="{{ old('departure_time') }}">
        </div>

        <div>
            <label>Arrival Time</label>
            <input type="datetime-local" name="arrival_time" value="{{ old('arrival_time') }}">
        </div>

        <button type="submit">Confirm Booking</button>
    </form>
</div>
@endsection
