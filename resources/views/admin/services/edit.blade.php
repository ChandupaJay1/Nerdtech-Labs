@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $service->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Service Icon Image</label>
                @if($service->icon)
                    <div class="mb-2">
                        <span class="text-muted small d-block mb-1">Current icon:</span>
                        @if(str_contains($service->icon, '/'))
                            {{-- Uploaded image stored in storage --}}
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="Current Icon"
                                style="max-height:100px; border-radius:8px; border:1px solid #dee2e6; padding:4px;">
                        @else
                            {{-- Legacy icon class (e.g. bx bx-code-alt) --}}
                            <span class="badge bg-secondary" style="font-size:0.9rem;">
                                <i class="{{ $service->icon }}"></i> {{ $service->icon }}
                            </span>
                            <p class="text-muted small mt-1">This is a legacy icon class. Upload an image to replace it.</p>
                        @endif
                    </div>
                @endif
                <input type="file" name="icon" id="iconInput" class="form-control @error('icon') is-invalid @enderror"
                    accept="image/*" onchange="previewIcon(this)">
                <small class="text-muted">Leave blank to keep current icon.</small>
                @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="mt-2" id="iconPreviewBox" style="display:none;">
                    <span class="text-muted small d-block mb-1">New icon preview:</span>
                    <img id="iconPreview" src="" alt="Preview"
                        style="max-height:100px; border-radius:8px; border:1px solid #dee2e6; padding:4px;">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    rows="3" required>{{ old('description', $service->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label">Long Description (Optional)</label>
                <textarea name="long_description" class="form-control" rows="5">{{ old('long_description', $service->long_description) }}</textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-light border">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script>
function previewIcon(input) {
    const box = document.getElementById('iconPreviewBox');
    const img = document.getElementById('iconPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; box.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    } else {
        box.style.display = 'none';
    }
}
</script>
@endsection
