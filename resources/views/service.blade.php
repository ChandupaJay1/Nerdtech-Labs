@extends('layouts.app')

@section('title', 'Our Services - Nerdtech Labs')

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
                        <span>Services</span>
                        <h1>"Our Providing Services"</h1>
                        <div class="breadcrumb-list">
                            <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Services
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumbs section -->

<div class="home3-solution-section sec-mar">
    <div class="container">
        <div class="row justify-content-center g-4">
            @forelse($services as $service)
            <div class="col-lg-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="solution-card magnetic-item">
                    <div class="icon" style="text-align: left; margin-bottom: 20px;">
                        @php($card = $service->frontendCard())
                        @if ($card['mode'] === 'cover')
                            <img src="{{ $card['url'] }}" alt="{{ $service->title }}" style="width:60px;height:60px;object-fit:contain;">
                        @elseif ($card['mode'] === 'icon')
                            <img src="{{ $card['url'] }}" alt="{{ $service->title }}" style="width:60px;height:60px;object-fit:contain;">
                        @elseif ($card['mode'] === 'class')
                            <div class="d-flex align-items-start justify-content-start" style="width:100%;">
                                <i class="{{ $card['icon_class'] }}" style="font-size:60px;color:#06D889;line-height:1;" aria-hidden="true"></i>
                            </div>
                        @else
                            <img src="{{ $card['url'] }}" alt="{{ $service->title }}" style="width:60px;height:60px;object-fit:contain;">
                        @endif
                    </div>
                    <div class="solution-content">
                        <h4><a href="{{ route('service-details', $service->id) }}">{{ $service->title }}</a></h4>
                        <p>{{ $service->description }}</p>
                        <div class="learn-btn">
                            <a class="primary-btn8" href="{{ route('service-details', $service->id) }}">
                                Learn More
                                <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
    </div>
</div>
@endsection

