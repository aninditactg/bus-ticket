<!DOCTYPE html>
<html>
<head>
    <title>Add New Bus</title>
    <style>
        /* Full-screen body */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center; /* horizontal center */
            align-items: center;     /* vertical center */
        }

        /* Container to hold form */
        .form-container {
            background: white;
            padding: 100px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            width: 400px;
            max-width: 90%; /* responsive */
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #007bff;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Add New Bus</h1>
        <a href="{{ route('buses.index') }}">← Back to Bus List</a>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success message -->
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <!-- Add Bus Form -->
        <form method="POST" action="{{ route('buses.store') }}">
            @csrf

            <label>Bus Number:</label>
            <input type="text" name="bus_number" value="{{ old('bus_number') }}" required>

            <label>Bus Name:</label>
            <input type="text" name="bus_name" value="{{ old('bus_name') }}" required>

            <label>Type (AC / Non-AC):</label>
            <input type="text" name="type" value="{{ old('type') }}" required>

            <label>Total Seats:</label>
            <input type="number" name="total_seat" value="{{ old('total_seat', 30) }}" required>

            <button type="submit">Add Bus</button>
        </form>
    </div>

</body>
</html>
