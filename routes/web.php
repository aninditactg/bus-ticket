<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Public booking flow
Route::middleware('auth')->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/booking', [BookingController::class, 'storeBooking'])->name('booking.info.store');
    // Alias for existing templates expecting this name
    Route::post('/booking/save', [BookingController::class, 'storeBooking'])->name('booking.saveInfo');
    Route::get('/booking/seat/{busId?}', [BookingController::class, 'showSeatLayout'])->name('seat.layout');
    Route::post('/booking/seat', [BookingController::class, 'store'])->name('booking.store');
});

// Optional legacy seat routes
Route::get('/seatlayout', [SeatController::class, 'index'])->name('seat.index');
Route::post('/seatlayout', [SeatController::class, 'store'])->name('seat.store');

// Buses (basic management)
Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
Route::get('/buses/create', [BusController::class, 'create'])->name('buses.create');
Route::post('/buses', [BusController::class, 'store'])->name('buses.store');

// Test Email Route
Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('anindita.ctg32@gmail.com')
                ->subject('Test Email');
    });
    return 'Email sent successfully!';
});

// Seat Selection Page (frontend view only)
Route::get('/seat', fn() => view('seatlayout'))->name('seat');
Route::get('/book', [BookingController::class, 'index']);

//For showing the seat page (seat layout)
Route::get('/seat/{busId}', [BookingController::class, 'showSeatLayout'])->name('seat.layout');
Route::post('/seat', [BookingController::class, 'seatStore'])->name('seat.store');
// Note: Authentication routes (login, register, etc.) are handled by Laravel Breeze in routes/auth.php

// For booking a seat using POST
 Route::post('/book-seat', [BookingController::class, 'bookSeat'])->name('book.seat');

Route::post('/book-seats', [BookingController::class, 'store'])->name('book.seats');
Route::post('/seats/book', [SeatController::class, 'store'])->name('seat.store');
Route::get('/confirmation', fn() => view('confirmation'))->name('confirmation');
Route::get('/seats', [SeatController::class, 'index'])->name('seat.layout');
Route::post('/seats', [SeatController::class, 'store'])->name('seat.store');
// Note: Authentication routes (login, register, etc.) are handled by Laravel Breeze in routes/auth.php










