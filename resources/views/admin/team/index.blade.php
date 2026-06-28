@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-secondary mb-0">Manage your team members.</p>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Member</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Order</th>
                        <th>Active</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td><img src="{{ $member->photo_url }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td class="fw-semibold">{{ $member->name }}</td>
                            <td>{{ $member->designation }}</td>
                            <td>{{ $member->order }}</td>
                            <td>{!! $member->is_active ? '<i class="bi bi-check-circle-fill text-success"></i>' : '<i class="bi bi-dash-circle text-secondary"></i>' !!}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team member?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">No team members found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $members->links() }}</div>

@endsection
