@extends('layouts.admin')

@section('title', 'Manage Team')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Team Members</h4>
        <small class="text-muted">{{ $members->count() }} total member(s)</small>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('admin.team.toggle-section') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="enabled" value="{{ $teamEnabled === '1' ? '0' : '1' }}">
            <button type="submit" class="btn {{ $teamEnabled === '1' ? 'btn-success' : 'btn-outline-secondary' }} btn-sm">
                <i class="bi bi-{{ $teamEnabled === '1' ? 'eye-fill' : 'eye-slash' }} me-1"></i>
                Section {{ $teamEnabled === '1' ? 'Visible' : 'Hidden' }}
            </button>
        </form>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Member
        </a>
    </div>
</div>

{{-- Team Members Table --}}
<div class="card">
    <div class="card-body p-0">
        @if($members->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-people fs-1 text-muted"></i>
                <p class="text-muted mt-2">No team members yet. <a href="{{ route('admin.team.create') }}">Add your first member.</a></p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px">Order</th>
                        <th style="width:80px">Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Social Links</th>
                        <th style="width:100px">Status</th>
                        <th style="width:180px" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                    <tr>
                        <td class="text-muted">{{ $member->sort_order }}</td>
                        <td>
                            @if ($url = $member->imagePublicUrl())
                                <img src="{{ $url }}"
                                     class="rounded-circle"
                                     style="width:48px;height:48px;object-fit:cover;"
                                     alt="{{ $member->name }}">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                     style="width:48px;height:48px;">
                                    <i class="bi bi-person text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $member->name }}</span>
                        </td>
                        <td>
                            <span class="text-muted">{{ $member->position }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if($member->facebook)
                                    <a href="{{ $member->facebook }}" target="_blank" class="text-muted"><i class="bi bi-facebook"></i></a>
                                @endif
                                @if($member->instagram)
                                    <a href="{{ $member->instagram }}" target="_blank" class="text-muted"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if($member->github)
                                    <a href="{{ $member->github }}" target="_blank" class="text-muted"><i class="bi bi-github"></i></a>
                                @endif
                                @if($member->twitter)
                                    <a href="{{ $member->twitter }}" target="_blank" class="text-muted"><i class="bi bi-twitter-x"></i></a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($member->is_active)
                                <span class="badge" style="background:rgba(6,216,137,.15);color:#06D889;">Active</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.team.toggle-member', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-secondary me-1" title="{{ $member->is_active ? 'Hide' : 'Show' }}">
                                    <i class="bi bi-{{ $member->is_active ? 'eye-slash' : 'eye' }}"></i>
                                </button>
                            </form>
                            <a href="{{ route('admin.team.edit', $member->id) }}"
                               class="btn btn-sm btn-outline-primary me-1"
                               title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.team.destroy', $member->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete \'{{ addslashes($member->name) }}\'? This action cannot be undone.')">
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
