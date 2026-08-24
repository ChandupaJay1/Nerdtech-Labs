@extends('layouts.admin')

@section('title', 'Manage Licenses')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Licenses</h4>
        <small class="text-muted">{{ $licenses->total() }} total license(s)</small>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateLicenseModal">
        <i class="bi bi-plus-lg me-1"></i> Generate New License
    </button>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Licenses Table --}}
<div class="card">
    <div class="card-body p-0">
        @if($licenses->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-key fs-1 text-muted"></i>
                <p class="text-muted mt-2">No licenses generated yet. Click above to generate your first license.</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Authorized Domain</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($licenses as $license)
                    <tr>
                        <td><span class="fw-semibold">{{ $license->client_name }}</span></td>
                        <td>{{ $license->project_name }}</td>
                        <td><code class="user-select-all">{{ $license->domain }}</code></td>
                        <td>
                            @if($license->expires_at)
                                <span class="{{ $license->expires_at->isPast() ? 'text-danger' : 'text-muted' }}">
                                    {{ $license->expires_at->format('M d, Y') }}
                                </span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @if(!$license->is_active)
                                <span class="badge rounded-pill bg-danger">Deactivated</span>
                            @elseif($license->expires_at && $license->expires_at->isPast())
                                <span class="badge rounded-pill bg-warning text-dark">Expired</span>
                            @else
                                <span class="badge rounded-pill bg-success">Active</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.licenses.toggle-status', $license->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-sm {{ $license->is_active ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                    @if($license->is_active)
                                        <i class="bi bi-x-circle me-1"></i> Deactivate
                                    @else
                                        <i class="bi bi-check-circle me-1"></i> Activate
                                    @endif
                                </button>
                            </form>
                            <form action="{{ route('admin.licenses.destroy', $license->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this license? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ms-1">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @if($licenses->hasPages())
    <div class="card-footer bg-white border-top-0 pt-3">
        {{ $licenses->links() }}
    </div>
    @endif
</div>

{{-- Generate License Modal --}}
<div class="modal fade" id="generateLicenseModal" tabindex="-1" aria-labelledby="generateLicenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.licenses.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="generateLicenseModalLabel">Generate New License</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="client_name" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="domain" class="form-label">Authorized Domain</label>
                        <input type="text" class="form-control" id="domain" name="domain" placeholder="e.g. sagaki.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">License Expiry</label>
                        <div class="p-3 border rounded bg-light">
                            <div class="row g-3 align-items-end mb-3">
                                <div class="col-md-6">
                                    <label for="duration_value" class="form-label small">Duration</label>
                                    <input type="number" class="form-control" id="duration_value" name="duration_value" placeholder="e.g. 6" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="duration_type" class="form-label small">Duration Type</label>
                                    <select class="form-select" id="duration_type" name="duration_type">
                                        <option value="days">Days</option>
                                        <option value="months" selected>Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="text-center position-relative mb-3">
                                <hr>
                                <span class="bg-light px-2 position-absolute top-50 start-50 translate-middle text-muted small fw-bold">OR</span>
                            </div>
                            
                            <div>
                                <label for="expires_at" class="form-label small">Custom Date (Optional)</label>
                                <input type="date" class="form-control" id="expires_at" name="expires_at">
                                <div class="form-text" style="font-size: 0.8rem;">Select an exact expiry date if not using duration.</div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate License</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
