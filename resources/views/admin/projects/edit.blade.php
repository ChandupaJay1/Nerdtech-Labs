@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Projects
    </a>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i>Edit Project</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.partials.form-errors')

            <div class="row g-4">
                {{-- Title --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Project Title <span class="text-danger">*</span></label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $project->title) }}"
                           placeholder="e.g. E-Commerce Platform"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Category</label>
                    <input type="text"
                           name="category"
                           class="form-control @error('category') is-invalid @enderror"
                           value="{{ old('category', $project->category) }}"
                           placeholder="e.g. Web Development, Mobile App, AI"
                           list="category-suggestions">
                    <datalist id="category-suggestions">
                        <option value="Web Development">
                        <option value="Mobile App">
                        <option value="Artificial Intelligence">
                        <option value="UI/UX Design">
                        <option value="E-Commerce">
                        <option value="Cloud Solutions">
                    </datalist>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Used as filter tag on the portfolio page</small>
                </div>

                {{-- Project URL --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Project URL</label>
                    <input type="url"
                           name="project_url"
                           class="form-control @error('project_url') is-invalid @enderror"
                           value="{{ old('project_url', $project->project_url) }}"
                           placeholder="https://example.com">
                    @error('project_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Client --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Client Name</label>
                    <input type="text"
                           name="client"
                           class="form-control @error('client') is-invalid @enderror"
                           value="{{ old('client', $project->client) }}"
                           placeholder="e.g. Acme Corp">
                    @error('client')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Duration --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Duration</label>
                    <input type="text"
                           name="duration"
                           class="form-control @error('duration') is-invalid @enderror"
                           value="{{ old('duration', $project->duration) }}"
                           placeholder="e.g. 3 Months">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Location --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text"
                           name="location"
                           class="form-control @error('location') is-invalid @enderror"
                           value="{{ old('location', $project->location) }}"
                           placeholder="e.g. Galle, Sri Lanka">
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="Not Started" {{ old('status', $project->status) == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                        <option value="Research" {{ old('status', $project->status) == 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Design" {{ old('status', $project->status) == 'Design' ? 'selected' : '' }}>Design</option>
                        <option value="Development" {{ old('status', $project->status) == 'Development' ? 'selected' : '' }}>Development</option>
                        <option value="Testing" {{ old('status', $project->status) == 'Testing' ? 'selected' : '' }}>Testing</option>
                        <option value="In Progress" {{ old('status', $project->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Progress --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Progress (%)</label>
                    <input type="number"
                           name="progress"
                           class="form-control @error('progress') is-invalid @enderror"
                           value="{{ old('progress', $project->progress) }}"
                           min="0"
                           max="100">
                    @error('progress')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image Upload --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Project Image</label>

                    @php($currentImgSrc = $project->imagePublicUrl())

                    <div class="d-flex align-items-start gap-4 flex-wrap">
                        {{-- Preview Box --}}
                        <div id="preview-container"
                             class="rounded border bg-light d-flex align-items-center justify-content-center flex-shrink-0 overflow-hidden"
                             style="width:180px;height:120px;">
                            @if($currentImgSrc)
                                <img id="preview-img" src="{{ $currentImgSrc }}" alt="Current image"
                                     style="width:100%;height:100%;object-fit:cover;">
                                <div id="preview-placeholder" class="text-center text-muted" style="display:none;">
                                    <i class="bi bi-image fs-2 d-block mb-1"></i>
                                    <small>Preview</small>
                                </div>
                            @else
                                <div id="preview-placeholder" class="text-center text-muted">
                                    <i class="bi bi-image fs-2 d-block mb-1"></i>
                                    <small>Preview</small>
                                </div>
                                <img id="preview-img" src="" alt="Preview"
                                     style="display:none;width:100%;height:100%;object-fit:cover;">
                            @endif
                        </div>

                        {{-- Upload controls --}}
                        <div class="flex-grow-1">
                            <input type="file"
                                   name="image"
                                   id="imageInput"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/jpeg,image/png,image/jpg,image/gif,image/webp,image/svg+xml">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                Leave empty to keep current. JPG, PNG, GIF, WebP, SVG — max 8MB
                            </small>

                            @if($project->image)
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remove_image" id="removeImage" value="1">
                                    <label class="form-check-label text-danger" for="removeImage">
                                        <i class="bi bi-trash me-1"></i>Remove current image
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Short Description --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Short Description <span class="text-danger">*</span></label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3"
                              placeholder="Brief overview shown on the project card…"
                              required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Detailed Description --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Detailed Description <small class="text-muted fw-normal">(Optional)</small></label>
                    <textarea name="details"
                              class="form-control @error('details') is-invalid @enderror"
                              rows="6"
                              placeholder="Full project details shown on the project detail page…">{{ old('details', $project->details) }}</textarea>
                    @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="col-12 d-flex gap-2 pt-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-cloud-check me-1"></i> Update Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Live preview when a new image is chosen
    document.getElementById('imageInput').addEventListener('change', function () {
        const file = this.files[0];
        const img = document.getElementById('preview-img');
        const placeholder = document.getElementById('preview-placeholder');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                img.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    // Toggle image remove checkbox effect
    const removeCheckbox = document.getElementById('removeImage');
    if (removeCheckbox) {
        removeCheckbox.addEventListener('change', function () {
            const img = document.getElementById('preview-img');
            const placeholder = document.getElementById('preview-placeholder');
            if (this.checked) {
                img.style.opacity = '0.3';
                if (placeholder) {
                    placeholder.style.display = 'flex';
                    placeholder.style.flexDirection = 'column';
                    placeholder.style.alignItems = 'center';
                }
            } else {
                img.style.opacity = '1';
                if (placeholder) placeholder.style.display = 'none';
            }
        });
    }
</script>
@endpush

@endsection
