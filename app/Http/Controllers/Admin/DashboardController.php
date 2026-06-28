<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Project;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_services' => Service::count(),
            'total_blogs' => Blog::count(),
            'total_messages' => Contact::count(),
            'unread_messages' => Contact::where('is_read', false)->count(),
            'total_quotes' => QuoteRequest::count(),
            'pending_quotes' => QuoteRequest::where('status', 'pending')->count(),
        ];

        $recentMessages = Contact::latest()->take(5)->get();
        $recentQuotes = QuoteRequest::with('service')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentQuotes'));
    }
}
