<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes handle the main pages, authentication, and booking system.
| Laravel Breeze provides login/register routes automatically.
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', fn() => view('home'))->name('home');

// About Page
Route::get('/about', fn() => view('about'))->name('about');

// Contact Page
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Booking Routes
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// These routes require authentication (user must be logged in)
Route::middleware(['auth'])->group(function () {
    // Show booking form for a specific bus
    Route::get('/booking/{busId}', [BookingController::class, 'show'])->name('booking.show');

    // Save booking into database
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Show logged-in user's bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('booking.my');
});

// Users (Admin or Management Section)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Feedback
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Buses (CRUD for bus information)
Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
Route::get('/buses/create', [BusController::class, 'create'])->name('buses.create');
Route::post('/buses', [BusController::class, 'store'])->name('buses.store');

// Test Email Route
Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('your-other-email@example.com')
                ->subject('Test Email');
    });
    return 'Email sent successfully!';
});

// Seat Selection Page (frontend view only)
Route::get('/seat', fn() => view('seatbooking'))->name('seat');
Route::get('/book', [BookingController::class, 'index']);

//For showing the seat page (seat layout)
Route::get('/seat/{busId}', [BookingController::class, 'showSeatLayout'])->name('seat.layout');
Route::post('/seat', [BookingController::class, 'seatStore'])->name('seat.store');
// Note: Authentication routes (login, register, etc.) are handled by Laravel Breeze in routes/auth.php

// For booking a seat using POST
 Route::post('/book-seat', [BookingController::class, 'bookSeat'])->name('book.seat');
// For showing all bookings (admin view)
 Route::get('/all-bookings', [BookingController::class, 'allBookings'])->name('bookings.all');
// For showing booking details (admin view)
 Route::get('/booking/{id}', [BookingController::class, 'showBooking'])->name('booking.showDetails');
// For updating booking status (admin view)
 Route::post('/booking/{id}/update-status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');
// For deleting a booking (admin view)
 Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
// For showing feedbacks (admin view)
 Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
// For deleting a feedback (admin view)
 Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
// For showing contacts (admin view)
 Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
// For deleting a contact (admin view)
 Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
// For showing all users (admin view)
 Route::get('/users', [UserController::class, 'index'])->name('users.index');
// For deleting a user (admin view)
 Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// For showing all buses (admin view)
 Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
// For deleting a bus (admin view)
 Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.destroy');
// For editing a bus (admin view)
 Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
// For updating a bus (admin view)
 Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
 //For showing bus details (admin view)
 Route::get('/bus/{id}', [BusController::class, 'show'])->name('bus.showDetails');






