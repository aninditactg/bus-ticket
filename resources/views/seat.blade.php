<!DOCTYPE html>
<html>
<head>
    <title>Seat Booking</title>
</head>
<body>
    <h1>Seat Layout</h1>

    <!-- Success message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Booking form -->
    <form action="{{ route('seat.book') }}" method="POST">
        @csrf
        <label>Bus Name:</label>
        <input type="text" name="bus_name" required><br><br>

        <label>Destination:</label>
        <input type="text" name="destination" required><br><br>

        <label>Time:</label>
        <input type="time" name="time" required><br><br>

        <label>User Name:</label>
        <input type="text" name="user_name" required><br><br>

        <label>Payment Method:</label>
        <select name="payment" required>
            <option value="bkash">Bkash</option>
            <option value="nagad">Nagad</option>
            <option value="card">Card</option>
        </select><br><br>

        <button type="submit">Book Now</button>
    </form>
</body>
</html>
