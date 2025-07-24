<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // assuming only 1 row
        return view('contact', compact('settings'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        $settings = Setting::first();

        Mail::raw("Name: {$validated['name']}\nEmail: {$validated['email']}\nMessage: {$validated['message']}", function ($message) use ($settings, $validated) {
            $message->to('tshensowazila2004@gmail.com')
                    ->subject("Contact Message from {$validated['name']}");
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
