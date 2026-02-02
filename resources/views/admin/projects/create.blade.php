@extends('layouts.admin')

@section('title', 'Add New Project')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Project Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="e.g. Web Development">
            </div>
            <div class="col-md-12">
                <label class="form-label">Project Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Project Details (Optional)</label>
                <textarea name="details" class="form-control" rows="5"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light border">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
