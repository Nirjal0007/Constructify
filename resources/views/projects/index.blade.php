@extends('layouts.app')

@section('title', 'Our Projects')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Our Projects</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Projects
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="d-flex justify-content-center gap-2 flex-wrap mb-5">
                <a href="{{ route('projects.index') }}"
                   class="btn rounded-pill {{ request('category') ? 'btn-outline-primary' : 'btn-primary' }}">All Projects</a>
                @foreach ($categories as $category)
                    <a href="{{ route('projects.index', ['category' => $category->slug]) }}"
                       class="btn rounded-pill {{ request('category') === $category->slug ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="row g-4">
                @forelse ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <x-project-card :project="$project" />
                    </div>
                @empty
                    <p class="text-center text-secondary">No projects found.</p>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $projects->links() }}
            </div>
        </div>
    </section>

@endsection
