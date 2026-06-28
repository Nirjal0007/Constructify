@extends('layouts.app')

@section('title', $service->title)

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">{{ $service->title }}</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> /
                <a href="{{ route('services.index') }}" class="text-secondary">Services</a> / {{ $service->title }}
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="img-fluid rounded shadow mb-4 w-100">
                    <h3 class="fw-bold mb-3">Overview</h3>
                    <div class="text-secondary">
                        {!! $service->description ?? $service->short_description !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded p-4 mb-4">
                        <h5 class="fw-bold mb-3">All Services</h5>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            @foreach ($relatedServices as $related)
                                <li>
                                    <a href="{{ route('services.show', $related->slug) }}"
                                       class="text-decoration-none text-dark d-flex justify-content-between align-items-center py-2 border-bottom">
                                        {{ $related->title }} <i class="bi bi-arrow-right text-primary"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-primary text-white rounded p-4 text-center">
                        <h5 class="fw-bold">Need This Service?</h5>
                        <p class="small mb-3">Get a free, no-obligation quote today.</p>
                        <a href="{{ route('quote.create') }}" class="btn btn-light rounded-pill px-4">Request a Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
