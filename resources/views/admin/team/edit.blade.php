@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.team._form')
                <button type="submit" class="btn btn-primary px-4">Update Member</button>
                <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
