<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:256',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()
            ->with(['success' => "Your message has been sent successfully. We'll get back to you soon."]);
    }
}
