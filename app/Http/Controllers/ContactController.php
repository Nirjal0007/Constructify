<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());

        return redirect()
            ->route('contact.index')
            ->with('success', 'Thank you for reaching out! We will get back to you shortly.');
    }
}
