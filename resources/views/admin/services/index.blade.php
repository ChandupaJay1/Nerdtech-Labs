@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-0">Services</h4>
        <small class="text-muted">{{ $services->count() }} total</small>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('service') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-box-arrow-up-right me-1"></i> View on site
        </a>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add service
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        @if ($services->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-grid-1x2 fs-1 text-muted"></i>
                <p class="text-muted mt-2 mb-0">No services yet.</p>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm mt-3">Add your first service</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:100px">Cover</th>
                            <th style="width:90px">Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width:140px" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>
                                    @if ($url = $service->coverPublicUrl())
                                        <img src="{{ $url }}" alt="" class="rounded border"
                                            style="width:88px;height:52px;object-fit:cover;">
                                    @else
                                        <div class="rounded bg-light border d-flex align-items-center justify-content-center text-muted"
                                            style="width:88px;height:52px;font-size:0.7rem;">No cover</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($u = $service->iconFilePublicUrl())
                                        <img src="{{ $u }}" alt="" class="rounded border"
                                            style="width:48px;height:48px;object-fit:contain;">
                                    @elseif ($service->iconIsCssClass())
                                        <span class="d-inline-flex align-items-center justify-content-center rounded border bg-white"
                                            style="width:48px;height:48px;">
                                            <i class="{{ $service->icon }} text-success fs-4"></i>
                                        </span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $service->title }}</td>
                                <td><span class="text-muted small">{{ Str::limit($service->description, 70) }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash3"></i></button>
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
@endsection
