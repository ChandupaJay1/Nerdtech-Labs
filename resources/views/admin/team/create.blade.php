@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Team
    </a>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-person-plus me-2 text-primary"></i>Add New Team Member</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.partials.form-errors')

            <div class="row g-4">
                {{-- Name --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="e.g. Chandupa Jayalath"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Position --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Position / Title <span class="text-danger">*</span></label>
                    <input type="text"
                           name="position"
                           class="form-control @error('position') is-invalid @enderror"
                           value="{{ old('position') }}"
                           placeholder="e.g. Full Stack Software Engineer"
                           required>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Sort Order --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="form-control @error('sort_order') is-invalid @enderror"
                           value="{{ old('sort_order', 0) }}"
                           min="0">
                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                {{-- Photo --}}
                <div class="col-md-9">
                    <label class="form-label fw-semibold">Photo</label>
                    <div class="d-flex align-items-start gap-4 flex-wrap">
                        <div id="preview-container"
                             class="rounded-circle border bg-light d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:96px;height:96px;overflow:hidden;">
                            <div id="preview-placeholder" class="text-center text-muted">
                                <i class="bi bi-person fs-3 d-block"></i>
                            </div>
                            <img id="preview-img" src="" alt="Preview"
                                 style="display:none;width:100%;height:100%;object-fit:cover;">
                        </div>
                        <div class="flex-grow-1">
                            <input type="file"
                                   name="image"
                                   id="imageInput"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/jpeg,image/png,image/jpg,image/webp">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                JPG, PNG, WebP — max 2MB. Square image recommended.
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-12"><hr class="my-2"></div>

                {{-- Social Links --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-facebook me-1"></i> Facebook URL</label>
                    <input type="url"
                           name="facebook"
                           class="form-control @error('facebook') is-invalid @enderror"
                           value="{{ old('facebook') }}"
                           placeholder="https://facebook.com/username">
                    @error('facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-instagram me-1"></i> Instagram URL</label>
                    <input type="url"
                           name="instagram"
                           class="form-control @error('instagram') is-invalid @enderror"
                           value="{{ old('instagram') }}"
                           placeholder="https://instagram.com/username">
                    @error('instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-github me-1"></i> GitHub URL</label>
                    <input type="url"
                           name="github"
                           class="form-control @error('github') is-invalid @enderror"
                           value="{{ old('github') }}"
                           placeholder="https://github.com/username">
                    @error('github')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-twitter-x me-1"></i> Twitter / X URL</label>
                    <input type="url"
                           name="twitter"
                           class="form-control @error('twitter') is-invalid @enderror"
                           value="{{ old('twitter') }}"
                           placeholder="https://x.com/username">
                    @error('twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="col-12 d-flex gap-2 pt-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Save Member
                    </button>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-img').style.display = 'block';
                document.getElementById('preview-placeholder').style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('preview-img').style.display = 'none';
            document.getElementById('preview-placeholder').style.display = 'flex';
        }
    });
</script>
@endpush

@endsection
