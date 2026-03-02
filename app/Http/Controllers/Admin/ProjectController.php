<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of all projects.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form to create a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a new project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'nullable|max:100',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'project_url' => 'nullable|url|max:255',
            'client'      => 'nullable|max:255',
            'duration'    => 'nullable|max:255',
            'location'    => 'nullable|max:255',
            'status'      => 'nullable|max:255',
            'progress'    => 'nullable|integer|min:0|max:100',
            'description' => 'required',
            'details'     => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    /**
     * Show the edit form for a specific project.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update a specific project.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|max:255',
            'category'     => 'nullable|max:100',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'project_url'  => 'nullable|url|max:255',
            'client'       => 'nullable|max:255',
            'duration'    => 'nullable|max:255',
            'location'    => 'nullable|max:255',
            'status'      => 'nullable|max:255',
            'progress'    => 'nullable|integer|min:0|max:100',
            'description' => 'required',
            'details'     => 'nullable',
        ]);

        // Handle image removal
        if ($request->boolean('remove_image')) {
            $this->deleteOldImage($project->image);
            $validated['image'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image from storage if it was stored there
            $this->deleteOldImage($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } else {
            // Keep existing image
            unset($validated['image']);
        }

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Delete a specific project.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        // Delete image from storage
        $this->deleteOldImage($project->image);

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    /**
     * Helper: delete image from storage if it is a storage-managed file.
     */
    private function deleteOldImage(?string $imagePath): void
    {
        if (!$imagePath) return;

        // Only delete if it is a storage-managed path (not a legacy public/assets path)
        if (!Str::startsWith($imagePath, ['public/', 'assets/'])) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
