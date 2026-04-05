<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Support\PublicDiskMedia;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest()->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'features' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:8192',
            'icon_class' => 'nullable|string|max:255',
        ]);

        $payload = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'long_description' => $validated['long_description'] ?? null,
            'features' => $validated['features'] ?? null,
            'icon' => null,
            'image' => null,
        ];

        if ($request->hasFile('icon')) {
            $payload['icon'] = PublicDiskMedia::store($request->file('icon'), 'services');
        } elseif (! empty($validated['icon_class'])) {
            $payload['icon'] = $validated['icon_class'];
        }

        if ($request->hasFile('image')) {
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'services');
        }

        Service::create($payload);

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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'features' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp|max:8192',
            'icon_class' => 'nullable|string|max:255',
        ]);

        $payload = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'long_description' => $validated['long_description'] ?? null,
            'features' => $validated['features'] ?? null,
        ];

        if ($request->hasFile('icon')) {
            PublicDiskMedia::deleteIfManaged($service->icon);
            $payload['icon'] = PublicDiskMedia::store($request->file('icon'), 'services');
        } elseif ($request->filled('icon_class')) {
            PublicDiskMedia::deleteIfManaged($service->icon);
            $payload['icon'] = $validated['icon_class'];
        } elseif ($request->boolean('remove_icon')) {
            PublicDiskMedia::deleteIfManaged($service->icon);
            $payload['icon'] = null;
        }

        if ($request->hasFile('image')) {
            PublicDiskMedia::deleteIfManaged($service->image);
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'services');
        } elseif ($request->boolean('remove_image')) {
            PublicDiskMedia::deleteIfManaged($service->image);
            $payload['image'] = null;
        }

        $service->update($payload);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        PublicDiskMedia::deleteIfManaged($service->icon);
        PublicDiskMedia::deleteIfManaged($service->image);

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
