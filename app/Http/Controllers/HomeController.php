<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest('updated_at')->take(6)->get();
        $projects = Project::query()->latest('updated_at')->take(6)->get();

        return view('index', compact('services', 'projects'));
    }
}
