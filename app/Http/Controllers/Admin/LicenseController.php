<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::latest()->paginate(15);
        return view('admin.licenses.index', compact('licenses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:licenses',
            'duration_value' => 'nullable|integer|min:1',
            'duration_type' => 'nullable|string|in:days,months,years',
            'expires_at' => 'nullable|date',
        ]);

        $expiresAt = now()->addMonths(6); // Default fallback

        if ($request->filled(['duration_value', 'duration_type'])) {
            $expiresAt = now()->add((int) $request->duration_value, $request->duration_type);
        } elseif ($request->filled('expires_at')) {
            $expiresAt = \Carbon\Carbon::parse($request->expires_at);
        }

        License::create([
            'client_name' => $request->client_name,
            'project_name' => $request->project_name,
            'domain' => $request->domain,
            'expires_at' => $expiresAt,
            'is_active' => true,
        ]);

        return redirect()->route('admin.licenses.index')->with('success', 'License generated successfully.');
    }

    public function toggleStatus(License $license)
    {
        $license->update(['is_active' => !$license->is_active]);
        $status = $license->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.licenses.index')->with('success', "License successfully $status.");
    }

    public function destroy(License $license)
    {
        $license->delete();
        return redirect()->route('admin.licenses.index')->with('success', 'License deleted successfully.');
    }
}
