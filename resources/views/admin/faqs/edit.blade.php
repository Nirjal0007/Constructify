@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.faqs._form')
                <button type="submit" class="btn btn-primary px-4">Update FAQ</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            </form>
        </div>
    </div>

@endsection
