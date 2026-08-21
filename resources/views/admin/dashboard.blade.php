@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-4">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                    <i class="bi bi-gear text-primary fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Services</h6>
                    <h3 class="mb-0">{{ $servicesCount }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
                    <i class="bi bi-briefcase text-success fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Projects</h6>
                    <h3 class="mb-0">{{ $projectsCount }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4">
            <div class="d-flex align-items-center">
                <div class="bg-info bg-opacity-10 p-3 rounded-3 me-3">
                    <i class="bi bi-list-task text-info fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Active Tasks</h6>
                    <h3 class="mb-0">{{ $tasksCount }}</h3>
                </div>
            </div>
            <hr class="my-3">
            <div class="d-flex justify-content-between text-muted text-sm border-top pt-2">
                <span>
                    <i class="bi bi-clock-history text-warning me-1"></i> 
                    Pending: <strong>{{ $pendingTasksCount }}</strong>
                </span>
                <span>
                    <i class="bi bi-check-circle text-success me-1"></i> 
                    Completed: <strong>{{ $completedTasksCount }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Recent Tasks</h5>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Assigned To</th>
                            <th>Assigned By</th>
                            <th>Status</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTasks as $task)
                        <tr class="{{ $task->assigned_to == auth()->id() ? 'table-warning' : '' }}">
                            <td>
                                <div class="fw-bold">{{ $task->title }}</div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;">{{ $task->description }}</small>
                            </td>
                            <td>{{ $task->assignee->name ?? 'Unknown' }}</td>
                            <td>{{ $task->assignor->name ?? 'Unknown' }}</td>
                            <td>
                                @if($task->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($task->status == 'in_progress')
                                    <span class="badge bg-info text-dark">In Progress</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>
                                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No Date' }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No recent tasks found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
