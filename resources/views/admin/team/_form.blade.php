@php $member = $member ?? null; @endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $member?->name) }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Designation</label>
        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
               placeholder="e.g. Project Manager" value="{{ old('designation', $member?->designation) }}">
        @error('designation') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Bio</label>
        <textarea name="bio" rows="3" class="form-control">{{ old('bio', $member?->bio) }}</textarea>
    </div>

    <div class="col-md-4">
        <label class="form-label">Facebook URL</label>
        <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror"
               value="{{ old('facebook_url', $member?->facebook_url) }}">
        @error('facebook_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Twitter/X URL</label>
        <input type="url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror"
               value="{{ old('twitter_url', $member?->twitter_url) }}">
        @error('twitter_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">LinkedIn URL</label>
        <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror"
               value="{{ old('linkedin_url', $member?->linkedin_url) }}">
        @error('linkedin_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Photo {{ $member ? '(leave blank to keep current)' : '' }}</label>
        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($member?->photo)
            <img src="{{ $member->photo_url }}" class="mt-2 rounded-circle" style="width: 70px; height: 70px; object-fit: cover;">
        @endif
    </div>

    <div class="col-md-3">
        <label class="form-label">Display Order</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $member?->order ?? 0) }}">
    </div>

    <div class="col-md-3 d-flex align-items-center">
        <div class="form-check mt-4">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                   {{ old('is_active', $member?->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>

<hr class="my-4">
