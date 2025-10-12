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

// Contact and feedback
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Authenticated pages
Route::middleware('auth')->group(function () {
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
    // Simple user management demo routes (views in project root)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});
