@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.services._form')
                <button type="submit" class="btn btn-primary px-4">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
