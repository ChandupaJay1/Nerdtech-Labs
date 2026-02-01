@extends('layouts.app')

@section('title', 'Contact Us - Nerdtech Labs')

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
                            <span>Contact Us</span>
                            <h1>"Contact With Nerdtech Labs"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ route('home') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> Contact Us
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->

    <div class="contact-page-wrap sec-mar">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <span>CONTACT WITH US</span>
                        <h2>LET’S WORK TOGETHER?</h2>
                        <p>I have worls-class, flexible support via live chat, email and hone. I guarantee that you’ll be able to have any issue resolved within 24 hours.</p>
                        <div class="informations">
                            <div class="single-info">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info">
                                    <p>Sri Lanka</p>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info">
                                    <a href="tel:+94773729462">+94 773 729 462</a>
                                </div>
                            </div>
                            <div class="single-info">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <a href="mailto:info@nerdtechlabs.com">info@nerdtechlabs.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="follow-area">
                            <h5 class="blog-widget-title">Follow Us</h5>
                            <p class="para">Follow us on Social Network</p>
                            <div class="blog-widget-body">
                                <ul class="follow-list d-flex flex-row align-items-start gap-4">
                                    <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                    <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
                                    <li><a href="https://www.pinterest.com/"><i class="bx bxl-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form-wrap">
                        <div class="form-tltle">
                            <h5>Make a Free Consulting</h5>
                        </div>
                       <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <div class="form-inner">
                                        <label>first name</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="form-inner">
                                        <label>Last name</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>Company/Organization</label>
                                        <input type="text">      
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>Email</label>
                                        <input type="email">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>Phone</label>
                                        <input type="email">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>Message</label>
                                        <textarea></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn3" type="submit">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.564763185785!2d90.36311167608078!3d23.834071185557615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14c8682a473%3A0xa6c74743d52adb88!2sEgens%20Lab!5e0!3m2!1sen!2sbd!4v1685535738307!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
