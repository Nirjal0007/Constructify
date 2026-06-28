@extends('layouts.app')

@section('title', 'Quote Request Received')

@section('content')

    <section class="section-py">
        <div class="container text-center">
            <i class="bi bi-check-circle-fill text-primary" style="font-size: 5rem;"></i>
            <h1 class="fw-bold mt-4">Thank You!</h1>
            <p class="text-secondary mx-auto mb-4" style="max-width: 500px;">
                Your quote request has been received. One of our project consultants will reach out to you within
                24-48 hours to discuss your project in detail.
            </p>
            <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4">Back to Home</a>
        </div>
    </section>

@endsection
