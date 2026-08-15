<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest('updated_at')->take(6)->get();
        $projects = Project::query()->latest('updated_at')->take(6)->get();
        $teamMembers = TeamMember::where('is_active', true)->orderBy('sort_order')->get();
        $teamEnabled = Setting::getValue('team_section_enabled', '1');
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();
        $partnersEnabled = Setting::getValue('partners_section_enabled', '1');

        return view('index', compact('services', 'projects', 'teamMembers', 'teamEnabled', 'partners', 'partnersEnabled'));
    }
}
