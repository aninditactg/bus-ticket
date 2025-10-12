@extends('layouts.booking')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h3 class="text-center mb-0">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Seat Booking Successful!
                    </h3>
                </div>
                
                <div class="card-body">
                    <div class="alert alert-success text-center">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Booking Successful! Your seats have been reserved.
                    </div>

                    <div class="booking-details">
                        <h4 class="text-center mb-4">Booking Details</h4>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Bus:</strong> {{ $confirmation['busName'] }}</p>
                                <p><strong>From:</strong> {{ $confirmation['from'] }}</p>
                                <p><strong>To:</strong> {{ $confirmation['to'] }}</p>
                                <p><strong>Journey Date:</strong> {{ date('d M Y', strtotime($confirmation['journeyDate'])) }}</p>
                                <p><strong>Departure Time:</strong> {{ $confirmation['departureTime'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Passenger:</strong> {{ $confirmation['passengerName'] }}</p>
                                <p><strong>Phone:</strong> {{ $confirmation['phone'] }}</p>
                                <p><strong>Email:</strong> {{ $confirmation['email'] }}</p>
                                <p><strong>Seat Numbers:</strong> {{ implode(', ', $confirmation['seats']) }}</p>
                                <p><strong>Total Amount:</strong> {{ $confirmation['totalAmount'] }} BDT</p>
                            </div>
                        </div>

                        <div class="text-center">
                            <h5 class="mb-3">Payment Status: <span class="badge bg-warning">Pending</span></h5>
                            <p class="text-muted">Please complete your payment to confirm the booking.</p>
                            
                            <div class="mt-4">
                                <a href="{{ route('bookings.my') }}" class="btn btn-primary me-2">
                                    View My Bookings
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
