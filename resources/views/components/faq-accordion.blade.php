@props(['faqs', 'accordionId' => 'faqAccordion'])

<div class="accordion" id="{{ $accordionId }}">
    @foreach ($faqs as $faq)
        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
            <h2 class="accordion-header">
                <button class="accordion-button fw-semibold {{ $loop->first ? '' : 'collapsed' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="faq-{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                 data-bs-parent="#{{ $accordionId }}">
                <div class="accordion-body text-secondary">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
    @endforeach
</div>
