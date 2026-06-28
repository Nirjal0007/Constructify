@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Contact Us</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Contact
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-4 mb-5 text-center">
                <div class="col-md-4">
                    <i class="bi bi-geo-alt-fill text-primary fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Our Office</h5>
                    <p class="text-secondary mb-0">742 Evergreen Terrace<br>Springfield, IL 62701</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-telephone-fill text-primary fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Call Us</h5>
                    <p class="text-secondary mb-0">+1 (555) 334-6789<br>+1 (555) 987-6543</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-envelope-fill text-primary fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Email Us</h5>
                    <p class="text-secondary mb-0">contact@example.com<br>projects@example.com</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
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
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="6" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
