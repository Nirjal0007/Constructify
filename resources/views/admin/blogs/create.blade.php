@extends('layouts.admin')

@section('title', 'Add Blog Post')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.blogs._form')
                <button type="submit" class="btn btn-primary px-4">Save Post</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
