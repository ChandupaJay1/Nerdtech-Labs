@extends('layouts.admin')

@section('title', 'Add User')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Users
    </a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Add New User</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-4 form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="is_admin" name="is_admin" value="1" {{ old('is_admin', true) ? 'checked' : '' }}>
                <label class="form-check-label fw-semibold" for="is_admin">Grant Admin Privileges</label>
                <div class="form-text">If checked, this user will be able to log into this Admin Panel and manage content.</div>
            </div>

            <div class="d-flex gap-2 pt-2 border-top">
                <button type="submit" class="btn btn-primary px-4">Create User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-light border px-4">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
