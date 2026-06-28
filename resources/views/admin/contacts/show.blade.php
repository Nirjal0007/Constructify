@extends('layouts.admin')

@section('title', 'Message Detail')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h5 class="fw-bold mb-1">{{ $contact->subject ?? 'No Subject' }}</h5>
                    <p class="text-secondary mb-0">
                        From <strong>{{ $contact->name }}</strong> &lt;{{ $contact->email }}&gt;
                        @if ($contact->phone) &middot; {{ $contact->phone }} @endif
                    </p>
                    <small class="text-secondary">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</small>
                </div>
                <a href="mailto:{{ $contact->email }}" class="btn btn-primary"><i class="bi bi-reply"></i> Reply via Email</a>
            </div>

            <hr>

            <p class="mb-0" style="white-space: pre-line;">{{ $contact->message }}</p>
        </div>
    </div>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Back to Messages
    </a>

@endsection
