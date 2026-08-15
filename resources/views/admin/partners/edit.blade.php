@extends('layouts.admin')

@section('title', 'Edit Partner')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.partners.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Partners
    </a>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i>Edit Partner</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.partials.form-errors')

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Partner Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $partner->name) }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Website URL</label>
                    <input type="url" name="website" class="form-control @error('website') is-invalid @enderror"
                           value="{{ old('website', $partner->website) }}" placeholder="https://example.com">
                    @error('website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                           value="{{ old('sort_order', $partner->sort_order) }}" min="0">
                    @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-9">
                    <label class="form-label fw-semibold">Logo</label>
                    <div class="d-flex align-items-start gap-4 flex-wrap">
                        <div id="preview-container"
                             class="rounded border bg-light d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:120px;height:80px;overflow:hidden;">
                            @if($url = $partner->imagePublicUrl())
                                <img id="preview-img" src="{{ $url }}" alt="Preview"
                                     style="width:100%;height:100%;object-fit:contain;">
                                <div id="preview-placeholder" style="display:none;" class="text-center text-muted">
                                    <i class="bi bi-image fs-3 d-block mb-1"></i>
                                </div>
                            @else
                                <div id="preview-placeholder" class="text-center text-muted">
                                    <i class="bi bi-image fs-3 d-block mb-1"></i>
                                </div>
                                <img id="preview-img" src="" alt="Preview"
                                     style="display:none;width:100%;height:100%;object-fit:contain;">
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <input type="file" name="image" id="imageInput"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/jpeg,image/png,image/jpg,image/svg+xml,image/webp">
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted d-block mt-1">Leave empty to keep current logo.</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex gap-2 pt-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Update Partner
                    </button>
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-light border px-4">Cancel</a>
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
        }
    });
</script>
@endpush

@endsection
