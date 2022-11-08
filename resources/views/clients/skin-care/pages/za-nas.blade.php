@extends('clients.skin-care.layouts.default')
@section('content')


<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">За нас</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- Intro -->
    <section class="section-wrap pt-30 intro pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mb-50">
                    <h2 class="intro-heading">За нашиот бренд</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <span class="result">20+</span>
                    <p>Брендови кои ги застапуваме</p>
                    <span class="result">250+</span>
                    <p>Дерматолошки одобрени и сертифицирани продукти</p>
                </div>
            </div>
            <hr class="mb-0">
        </div>
    </section> <!-- end intro -->

    <!-- Promo Section -->
    <section class="section-wrap promo-bg" style="background-image:url({{ url_assets('/skin-care/img/placeholder.jpg') }}">
        <div class="container text-center">
            <div class="table-box">
                <h2 class="heading-frame white">The best ideas</h2>
            </div>
        </div>
    </section> <!-- end promo section -->

    <!-- Testimonials -->
    <section class="section-wrap testimonials">
        <div class="container">

            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <span class="subheading">Hot Customers</span>
                    <h2 class="heading bottom-line">Happy Clients</h2>
                </div>
            </div>

            <div id="owl-testimonials" class="owl-carousel owl-theme owl-dark-dots text-center">

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">I’am amazed, I should say thank you so much for your awesome template. Design is so good and neat, every detail has been taken care these team are realy amazing and talented! I will work only with this agency.</p>
                        <span>Donald Trump / CEO of Trump organization</span>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">This is the excellent theme. It has many useful features that can be use for any kind of business. The support is just amazing and design</p>
                        <span>John C. Marshall / Art Director</span>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Needless to say, beautifully designed theme that serves many purpose. Even more sutomers support is the best! Highly recommend this theme to anyone who enjoys a fine product.</p>
                        <span>Matthew Whilson / PR Agent</span>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- end testimonials -->




    <!-- Newsletter -->
    <section class="newsletter" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Get the latest updates</h4>
                    <form class="relative newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Enter your email">
                        <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>
@stop