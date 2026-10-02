<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contact = Contact::first() ?? new Contact();
        return view('admin.kontak.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'email'     => 'nullable|email|max:255',
            'whatsapp'  => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'tiktok'    => 'nullable|string|max:255',
            'alamat'    => 'nullable|string',
        ]);

        $contact = Contact::first();

        if ($contact) {
            $contact->update($data);
        } else {
            Contact::create($data);
        }

        return back()->with('success', 'Pengaturan Kontak & Media Sosial berhasil diperbarui!');
    }
}