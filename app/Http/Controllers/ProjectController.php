<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->latest('updated_at')->get();
        $categories = Project::select('category')->distinct()->pluck('category')->filter()->toArray();

        return view('project-masonary', compact('projects', 'categories'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('project-details', compact('project'));
    }
}
