@extends('layouts.app')

@section('title', 'Blog Details - Nerdtech Labs')

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
                            <span>Blog Details</span>
                            <h1>"Insights Of Exploring Technology"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Blog Details
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <div class="bolog-details-area sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-thumb magnetic-item">
                        <img class="img-fluid" src="{{ asset('assets/img/inner-pages/blog-dt-01.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <span>Software</span>
                        <h2>Insights Of Exploring Technology</h2>
                        <div class="author-and-meta">
                            <div class="author-area">
                                <div class="author-img">
                                    <img src="{{ asset('assets/img/inner-pages/blog-dt-author.png') }}" alt="">
                                </div>
                                <div class="author-content">
                                    <h6>By, <span>Cooper Jogan</span></h6>
                                </div>
                            </div>
                            <!-- Meta items -->
                        </div>
                        <p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primis inaetahsjanoti faucibus orci luctus etenjot ultrices posuere cubilia andt</p>
                        <!-- Other content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar widgets -->
                </div>
            </div>
        </div>
    </div>
@endsection
