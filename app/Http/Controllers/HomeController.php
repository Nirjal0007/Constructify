<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('order')->take(6)->get();
        $featuredProjects = Project::where('is_featured', true)->latest()->take(6)->get();
        $team = TeamMember::where('is_active', true)->orderBy('order')->take(4)->get();
        $testimonials = Testimonial::where('is_active', true)->latest()->take(6)->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->take(5)->get();

        $stats = [
            'years_experience' => 25,
            'projects_completed' => Project::count(),
            'expert_team' => TeamMember::where('is_active', true)->count(),
            'industry_awards' => 35,
        ];

        return view('home', compact('services', 'featuredProjects', 'team', 'testimonials', 'faqs', 'stats'));
    }
}
