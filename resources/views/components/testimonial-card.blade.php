@props(['testimonial'])

<div class="card border-0 shadow-sm h-100 testimonial-card">
    <div class="card-body p-4">
        <div class="text-warning mb-3">
            @for ($i = 1; $i <= 5; $i++)
                <i class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
            @endfor
        </div>
        <p class="text-secondary fst-italic mb-4">&ldquo;{{ $testimonial->message }}&rdquo;</p>
        <div class="d-flex align-items-center gap-3">
            <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                 class="rounded-circle object-fit-cover" style="width: 48px; height: 48px;">
            <div>
                <h6 class="fw-bold mb-0">{{ $testimonial->client_name }}</h6>
                <small class="text-primary">{{ $testimonial->client_role }}</small>
            </div>
        </div>
    </div>
</div>
