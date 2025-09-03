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

 

                        <div class="text-center">
                            <button class="btn btn-primary rounded-pill px-5 shadow" type="button"
                                    onclick="window.location.href='/seat'">
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
    /* ===============================
       Seat Styles
    ============================== */
    .seat-layout {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .seat-row {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .seat {
        border: 1px solid #ccc;
        padding: 10px;
        width: 50px;
        text-align: center;
        cursor: pointer;
        border-radius: 6px;
        background: #f8f9fa;
        user-select: none;
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

    /* ===============================
       Seat Legend
    ============================== */
    .seat-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0;
    }
    .seat-legend div {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .legend-box {
        width: 25px;
        height: 25px;
        border-radius: 5px;
    }
    .legend-box.available { background-color: #f8f9fa; border: 1px solid #ccc; }
    .legend-box.selected  { background-color: #28a745; }
    .legend-box.booked    { background-color: #dc3545; }
</style>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.seat').forEach(seat => {
    seat.addEventListener('click', function() {
        if (this.classList.contains('booked')) return;

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
