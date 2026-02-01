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
                            <span>Projects Masonary</span>
                            <h1>"Our Complited Projects"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Projects Masonary
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
                        <li data-filter=".ui">UI/UX</li>
                        <li data-filter=".web">Web Design</li>
                        <li data-filter=".developing">Developing</li>
                        <li data-filter=".graphic">Graphic Design</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 project-items mb-55">
                <div class="col-lg-5 col-sm-6 single-item ui">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-01.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Streamlining IT Infrastructure</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6 single-item web">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-02.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Transforming Customer Experience</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 single-item developing">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-03.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Scaling Agile Development</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 single-item graphic">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-04.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Optimizing IT Operations</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 single-item graphic">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-05.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Maximizing Efficiency With DevOps</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 single-item ui">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-06.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Implementing Robotic Process Automation</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 single-item developing">
                    <div class="single-work magnetic-item">
                        <div class="work-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-4/work-07.png') }}" alt="">
                        </div>
                        <div class="work-content">
                            <h3><a href="{{ route('project-details') }}">Scaling Agile Development</a></h3>
                            <span>Web development</span>
                        </div>
                    </div>
                </div>
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
