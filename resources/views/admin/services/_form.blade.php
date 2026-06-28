@php $service = $service ?? null; @endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Service Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $service?->title) }}">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $service?->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Icon Class (Bootstrap Icons)</label>
        <input type="text" name="icon" class="form-control" placeholder="e.g. bi-building"
               value="{{ old('icon', $service?->icon) }}">
        <small class="text-secondary">Browse icons at icons.getbootstrap.com</small>
    </div>

    <div class="col-md-6">
        <label class="form-label">Display Order</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $service?->order ?? 0) }}">
    </div>

    <div class="col-12">
        <label class="form-label">Short Description</label>
        <textarea name="short_description" rows="2" class="form-control" maxlength="500">{{ old('short_description', $service?->short_description) }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Full Description</label>
        <textarea name="description" rows="6" class="form-control">{{ old('description', $service?->description) }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Image {{ $service ? '(leave blank to keep current)' : '' }}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($service?->image)
            <img src="{{ $service->image_url }}" class="mt-2 rounded" style="height: 80px; object-fit: cover;">
        @endif
    </div>

    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check mt-4">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                   {{ old('is_featured', $service?->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Feature this service on homepage</label>
        </div>
    </div>
</div>

<hr class="my-4">
