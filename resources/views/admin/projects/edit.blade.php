@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.projects._form')
                <button type="submit" class="btn btn-primary px-4">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
