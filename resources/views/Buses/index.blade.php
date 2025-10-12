<h1>All Buses</h1>
<a href="{{ route('buses.create') }}">Add New Bus</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Bus Number</th>
<th>Bus Name</th>
<th>Type</th>
<th>Total Seats</th>
<th>Action</th>
</tr>
@foreach($buses as $bus)
<tr>
<td>{{ $bus->id }}</td>
<td>{{ $bus->bus_number }}</td>
<td>{{ $bus->bus_name }}</td>
<td>{{ $bus->type }}</td>
<td>{{ $bus->total_seat }}</td>
<td>
    <a href="{{ route('seat.layout', ['busId' => $bus->id]) }}" class="btn btn-success">Select</a>
</td>
</tr>
@endforeach
</table>
