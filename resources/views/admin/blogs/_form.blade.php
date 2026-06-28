@php $blog = $blog ?? null; @endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $blog?->title) }}">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $blog?->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Excerpt</label>
        <textarea name="excerpt" rows="2" class="form-control" maxlength="500">{{ old('excerpt', $blog?->excerpt) }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Content (HTML supported)</label>
        <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog?->content) }}</textarea>
        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Cover Image {{ $blog ? '(leave blank to keep current)' : '' }}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($blog?->image)
            <img src="{{ $blog->image_url }}" class="mt-2 rounded" style="height: 80px; object-fit: cover;">
        @endif
    </div>

    <div class="col-md-6 d-flex align-items-center">
        <div class="form-check mt-4">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published"
                   {{ old('is_published', $blog?->is_published) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Publish this post</label>
        </div>
    </div>
</div>

<hr class="my-4">
