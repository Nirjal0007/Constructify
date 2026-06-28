@php $project = $project ?? null; @endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Project Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $project?->title) }}">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $project?->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Client</label>
        <input type="text" name="client" class="form-control" value="{{ old('client', $project?->client) }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="{{ old('location', $project?->location) }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach (['ongoing' => 'Ongoing', 'completed' => 'Completed', 'upcoming' => 'Upcoming'] as $value => $label)
                <option value="{{ $value }}" {{ old('status', $project?->status) === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control"
               value="{{ old('start_date', $project?->start_date?->format('Y-m-d')) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">End Date</label>
        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
               value="{{ old('end_date', $project?->end_date?->format('Y-m-d')) }}">
        @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Short Description</label>
        <textarea name="short_description" rows="2" class="form-control" maxlength="500">{{ old('short_description', $project?->short_description) }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Full Description</label>
        <textarea name="description" rows="6" class="form-control">{{ old('description', $project?->description) }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Featured Image {{ $project ? '(leave blank to keep current)' : '' }}</label>
        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
        @error('featured_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($project?->featured_image)
            <img src="{{ $project->featured_image_url }}" class="mt-2 rounded" style="height: 80px; object-fit: cover;">
        @endif
    </div>

    <div class="col-md-6">
        <label class="form-label">Gallery Images (multiple)</label>
        <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
        @if ($project && $project->images->isNotEmpty())
            <div class="d-flex gap-2 mt-2 flex-wrap">
                @foreach ($project->images as $image)
                    <div class="position-relative">
                        <img src="{{ $image->url }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                        <form action="{{ route('admin.projects.images.destroy', $image) }}" method="POST" class="position-absolute top-0 end-0" onsubmit="return confirm('Remove this image?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger p-0" style="width: 20px; height: 20px; font-size: 10px;"><i class="bi bi-x"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="col-12">
        <div class="form-check">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured"
                   {{ old('is_featured', $project?->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Show on homepage as a featured project</label>
        </div>
    </div>
</div>

<hr class="my-4">
