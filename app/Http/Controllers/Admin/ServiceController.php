<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|max:255',
            'icon'             => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048',
            'description'      => 'required',
            'long_description' => 'nullable',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $path;
        } else {
            unset($validated['icon']);
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title'            => 'required|max:255',
            'icon'             => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048',
            'description'      => 'required',
            'long_description' => 'nullable',
        ]);

        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $path = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $path;
        } else {
            // Keep existing icon if no new file uploaded
            unset($validated['icon']);
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}


