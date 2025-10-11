@extends('layouts.booking')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center mb-0">Select Your Seats</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="text-center mb-4">
                        @if($bus)
                        <div class="bus-info p-3 mb-4 bg-light rounded">
                            <div class="route-info">
                                <h4 class="text-primary">{{ $bus->name }}</h4>
                                <p class="mb-1 fs-5">{{ $bus->from }} → {{ $bus->to }}</p>
                                <div class="d-flex justify-content-center gap-4 text-muted">
                                    <span><i class="bi bi-clock"></i> {{ $bus->departure_time }}</span>
                                    <span><i class="bi bi-currency-dollar"></i> {{ $bus->price }} BDT</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-danger">
                            Bus information not found. Please go back and try again.
                        </div>
                        @endif
                    </div>

                    <div class="legend text-center mb-4">
                        <div class="d-inline-block mx-3">
                            <span class="box available"></span> Available
                        </div>
                        <div class="d-inline-block mx-3">
                            <span class="box selected"></span> Selected
                        </div>
                        <div class="d-inline-block mx-3">
                            <span class="box booked"></span> Booked
                        </div>
                    </div>

                    <form action="{{ route('booking.store') }}" method="POST" class="seat-booking-form">
                        @csrf
                        <input type="hidden" name="bus_id" value="{{ $busId ?? session('booking.busId', 1) }}">
                        <input type="hidden" name="bus_name" value="{{ $bus->name ?? 'Unknown Bus' }}">
                        <input type="hidden" name="price" value="{{ $bus->price ?? 500 }}">
                        <input type="hidden" name="departure_time" value="{{ $bus->departure_time ?? '10:00 AM' }}">
                        <input type="hidden" name="arrival_time" value="{{ $bus->arrival_time ?? '2:00 PM' }}">

                        <div class="seat-grid">
                            @php
                                $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
                                $columns = [1, 2, 3, 4];
                            @endphp

                            @foreach($rows as $row)
                                <div class="seat-row mb-3">
                                    @foreach($columns as $col)
                                        @php
                                            $seatNumber = $row . $col;
                                            $isBooked = in_array($seatNumber, $bookedSeats ?? []);
                                        @endphp
                                        <label class="seat {{ $isBooked ? 'booked' : '' }}">
                                            <input type="checkbox" 
                                                   name="seat_numbers[]" 
                                                   value="{{ $seatNumber }}"
                                                   {{ $isBooked ? 'disabled' : '' }}>
                                            <span>{{ $seatNumber }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                Confirm Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.legend {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
}

.box {
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    vertical-align: middle;
    border: 1px solid #ccc;
}

.available {
    background: #f8f9fa;
}

.selected {
    background: #28a745;
}

.booked {
    background: #dc3545;
}

.seat-grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.seat-row {
    display: flex;
    gap: 10px;
}

.seat {
    display: inline-block;
    position: relative;
    padding: 5px;
    width: 60px;
    height: 60px;
    text-align: center;
    cursor: pointer;
    border: 2px solid #ccc;
    border-radius: 5px;
    background: #f8f9fa;
    margin: 5px;
}

.seat input[type="checkbox"] {
    position: absolute;
    opacity: 0;
}

.seat span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.seat:hover:not(.booked) {
    background: #e9ecef;
}

.seat input[type="checkbox"]:checked + span {
    color: white;
}

.seat:has(input[type="checkbox"]:checked) {
    background: #28a745;
    border-color: #28a745;
    color: white;
}

.seat.booked {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
    cursor: not-allowed;
}

.seat.booked span {
    color: white;
}
</style>
@endsection
