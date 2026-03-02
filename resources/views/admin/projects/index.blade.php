@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Projects</h4>
        <small class="text-muted">{{ $projects->count() }} total project(s)</small>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add New Project
    </a>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ session('error') }}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Projects Table --}}
<div class="card">
    <div class="card-body p-0">
        @if($projects->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-folder2-open fs-1 text-muted"></i>
                <p class="text-muted mt-2">No projects yet. <a href="{{ route('admin.projects.create') }}">Add your first project.</a></p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:70px">#</th>
                        <th style="width:80px">Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th style="width:160px" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td class="text-muted">{{ $project->id }}</td>
                        <td>
                            @if($project->image)
                                @php
                                    $imgSrc = Str::startsWith($project->image, 'public/')
                                        ? asset(Str::after($project->image, 'public/'))
                                        : (Str::startsWith($project->image, 'assets/')
                                            ? asset($project->image)
                                            : asset('storage/' . $project->image));
                                @endphp
                                <img src="{{ $imgSrc }}"
                                     class="rounded"
                                     style="width:60px;height:45px;object-fit:cover;"
                                     alt="{{ $project->title }}">
                            @else
                                <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                     style="width:60px;height:45px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $project->title }}</span>
                        </td>
                        <td>
                            @if($project->category)
                                <span class="badge rounded-pill"
                                      style="background:rgba(6,216,137,.15);color:#06D889;font-size:.75rem;">
                                    {{ $project->category }}
                                </span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted small">
                                {{ Str::limit($project->description, 60) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                               class="btn btn-sm btn-outline-primary me-1"
                               title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete \'{{ addslashes($project->title) }}\'? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

{{-- View on website link --}}
<div class="mt-3 text-end">
    <a href="{{ route('project') }}" target="_blank" class="text-muted small">
        <i class="bi bi-box-arrow-up-right me-1"></i>View projects on website
    </a>
</div>

@endsection
