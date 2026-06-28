<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $team = TeamMember::where('is_active', true)->orderBy('order')->get();

        return view('team.index', compact('team'));
    }
}
