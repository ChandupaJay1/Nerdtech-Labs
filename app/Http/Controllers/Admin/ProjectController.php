<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Support\PublicDiskMedia;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
            'project_url' => 'nullable|url|max:500',
            'client' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'progress' => 'nullable|integer|min:0|max:100',
            'description' => 'required|string',
            'details' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = PublicDiskMedia::store($request->file('image'), 'projects');
        } else {
            unset($validated['image']);
        }

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
            'project_url' => 'nullable|url|max:500',
            'client' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'progress' => 'nullable|integer|min:0|max:100',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'remove_image' => 'sometimes|boolean',
        ]);

        $payload = [
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
            'project_url' => $validated['project_url'] ?? null,
            'client' => $validated['client'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'location' => $validated['location'] ?? null,
            'status' => $validated['status'] ?? null,
            'progress' => $validated['progress'] ?? 0,
            'description' => $validated['description'],
            'details' => $validated['details'] ?? null,
        ];

        if ($request->hasFile('image')) {
            PublicDiskMedia::deleteIfManaged($project->image);
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'projects');
        } elseif ($request->boolean('remove_image')) {
            PublicDiskMedia::deleteIfManaged($project->image);
            $payload['image'] = null;
        } else {
            $payload['image'] = $project->image;
        }

        $project->update($payload);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        PublicDiskMedia::deleteIfManaged($project->image);

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
