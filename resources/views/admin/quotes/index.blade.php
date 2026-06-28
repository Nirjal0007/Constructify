@extends('layouts.admin')

@section('title', 'Quote Requests')

@section('content')

    <p class="text-secondary mb-4">Quote requests submitted through the "Request a Quote" form.</p>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Budget</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quotes as $quote)
                        <tr>
                            <td>{{ $quote->name }}</td>
                            <td>{{ $quote->service?->title ?? 'General Inquiry' }}</td>
                            <td>{{ $quote->budget_range ?? '—' }}</td>
                            <td>{{ $quote->created_at->format('M d, Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $quote->status === 'pending' ? 'warning text-dark' : ($quote->status === 'contacted' ? 'info text-dark' : 'secondary') }}">
                                    {{ ucfirst($quote->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.quotes.show', $quote) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</a>
                                <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this quote request?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">No quote requests yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $quotes->links() }}</div>

@endsection
