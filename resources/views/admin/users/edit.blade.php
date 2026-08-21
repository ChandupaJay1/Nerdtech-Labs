@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Users
    </a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Edit User: {{ $user->name }}</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">
            <h6 class="fw-bold mb-3">Change Password <small class="text-muted fw-normal">(Leave blank to keep current password)</small></h6>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">New Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <hr class="my-4">

            @if(auth()->id() !== $user->id && !$user->is_super_admin)
            <div class="mb-4 form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="is_admin" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                <label class="form-check-label fw-semibold" for="is_admin">Grant Admin Privileges</label>
                <div class="form-text">If checked, this user will be able to log into this Admin Panel and manage content.</div>
            </div>
            @elseif(auth()->id() === $user->id)
                <div class="alert alert-info">
                    You cannot change your own admin privileges.
                </div>
            @elseif($user->is_super_admin)
                <div class="alert alert-warning">
                    This user is a Super Admin. Their privileges cannot be revoked here.
                </div>
            @endif

            <div class="d-flex gap-2 pt-2 border-top">
                <button type="submit" class="btn btn-primary px-4">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-light border px-4">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
