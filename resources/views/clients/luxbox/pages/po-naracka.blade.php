@extends('clients.luxbox.layouts.default')
@section('content')


<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
<style>
    .contact-details {
        margin-left: 0px !important;
    }

    .slider {
        max-width: 1000px;
        margin: 0 auto;
    }

    .slick-slide {
        margin: 0 5px;
    }

    .slick-list {
        margin: 0px -5px 0px -5px;
    }

    button.slick-next,
    button.slick-next:hover {
        position: absolute;
        top: 41%;
        right: 54px;
        width: 47px;
        height: 75px;
        background-image: url("http://maggiesadler.com/wp-content/uploads/2015/10/left-right-arrow.png");
        background-size: 95px;
    }

    button.slick-prev,
    button.slick-prev:hover {
        position: absolute;
        top: 41%;
        left: 15px;
        z-index: 1;
        width: 47px;
        height: 75px;
        background-image: url("http://maggiesadler.com/wp-content/uploads/2015/10/left-right-arrow.png");
        background-size: 95px;
        background-position-x: right;
    }

    .slick-prev:before,
    .slick-next:before {
        font-size: 70px;
        color: #EA8496;
        line-height: inherit;
        font-weight: bold;
    }

    .pt-35 {
        padding-top: 35px !important;
    }

    /* Slick Slider Styles -- Provided by https://kenwheeler.github.io/slick/ */
    /* Slider */
    .slick-slider {
        position: relative;

        display: block;

        -moz-box-sizing: border-box;
        box-sizing: border-box;

        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;

        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;

        display: block;
        overflow: hidden;

        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;

        display: block;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;

        content: '';
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;

        height: 100%;
        min-height: 1px;
    }

    [dir='rtl'] .slick-slide {
        float: right;
    }

    .slick-slide img {
        display: block;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;

        height: auto;

        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }

    @charset 'UTF-8';

    /* Slider */
    .slick-loading .slick-list {
        background: #fff url('http://maggiesadler.com/wp-content/uploads/2015/10/ajax-loader.gif') center center no-repeat;
    }

    /* Icons */
    @font-face {
        font-family: 'slick';
        font-weight: normal;
        font-style: normal;

        src: url('file:///C:/Users/msadler/Desktop/slick-1.5.7/slick/fonts/slick.eot');
        src: url('file:///C:/Users/msadler/Desktop/slick-1.5.7/slick/fonts/slick.eot?#iefix') format('embedded-opentype'), url('file:///C:/Users/msadler/Desktop/slick-1.5.7/slick/fonts/slick.woff') format('woff'), url('file:///C:/Users/msadler/Desktop/slick-1.5.7/slick/fonts/slick.ttf') format('truetype'), url('file:///C:/Users/msadler/Desktop/slick-1.5.7/slick/fonts/slick.svg#slick') format('svg');
    }

    /* Arrows */
    .slick-prev,
    .slick-next {
        font-size: 0;
        line-height: 0;

        position: absolute;
        top: 50%;

        display: block;

        width: 20px;
        height: 20px;
        margin-top: -10px;
        padding: 0;

        cursor: pointer;

        color: transparent;
        border: none;
        outline: none;
        background: transparent;
    }

    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus {
        color: transparent;
        outline: none;
        background: transparent;
    }

    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before {
        opacity: 1;
    }

    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before {
        opacity: .25;
    }

    .slick-prev:before,
    .slick-next:before {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;

        opacity: .75;
        color: white;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-prev {
        left: -25px;
    }

    [dir='rtl'] .slick-prev {
        right: -25px;
        left: auto;
    }

    .slick-prev:before {
        content: '';
    }

    [dir='rtl'] .slick-prev:before {
        content: '';
        font-weight: bold;
        font-size: 20px;
    }

    .slick-next {
        right: -25px;
    }

    [dir='rtl'] .slick-next {
        right: auto;
        left: -25px;
    }

    .slick-next:before {
        content: '';
    }

    [dir='rtl'] .slick-next:before {
        content: '';
    }

    /* Dots */
    .slick-slider {
        margin-bottom: 30px;
    }

    .slick-dots {
        position: absolute;
        bottom: -45px;

        display: block;

        width: 100%;
        padding: 0;

        list-style: none;

        text-align: center;
    }

    .slick-dots li {
        position: relative;

        display: inline-block;

        width: 20px;
        height: 20px;
        margin: 0 5px;
        padding: 0;

        cursor: pointer;
    }

    .slick-dots li button {
        font-size: 0;
        line-height: 0;

        display: block;

        width: 20px;
        height: 20px;
        padding: 5px;

        cursor: pointer;

        color: transparent;
        border: 0;
        outline: none;
        background: transparent;
    }

    .slick-dots li button:hover,
    .slick-dots li button:focus {
        outline: none;
    }

    .slick-dots li button:hover:before,
    .slick-dots li button:focus:before {
        opacity: 1;
    }

    .slick-dots li button:before {
        font-family: 'slick';
        font-size: 6px;
        line-height: 20px;

        position: absolute;
        top: 0;
        left: 0;

        width: 20px;
        height: 20px;

        content: '•';
        text-align: center;

        opacity: .25;
        color: black;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-dots li.slick-active button:before {
        opacity: .75;
        color: black;
    }
</style>
<div class="page-content">
    <section class="breadcrumb-custom breadcrumb-section section-box">
        <div class="container">
            <div class="breadcrumb-inner">
                <h1>Дизајнирај производ</h1>
                <ul class="breadcrumbs">
                    <li><a class="breadcrumbs-1" href="index.html">Почетна</a></li>
                    <li>
                        <p class="breadcrumbs-2">Дизајнирај производ</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="contact-section section-box">
        <div class="container">
            <div class="contact-content">
                <div class="row pt-35">
                    <div class="col-12">
                        <h5 class="special-heading sp_naracka_dizajn">Дизајнирајте го својот производ!</h5>
                    </div>
                    <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                        <p class="text_naracka">
                            Видовте нешто што Ви се допаѓа, но не е во соодветна димензија за Вашиот простор? Или пак
                            можеби имате
                            замислено дизајн на масa од мермер која ние ја немаме? Споделете ја Вашата идеја, ние ќе ја
                            реализираме за Вас.
                            Прикачете слики или скици од производот и пишете ни ги потребните информации во формата
                            подолу. Бојата на

                            мермерот изберете ја од нашата понуда.
                        </p>
                        <br>
                        <p class="text_naracka">
                            Доколку Вашиот дизајн е оригинален и изработен по скица ќе биде објавен на нашата онлајн
                            продавница и ќе го носи
                            Вашето име ( вистинско или уметничко ). Да,
                            и Вие можете да бидете
                            дизајнер на мермерни производи!
                        </p>
                    </div>
                </div>
                <div class="row pt_125">
                    <div class="col-12">
                        <div class="quote-form width_form">
                            <form class="form-contact js-contact-form" method="post"
                                action="{{ route('kontakt-forma') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <input type="text" name="name" placeholder="Име" required>
                                </div>
                                <div class="form-input">
                                    <input type="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email"
                                        placeholder="Е- маил">
                                </div>
                                <div class="form-input">
                                    <input type="phone" required name="phone" placeholder="Телефонски број">
                                </div>
                                <div class="form-textarea margin-bottom-25">
                                    <textarea name="message" required
                                        placeholder="Коментар (пр. димензии, боја на мермер)"></textarea>
                                </div>
                                <div class="form-input">
                                    <input type="file" name="image" class="image_input_naracka">
                                </div>
                                <input type="hidden" name="po-naracka" value=true><br>
                                <div class="form-bottom">
                                    <input type="submit" class="end-quote-1" name="quote" value="Испрати">
                                    <span><i class="zmdi zmdi-arrow-right"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
@stop