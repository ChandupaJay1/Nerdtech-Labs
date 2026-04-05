@extends('layouts.admin')

@section('title', 'Edit service')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i>{{ $service->title }}</h5>
    </div>
    <div class="card-body p-4">
        @include('admin.partials.form-errors')

        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-8">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Cover image</label>
                    @if ($service->coverPublicUrl())
                        <div class="mb-2">
                            <img src="{{ $service->coverPublicUrl() }}" alt="Current cover" class="rounded border"
                                style="max-height:100px;width:auto;object-fit:cover;">
                        </div>
                    @endif
                    <input type="file" name="image" id="cover-input" accept="image/png,image/jpeg,image/gif,image/svg+xml,image/webp"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1" @checked(old('remove_image'))>
                        <label class="form-check-label text-danger small" for="remove_image">Remove cover image</label>
                    </div>
                    <div class="border rounded bg-light mt-2 d-flex align-items-center justify-content-center overflow-hidden" style="width:160px;height:100px;">
                        <div id="cover-ph" class="text-muted small d-none">New preview</div>
                        <img id="cover-img" src="" alt="" class="w-100 h-100 d-none" style="object-fit:cover;">
                    </div>
                    <small class="text-muted">Leave file empty to keep current. Max 8MB.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Small icon image</label>
                    @if ($u = $service->iconFilePublicUrl())
                        <div class="mb-2">
                            <img src="{{ $u }}" alt="Current icon" class="rounded border" style="max-height:80px;">
                        </div>
                    @elseif ($service->iconIsCssClass())
                        <div class="mb-2 p-2 border rounded d-inline-block">
                            <i class="{{ $service->icon }} fs-2 text-success"></i>
                            <span class="small text-muted ms-2">{{ $service->icon }}</span>
                        </div>
                    @endif
                    <input type="file" name="icon" id="icon-input" accept="image/png,image/jpeg,image/gif,image/svg+xml,image/webp"
                        class="form-control @error('icon') is-invalid @enderror">
                    @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="remove_icon" id="remove_icon" value="1" @checked(old('remove_icon'))>
                        <label class="form-check-label text-danger small" for="remove_icon">Remove icon (file or class)</label>
                    </div>
                    <div class="border rounded bg-light mt-2 d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
                        <img id="icon-img" src="" alt="" class="d-none" style="max-width:76px;max-height:76px;object-fit:contain;">
                    </div>
                    <small class="text-muted">Upload replaces current icon file / class.</small>
                </div>

                <div class="col-md-6">
                    @include('admin.partials.service-icon-class-select', [
                        'selected' => old('icon_class', $service->iconIsCssClass() ? $service->icon : ''),
                    ])
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Short description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="3" required class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Long description</label>
                    <textarea name="long_description" rows="5" class="form-control">{{ old('long_description', $service->long_description) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Features (optional)</label>
                    <textarea name="features" rows="3" class="form-control">{{ old('features', $service->features) }}</textarea>
                </div>

                <div class="col-12 d-flex gap-2 pt-2">
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check2 me-1"></i> Update</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light border px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('cover-input')?.addEventListener('change', function () {
            const f = this.files[0];
            const img = document.getElementById('cover-img');
            const ph = document.getElementById('cover-ph');
            if (f && img) {
                const r = new FileReader();
                r.onload = e => {
                    img.src = e.target.result;
                    img.classList.remove('d-none');
                    ph.classList.remove('d-none');
                    ph.textContent = 'New preview';
                };
                r.readAsDataURL(f);
            }
        });
        document.getElementById('icon-input')?.addEventListener('change', function () {
            const f = this.files[0];
            const img = document.getElementById('icon-img');
            if (f && img) {
                const r = new FileReader();
                r.onload = e => {
                    img.src = e.target.result;
                    img.classList.remove('d-none');
                };
                r.readAsDataURL(f);
            }
        });
    });
</script>
@endpush
@endsection
