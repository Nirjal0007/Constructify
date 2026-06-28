<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function index(): View
    {
        $quotes = QuoteRequest::with('service')->latest()->paginate(20);

        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(QuoteRequest $quote): View
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, QuoteRequest $quote): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:pending,contacted,closed'],
        ]);

        $quote->update(['status' => $request->status]);

        return back()->with('success', 'Quote request status updated.');
    }

    public function destroy(QuoteRequest $quote): RedirectResponse
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('success', 'Quote request deleted successfully.');
    }
}
