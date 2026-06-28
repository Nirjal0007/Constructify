@extends('layouts.app')

@section('title', 'Blog')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Our Blog</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / Blog
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="row g-4">
                        @forelse ($blogs as $blog)
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <img src="{{ $blog->image_url }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $blog->title }}">
                                    <div class="card-body">
                                        <small class="text-primary fw-semibold">{{ $blog->category?->name ?? 'General' }}</small>
                                        <h5 class="fw-bold mt-2">
                                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-dark text-decoration-none">{{ $blog->title }}</a>
                                        </h5>
                                        <p class="text-secondary small">{{ $blog->excerpt }}</p>
                                        <small class="text-secondary">
                                            <i class="bi bi-calendar3"></i> {{ $blog->published_at?->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-secondary">No blog posts yet.</p>
                        @endforelse
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-4">
                        <h5 class="fw-bold mb-3">Categories</h5>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li>
                                <a href="{{ route('blog.index') }}" class="text-decoration-none text-dark d-flex justify-content-between py-2 border-bottom">
                                    All Posts
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                       class="text-decoration-none text-dark d-flex justify-content-between py-2 border-bottom">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
