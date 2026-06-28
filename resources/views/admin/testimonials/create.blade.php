@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.testimonials._form')
                <button type="submit" class="btn btn-primary px-4">Save Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
