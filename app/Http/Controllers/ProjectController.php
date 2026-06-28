<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = Project::with('category')->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        $projects = $query->paginate(9)->withQueryString();
        $categories = Category::where('type', 'project')->get();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(string $slug): View
    {
        $project = Project::with('images', 'category')->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::where('id', '!=', $project->id)->latest()->take(3)->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
