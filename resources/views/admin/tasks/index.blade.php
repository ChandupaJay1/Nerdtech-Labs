@extends('layouts.admin')

@section('title', 'Tasks')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tasks Board</h4>
    <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Assign New Task
    </a>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Assigned To</th>
                    <th>Assigned By</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                <tr>
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
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @if(auth()->user()->is_super_admin || $task->assigned_by == auth()->id())
                            <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No tasks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
