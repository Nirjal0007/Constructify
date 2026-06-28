@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-secondary mb-0">Manage blog posts and articles.</p>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.ai-blog.create') }}" class="btn btn-outline-primary"><i class="bi bi-stars"></i> AI Generate</a>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Post</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td><img src="{{ $blog->image_url }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td class="fw-semibold">
                                {{ $blog->title }}
                                @if ($blog->is_ai_generated)
                                    <span class="badge bg-info text-dark ms-1"><i class="bi bi-stars"></i> AI</span>
                                @endif
                            </td>
                            <td>{{ $blog->category?->name ?? '—' }}</td>
                            <td>{{ $blog->author?->name ?? '—' }}</td>
                            <td>
                                <span class="badge bg-{{ $blog->is_published ? 'success' : 'secondary' }}">
                                    {{ $blog->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td>{{ $blog->published_at?->format('M d, Y') ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-secondary py-4">No blog posts found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $blogs->links() }}</div>

@endsection
