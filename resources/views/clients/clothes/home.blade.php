@extends('clients.clothes.layouts.default')
@section('content')
<style>
    .pt-30{
        padding-top: 30px;
    }
</style>
<div class="slideshow">
        <div id="slideshow1">
            <ul class="allinone_bannerRotator_list">
                <li data-text-id="#content_ss_1"><img src="{{ url_assets('/clothes/images/slideshow1.jpg')}}" alt="img" /></li>
                <li data-text-id="#content_ss_2"><img src="{{ url_assets('/clothes/images/slideshow2.jpg')}}" alt="img" /></li>
                <li data-text-id="#content_ss_3"><img src="{{ url_assets('/clothes/images/slideshow3.jpg')}}" alt="img" /></li>
            </ul>
            <div id="content_ss_1" class="allinone_bannerRotator_texts">
                <div class="content-slideshow" data-initial-left="50" data-initial-top="280" data-final-left="0" data-final-top="280" data-duration="0.7" data-fade-start="0" data-delay="0.2">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide1-content-1.png')}}" alt="img" />
                </div>
                <div class="content-slideshow" data-initial-left="50" data-initial-top="320" data-final-left="0" data-final-top="320" data-duration="0.6" data-fade-start="0" data-delay="0.6">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide1-content-2.png')}}" alt="img" />
                </div>
                <div class="content-link" data-initial-top="440" data-final-top="440" data-duration="0.6" data-fade-start="0" data-delay="1">
                    <a class="link" href="#">Shop now</a>
                </div>
            </div>
            <div id="content_ss_2" class="allinone_bannerRotator_texts">
                <div class="content-slideshow" data-initial-top="0" data-final-top="270" data-duration="0.6" data-fade-start="0" data-delay="0.2">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide2-content-1.png')}}" alt="img" />
                </div>
                <div class="content-slideshow" data-initial-top="380" data-final-top="380" data-final-left="16" data-duration="0.6" data-fade-start="0" data-delay="0.8">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide2-content-2.png')}}" alt="img" />
                </div>
            </div>
            <div id="content_ss_3" class="allinone_bannerRotator_texts">
                <div class="content-slideshow" data-initial-top="480" data-final-top="280" data-duration="0.6" data-fade-start="0" data-delay="0.2">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide3-content-1.png')}}" alt="img" />
                </div>
                <div class="content-slideshow" data-initial-left="200" data-initial-top="340" data-final-left="0" data-final-top="340" data-duration="0.6" data-fade-start="0" data-delay="0.6">
                    <img class="content-img" src="{{ url_assets('/clothes/images/slide3-content-2.png')}}" alt="img" />
                </div>
                <div class="content-link" data-initial-left="100" data-initial-top="420" data-final-left="0" data-final-top="420" data-duration="0.6" data-fade-start="0" data-delay="1">
                    <a class="link" href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.slideshow -->
    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sale">
                        <a href="services.html">
                            <div class="text-box">
                                FREE SHIPPING WORLDWIDE
                            </div>
                            <div class="icon-box">
                                <i class="pe-7s-cart"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="giveway">
                        <a href="services.html">
                            <div class="text-box">
                                GIVEAWAY EVERYWEEK
                            </div>
                            <div class="icon-box">
                                <i class="pe-7s-gift"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="freeship">
                        <a href="services.html">
                            <div class="text-box">
                                SALE UP TO 70% OFF ON TUESDAY
                            </div>
                            <div class="icon-box">
                                <i class="pe-7s-diamond"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.features -->
    <div class="sale-off">
            <div class="container">
                <h3>ПРЕПОРАЧАНИ ПРОИЗВОДИ</h3>
                {{-- <h5>Up to 50%</h5> --}}
                <div id="carousel-6">
                    <div class="box-content">
                        <div class="showcase">
                            <div class="row">
                                <div class="box-product">
                                    @foreach($bestSellersArticles as $article)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <div class="main-img">
                                                    <a href="{{route('product',[$article->id,$article->url])}}">
                                                        <img class="img-responsive" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="img" />
                                                    </a>
                                                </div>
                                                {{-- <div class="overlay-img">
                                                    <a href="single-product.html">
                                                        <img class="img-responsive" src="assets/images/product-img-5-thumb.jpg" alt="img" />
                                                    </a>
                                                </div> --}}
                                                
                                                {{-- <a href="single-product.html" class="details"><i class="pe-7s-search"></i></a> --}}
                                            </div>
                                            <h4 class="product-name"><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h4>
                                            <p class="product-price">
                                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                    <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                    </span>
                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                            <span style="color: #D5B473; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                            </span>
                                                        </span>
                                                @else
                                                <span class="product-price-new-home" style="font-weight: bold;">
                                                        <span id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                </span>
                                                </span>
                                                @endif
                                            </p>
                                            <div class="group-buttons">
                                                    <button type="submit" class="add-to-cart" data-add-to-cart=""  value="{{$article->id}}" id="add_to_cart" data-toggle="tooltip" data-placement="top" title="Додади во кошничка">
                                                            <span>Додади во кошничка</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav">
                        <span class="prev"><i class="fa fa-angle-left"></i></span>
                        <span class="next"><i class="fa fa-angle-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.trending-clothing -->
    <div class="custom-boxes">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="fashion-store">
                        <a href="shop-with-sidebar.html">
                            <h3>
                            ZORKA<br />
                            FASHION<br />
                            STORE
                            </h3>
                            <div class="overlay"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="day-off">
                        <a href="shop-with-sidebar.html">
                            <div class="media">
                                <div class="media-left">
                                    <i class="pe-7s-anchor"></i>
                                </div>
                                <div class="media-body">
                                    <h3>50% OFF</h3>
                                    <h5>EVERY TUESDAY</h5>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.custom-boxes -->
    <div class="sale-off">
        <div class="container">
            <h3>ЕКСКЛУЗИВНИ ПРОИЗВОДИ</h3>
            {{-- <h5>Up to 50%</h5> --}}
            <div id="carousel-2">
                <div class="box-content">
                    {{-- <div class="showcase"> --}}
                        <div class="row">
                            <div class="box-product">
                                @foreach($exclusiveArticles as $article)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <div class="main-img">
                                                <a href="{{route('product',[$article->id,$article->url])}}">
                                                    <img class="img-responsive" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="img" />
                                                </a>
                                            </div>
                                            {{-- <div class="overlay-img">
                                                <a href="single-product.html">
                                                    <img class="img-responsive" src="assets/images/product-img-5-thumb.jpg" alt="img" />
                                                </a>
                                            </div> --}}
                                            
                                            {{-- <i href="single-product.html" class="details"><i class="pe-7s-search"></i></i> --}}
                                        </div>
                                        <h4 class="product-name"><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h4>
                                        <p class="product-price">
                                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                </span>
                                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                        <span style="color: #444444 ; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                        </span>
                                                    </span>
                                            @else
                                            <span class="product-price-new-home" style="font-weight: bold;">
                                                    <span id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                            </span>
                                            @endif
                                        </p>
                                        <div class="group-buttons">
                                            <button type="submit" class="add-to-cart" data-add-to-cart=""  value="{{$article->id}}" id="add_to_cart" data-toggle="tooltip" data-placement="top" title="Додади во кошничка">
                                                    <span>Додади во кошничка</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
                <div class="nav">
                    <span class="prev"><i class="fa fa-angle-left"></i></span>
                    <span class="next"><i class="fa fa-angle-right"></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.sale-off -->
   
    <!-- /.subscribe -->
    <div class="brand-logos pt-30">
        <div class="container">
            <div id="carousel-3">
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/bershka.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/pull-bear.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/hm.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/zara.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/mango.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/pull-bear.png')}}" alt="img" />
                </div>
                <div>
                    <img class="img-responsive" src="{{ url_assets('/clothes/images/hm.png')}}" alt="img" />
                </div>
            </div>
        </div>
    </div>
    <!-- /.brand-logos -->
   
    <hr class="gray-line" />
    <div class="locations">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <i class="pe-7s-alarm"></i>
                        </div>
                        <div class="media-body">
                            <h4>OPENING ALL WEEK</h4>
                            <h5>8AM : 8PM</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <i class="pe-7s-medal"></i>
                        </div>
                        <div class="media-body">
                            <h4>25% OFF WOMEN T-SHIRT</h4>
                            <h5>On order over 500USD</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <i class="pe-7s-world"></i>
                        </div>
                        <div class="media-body">
                            <h4>FREE SHIP ALL ORDER</h4>
                            <h5>Worldwide shipping</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @section('scripts')
    <script>
        $(document).ready(function() {
            // var tabHeading_1 = $("#carousel-1 .tab-heading span");
            // tabHeading_1.first().addClass('active');
            // var owl1 = $('#carousel-1 .box-content');
            // owl1.owlCarousel( {
            //     // loop: true, items:1,
            //      dots:false, autoHeight:true, rtl:false
            // }
            // );
            // owl1.on('changed.owl.carousel', function(e) {
            //     var tabIdx = e.item.index % e.item.count - 2;
            //     tabHeading_1
            //     .removeClass('active')
            //     .eq(tabIdx)
            //     .addClass('active');
            // }
            // );
            // tabHeading_1.on('touchstart mousedown', function(e) {
            //     e.preventDefault();
            //     owl1.trigger('to.owl.carousel', [$(this).index(), 300, true]);
            // }
            // );

            var owl2 = $('#carousel-2 .box-content');
            owl2.owlCarousel( {
               items:1, dots:false, autoHeight:true, rtl:false, smartSpeed: 1500
            }
            );
            $("#carousel-2 .next").click(function() {
                owl2.trigger('next.owl.carousel');
            }
            );
            $("#carousel-2 .prev").click(function() {
                owl2.trigger('prev.owl.carousel');
            }
            );

            var owl6 = $('#carousel-6 .box-content');
            owl6.owlCarousel( {
               items:1, dots:false, autoHeight:true, rtl:false, smartSpeed: 1500
            }
            );
            $("#carousel-6 .next").click(function() {
                owl6.trigger('next.owl.carousel');
            }
            );
            $("#carousel-6 .prev").click(function() {
                owl6.trigger('prev.owl.carousel');
            }
            );

            
            $('#carousel-3').owlCarousel({
                // loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                navigation: false,
                pagination: true,
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    768:{
                        items:3
                    },
                    992:{
                        items:4
                    },
                    1200:{
                        items:5
                    }
                }
            });
       
        });

        
    </script>
    @stop