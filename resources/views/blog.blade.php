@extends('layouts.app')

@section('title', 'Blog Grid - Nerdtech Labs')

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
                            <span>Blog Grid</span>
                            <h1>"Exploring The Softconic Blog"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Blog Grid
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <div class="blog-banner sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-banner-wrap">
                        <div class="banner-img">
                            <img src="{{ asset('assets/img/inner-pages/blog-banner.png') }}" alt="">
                        </div>
                       <div class="banner-content">
                            <h2>Blog</h2>
                            <p>Join 50,000+ Subscribers</p>
                            <form>
                                <div class="form-inner">
                                    <input type="text" placeholder="Email here...">
                                    <button type="submit">
                                        Subscribe
                                        <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home3-blog-area sec-mar">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-4 col-md-6 wow animate fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="single-blog magnetic-item">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset('assets/img/home-3/home3-blog-01.png') }}" alt="">
                            <div class="blog-tag">
                                <a href="{{ route('blog') }}">Web development</a>
                            </div>
                        </div>
                        <div class="blog-content">
                           <ul class="blog-meta">
                                <li><a href="{{ route('blog') }}">May 20, 2023</a></li>
                                <li><a href="{{ route('blog') }}">Comment (3)</a></li>
                            </ul>
                            <h4><a href="{{ route('blog-details') }}">Donec finibus laoreet exte eu pellentesque. </a></h4>
                            <div class="blog-footer">
                                <div class="read-btn">
                                    <a href="{{ route('blog-details') }}">Read More
                                        <svg width="12" height="12" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 1H12M12 1V13M12 1L0.5 12"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other blog posts -->
            </div>
            <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link"><i class="bi bi-arrow-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="bi bi-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
