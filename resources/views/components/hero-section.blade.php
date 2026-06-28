@props([
    'badge' => 'Trusted Construction Partner Since 1998',
    'titleLine1' => "Building Tomorrow's",
    'titleHighlight' => 'Infrastructure',
    'titleLine2' => 'Today',
    'subtitle' => 'We deliver world-class construction services across residential, commercial, and infrastructure sectors with uncompromising quality and on-time delivery.',
    'primaryCtaText' => 'Explore Projects',
    'primaryCtaUrl' => null,
    'secondaryCtaText' => 'Request a Quote',
    'secondaryCtaUrl' => null,
    'backgroundImage' => null,
])

<section class="hero-section position-relative text-white d-flex align-items-center"
         style="min-height: 90vh; background: {{ $backgroundImage ? "url('$backgroundImage') center/cover no-repeat" : 'linear-gradient(135deg, #0f1b2d, #1c3554)' }};">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(10, 20, 35, 0.65);"></div>

    <div class="container position-relative py-5">
        <div class="row">
            <div class="col-lg-7">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3 fw-semibold">
                    <i class="bi bi-patch-check-fill me-1"></i> {{ $badge }}
                </span>

                <h1 class="display-4 fw-bold mb-4">
                    {{ $titleLine1 }} <span class="text-primary">{{ $titleHighlight }}</span> {{ $titleLine2 }}
                </h1>

                <p class="lead text-light-emphasis mb-5" style="max-width: 560px;">
                    {{ $subtitle }}
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ $primaryCtaUrl ?? route('projects.index') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                        {{ $primaryCtaText }} <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ $secondaryCtaUrl ?? route('quote.create') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">
                        {{ $secondaryCtaText }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
