@extends('layouts.admin')

@section('title', 'Services')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-secondary mb-0">Manage the services you offer.</p>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Service</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Order</th>
                        <th>Featured</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td><img src="{{ $service->image_url }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td class="fw-semibold">{{ $service->title }}</td>
                            <td>{{ $service->category?->name ?? '—' }}</td>
                            <td>{{ $service->order }}</td>
                            <td>{!! $service->is_featured ? '<i class="bi bi-check-circle-fill text-success"></i>' : '<i class="bi bi-dash-circle text-secondary"></i>' !!}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">No services found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $services->links() }}</div>

@endsection
