@extends('layouts.app')

@section('title', 'Our Team')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Our Team</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Team
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-4">
                @forelse ($team as $member)
                    <div class="col-md-6 col-lg-3">
                        <x-team-card :member="$member" />
                    </div>
                @empty
                    <p class="text-center text-secondary">Team info coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
