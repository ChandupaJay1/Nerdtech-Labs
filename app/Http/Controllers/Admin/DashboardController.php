<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = \App\Models\Service::count();
        $projectsCount = \App\Models\Project::count();
        
        $user = \Illuminate\Support\Facades\Auth::user();
        $tasksQuery = \App\Models\Task::query();

        // All users (Super Admin and regular) see tasks assigned to OTHERS in their dashboard overview
        $tasksQuery->where('assigned_to', '!=', $user->id);

        // Main count now only includes 'pending' or 'in_progress' tasks (excluding themselves)
        $tasksCount = (clone $tasksQuery)->whereIn('status', ['pending', 'in_progress'])->count();
        $pendingTasksCount = (clone $tasksQuery)->where('status', 'pending')->count();
        $completedTasksCount = (clone $tasksQuery)->where('status', 'completed')->count();

        // Get recent tasks for dashboard board
        $recentTasks = (clone $tasksQuery)->with(['assignee', 'assignor'])->latest()->limit(5)->get();

        return view('admin.dashboard', compact('servicesCount', 'projectsCount', 'tasksCount', 'pendingTasksCount', 'completedTasksCount', 'recentTasks'));
    }
}
