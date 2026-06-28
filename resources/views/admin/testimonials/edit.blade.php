@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.testimonials._form')
                <button type="submit" class="btn btn-primary px-4">Update Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
