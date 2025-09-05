<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BusController;

// Home Page
Route::get('/', fn() => view('home'))->name('home');

// About Page
Route::get('/about', fn() => view('about'))->name('about');

// Contact Page
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Booking
Route::get('/book', fn() => view('booking'))->name('booking');
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');

// Feedback
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Buses
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

// Seat Booking Page
Route::get('/seat', fn() => view('seatbooking'))->name('seat');
