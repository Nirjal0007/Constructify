@extends('layouts.admin')

@section('title', 'Add User')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                @include('admin.users._form')
                <button type="submit" class="btn btn-primary px-4">Save User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
