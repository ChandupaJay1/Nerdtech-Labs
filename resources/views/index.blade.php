@extends('layouts.app')

@section('title', 'Nerdtech Labs - Unlock your Business website')

@section('content')
            <div class="banner-area-wrapper">
                <div class="company-name">
                    <h2>Nerdtech Labs</h2>
                </div>
                <div class="banner-area">
                    <div class="social-area">
                        <ul>
                            <li><a href="https://www.facebook.com/nerdtechlabs/"><i class="bx bxl-facebook"></i></a></li>
                            <!-- <li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li> -->
                            <!-- <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest-alt"></i></a></li> -->
                            <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="banner-title">
                        <h1>Unlock your <br> <span>Business</span> website.</h1>
                    </div>
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <p>Building real-world software solutions & innovative digital products. We transform your ideas into powerful technology that drives business growth and digital transformation.
                                    Let us help you unlock your business potential with cutting-edge web and software solutions.</p>
                                <div class="view-btn">
                                    <a class="primary-btn7" href="{{ route('service') }}">
                                        <span class="circle2">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                            </svg>
                                        </span>
                                        <span class="text">VIEW MORE</span>
                                    </a>
                                </div>
                                <div class="scroll-and-social-area">
                                    <div class="scroll-down-area">
                                        <a href="#home5-about-area">
                                            <span></span>
                                            Scroll Down to explore
                                        </a>
                                    </div>
                                    <div class="swiper-pagination1 two "></div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img-wrap">
                                    <div class="swiper banner5-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="banner-img">
                                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/h5-banner-img1.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="banner-img">
                                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/h5-banner-img2.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="banner-img">
                                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/h5-banner-img3.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-text-slider">
                        <h2 class="marquee_text">
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Modern Websites
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Custom Software
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Mobile Applications 
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Modern Websites
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Custom Software
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Mobile Applications 
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Modern Websites
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Custom Software
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Mobile Applications 
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Modern Websites
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Custom Software
                            <img src="{{ asset('assets/img/home-5/star.svg') }}" alt="">Mobile Applications 
                        </h2>
                    </div>
                </div>
            </div>

            <div class="home5-about-area pt-130 mb-130" id="home5-about-area">
                <div class="container">
                    <div class="row g-4 gy-5">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <div class="section-title-5">
                                    <span>Our Values & Culture</span>
                                    <h2>Who We Are</h2>
                                </div>
                                <p>NerdTech Labs is a dynamic software development company based in Sri Lanka, serving clients both locally and remotely worldwide. We specialize in building real-world software solutions and innovative digital products that transform businesses. Our team of passionate developers and designers work together to turn your ideas into powerful technology solutions that drive success, no matter where you are.</p>
                                <ul class="about-featue">
                                    <li>
                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.376831 8.16821C-0.247095 8.54593 -0.0579659 9.49862 0.662688 9.60837C1.24211 9.69666 1.52052 10.3701 1.17304 10.8431C0.740845 11.4312 1.27942 12.2389 1.98713 12.0639C2.55609 11.9231 3.07065 12.4387 2.9302 13.0088C2.75556 13.718 3.56158 14.2577 4.14855 13.8246C4.62054 13.4764 5.29275 13.7554 5.38073 14.336C5.49024 15.0581 6.44099 15.2476 6.81798 14.6224C7.12107 14.1198 7.84864 14.1198 8.15171 14.6224C8.52867 15.2476 9.47943 15.0581 9.58896 14.336C9.67707 13.7554 10.3492 13.4764 10.8211 13.8246C11.4081 14.2577 12.2142 13.718 12.0395 13.0088C11.899 12.4387 12.4136 11.9231 12.9826 12.0639C13.6903 12.2389 14.2289 11.4312 13.7967 10.8431C13.4492 10.3701 13.7276 9.69653 14.307 9.60837C15.0276 9.49864 15.2168 8.54597 14.5929 8.16821C14.0912 7.86452 14.0912 7.13547 14.5929 6.83178C15.2168 6.45407 15.0277 5.50138 14.307 5.39162C13.7276 5.30334 13.4492 4.62989 13.7967 4.15695C14.2289 3.56879 13.6903 2.76112 12.9826 2.93613C12.4136 3.07687 11.8991 2.5613 12.0395 1.99115C12.2141 1.28199 11.4081 0.742345 10.8211 1.17541C10.3492 1.52356 9.67695 1.2446 9.58896 0.664029C9.47945 -0.0580599 8.5287 -0.247606 8.15171 0.377594C7.84863 0.880237 7.12106 0.880237 6.81798 0.377594C6.44103 -0.247596 5.49027 -0.0580833 5.38073 0.664029C5.29263 1.24462 4.62054 1.5236 4.14855 1.17541C3.56158 0.742345 2.75554 1.28201 2.9302 1.99115C3.07065 2.56126 2.55612 3.07686 1.98713 2.93613C1.2794 2.76113 0.740845 3.56879 1.17304 4.15695C1.52049 4.62989 1.24209 5.30346 0.662688 5.39162C-0.0579425 5.50136 -0.247105 6.45403 0.376831 6.83178C0.878459 7.13548 0.878459 7.86453 0.376831 8.16821Z" />
                                        </svg>
                                        Creative Strategy
                                    </li>
                                    <li>
                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.376831 8.16821C-0.247095 8.54593 -0.0579659 9.49862 0.662688 9.60837C1.24211 9.69666 1.52052 10.3701 1.17304 10.8431C0.740845 11.4312 1.27942 12.2389 1.98713 12.0639C2.55609 11.9231 3.07065 12.4387 2.9302 13.0088C2.75556 13.718 3.56158 14.2577 4.14855 13.8246C4.62054 13.4764 5.29275 13.7554 5.38073 14.336C5.49024 15.0581 6.44099 15.2476 6.81798 14.6224C7.12107 14.1198 7.84864 14.1198 8.15171 14.6224C8.52867 15.2476 9.47943 15.0581 9.58896 14.336C9.67707 13.7554 10.3492 13.4764 10.8211 13.8246C11.4081 14.2577 12.2142 13.718 12.0395 13.0088C11.899 12.4387 12.4136 11.9231 12.9826 12.0639C13.6903 12.2389 14.2289 11.4312 13.7967 10.8431C13.4492 10.3701 13.7276 9.69653 14.307 9.60837C15.0276 9.49864 15.2168 8.54597 14.5929 8.16821C14.0912 7.86452 14.0912 7.13547 14.5929 6.83178C15.2168 6.45407 15.0277 5.50138 14.307 5.39162C13.7276 5.30334 13.4492 4.62989 13.7967 4.15695C14.2289 3.56879 13.6903 2.76112 12.9826 2.93613C12.4136 3.07687 11.8991 2.5613 12.0395 1.99115C12.2141 1.28199 11.4081 0.742345 10.8211 1.17541C10.3492 1.52356 9.67695 1.2446 9.58896 0.664029C9.47945 -0.0580599 8.5287 -0.247606 8.15171 0.377594C7.84863 0.880237 7.12106 0.880237 6.81798 0.377594C6.44103 -0.247596 5.49027 -0.0580833 5.38073 0.664029C5.29263 1.24462 4.62054 1.5236 4.14855 1.17541C3.56158 0.742345 2.75554 1.28201 2.9302 1.99115C3.07065 2.56126 2.55612 3.07686 1.98713 2.93613C1.2794 2.76113 0.740845 3.56879 1.17304 4.15695C1.52049 4.62989 1.24209 5.30346 0.662688 5.39162C-0.0579425 5.50136 -0.247105 6.45403 0.376831 6.83178C0.878459 7.13548 0.878459 7.86453 0.376831 8.16821Z" />
                                        </svg>
                                        Unique Production
                                    </li>
                                    <li>
                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.376831 8.16821C-0.247095 8.54593 -0.0579659 9.49862 0.662688 9.60837C1.24211 9.69666 1.52052 10.3701 1.17304 10.8431C0.740845 11.4312 1.27942 12.2389 1.98713 12.0639C2.55609 11.9231 3.07065 12.4387 2.9302 13.0088C2.75556 13.718 3.56158 14.2577 4.14855 13.8246C4.62054 13.4764 5.29275 13.7554 5.38073 14.336C5.49024 15.0581 6.44099 15.2476 6.81798 14.6224C7.12107 14.1198 7.84864 14.1198 8.15171 14.6224C8.52867 15.2476 9.47943 15.0581 9.58896 14.336C9.67707 13.7554 10.3492 13.4764 10.8211 13.8246C11.4081 14.2577 12.2142 13.718 12.0395 13.0088C11.899 12.4387 12.4136 11.9231 12.9826 12.0639C13.6903 12.2389 14.2289 11.4312 13.7967 10.8431C13.4492 10.3701 13.7276 9.69653 14.307 9.60837C15.0276 9.49864 15.2168 8.54597 14.5929 8.16821C14.0912 7.86452 14.0912 7.13547 14.5929 6.83178C15.2168 6.45407 15.0277 5.50138 14.307 5.39162C13.7276 5.30334 13.4492 4.62989 13.7967 4.15695C14.2289 3.56879 13.6903 2.76112 12.9826 2.93613C12.4136 3.07687 11.8991 2.5613 12.0395 1.99115C12.2141 1.28199 11.4081 0.742345 10.8211 1.17541C10.3492 1.52356 9.67695 1.2446 9.58896 0.664029C9.47945 -0.0580599 8.5287 -0.247606 8.15171 0.377594C7.84863 0.880237 7.12106 0.880237 6.81798 0.377594C6.44103 -0.247596 5.49027 -0.0580833 5.38073 0.664029C5.29263 1.24462 4.62054 1.5236 4.14855 1.17541C3.56158 0.742345 2.75554 1.28201 2.9302 1.99115C3.07065 2.56126 2.55612 3.07686 1.98713 2.93613C1.2794 2.76113 0.740845 3.56879 1.17304 4.15695C1.52049 4.62989 1.24209 5.30346 0.662688 5.39162C-0.0579425 5.50136 -0.247105 6.45403 0.376831 6.83178C0.878459 7.13548 0.878459 7.86453 0.376831 8.16821Z" />
                                        </svg>
                                        Rebranding Design
                                    </li>
                                    <li>
                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.376831 8.16821C-0.247095 8.54593 -0.0579659 9.49862 0.662688 9.60837C1.24211 9.69666 1.52052 10.3701 1.17304 10.8431C0.740845 11.4312 1.27942 12.2389 1.98713 12.0639C2.55609 11.9231 3.07065 12.4387 2.9302 13.0088C2.75556 13.718 3.56158 14.2577 4.14855 13.8246C4.62054 13.4764 5.29275 13.7554 5.38073 14.336C5.49024 15.0581 6.44099 15.2476 6.81798 14.6224C7.12107 14.1198 7.84864 14.1198 8.15171 14.6224C8.52867 15.2476 9.47943 15.0581 9.58896 14.336C9.67707 13.7554 10.3492 13.4764 10.8211 13.8246C11.4081 14.2577 12.2142 13.718 12.0395 13.0088C11.899 12.4387 12.4136 11.9231 12.9826 12.0639C13.6903 12.2389 14.2289 11.4312 13.7967 10.8431C13.4492 10.3701 13.7276 9.69653 14.307 9.60837C15.0276 9.49864 15.2168 8.54597 14.5929 8.16821C14.0912 7.86452 14.0912 7.13547 14.5929 6.83178C15.2168 6.45407 15.0277 5.50138 14.307 5.39162C13.7276 5.30334 13.4492 4.62989 13.7967 4.15695C14.2289 3.56879 13.6903 2.76112 12.9826 2.93613C12.4136 3.07687 11.8991 2.5613 12.0395 1.99115C12.2141 1.28199 11.4081 0.742345 10.8211 1.17541C10.3492 1.52356 9.67695 1.2446 9.58896 0.664029C9.47945 -0.0580599 8.5287 -0.247606 8.15171 0.377594C7.84863 0.880237 7.12106 0.880237 6.81798 0.377594C6.44103 -0.247596 5.49027 -0.0580833 5.38073 0.664029C5.29263 1.24462 4.62054 1.5236 4.14855 1.17541C3.56158 0.742345 2.75554 1.28201 2.9302 1.99115C3.07065 2.56126 2.55612 3.07686 1.98713 2.93613C1.2794 2.76113 0.740845 3.56879 1.17304 4.15695C1.52049 4.62989 1.24209 5.30346 0.662688 5.39162C-0.0579425 5.50136 -0.247105 6.45403 0.376831 6.83178C0.878459 7.13548 0.878459 7.86453 0.376831 8.16821Z" />
                                        </svg>
                                        Corporate Identity
                                    </li>
                                </ul>
                                <p>We believe in innovation, quality, and client satisfaction. Our approach combines technical expertise with creative thinking to deliver solutions that exceed expectations. Working both on-site in Sri Lanka and remotely with clients worldwide, we're committed to helping businesses of all sizes achieve their digital goals.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="about-img-wrap">
                                <div class="about-img magnetic-item">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/about-img-1.png') }}" alt="">
                                </div>
                                <div class="about-video-area magnetic-item">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/about-img-2.png') }}" alt="" style="max-width: 350px; width: 100%; height: auto; object-fit: cover;">
                                    <a href="https://www.youtube.com/watch?v=ZhbY1vRS6tg"  data-fancybox="gallery" class="about-video-btn video-popup">
                                        <i class="bi bi-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home5-services-section mb-130">
                <div class="container">
                    <div class="row mb-55 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-12">
                            <div class="section-title-5 text-center">
                                <span>Solutions We Offer</span>
                                <h2>Services & Solutions</h2>
                            </div>
                        </div>   
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach($services as $service)
                        <div class="col-xl-4 col-md-6 col-sm-10 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
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
                                    <p>{{ Str::limit($service->description, 120) }}</p>
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
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="home5-process-area mb-130">
                <div class="container">
                    <div class="row mb-55 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="section-title-5">
                                <span>THE PROCESS</span>
                                <h2>What We Do</h2>
                            </div>
                            <div class="section-content">
                                <p>Our proven development process ensures quality, efficiency, and successful project delivery every time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5 justify-content-center">
                        <div class="col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-process">
                                <div class="sl">
                                    <h2>01</h2>
                                </div>
                                <div class="content">
                                    <h3>Research & Discovery</h3>
                                    <p>We begin by understanding your business goals, target audience, and technical requirements. Through comprehensive research and analysis, we identify the best solutions and technologies to bring your vision to life.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="single-process">
                                <div class="sl">
                                    <h2>02</h2>
                                </div>
                                <div class="content">
                                    <h3>Design & Development</h3>
                                    <p>Our experienced team designs and develops your solution using the latest technologies and best practices. We focus on creating scalable, secure, and user-friendly applications that deliver exceptional performance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="single-process">
                                <div class="sl">
                                    <h2>03</h2>
                                </div>
                                <div class="content">
                                    <h3>Testing & Deployment</h3>
                                    <p>Before launch, we rigorously test every aspect of your solution to ensure it meets the highest quality standards. We then deploy your application and provide ongoing support to ensure smooth operation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="achievement-area">
                        <div class="row g-lg-4 gy-5">
                            <div class="col-xl-7 col-lg-6 d-flex align-items-center wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="achievement-content">
                                    <h2>#1</h2>
                                    <h3>Trusted Software Development Partner in Sri Lanka & Remotely Worldwide <span>Since <span class="year">2023.</span></span></h3>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 wow animate fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="achievement-img magnetic-item">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/achievement-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="achievement-text-slider ">
                            <h2 class="marquee_text2">
                                Innovation<span>#</span>
                                Digital Transformation<span>#</span>
                                Cutting-Edge Technology<span>#</span>
                                Expert Solutions<span>#</span>
                                Future-Ready Systems<span>#</span>
                                Innovation<span>#</span>
                                Digital Transformation<span>#</span>
                                Cutting-Edge Technology<span>#</span>
                                Expert Solutions<span>#</span>
                                Future-Ready Systems<span>#</span>
                                Innovation<span>#</span>
                                Digital Transformation<span>#</span>
                                Cutting-Edge Technology<span>#</span>
                                Expert Solutions<span>#</span>
                                Future-Ready Systems<span>#</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home5-partner-area mb-130">
                <div class="container">
                    <div class="row mb-55 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="section-title-5">
                                <span>Partnerships</span>
                                <h2>Our Network</h2>
                            </div>
                            <div class="section-content">
                                <p>We collaborate with leading technology partners to deliver world-class solutions to our clients.</p>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="partner-wrap">
                                <ul>
                                    <li><img src="{{ asset('assets/img/home-5/partner-01.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-02.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-03.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-04.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-05.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-06.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-07.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-08.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-09.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-10.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-11.svg') }}" alt=""></li>
                                    <li><img src="{{ asset('assets/img/home-5/partner-12.svg') }}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="home5-testimonial-area mb-130">
                <div class="container">
                    <div class="row g-lg-4 gy-5 align-items-center">
                        <div class="col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title-5">
                                <span>CLIENT REVIEW</span>
                                <h2>Happy Client</h2>
                                <div class="testimolial-left">
                                    <p>Our clients trust us to deliver exceptional results. We take pride in building long-term partnerships
                                        and helping businesses achieve their digital transformation goals.</p>
                                    <div class="customar-review">
                                        <h6>Review On</h6>
                                        <ul>
                                            <li>
                                                <a href="#" class="single-review">
                                                    <div class="icon">
                                                        <img src="{{ asset('assets/img/home-5/trustpilot-1.svg') }}" alt="">
                                                    </div>
                                                    <ul class="star">
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li>5.0/5.0</li>
                                                    </ul>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="single-review">
                                                    <div class="icon">
                                                        <img src="{{ asset('assets/img/home-5/google-1.svg') }}" alt="">
                                                    </div>
                                                    <ul class="star">
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                        <li>5.0/5.0</li>
                                                    </ul>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 position-relative wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                           
                            <div class="swiper home5-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrapper">
                                            <div class="testimonial-top">
                                                <div class="author-img">
                                                    <img src="{{ asset('assets/img/home-5/author-img.png') }}" alt="">
                                                </div>
                                                <div class="review">
                                                    <img src="{{ asset('assets/img/home-5/trustpilot-2.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>“I cannot express enough how satisfied I am with the web developmet services provided by Egens Lab. They are very good and User friendly and they work very nice and creative”</p>
                                            </div>
                                            <div class="testimonial-btm">
                                                <div class="author-content">
                                                    <h4>Watson Bekaryn</h4>
                                                    <span>CEO At atlantis.com</span>
                                                </div>
                                                <div class="quote-icon">
                                                    <img src="{{ asset('assets/img/home-5/left-quote.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrapper">
                                            <div class="testimonial-top">
                                                <div class="author-img">
                                                    <img src="{{ asset('assets/img/home-5/author-img2.png') }}" alt="">
                                                </div>
                                                <div class="review">
                                                    <img src="{{ asset('assets/img/home-5/trustpilot-2.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>“I cannot express enough how satisfied I am with the web developmet services provided by Egens Lab. They are very good and User friendly and they work very nice and creative”</p>
                                            </div>
                                            <div class="testimonial-btm">
                                                <div class="author-content">
                                                    <h4>Doland Skrml</h4>
                                                    <span>CEO At atlantis.com</span>
                                                </div>
                                                <div class="quote-icon">
                                                    <img src="{{ asset('assets/img/home-5/left-quote.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrapper">
                                            <div class="testimonial-top">
                                                <div class="author-img">
                                                    <img src="{{ asset('assets/img/home-5/author-img3.png') }}" alt="">
                                                </div>
                                                <div class="review">
                                                    <img src="{{ asset('assets/img/home-5/trustpilot-2.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>“I cannot express enough how satisfied I am with the web developmet services provided by Egens Lab. They are very good and User friendly and they work very nice and creative”</p>
                                            </div>
                                            <div class="testimonial-btm">
                                                <div class="author-content">
                                                    <h4>Josh Bush</h4>
                                                    <span>CEO At atlantis.com</span>
                                                </div>
                                                <div class="quote-icon">
                                                    <img src="{{ asset('assets/img/home-5/left-quote.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-btn-group">
                                <div class="swiper-btn prevbtn3">
                                    <i class="bi bi-arrow-up"></i>
                                </div>
                                <div class="swiper-btn nextbtn3">
                                    <i class="bi bi-arrow-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collaborate-section mb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="collaborate-wrapper">
                                <div class="section-title-5">
                                    <span>LET’S COLLABORATE</span>
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

            <div class="home5-team-section mb-130">
                <div class="container">
                    <div class="row mb-55 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-12 ">
                            <div class="section-title-5 text-center">
                                <span>Meet Our Team</span>
                                <h2>Our Experts</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-team magnetic-item">
                                <div class="social-area">
                                    <ul>
                                        <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                                        <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest-alt"></i></a></li>
                                        <li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-team-01.jpg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <h4>Chandupa Jayalath</h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="single-team magnetic-item">
                                <div class="social-area">
                                    <ul>
                                        <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                                        <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest-alt"></i></a></li>
                                        <li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-team-02.jpg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <h4>Dulanja Abeysinghe</h4>
                                    <span>Co-Founder</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <div class="single-team magnetic-item">
                                <div class="social-area">
                                    <ul>
                                        <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                                        <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest-alt"></i></a></li>
                                        <li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-team-03.jpeg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <h4>Pathum De Saman</h4>
                                    <span>Full Stack Software Engineer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="home5-blog-area mb-130">
                <div class="container">
                    <div class="row mb-55 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-12 d-flex for-padding align-items-center justify-content-between flex-wrap gap-3">
                            <div class="section-title-5">
                                <span>IT News & Trends</span>
                                <h2>News & Article</h2>
                            </div>
                            <div class="swiper-btn-group">
                                <div class="swiper-btn prevbtn4">
                                    <i class="bi bi-arrow-left"></i>
                                </div>
                                <div class="swiper-btn nextbtn4">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-wrapper">
                                <div class="swiper home5-blog-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-blog-card">
                                                <div class="blog-content">
                                                    <ul>
                                                        <li><a href="{{ route('blog') }}">April 05, 2023</a></li>
                                                        <li><a href="{{ route('blog') }}">Software Development</a></li>
                                                    </ul>
                                                    <h3><a href="{{ route('blog-details') }}">Vestibulum leo ex posuerea eu lobortis ut.</a></h3>
                                                    <p>Software development is the process of creatain onet computer software programs that perform tommrowa specific functions or tasks.......</p>
                                                </div>
                                                <div class="blog-img magnetic-item">
                                                     <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-blog-img-01.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-blog-card">
                                                <div class="blog-content">
                                                    <ul>
                                                        <li><a href="{{ route('blog') }}">April 05, 2023</a></li>
                                                        <li><a href="{{ route('blog') }}">Cyber Security</a></li>
                                                    </ul>
                                                    <h3><a href="{{ route('blog-details') }}">Duis nec velit vitae justo on dictum rhoncus.</a></h3>
                                                    <p>Software development is the process of creatain onet computer software programs that perform tommrowa specific functions or tasks.......</p>
                                                </div>
                                                <div class="blog-img magnetic-item">
                                                     <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-blog-img-02.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-blog-card">
                                                <div class="blog-content">
                                                    <ul>
                                                        <li><a href="{{ route('blog') }}">April 05, 2023</a></li>
                                                        <li><a href="{{ route('blog') }}">Web Development</a></li>
                                                    </ul>
                                                    <h3><a href="{{ route('blog-details') }}">Integer ac sapien moni Class aptent taciti.</a></h3>
                                                    <p>Software development is the process of creatain onet computer software programs that perform tommrowa specific functions or tasks.......</p>
                                                </div>
                                                <div class="blog-img magnetic-item">
                                                     <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-blog-img-03.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-blog-card">
                                                <div class="blog-content">
                                                    <ul>
                                                        <li><a href="{{ route('blog') }}">April 05, 2023</a></li>
                                                        <li><a href="{{ route('blog') }}">Software Development</a></li>
                                                    </ul>
                                                    <h3><a href="{{ route('blog-details') }}">Vestibulum leo ex posuerea eu lobortis ut.</a></h3>
                                                    <p>Software development is the process of creatain onet computer software programs that perform tommrowa specific functions or tasks.......</p>
                                                </div>
                                                <div class="blog-img magnetic-item">
                                                     <img class="img-fluid" src="{{ asset('assets/img/home-5/home5-blog-img-01.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div> -->


@endsection

@push('js')
<script>
    $(".marquee_text2").marquee({
        direction: "left",
        duration: 40000,
        gap: 50,
        delayBeforeStart: 0,
        duplicated: true,
        startVisible: true,
    });
</script>
@endpush
