<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'message' => 'required|string|max:1000',
            'email' => 'nullable|email',
            'name' => 'nullable|string|max:255',
        ]);

        Feedback::create($request->only('name', 'email', 'message'));

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
