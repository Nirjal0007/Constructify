@props(['service'])

<div class="card h-100 border-0 shadow-sm service-card">
    <div class="card-body p-4">
        <div class="service-icon bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
             style="width: 60px; height: 60px;">
            <i class="bi {{ $service->icon ?? 'bi-building' }} fs-3"></i>
        </div>
        <h5 class="fw-bold mb-2">{{ $service->title }}</h5>
        <p class="text-secondary mb-3">{{ $service->short_description }}</p>
        <a href="{{ route('services.show', $service->slug) }}" class="fw-semibold text-primary text-decoration-none">
            Learn More <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
