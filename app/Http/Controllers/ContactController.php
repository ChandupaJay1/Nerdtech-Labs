<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new contact form submission.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        // Store the contact in the database
        $contact = Contact::create($validated);

        // Send email notification to admin
        $adminEmail = config('mail.admin_email');
        if ($adminEmail) {
            Notification::route('mail', $adminEmail)
                ->notify(new ContactFormSubmitted($contact));
        }

        // Redirect back with success message
        return redirect()->route('contact')->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
