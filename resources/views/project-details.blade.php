@extends('layouts.app')

@section('title', $project->title . ' - Nerdtech Labs')

@section('body_class', 'home-dark2 tt-magic-cursor')

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
                            <span>Projects Details</span>
                            <h1>"{{ $project->title }}"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Projects Details
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->
    <div class="portfolio-details sec-mar">
        <div class="container ">
            <div class="row g-4 mb-80">
                <div class="col-lg-12">
                    <div class="portfolio-img magnetic-item">
                        @php
                            $imgSrc = Str::startsWith($project->image, 'public/')
                                ? asset(Str::after($project->image, 'public/'))
                                : (Str::startsWith($project->image, 'assets/')
                                    ? asset($project->image)
                                    : asset('storage/' . $project->image));
                        @endphp
                        <img class="img-fluid w-100" src="{{ $imgSrc }}" alt="{{ $project->title }}" style="max-height: 600px; object-fit: cover; border-radius: 20px;">
                    </div>
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="portfolio-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="text-white">Project Overview</h3>
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="primary-btn3 py-2 px-4" style="font-size: 0.9rem;">
                                    Live Preview <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            @endif
                        </div>
                        <p class="text-white-50" style="font-size: 1.1rem; line-height: 1.7;">{{ $project->description }}</p>
                        
                        @if($project->details)
                            <div class="mt-4 project-details-content text-white-50" style="font-size: 1.05rem; line-height: 1.6;">
                                {!! nl2br(e($project->details)) !!}
                            </div>
                        @endif

                        <style>
                            .project-details-content {
                                color: rgba(255, 255, 255, 0.7) !important;
                            }
                            .project-details-content h1, 
                            .project-details-content h2, 
                            .project-details-content h3, 
                            .project-details-content h4, 
                            .project-details-content strong {
                                color: #fff !important;
                                margin-top: 1.5rem;
                                margin-bottom: 1rem;
                                display: block;
                            }
                            
                            /* Ensure progress cards are same height */
                            .working-process .single-process {
                                min-height: 250px;
                                display: flex;
                                flex-direction: column;
                                justify-content: flex-start;
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

                        <div class="working-process mt-5">
                            <h3 class="text-white">Project Progress</h3>
                            <div class="row g-4 justify-content-center">
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item {{ $project->progress >= 20 ? 'active' : '' }}" style="{{ $project->progress >= 20 ? 'border: 1px solid #F8B803;' : 'opacity: 0.5;' }}">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/research.svg') }}" alt="" style="{{ $project->progress >= 20 ? 'filter: brightness(0) saturate(100%) invert(84%) sepia(54%) saturate(6146%) hue-rotate(345deg) brightness(101%) contrast(101%);' : '' }}">
                                        </div>
                                        <span>Step 01</span>
                                        <h3 class="text-white">Research & Design</h3>
                                        @if($project->progress >= 30)
                                            <p class="text-success small fw-bold mb-0"><i class="bi bi-check-circle-fill"></i> Completed</p>
                                        @elseif($project->progress > 0)
                                            <p class="text-warning small fw-bold mb-0">In Progress...</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item {{ $project->progress >= 60 ? 'active' : '' }}" style="{{ $project->progress >= 60 ? 'border: 1px solid #F8B803;' : 'opacity: 0.5;' }}">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/devlopment.svg') }}" alt="" style="{{ $project->progress >= 60 ? 'filter: brightness(0) saturate(100%) invert(84%) sepia(54%) saturate(6146%) hue-rotate(345deg) brightness(101%) contrast(101%);' : '' }}">
                                        </div>
                                        <span>Step 02</span>
                                        <h3 class="text-white">Development & Testing</h3>
                                        @if($project->progress >= 80)
                                            <p class="text-success small fw-bold mb-0"><i class="bi bi-check-circle-fill"></i> Completed</p>
                                        @elseif($project->progress >= 40)
                                            <p class="text-warning small fw-bold mb-0">In Progress...</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item {{ $project->progress == 100 ? 'active' : '' }}" style="{{ $project->progress == 100 ? 'border: 1px solid #F8B803;' : 'opacity: 0.5;' }}">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/deploy.svg') }}" alt="" style="{{ $project->progress == 100 ? 'filter: brightness(0) saturate(100%) invert(84%) sepia(54%) saturate(6146%) hue-rotate(345deg) brightness(101%) contrast(101%);' : '' }}">
                                        </div>
                                        <span>Step 03</span>
                                        <h3 class="text-white">Final Deployment</h3>
                                        @if($project->progress == 100)
                                            <p class="text-success small fw-bold mb-0"><i class="bi bi-check-circle-fill"></i> Live</p>
                                        @elseif($project->progress >= 80)
                                            <p class="text-warning small fw-bold mb-0">Launching soon...</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <ul>
                            <li>
                                <span>Category:</span>
                                <h5 class="text-white">{{ $project->category ?? 'N/A' }}</h5>
                            </li>
                            <li>
                                <span>Client:</span>
                                <h5 class="text-white">{{ $project->client ?? 'N/A' }}</h5>
                            </li>
                            <li>
                                <span>Location:</span>
                                <h5 class="text-white">{{ $project->location ?? 'N/A' }}</h5>
                            </li>
                            <li>
                                <span>Duration:</span>
                                <h5 class="text-white">{{ $project->duration ?? 'N/A' }}</h5>
                            </li>
                            <li>
                                <span>Status:</span>
                                <h5 class="text-white">
                                    <span class="text-progress" style="--progress: {{ $project->progress }}%;">{{ $project->status ?? 'Completed' }}</span>
                                </h5>
                            </li>
                            @if($project->progress < 100)
                            <li>
                                <span>Completion:</span>
                                <div class="d-flex align-items-center gap-3 mt-2">
                                    <div class="progress flex-grow-1" style="height: 8px; background: rgba(255,255,255,0.1); border-radius: 10px;">
                                        <div class="progress-bar" role="progressbar" 
                                             style="width: {{ $project->progress }}%; background: #F8B803; border-radius: 10px;" 
                                             aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <h5 class="text-white mb-0" style="min-width: 45px;">{{ $project->progress }}%</h5>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="portfolio-details-sm-banner">
                        <div class="section-title-5">
                            <h2>Ready to <br>
                            <span>work with us?</span></h2>
                            <div class="get-btn">
                                <a class="primary-btn3" href="{{ route('contact') }}">Get a quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
