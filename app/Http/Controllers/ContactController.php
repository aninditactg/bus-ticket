<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'message' => 'required|string|max:1000',
        ]);

        // Save the contact message to the database
        Contact::create($validated);

        // Send email to admin with the validated data
        Mail::to('anindita.ctg32@gmail.com')->send(new ContactFormMail($validated));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thanks — we received your message and sent an email!');
    }
}


