@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.team._form')
                <button type="submit" class="btn btn-primary px-4">Save Member</button>
                <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
