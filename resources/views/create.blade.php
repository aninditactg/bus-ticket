@extends('layouts.app') <!-- Use your main layout -->

@section('content')
<div class="container">
    <h1>Add New User</h1>
    <a href="{{ route('users.index') }}">Back to Users List</a>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- User Creation Form -->
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div><br>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div><br>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password">
        </div><br>

        <div>
            <label>Phone:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div><br>

        <div>
            <label>Role:</label><br>
            <select name="role">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div><br>

        <button type="submit">Add User</button>
    </form>
</div>
@endsection
