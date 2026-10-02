<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('frontend.kontak', compact('contact'));
    }
}