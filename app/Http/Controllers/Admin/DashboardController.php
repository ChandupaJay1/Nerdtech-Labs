<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = \App\Models\Service::count();
        $projectsCount = \App\Models\Project::count();
        return view('admin.dashboard', compact('servicesCount', 'projectsCount'));
    }
}
