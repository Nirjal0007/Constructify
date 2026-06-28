@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')

    <p class="text-secondary mb-4">Messages submitted through the website contact form.</p>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr class="{{ $contact->is_read ? '' : 'fw-semibold' }}">
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject ?? '—' }}</td>
                            <td>{{ $contact->created_at->format('M d, Y') }}</td>
                            <td>
                                @if (! $contact->is_read)
                                    <span class="badge bg-primary">New</span>
                                @else
                                    <span class="badge bg-secondary">Read</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">No messages yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $contacts->links() }}</div>

@endsection
