<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = Blog::published()->with('category', 'author')->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        $blogs = $query->paginate(9)->withQueryString();
        $categories = Category::where('type', 'blog')->get();

        return view('blog.index', compact('blogs', 'categories'));
    }

    public function show(string $slug): View
    {
        $blog = Blog::published()->with('category', 'author')->where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::published()->where('id', '!=', $blog->id)->latest('published_at')->take(4)->get();

        return view('blog.show', compact('blog', 'recentBlogs'));
    }
}
