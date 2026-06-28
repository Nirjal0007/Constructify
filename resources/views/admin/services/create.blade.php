@extends('layouts.admin')

@section('title', 'Add Service')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.services._form')
                <button type="submit" class="btn btn-primary px-4">Save Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
