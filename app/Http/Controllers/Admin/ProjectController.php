<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('category')->latest()->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        $categories = Category::where('type', 'project')->get();

        return view('admin.projects.create', compact('categories'));
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        $project = Project::create($data);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $file->store('projects/gallery', 'public'),
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        $categories = Category::where('type', 'project')->get();

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        $project->update($data);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $file->store('projects/gallery', 'public'),
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function destroyImage(ProjectImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image removed.');
    }
}
