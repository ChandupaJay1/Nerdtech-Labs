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
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    </div>
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="portfolio-content">
                        <h3>Project Overview</h3>
                        <p>{{ $project->description }}</p>
                        
                        @if($project->details)
                            <div class="mt-4">
                                {!! nl2br(e($project->details)) !!}
                            </div>
                        @endif

                        <div class="working-process mt-5">
                            <h3>Our Process</h3>
                            <div class="row g-4 justify-content-center">
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/research.svg') }}" alt="">
                                        </div>
                                        <span>Step 01</span>
                                        <h3>Research</h3>
                                        <p>Comprehensive analysis of requirements and market trends.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/devlopment.svg') }}" alt="">
                                        </div>
                                        <span>Step 02</span>
                                        <h3>Development</h3>
                                        <p>Agile development implementation with regular testing.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <div class="single-process magnetic-item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/img/inner-pages/deploy.svg') }}" alt="">
                                        </div>
                                        <span>Step 03</span>
                                        <h3>Deploy</h3>
                                        <p>Secure deployment and post-launch maintenance support.</p>
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
                                <h5>{{ $project->category }}</h5>
                            </li>
                            <li>
                                <span>Client:</span>
                                <h5>Nerdtech Client</h5>
                            </li>
                            <li>
                                <span>Location:</span>
                                <h5>Galle, Sri Lanka</h5>
                            </li>
                            <li>
                                <span>Duration:</span>
                                <h5>Ongoing</h5>
                            </li>
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
