<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->is_super_admin) {
            $tasks = Task::with(['assignee', 'assignor'])->latest()->paginate(10);
        } else {
            $tasks = Task::with(['assignee', 'assignor'])->where('assigned_to', $user->id)->latest()->paginate(10);
        }

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_super_admin) {
            abort(403, 'Unauthorized action.');
        }

        $admins = User::where('is_admin', true)->get();
        return view('admin.tasks.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_super_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $validated['assigned_by'] = Auth::id();

        Task::create($validated);

        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $user = Auth::user();

        // Check if user is super admin or if the task is assigned to them
        if (!$user->is_super_admin && $task->assigned_to !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $admins = User::where('is_admin', true)->get();
        return view('admin.tasks.edit', compact('task', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $user = Auth::user();

        if (!$user->is_super_admin && $task->assigned_to !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // If super admin, allow updating all fields
        if ($user->is_super_admin) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'assigned_to' => 'required|exists:users,id',
                'status' => 'required|in:pending,in_progress,completed',
                'due_date' => 'nullable|date',
            ]);

            $task->update($validated);
        } else {
            // If normal admin, only allow updating the status
            $validated = $request->validate([
                'status' => 'required|in:pending,in_progress,completed',
            ]);

            $task->update($validated);
        }

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (!Auth::user()->is_super_admin) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully.');
    }
}
