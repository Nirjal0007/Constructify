<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $team = TeamMember::where('is_active', true)->orderBy('order')->get();

        return view('about', compact('team'));
    }
}
