<!DOCTYPE html>
<html>
<head>
    <title>Add New Bus</title>
</head>
<body>
    <h1>Add New Bus</h1>
    <a href="{{ route('buses.index') }}">Back to Bus List</a>

    <!-- Error messages -->
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Success message -->
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <!-- Add Bus Form -->
    <form method="POST" action="{{ route('buses.store') }}">
        @csrf
        <label>Bus Number:</label><br>
        <input type="text" name="bus_number" value="{{ old('bus_number') }}"><br><br>

        <label>Bus Name:</label><br>
        <input type="text" name="bus_name" value="{{ old('bus_name') }}"><br><br>

        <label>Type (AC / Non-AC):</label><br>
        <input type="text" name="type" value="{{ old('type') }}"><br><br>

        <label>Total Seats:</label><br>
        <input type="number" name="total_seat" value="{{ old('total_seat', 30) }}"><br><br>

        <button type="submit">Add Bus</button>
    </form>
</body>
</html>
