@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center fs-4">
                    Book Your Seat
                </div>
                <div class="card-body p-4 bg-light">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                        @csrf

                        {{-- Passenger Info --}}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control rounded-pill shadow-sm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control rounded-pill shadow-sm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control rounded-pill shadow-sm" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">From</label>
                                <input type="text" name="from" class="form-control rounded-pill shadow-sm" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">To</label>
                                <input type="text" name="to" class="form-control rounded-pill shadow-sm" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Journey Date</label>
                            <input type="date" name="journey_date" class="form-control rounded-pill shadow-sm" required>
                        </div>

                        {{-- Hidden field to store selected seats --}}
                        <input type="hidden" name="selected_seats" id="selected_seats_input">

                        {{-- Seat Layout --}}
<div class="mb-3">
    <label class="form-label">Select Seat</label>
    <select name="selected_seat" id="selected_seat" class="form-control rounded-pill shadow-sm" required>
        <option value="" disabled selected>Select a seat</option>
        <option value="A1">A1</option>
        <option value="A2">A2</option>
        <option value="A3">A3</option>
        <option value="A4">A4</option>
        <option value="B1">B1</option>
        <option value="B2">B2</option>
        <option value="B3">B3</option>
        <option value="B4">B4</option>
        <option value="C1">C1</option>
        <option value="C2">C2</option>
        <option value="C3">C3</option>
        <option value="C4">C4</option>
        <option value="D1">D1</option>
        <option value="D2">D2</option>
        <option value="D3">D3</option>
        <option value="D4">D4</option>
    </select>
</div>

                        <div class="text-center">
                            <button class="btn btn-primary rounded-pill px-5 shadow" type="submit" id="book_submit_btn" disabled>
                                Book Now
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .seat {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 5px;
        text-align: center;
        cursor: pointer;
        border-radius: 6px;
        background: #f8f9fa;
        min-width: 40px;
    }
    .seat.selected {
        background-color: #28a745;
        color: white;
    }
    .seat.booked {
        background-color: #dc3545;
        color: white;
        cursor: not-allowed;
    }
    .empty {
        visibility: hidden;
    }
</style>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.seat').forEach(seat => {
    seat.addEventListener('click', function() {
        if (this.classList.contains('booked') || this.classList.contains('empty')) return;

        this.classList.toggle('selected');
        updateSelectedSeats();
    });
});

function updateSelectedSeats() {
    const selectedSeats = [...document.querySelectorAll('.seat.selected')].map(seat => seat.dataset.seat);
    document.getElementById('selected_seats_input').value = selectedSeats.join(',');
    document.getElementById('book_submit_btn').disabled = selectedSeats.length === 0;
}
</script>
@endpush


