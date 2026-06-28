<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('order')->paginate(9);

        return view('services.index', compact('services'));
    }

    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedServices = Service::where('id', '!=', $service->id)->take(3)->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
