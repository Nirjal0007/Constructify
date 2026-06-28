@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.blogs._form')
                <button type="submit" class="btn btn-primary px-4">Update Post</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
