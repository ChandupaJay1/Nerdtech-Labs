@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Icon Class (e.g. bi bi-gear)</label>
                <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
            </div>
            <div class="col-12">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $service->description }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Long Description (Optional)</label>
                <textarea name="long_description" class="form-control" rows="5">{{ $service->long_description }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-light border">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
