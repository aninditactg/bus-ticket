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
            <!-- Rows C -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="C1">
                <span>C1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="C2">
                <span>C2</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="C3">
                <span>C3</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>C4</span>
            </label>
            <!-- Row D -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="D1">
                <span>D1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="D2">
                <span>D2</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>D3</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="D4">
                <span>D4</span>
            </label>
            <!-- Row E -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="E1">
                <span>E1</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>E2</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="E3">
                <span>E3</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="E4">
                <span>E4</span>
            </label>
            <!-- Row F -->
            <label class="seat">
                <input type="checkbox" name="seats[]" value="F1">
                <span>F1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="F2">
                <span>F2</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="F3">
                <span>F3</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>F4</span>
            </label>
            <!-- Row G -->
            <label class ="seat">
                <input type="checkbox" name="seats[]" value="G1">
                <span>G1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="G2">
                <span>G2</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>G3</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="G4">
                <span>G4</span>
            </label>
            <!-- Row H -->
            <label class ="seat">
                <input type="checkbox" name="seats[]" value="H1">
                <span>H1</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="H2">
                <span>H2</span>
            </label>
            <label class="seat">
                <input type="checkbox" name="seats[]" value="H3">
                <span>H3</span>
            </label>
            <label class="seat booked">
                <input type="checkbox" disabled>
                <span>H4</span>
            </label>


        </div>


        <button type="submit" class="btn">Book Now</button>
    </form>

</body>
</html>
