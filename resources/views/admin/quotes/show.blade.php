@extends('layouts.admin')

@section('title', 'Quote Request Detail')

@section('content')

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Project Details</h5>
                    <p style="white-space: pre-line;">{{ $quote->project_details }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Contact Info</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                        <li><i class="bi bi-person text-primary me-2"></i>{{ $quote->name }}</li>
                        <li><i class="bi bi-envelope text-primary me-2"></i>{{ $quote->email }}</li>
                        <li><i class="bi bi-telephone text-primary me-2"></i>{{ $quote->phone }}</li>
                        <li><i class="bi bi-tools text-primary me-2"></i>{{ $quote->service?->title ?? 'General Inquiry' }}</li>
                        <li><i class="bi bi-cash text-primary me-2"></i>{{ $quote->budget_range ?? 'Not specified' }}</li>
                        <li><i class="bi bi-calendar3 text-primary me-2"></i>{{ $quote->created_at->format('M d, Y') }}</li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Update Status</h6>
                    <form action="{{ route('admin.quotes.status', $quote) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select mb-3">
                            @foreach (['pending' => 'Pending', 'contacted' => 'Contacted', 'closed' => 'Closed'] as $value => $label)
                                <option value="{{ $value }}" {{ $quote->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                    </form>
                    <a href="mailto:{{ $quote->email }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="bi bi-envelope"></i> Contact Client
                    </a>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.quotes.index') }}" class="btn btn-outline-secondary mt-4">
        <i class="bi bi-arrow-left"></i> Back to Quote Requests
    </a>

@endsection
