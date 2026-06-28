@php $faq = $faq ?? null; @endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Question</label>
        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
               value="{{ old('question', $faq?->question) }}">
        @error('question') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Answer</label>
        <textarea name="answer" rows="4" class="form-control @error('answer') is-invalid @enderror">{{ old('answer', $faq?->answer) }}</textarea>
        @error('answer') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Display Order</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $faq?->order ?? 0) }}">
    </div>

    <div class="col-md-4 d-flex align-items-center">
        <div class="form-check mt-4">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                   {{ old('is_active', $faq?->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active (visible on site)</label>
        </div>
    </div>
</div>

<hr class="my-4">
