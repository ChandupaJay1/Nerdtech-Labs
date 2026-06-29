@extends('layouts.app')

@section('title', 'Projects - Nerdtech Labs')

@section('body_class', 'home-dark2 tt-magic-cursor')

@push('css')
<style>
    /* ===== Filter Menu ===== */
    .filter-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 50px;
        padding: 0 15px;
    }
    .filter-btn {
        font-family: var(--font-saira);
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255,255,255,0.5);
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 50px;
        padding: 10px 24px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        white-space: nowrap;
        position: relative;
        overflow: hidden;
    }
    .filter-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--theme-color);
        border-radius: 50px;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        z-index: 0;
    }
    .filter-btn span {
        position: relative;
        z-index: 1;
    }
    .filter-btn:hover {
        color: #000;
        border-color: var(--theme-color);
    }
    .filter-btn:hover::before {
        transform: scaleX(1);
    }
    .filter-btn.active {
        color: #000;
        border-color: var(--theme-color);
    }
    .filter-btn.active::before {
        transform: scaleX(1);
    }

    /* ===== Project Cards ===== */
    .project-grid {
        display: block !important;
    }
    .project-card {
        margin-bottom: 24px;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        background: #1a1a1a;
    }
    .project-card .card-image {
        position: relative;
        height: 320px;
        overflow: hidden;
    }
    .project-card .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    .project-card:hover .card-image img {
        transform: scale(1.08);
    }
    .project-card .card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.9) 0%,
            rgba(0,0,0,0.4) 40%,
            rgba(0,0,0,0.1) 70%,
            transparent 100%
        );
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 24px;
        opacity: 1;
        transition: all 0.4s ease;
    }
    .project-card:hover .card-overlay {
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.95) 0%,
            rgba(0,0,0,0.6) 50%,
            rgba(0,0,0,0.2) 100%
        );
    }
    .project-card .card-category {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--theme-color);
        margin-bottom: 8px;
    }
    .project-card .card-title {
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 12px 0;
        line-height: 1.3;
        transition: color 0.3s ease;
    }
    .project-card:hover .card-title {
        color: var(--theme-color);
    }
    .project-card .card-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.4s ease 0.1s;
    }
    .project-card:hover .card-meta {
        opacity: 1;
        transform: translateY(0);
    }
    .project-card .card-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--theme-color);
        text-decoration: none;
    }
    .project-card .card-link svg {
        transition: transform 0.3s ease;
    }
    .project-card:hover .card-link svg {
        transform: translateX(4px);
    }

    /* Progress Badge */
    .card-progress-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 6px;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        color: #fff;
    }
    .card-progress-badge .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--theme-color);
        animation: pulse-dot 1.5s infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }

    /* Progress bar inside card */
    .card-progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: rgba(255,255,255,0.1);
        z-index: 2;
    }
    .card-progress-bar .fill {
        height: 100%;
        background: var(--theme-color);
        border-radius: 0 3px 3px 0;
        transition: width 0.6s ease;
    }

    /* ===== Empty State ===== */
    .no-projects {
        text-align: center;
        padding: 80px 20px;
        color: rgba(255,255,255,0.5);
    }
    .no-projects h3 {
        font-size: 22px;
        margin-bottom: 8px;
        color: rgba(255,255,255,0.7);
    }

    /* ===== Mobile Responsive ===== */
    @media (max-width: 991px) {
        .filter-bar {
            gap: 6px;
            margin-bottom: 40px;
        }
        .filter-btn {
            font-size: 12px;
            padding: 8px 18px;
        }
    }
    @media (max-width: 767px) {
        .filter-bar {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 6px;
            margin-bottom: 30px;
            padding: 6px;
            background: rgba(255,255,255,0.03);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.05);
        }
        .filter-btn {
            padding: 10px 8px;
            font-size: 11px;
            text-align: center;
            border-radius: 10px;
        }
        .filter-btn::before {
            border-radius: 10px;
        }
        .project-card .card-image {
            height: 240px;
        }
        .project-card .card-overlay {
            padding: 18px;
        }
        .project-card .card-title {
            font-size: 17px;
        }
        .project-card .card-meta {
            opacity: 1;
            transform: translateY(0);
        }
        .section-title-3 h2 {
            font-size: 28px;
        }
    }
    @media (max-width: 480px) {
        .filter-bar {
            grid-template-columns: repeat(3, 1fr);
        }
        .project-card .card-image {
            height: 200px;
        }
        .project-card .card-overlay {
            padding: 14px;
        }
        .project-card .card-title {
            font-size: 15px;
            margin-bottom: 8px;
        }
        .card-progress-badge {
            padding: 4px 10px;
            font-size: 10px;
            top: 10px;
            right: 10px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Start breadcrumbs section -->
    <section class="breadcrumbs">
        <div class="breadcrumb-sm-images">
            <div class="inner-banner-1 magnetic-item">
                <img src="{{ asset('assets/img/inner-pages/inner-banner-1.png') }}" alt="">
            </div>
            <div class="inner-banner-2 magnetic-item">
                <img src="{{ asset('assets/img/inner-pages/inner-banner-2.png') }}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-cnt">
                            <span>Projects</span>
                            <h1>"Our Completed Projects"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Projects
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <!-- Start Projects Section -->
    <div class="portfolio-masonary-page sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-bar">
                        <button class="filter-btn active" data-filter="*"><span>All</span></button>
                        @foreach($categories as $category)
                            <button class="filter-btn" data-filter=".{{ Str::slug($category) }}"><span>{{ $category }}</span></button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row g-4 project-items mb-55 project-grid">
                @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 col-6 single-item {{ Str::slug($project->category) }}">
                    <a href="{{ route('project-details', $project->id) }}" class="project-card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ $project->frontendImageUrl() }}" alt="{{ $project->title }}">
                            @if($project->status && $project->status !== 'Completed')
                                <div class="card-progress-badge">
                                    <span class="dot"></span>
                                    {{ $project->status }} &middot; {{ $project->progress }}%
                                </div>
                                <div class="card-progress-bar">
                                    <div class="fill" style="width: {{ $project->progress }}%;"></div>
                                </div>
                            @endif
                            <div class="card-overlay">
                                <span class="card-category">{{ $project->category }}</span>
                                <h3 class="card-title">{{ $project->title }}</h3>
                                <div class="card-meta">
                                    <span class="card-link">
                                        View Project
                                        <svg width="14" height="14" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 1H12M12 1V13M12 1L0.5 12" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12">
                    <div class="no-projects">
                        <h3>No projects found</h3>
                        <p>Check back soon for our latest work.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Projects Section -->
@endsection
