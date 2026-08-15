<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Support\PublicDiskMedia;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::query()->orderBy('sort_order')->orderBy('name')->get();
        $teamEnabled = Setting::getValue('team_section_enabled', '1');

        return view('admin.team.index', compact('members', 'teamEnabled'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook'   => 'nullable|url|max:255',
            'instagram'  => 'nullable|url|max:255',
            'github'     => 'nullable|url|max:255',
            'twitter'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $payload = $request->only(['name', 'position', 'facebook', 'instagram', 'github', 'twitter', 'sort_order']);
        $payload['is_active'] = true;
        $payload['sort_order'] = $payload['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'team');
        }

        TeamMember::create($payload);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(string $id)
    {
        $member = TeamMember::findOrFail($id);

        return view('admin.team.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook'   => 'nullable|url|max:255',
            'instagram'  => 'nullable|url|max:255',
            'github'     => 'nullable|url|max:255',
            'twitter'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $payload = $request->only(['name', 'position', 'facebook', 'instagram', 'github', 'twitter', 'sort_order']);
        $payload['sort_order'] = $payload['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            PublicDiskMedia::deleteIfManaged($member->image);
            $payload['image'] = PublicDiskMedia::store($request->file('image'), 'team');
        }

        $member->update($payload);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = TeamMember::findOrFail($id);
        PublicDiskMedia::deleteIfManaged($member->image);
        $member->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }

    public function toggleSection(Request $request)
    {
        Setting::setValue('team_section_enabled', $request->input('enabled', '0'));

        return back()->with('success', 'Team section setting updated.');
    }

    public function toggleMember(Request $request, string $id)
    {
        $member = TeamMember::findOrFail($id);
        $member->update(['is_active' => !$member->is_active]);

        return back()->with('success', "Team member {$member->name} " . ($member->is_active ? 'enabled' : 'disabled') . '.');
    }
}
