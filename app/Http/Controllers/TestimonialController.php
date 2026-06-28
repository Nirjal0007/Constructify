<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::where('is_active', true)->latest()->paginate(9);

        return view('testimonials.index', compact('testimonials'));
    }
}
