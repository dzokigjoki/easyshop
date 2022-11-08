@extends('clients.yeppeuda.layouts.default')
@section('content')




<style>
    p {
        margin-bottom: 7px;
    }

    .parallax {
        /* The image used */
        background-image: url("img_parallax.jpg");

        /* Set a specific height */
        height: 400px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: bottom !important;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

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
                    <p class="text-justify">
                        Yeppeuda - во превод од корејски јазик ‘прекрасна’. Овој збор беше избор за името на нашата компанија
                        од причина што истата е компанија која се залага на македонскиот пазар да се достапни најдобрите производи
                        од корејско потекло кои ја прават кожата на секоја жена прекрасна. </p>
                    <p class="text-justify">
                        Сертифицирани и безбедни производи, чисти и делотворни состојки, производи
                        кои се против тестирањето на животни и не содржат
                        состојки од животинско потекло - внимателно одбрани.
                    </p>
                    <p class="text-justify">
                        Yeppeuda е израз на се она што сакаме жената постигне кај себе - надворешна и внатрешна нега и љубов
                        кон себе!Застапници за најдобрите корејски брендови, како и за останати брендови за кои веруваме во нивниот
                        квалитет и политика.
                    </p>
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
    <section class="section-wrap promo-bg parallax" style="background-image:url({{ url_assets('/yeppeuda/img/about.jpg') }}">
        <div class="container text-center">
            <div class="table-box">
                <h2 class="heading-frame white">Започнете со купување веднаш</h2>
                <br>
                <a href="/c/21/proizvodi" class="btn btn-banner-dark">Кон продавницата</a>
            </div>
        </div>
    </section> <!-- end promo section -->

    
    <!-- <section class="section-wrap testimonials">
        <div class="container">

            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <span class="subheading">Возбудени корисници</span>
                    <h2 class="heading bottom-line">Среќни клиенти</h2>
                </div>
            </div>

            <div id="owl-testimonials" class="owl-carousel owl-theme owl-dark-dots text-center">

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">I’am amazed, I should say thank you so much for your awesome template. Design is so good and neat, every detail has been taken care these team are realy amazing and talented! I will work only with this agency.</p>
                        <span>Author 1</span>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">This is the excellent theme. It has many useful features that can be use for any kind of business. The support is just amazing and design</p>
                        <span>Author 2</span>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">Needless to say, beautifully designed theme that serves many purpose. Even more sutomers support is the best! Highly recommend this theme to anyone who enjoys a fine product.</p>
                        <span>Author 3</span>
                    </div>
                </div>
            </div>
        </div>

    </section>  -->




    <!-- Newsletter -->
    <section class="newsletter" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Претплати се и добиј 10% попуст</h4>
                    <form class="relative newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Внесете ја вашата е-пошта">
                        <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Претплати се">
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>
@stop