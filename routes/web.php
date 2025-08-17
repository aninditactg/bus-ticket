<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;

// Home
Route::get('/', function () {
    return view('home');
});

// Booking
Route::get('/book', function () {
    return view('booking');
});
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');

// About
Route::get('/about', function () {
    return view('about');
});

// Contact
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Feedback
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

use Illuminate\Support\Facades\Mail;

Route::get('/send-test-email', function () {
    Mail::raw('Test email from Laravel', function ($message) {
        $message->to('your-other-email@example.com')
                ->subject('Test Email');
    });
    return 'Email sent!';
});
