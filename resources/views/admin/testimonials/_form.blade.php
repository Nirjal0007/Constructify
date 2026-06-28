@php $testimonial = $testimonial ?? null; @endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Client Name</label>
        <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror"
               value="{{ old('client_name', $testimonial?->client_name) }}">
        @error('client_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Client Role / Company</label>
        <input type="text" name="client_role" class="form-control" placeholder="e.g. Property Developer"
               value="{{ old('client_role', $testimonial?->client_role) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Rating</label>
        <select name="rating" class="form-select @error('rating') is-invalid @enderror">
            @for ($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', $testimonial?->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
        @error('rating') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Photo {{ $testimonial ? '(leave blank to keep current)' : '' }}</label>
        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($testimonial?->photo)
            <img src="{{ $testimonial->photo_url }}" class="mt-2 rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
        @endif
    </div>

    <div class="col-12">
        <label class="form-label">Testimonial Message</label>
        <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror">{{ old('message', $testimonial?->message) }}</textarea>
        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <div class="form-check">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                   {{ old('is_active', $testimonial?->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active (visible on site)</label>
        </div>
    </div>
</div>

<hr class="my-4">
