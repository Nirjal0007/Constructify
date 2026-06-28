<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();

        return view('faq.index', compact('faqs'));
    }
}
