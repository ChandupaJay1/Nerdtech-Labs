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
        ]);

        $licenseKey = 'NDT-' . strtoupper(Str::random(4)) . '-' . strtoupper(Str::random(4)) . '-' . strtoupper(Str::random(4));

        License::create([
            'client_name' => $request->client_name,
            'project_name' => $request->project_name,
            'license_key' => $licenseKey,
            'expires_at' => now()->addMonths(6),
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
}
