@extends('layouts.admin')

@section('title', 'Add service')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i>New service</h5>
    </div>
    <div class="card-body p-4">
        @include('admin.partials.form-errors')

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="form-control @error('title') is-invalid @enderror" placeholder="e.g. Web Development">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Cover image (homepage card)</label>
                    <div class="d-flex flex-wrap gap-3 align-items-start">
                        <div class="border rounded bg-light d-flex align-items-center justify-content-center flex-shrink-0 overflow-hidden"
                            style="width:160px;height:100px;">
                            <div id="cover-ph" class="text-center text-muted small p-2">Preview</div>
                            <img id="cover-img" src="" alt="" class="w-100 h-100 object-fit-cover d-none" style="object-fit:cover;">
                        </div>
                        <div class="flex-grow-1">
                            <input type="file" name="image" id="cover-input" accept="image/png,image/jpeg,image/gif,image/svg+xml,image/webp"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted">PNG, JPG, SVG, WebP — max 8MB</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Small icon image (optional)</label>
                    <div class="d-flex flex-wrap gap-3 align-items-start">
                        <div class="border rounded bg-light d-flex align-items-center justify-content-center flex-shrink-0"
                            style="width:80px;height:80px;">
                            <div id="icon-ph" class="text-muted small">Preview</div>
                            <img id="icon-img" src="" alt="" class="d-none" style="max-width:76px;max-height:76px;object-fit:contain;">
                        </div>
                        <div class="flex-grow-1">
                            <input type="file" name="icon" id="icon-input" accept="image/png,image/jpeg,image/gif,image/svg+xml,image/webp"
                                class="form-control @error('icon') is-invalid @enderror">
                            @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted">Max 2MB. Overrides icon class below.</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    @include('admin.partials.service-icon-class-select', ['selected' => old('icon_class')])
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Short description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="3" required class="form-control @error('description') is-invalid @enderror"
                        placeholder="Shown on cards">{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Long description</label>
                    <textarea name="long_description" rows="5" class="form-control @error('long_description') is-invalid @enderror"
                        placeholder="Detail page">{{ old('long_description') }}</textarea>
                    @error('long_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Features (optional)</label>
                    <textarea name="features" rows="3" class="form-control @error('features') is-invalid @enderror"
                        placeholder="JSON array or plain notes">{{ old('features') }}</textarea>
                    @error('features')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex gap-2 pt-2">
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check2 me-1"></i> Save</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bind = (inputId, imgId, phId) => {
            const input = document.getElementById(inputId);
            if (!input) return;
            input.addEventListener('change', function () {
                const f = this.files[0];
                const img = document.getElementById(imgId);
                const ph = document.getElementById(phId);
                if (f && img) {
                    const r = new FileReader();
                    r.onload = e => {
                        img.src = e.target.result;
                        img.classList.remove('d-none');
                        if (ph) ph.classList.add('d-none');
                    };
                    r.readAsDataURL(f);
                } else if (img && ph) {
                    img.classList.add('d-none');
                    ph.classList.remove('d-none');
                }
            });
        };
        bind('cover-input', 'cover-img', 'cover-ph');
        bind('icon-input', 'icon-img', 'icon-ph');
    });
</script>
@endpush
@endsection
