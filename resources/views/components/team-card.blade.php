@props(['member'])

<div class="card border-0 shadow-sm text-center team-card h-100">
    <div class="overflow-hidden" style="height: 280px;">
        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-100 h-100 object-fit-cover">
    </div>
    <div class="card-body">
        <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
        <p class="text-primary small mb-3">{{ $member->designation }}</p>
        <div class="d-flex justify-content-center gap-2">
            @if ($member->facebook_url)
                <a href="{{ $member->facebook_url }}" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-facebook"></i></a>
            @endif
            @if ($member->twitter_url)
                <a href="{{ $member->twitter_url }}" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if ($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" class="btn btn-sm btn-outline-secondary rounded-circle"><i class="bi bi-linkedin"></i></a>
            @endif
        </div>
    </div>
</div>
