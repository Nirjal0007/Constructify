<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Services\OpenAiBlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RuntimeException;

class AiBlogController extends Controller
{
    public function __construct(protected OpenAiBlogService $aiBlogService)
    {
    }

    public function create(): View
    {
        $categories = Category::where('type', 'blog')->get();

        return view('admin.ai-blog.generate', compact('categories'));
    }

    public function generate(Request $request): View|RedirectResponse
    {
        $request->validate([
            'topic' => ['required', 'string', 'max:255'],
            'tone' => ['nullable', 'string', 'in:professional,friendly,technical,persuasive'],
        ]);

        $categories = Category::where('type', 'blog')->get();

        try {
            $generated = $this->aiBlogService->generateBlogPost(
                topic: $request->topic,
                tone: $request->tone ?? 'professional',
            );
        } catch (RuntimeException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        // Show the generated draft for review before saving — admin can edit then save.
        return view('admin.ai-blog.generate', [
            'categories' => $categories,
            'generated' => $generated,
            'topic' => $request->topic,
        ]);
    }

    public function save(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['user_id'] = $request->user()->id;
        $data['is_ai_generated'] = true;

        if (! empty($data['is_published'])) {
            $data['published_at'] = now();
        }

        $blog = Blog::create($data);

        return redirect()
            ->route('admin.blogs.edit', $blog)
            ->with('success', 'AI-generated blog post saved. You can add a cover image and review it below.');
    }
}
