@props(['project'])

<div class="card border-0 shadow-sm overflow-hidden project-card h-100">
    <div class="position-relative overflow-hidden" style="height: 240px;">
        <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
             class="w-100 h-100 object-fit-cover">
        @if ($project->category)
            <span class="badge bg-primary position-absolute top-0 start-0 m-3">
                {{ $project->category->name }}
            </span>
        @endif
        <div class="project-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-light rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>
    </div>
    <div class="card-body p-4">
        <h5 class="fw-bold mb-1">
            <a href="{{ route('projects.show', $project->slug) }}" class="text-dark text-decoration-none">
                {{ $project->title }}
            </a>
        </h5>
        <p class="text-secondary small mb-0">
            <i class="bi bi-geo-alt me-1"></i>{{ $project->location ?? 'Location N/A' }}
        </p>
    </div>
</div>
