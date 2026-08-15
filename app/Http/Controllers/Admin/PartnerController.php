<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Setting;
use App\Support\PublicDiskMedia;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::query()->orderBy('sort_order')->orderBy('name')->get();
        $partnersEnabled = Setting::getValue('partners_section_enabled', '1');

        return view('admin.partners.index', compact('partners', 'partnersEnabled'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'website'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $payload = $request->only(['name', 'website', 'sort_order']);
        $payload['is_active'] = true;
        $payload['sort_order'] = $payload['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'partners');
        }

        Partner::create($payload);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'website'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $payload = $request->only(['name', 'website', 'sort_order']);
        $payload['sort_order'] = $payload['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            PublicDiskMedia::deleteIfManaged($partner->image);
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'partners');
        }

        $partner->update($payload);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        PublicDiskMedia::deleteIfManaged($partner->image);
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }

    public function toggleSection(Request $request)
    {
        Setting::setValue('partners_section_enabled', $request->input('enabled', '0'));

        return back()->with('success', 'Partners section setting updated.');
    }

    public function togglePartner(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->update(['is_active' => !$partner->is_active]);

        return back()->with('success', "Partner {$partner->name} " . ($partner->is_active ? 'enabled' : 'disabled') . '.');
    }
}
