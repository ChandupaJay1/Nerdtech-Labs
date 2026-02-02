@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-4">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                    <i class="bi bi-gear text-primary fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Services</h6>
                    <h3 class="mb-0">{{ $servicesCount }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
                    <i class="bi bi-briefcase text-success fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Projects</h6>
                    <h3 class="mb-0">{{ $projectsCount }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="card p-4">
            <h5>Welcome to Nerdtech Labs Admin Panel</h5>
            <p class="text-muted">Use the sidebar to manage your services and projects shown on the main website.</p>
        </div>
    </div>
</div>
@endsection
