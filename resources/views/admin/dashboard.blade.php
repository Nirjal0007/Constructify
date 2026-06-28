@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-secondary small mb-1">Total Projects</p>
                        <h3 class="fw-bold mb-0">{{ $stats['total_projects'] }}</h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-building fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-secondary small mb-1">Total Services</p>
                        <h3 class="fw-bold mb-0">{{ $stats['total_services'] }}</h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-tools fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-secondary small mb-1">Total Blog Posts</p>
                        <h3 class="fw-bold mb-0">{{ $stats['total_blogs'] }}</h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-journal-text fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-secondary small mb-1">Messages</p>
                        <h3 class="fw-bold mb-0">
                            {{ $stats['total_messages'] }}
                            @if ($stats['unread_messages'] > 0)
                                <span class="badge bg-danger small">{{ $stats['unread_messages'] }} new</span>
                            @endif
                        </h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-envelope fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-secondary small mb-1">Quote Requests</p>
                        <h3 class="fw-bold mb-0">
                            {{ $stats['total_quotes'] }}
                            @if ($stats['pending_quotes'] > 0)
                                <span class="badge bg-warning text-dark small">{{ $stats['pending_quotes'] }} pending</span>
                            @endif
                        </h3>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-receipt fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0">Recent Messages</h6>
                    <a href="{{ route('admin.contacts.index') }}" class="small text-primary">View All</a>
                </div>
                <div class="list-group list-group-flush">
                    @forelse ($recentMessages as $message)
                        <a href="{{ route('admin.contacts.show', $message) }}" class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0 small fw-semibold">{{ $message->name }}</h6>
                                <small class="text-secondary">{{ $message->subject ?? 'No subject' }}</small>
                            </div>
                            @if (! $message->is_read)
                                <span class="badge bg-primary">New</span>
                            @endif
                        </a>
                    @empty
                        <div class="list-group-item text-secondary small">No messages yet.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0">Recent Quote Requests</h6>
                    <a href="{{ route('admin.quotes.index') }}" class="small text-primary">View All</a>
                </div>
                <div class="list-group list-group-flush">
                    @forelse ($recentQuotes as $quote)
                        <a href="{{ route('admin.quotes.show', $quote) }}" class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0 small fw-semibold">{{ $quote->name }}</h6>
                                <small class="text-secondary">{{ $quote->service?->title ?? 'General inquiry' }}</small>
                            </div>
                            <span class="badge bg-{{ $quote->status === 'pending' ? 'warning text-dark' : ($quote->status === 'contacted' ? 'info text-dark' : 'secondary') }}">
                                {{ ucfirst($quote->status) }}
                            </span>
                        </a>
                    @empty
                        <div class="list-group-item text-secondary small">No quote requests yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
