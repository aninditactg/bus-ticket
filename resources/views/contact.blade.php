@extends('layouts.public')

@section('title', 'Contact')

@section('content')
<div class="container mt-5">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you! Fill out the form below and we’ll get back to you as soon as possible.</p>

    {{-- Feedback messages --}}
    <div id="formAlerts"></div>

    {{-- Contact Form --}}
    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection


