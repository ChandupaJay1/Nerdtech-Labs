@extends('layouts.app')

@section('title', 'Projects - Nerdtech Labs')

@section('body_class', 'home-dark2 tt-magic-cursor')

@push('css')
<style>
    .project-items .single-work {
        margin-bottom: 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .project-items .work-img {
        height: 350px;
        overflow: hidden;
        border-radius: 10px;
    }
    .project-items .work-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .project-items .single-work:hover .work-img img {
        transform: scale(1.1);
    }
    .project-items .work-content {
        padding: 20px 0;
        flex-grow: 1;
    }
    /* Ensure the isotope filter works with the new layout */
    .project-items {
        display: block !important; /* Override masonry if needed */
    }
    .project-status-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #F8B803;
        color: #000;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    
    /* Text Progress Effect */
    .text-progress {
        background: linear-gradient(to right, #F8B803 var(--progress), rgba(255,255,255,0.3) var(--progress));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
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
                            <span>Projects Masonry</span>
                            <h1>"Our Completed Projects"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Projects Masonry
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->
<div class="portfolio-masonary-page sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="isotope-menu">
                        <li class="active" data-filter="*">All</li>
                        @foreach($categories as $category)
                            <li data-filter=".{{ Str::slug($category) }}">{{ $category }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row g-4 project-items mb-55">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6 col-sm-6 single-item {{ Str::slug($project->category) }}">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <a href="{{ route('project-details', $project->id) }}">
                                <img class="img-fluid" src="{{ $project->frontendImageUrl() }}" alt="{{ $project->title }}">
                            </a>
                            @if($project->status && $project->status !== 'Completed')
                                <div class="project-status-badge">
                                    <span class="text-progress" style="--progress: {{ $project->progress }}%;">{{ $project->status }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="work-content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>{{ $project->category }}</span>
                                @if($project->progress < 100)
                                    <span class="text-white opacity-75 small">{{ $project->progress }}%</span>
                                @endif
                            </div>
                            <h3><a href="{{ route('project-details', $project->id) }}">{{ $project->title }}</a></h3>
                            
                            @if($project->progress < 100)
                                <div class="progress mt-3" style="height: 4px; background: rgba(255,255,255,0.1);">
                                    <div class="progress-bar" role="progressbar" 
                                         style="width: {{ $project->progress }}%; background: #F8B803;" 
                                         aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="load-more-btn">
                        <a class="primary-btn3" href="{{ route('project') }}">Load More </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
