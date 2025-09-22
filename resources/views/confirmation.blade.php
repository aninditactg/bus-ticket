<!-- resources/views/confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { width: 60%; margin: 30px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: green; }
        .section { margin-bottom: 20px; }
        .section h3 { margin-bottom: 10px; color: #333; }
        .list { list-style: none; padding: 0; }
        .list li { padding: 6px 0; border-bottom: 1px solid #eee; }
        .btn { display: inline-block; padding: 10px 15px; margin: 5px; text-decoration: none; border-radius: 5px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
    </style>
</head>

<body>
    

    <div class="container">
        <h2>✅ Booking Successful!</h2>
        <p>Here are the details of your booking:</p>

        <!-- Passenger Info -->
        <div class="section">
            <h3>🧑 Passenger Information</h3>
            <ul class="list">
                <li><strong>Name:</strong> {{ $booking->name }}</li>
                <li><strong>Email:</strong> {{ $booking->email ?? 'N/A' }}</li>
                <li><strong>Phone:</strong> {{ $booking->phone }}</li>
            </ul>
        </div>

        <!-- Journey Info -->
        <div class="section">
            <h3>🚌 Journey Information</h3>
            <ul class="list">
                <li><strong>Bus Name:</strong> {{ $booking->bus_name }}</li>
                <li><strong>From:</strong> {{ $booking->from }}</li>
                <li><strong>To:</strong> {{ $booking->to }}</li>
                <li><strong>Date:</strong> {{ $booking->journey_date }}</li>
            </ul>
        </div>

        <!-- Seats -->
        <div class="section">
            <h3>💺 Booked Seats</h3>
            <p>
                @if(is_array($seats))
                    {{ implode(', ', $seats) }}
                @else
                    {{ $seats }}
                @endif
            </p>
        </div>

        <!-- Price -->
        <div class="section">
            <h3>💰 Payment</h3>
            <ul class="list">
                <li><strong>Ticket Price:</strong> {{ $booking->price }} BDT</li>
                <li><strong>Status:</strong> {{ ucfirst($booking->payment_status) }}</li>
            </ul>
        </div>

        <!-- Buttons -->
        <a href="{{ route('booking.my') }}" class="btn btn-primary">📄 View My Bookings</a>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary">🔙 New Booking</a>
    </div>
</body>
</html>
