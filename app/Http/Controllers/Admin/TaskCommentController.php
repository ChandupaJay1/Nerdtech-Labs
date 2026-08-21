<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $user = Auth::user();

        // Check if user has access to this task
        if (!$user->is_super_admin && $task->assigned_to !== $user->id && $task->assigned_by !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $task->comments()->create([
            'user_id' => $user->id,
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('admin.tasks.edit', $task)->with('success', 'Comment added successfully.');
    }
}
