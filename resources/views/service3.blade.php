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

    <div class="home5-services-section two sec-mar">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!-- Web Development -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_1)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_1)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_1" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_1" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                             <i class="bi bi-code-slash" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Web Development</a></h4>
                            <p>Web development is the process of creating websites and web applications for the internet or intranet.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cloud Solutions -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_2)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_2)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_2" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_2" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <i class="bi bi-cloud-check" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Cloud Solutions</a></h4>
                            <p>Cloud solutions refer to the use of cloud computing technology to provide services and solutions over the internet.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cyber Security -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_3)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_3)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_3" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_3" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <i class="bi bi-shield-lock" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Cyber Security</a></h4>
                            <p>Cybersecurity refers to the protection of computer systems, networks, and data from theft or unauthorized access.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Analytic -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_4)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_4)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_4" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_4" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <i class="bi bi-graph-up-arrow" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Data Analytic</a></h4>
                            <p>Data analytics refers to the process of examining and interpreting large datasets to extract insights.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Software Development -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_5)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_5)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_5" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_5" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <i class="bi bi-window-stack" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Software Development</a></h4>
                            <p>Software development is the process of creating computer software programs that perform specific tasks.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Digital Marketing -->
                <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="solution-card magnetic-item">
                        <div class="icon">
                            <div class="icon-bg">
                                <svg width="122" height="122" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.7" filter="url(#filter_unique_6)">
                                        <circle cx="61" cy="61" r="23" fill="url(#paint_unique_6)" />
                                    </g>
                                    <defs>
                                        <filter id="filter_unique_6" x="0" y="0" width="122" height="122" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                            <feGaussianBlur stdDeviation="19" result="effect1_foregroundBlur" />
                                        </filter>
                                        <linearGradient id="paint_unique_6" x1="61" y1="38" x2="61" y2="84" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#06D889" stop-opacity="0" />
                                            <stop offset="1" stop-color="#06D889" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <i class="bi bi-megaphone" style="font-size: 3rem; color: #06D889;"></i>
                        </div>
                        <div class="solution-content">
                            <h4><a href="{{ route('service-details') }}">Digital Marketing</a></h4>
                            <p>Digital marketing refers to the use of digital channels and technologies to promote products or brands.</p>
                            <div class="learn-btn">
                                <a class="primary-btn8" href="{{ route('service-details') }}">
                                    Learn More
                                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
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
