@extends('layouts.app')

@section('title', 'Client Testimonials')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Client Testimonials</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Testimonials
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-4">
                @forelse ($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <x-testimonial-card :testimonial="$testimonial" />
                    </div>
                @empty
                    <p class="text-center text-secondary">No testimonials yet.</p>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $testimonials->links() }}
            </div>
        </div>
    </section>

@endsection
