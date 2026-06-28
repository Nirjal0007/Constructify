@extends('layouts.app')

@section('title', 'Request a Quote')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Request a Quote</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Request a Quote
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-secondary text-center mb-4">
                        Tell us about your project and we'll get back to you with a free, no-obligation quote within 24-48 hours.
                    </p>

                    <form action="{{ route('quote.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Service Needed</label>
                            <select name="service_id" class="form-select">
                                <option value="">Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Estimated Budget</label>
                            <select name="budget_range" class="form-select">
                                <option value="">Select a range</option>
                                <option value="Under $10,000">Under $10,000</option>
                                <option value="$10,000 - $50,000">$10,000 - $50,000</option>
                                <option value="$50,000 - $150,000">$50,000 - $150,000</option>
                                <option value="$150,000+">$150,000+</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Project Details</label>
                            <textarea name="project_details" rows="6"
                                      class="form-control @error('project_details') is-invalid @enderror"
                                      placeholder="Describe your project: scope, timeline, location...">{{ old('project_details') }}</textarea>
                            @error('project_details') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
