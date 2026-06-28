@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-secondary mb-0">Manage client testimonials shown on the site.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Testimonial</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Photo</th>
                        <th>Client</th>
                        <th>Role</th>
                        <th>Rating</th>
                        <th>Active</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $testimonial)
                        <tr>
                            <td><img src="{{ $testimonial->photo_url }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td class="fw-semibold">{{ $testimonial->client_name }}</td>
                            <td>{{ $testimonial->client_role }}</td>
                            <td class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </td>
                            <td>{!! $testimonial->is_active ? '<i class="bi bi-check-circle-fill text-success"></i>' : '<i class="bi bi-dash-circle text-secondary"></i>' !!}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">No testimonials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $testimonials->links() }}</div>

@endsection
