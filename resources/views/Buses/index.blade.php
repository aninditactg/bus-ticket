<!DOCTYPE html>
<html>
<head>
    <title>All Buses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-bottom: 10px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>All Buses</h1>
    <a href="{{ route('buses.create') }}">+ Add New Bus</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Bus Number</th>
            <th>Bus Name</th>
            <th>Type</th>
            <th>Total Seats</th>
        </tr>
        @foreach($buses as $bus)
        <tr>
            <td>{{ $bus->id }}</td>
            <td>{{ $bus->bus_number }}</td>
            <td>{{ $bus->bus_name }}</td>
            <td>{{ $bus->type }}</td>
            <td>{{ $bus->total_seat }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
