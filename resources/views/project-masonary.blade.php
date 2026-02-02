@extends('layouts.app')

@section('title', 'Project Masonry - Nerdtech Labs')

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
                @php
                    $colPattern = [5, 7, 6, 6, 4, 4, 4];
                @endphp
                @foreach($projects as $index => $project)
                @php
                    $colSize = $colPattern[$index % count($colPattern)];
                @endphp
                <div class="col-lg-{{ $colSize }} col-sm-6 single-item {{ Str::slug($project->category) }}">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ Str::startsWith($project->image, 'assets/') ? asset($project->image) : asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details', $project->id) }}">{{ $project->title }}</a></h3>
                            <span>{{ $project->category }}</span>
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
