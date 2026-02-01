@extends('layouts.app')

@section('title', 'FAQs - Nerdtech Labs')

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
                            <span>FAQs</span>
                            <h1>"Frequently Asked Questions?"</h1>
                            <div class="breadcrumb-list">
                                <a href="{{ url('/') }}">Home</a><img src="{{ asset('assets/img/inner-pages/breadcrumb-arrow.svg') }}" alt=""> FAQs
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumbs section -->
    <div class="faq-page sec-mar">
        <div class="container">
            <div class="row gy-5 justify-content-lg-between justify-content-center">
                <div class="col-lg-4">
                    <div class="faq-items">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Progress</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Payment</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Support</button>
                            </li>
                          </ul>
                          
                    </div>

                    <div class="contact-form-wrap">
                        <div class="form-tltle">
                            <h5>HAVE QUESTION?</h5>
                        </div>
                       <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-12 mb-20">
                                    <div class="form-inner">
                                        <label>name</label>
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
                <div class="col-lg-8">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="accordion" id="accordionExample1">
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Aliquam ligula nunc, vehicula at est quis.
                                    </button>
                                  </h5>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        In hac habitasse platea dictumst Cras leo.
                                    </button>
                                  </h5>
                                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        ornare iaculis tellus. Phasellus venenatis.
                                    </button>
                                  </h5>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="accordion" id="accordionExample2">
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingOne1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                        Aliquam ligula nunc, vehicula at est quis.
                                    </button>
                                  </h5>
                                  <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingTwo1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                        In hac habitasse platea dictumst Cras leo.
                                    </button>
                                  </h5>
                                  <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingThree1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                        ornare iaculis tellus. Phasellus venenatis.
                                    </button>
                                  </h5>
                                  <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFour1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour1" aria-expanded="false" aria-controls="collapseFour1">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFour1" class="accordion-collapse collapse" aria-labelledby="headingFour1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFive1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive1" aria-expanded="false" aria-controls="collapseFive1">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFive1" class="accordion-collapse collapse" aria-labelledby="headingFive1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingSix1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix1" aria-expanded="false" aria-controls="collapseSix1">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseSix1" class="accordion-collapse collapse" aria-labelledby="headingSix1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="accordion" id="accordionExample3">
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingOne2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                        Aliquam ligula nunc, vehicula at est quis.
                                    </button>
                                  </h5>
                                  <div id="collapseOne2" class="accordion-collapse collapse show" aria-labelledby="headingOne2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingTwo2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                        In hac habitasse platea dictumst Cras leo.
                                    </button>
                                  </h5>
                                  <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                        ornare iaculis tellus. Phasellus venenatis.
                                    </button>
                                  </h5>
                                  <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFour2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFour2" class="accordion-collapse collapse" aria-labelledby="headingFour2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingFive2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive2" aria-expanded="false" aria-controls="collapseFive2">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseFive2" class="accordion-collapse collapse" aria-labelledby="headingFive2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h5 class="accordion-header" id="headingSix2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix2" aria-expanded="false" aria-controls="collapseSix2">
                                        Phasellus a placerat eros In hac habitasse.
                                    </button>
                                  </h5>
                                  <div id="collapseSix2" class="accordion-collapse collapse" aria-labelledby="headingSix2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
                                        himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. 
                                        placerat felis non aliquam.
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                 
                </div>
            </div>
        </div>
    </div>
@endsection
