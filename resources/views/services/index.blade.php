@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Our Services</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Services
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-4">
                @forelse ($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <x-service-card :service="$service" />
                    </div>
                @empty
                    <p class="text-center text-secondary">No services available yet.</p>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $services->links() }}
            </div>
        </div>
    </section>

@endsection
