<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seat Booking</title>
    <link rel="stylesheet" href="{{ asset('css/seat.css') }}">
</head>
<body>

    <h2>Seat Booking</h2>

    <div class="legend">
        <span class="box available"></span> Available
        <span class="box selected"></span> Selected
        <span class="box booked"></span> Booked
    </div>

    <form action="#" method="post">
        <div class="seat-grid">
            <!-- Row A -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="A1">
                <span>A1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="A2">
                <span>A2</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>A3</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="A4">
                <span>A4</span>
            </label>

            <!-- Row B -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="B1">
                <span>B1</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>B2</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="B3">
                <span>B3</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="B4">
                <span>B4</span>
            </label>
        </div>

        <button type="submit" class="btn">Book Now</button>
    </form>

</body>
</html>
