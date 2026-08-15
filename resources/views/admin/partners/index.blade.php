@extends('layouts.admin')

@section('title', 'Manage Partners')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Partners</h4>
        <small class="text-muted">{{ $partners->count() }} total partner(s)</small>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('admin.partners.toggle-section') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="enabled" value="{{ $partnersEnabled === '1' ? '0' : '1' }}">
            <button type="submit" class="btn {{ $partnersEnabled === '1' ? 'btn-success' : 'btn-outline-secondary' }} btn-sm">
                <i class="bi bi-{{ $partnersEnabled === '1' ? 'eye-fill' : 'eye-slash' }} me-1"></i>
                Section {{ $partnersEnabled === '1' ? 'Visible' : 'Hidden' }}
            </button>
        </form>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Partner
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        @if($partners->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-handshake fs-1 text-muted"></i>
                <p class="text-muted mt-2">No partners yet. <a href="{{ route('admin.partners.create') }}">Add your first partner.</a></p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px">Order</th>
                        <th style="width:80px">Logo</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th style="width:100px">Status</th>
                        <th style="width:180px" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $partner)
                    <tr>
                        <td class="text-muted">{{ $partner->sort_order }}</td>
                        <td>
                            @if ($url = $partner->imagePublicUrl())
                                <img src="{{ $url }}"
                                     class="rounded"
                                     style="width:60px;height:40px;object-fit:contain;background:#f8f9fa;padding:4px;"
                                     alt="{{ $partner->name }}">
                            @else
                                <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                     style="width:60px;height:40px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td><span class="fw-semibold">{{ $partner->name }}</span></td>
                        <td>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-muted small">
                                    {{ Str::limit($partner->website, 40) }}
                                </a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @if($partner->is_active)
                                <span class="badge" style="background:rgba(6,216,137,.15);color:#06D889;">Active</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.partners.toggle-partner', $partner->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary me-1" title="{{ $partner->is_active ? 'Hide' : 'Show' }}">
                                    <i class="bi bi-{{ $partner->is_active ? 'eye-slash' : 'eye' }}"></i>
                                </button>
                            </form>
                            <a href="{{ route('admin.partners.edit', $partner->id) }}"
                               class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete \'{{ addslashes($partner->name) }}\'?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash3"></i>
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
</div>

@endsection
