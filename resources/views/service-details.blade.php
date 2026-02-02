@extends('layouts.app')

@section('title', 'Service Details - Nerdtech Labs')

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
                            <span>Setvices Details</span>
                            <h1>"Software Development"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Services Details
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <div class="service-details">
        <div class="about-services sec-mar">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-6 d-flex align-items-center wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-content">
                            <div class="section-title-5">
                                <h2>{{ $service->title }}</h2>
                            </div>
                            <p>{{ $service->long_description ?? $service->description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="service-img magnetic-item">
                            @if($service->icon)
                                <img class="img-fluid" src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}">
                            @else
                                <img class="img-fluid" src="{{ asset('assets/img/inner-pages/about-service-img.png') }}" alt="{{ $service->title }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="how-we-work-section sec-mar">
            <div class="container">
                <div class="row mb-60 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>How we work</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="work-item">
                <div class="container-fluid">
                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-5 justify-content-center">
                        <div class="col magnetic-item wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-work">
                                <div class="work-icon">
                                    <img src="{{ asset('assets/img/inner-pages/work-icon-01.svg') }}" alt="">
                                </div>
                                <div class="work-content">
                                    <h3>Requirements Gathering.</h3>
                                    <p>Interdum et malesuada fames acchiv Etiam europeat nibhona elementum, accumsan ona.</p>
                                </div>
                            </div>
                        </div>
                        <!-- More steps -->
                        <div class="col magnetic-item wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="single-work">
                                <div class="work-icon">
                                    <img src="{{ asset('assets/img/inner-pages/work-icon-05.svg') }}" alt="">
                                </div>
                                <div class="work-content">
                                    <h3>Maintenance and Support.</h3>
                                    <p>Interdum et malesuada fames acchiv Etiam europeat nibhona elementum, accumsan ona.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-sort-driscription-area sec-mar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="driscription-img magnetic-item">
                            <img class="img-fluid" src="{{ asset('assets/img/inner-pages/service-driscription-img-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ and Work With Us -->
        <div class="home4-contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-wrapper text-center magnetic-item">
                            <h2 class="title">Work With Us</h2>
                            <h2 class="content">Let’s Talk</h2>
                            <div class="contact-btn">
                                <a class="magnetic-item" href="{{ route('contact') }}">
                                    Contact With Us.
                                    <svg width="32" height="32" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
