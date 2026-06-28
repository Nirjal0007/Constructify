@extends('layouts.app')

@section('title', $project->title)

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">{{ $project->title }}</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> /
                <a href="{{ route('projects.index') }}" class="text-secondary">Projects</a> / {{ $project->title }}
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="img-fluid rounded shadow mb-4 w-100">

                    @if ($project->images->isNotEmpty())
                        <div class="row g-2 mb-4">
                            @foreach ($project->images as $image)
                                <div class="col-4">
                                    <img src="{{ $image->url }}" alt="{{ $image->caption }}" class="img-fluid rounded" style="height: 150px; width: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <h3 class="fw-bold mb-3">Project Overview</h3>
                    <div class="text-secondary">
                        {!! $project->description ?? $project->short_description !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-4 mb-4">
                        <h5 class="fw-bold mb-3">Project Details</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                            <li class="d-flex justify-content-between border-bottom pb-2">
                                <span class="text-secondary">Client</span>
                                <span class="fw-semibold">{{ $project->client ?? 'N/A' }}</span>
                            </li>
                            <li class="d-flex justify-content-between border-bottom pb-2">
                                <span class="text-secondary">Location</span>
                                <span class="fw-semibold">{{ $project->location ?? 'N/A' }}</span>
                            </li>
                            <li class="d-flex justify-content-between border-bottom pb-2">
                                <span class="text-secondary">Status</span>
                                <span class="badge bg-primary">{{ ucfirst($project->status) }}</span>
                            </li>
                            <li class="d-flex justify-content-between border-bottom pb-2">
                                <span class="text-secondary">Start Date</span>
                                <span class="fw-semibold">{{ $project->start_date?->format('M Y') ?? 'N/A' }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-secondary">Category</span>
                                <span class="fw-semibold">{{ $project->category?->name ?? 'General' }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-primary text-white rounded p-4 text-center mb-4">
                        <h5 class="fw-bold">Have a Similar Project?</h5>
                        <p class="small mb-3">Let's discuss how we can help.</p>
                        <a href="{{ route('quote.create') }}" class="btn btn-light rounded-pill px-4">Request a Quote</a>
                    </div>

                    <h5 class="fw-bold mb-3">Related Projects</h5>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($relatedProjects as $related)
                            <a href="{{ route('projects.show', $related->slug) }}" class="d-flex gap-3 text-decoration-none text-dark">
                                <img src="{{ $related->featured_image_url }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $related->title }}</h6>
                                    <small class="text-secondary">{{ $related->location }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
