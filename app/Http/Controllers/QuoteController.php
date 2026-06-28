<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteFormRequest;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function create(): View
    {
        $services = Service::orderBy('title')->get();

        return view('quote.create', compact('services'));
    }

    public function store(QuoteFormRequest $request): RedirectResponse
    {
        QuoteRequest::create($request->validated());

        return redirect()
            ->route('quote.success')
            ->with('success', 'Your quote request has been submitted!');
    }

    public function success(): View
    {
        return view('quote.success');
    }
}
