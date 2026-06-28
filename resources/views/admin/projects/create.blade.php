@extends('layouts.admin')

@section('title', 'Add Project')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.projects._form')
                <button type="submit" class="btn btn-primary px-4">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
