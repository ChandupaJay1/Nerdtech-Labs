@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Project Title</label>
                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $project->category }}">
            </div>
            <div class="col-md-12">
                <label class="form-label">Project Image</label>
                @if($project->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $project->image) }}" width="100" class="rounded" alt="">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Project Details (Optional)</label>
                <textarea name="details" class="form-control" rows="5">{{ $project->details }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light border">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
