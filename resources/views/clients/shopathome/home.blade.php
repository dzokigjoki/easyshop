@extends('clients.shopathome.layouts.default')
@section('content')

{{-- <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="10000">
            <img style="width:100%;height:100%"src="{{ url_assets('/shopathome/images/Baner1-01.png') }}"
class="d-block w-100" alt="...">
</div>
<div class="carousel-item" data-interval="2000">
    <img style="width:100%;height:100%" src="{{ url_assets('/shopathome/images/Baner1-01.png') }}"
        class="d-block w-100" alt="...">
</div>
<div class="carousel-item">
    <img style="width:100%;height:100%" src="{{ url_assets('/shopathome/images/Baner1-01.png') }}"
        class="d-block w-100" alt="...">
</div>
</div>
<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div> --}}



<div id="myCarousel" data-interval="3500" class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        {{-- <div class="item active width_100">
            <a href="/c/27/black-friday">
            <img src="{{ url_assets('/shopathome/images/banner-black-friday.png') }}" style="width:100%;">
            </a>
        </div> --}}
        
        <div class="item active width_100">
            <img src="{{ url_assets('/shopathome/images/baner-kinderlend-1.jpg') }}" style="width:100%;">
        </div>

        <div class="item width_100">
            <img src="{{ url_assets('/shopathome/images/baner-kinderlend-2.jpg') }}" style="width:100%;">
        </div>

        {{-- <div class="item width_100">
            <img src="{{ url_assets('/shopathome/images/Baner3-01.jpg') }}" style="width:100%;">
        </div> --}}



    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- content
    ================================================== -->
<div id="content"   >

    {{--
    <div class="collection clearfix">--}} {{--
        <div class="container">--}} {{--

            <div class="row">--}} {{--
                <div class="col-md-4">--}} {{--
                    <div class="coll-item clearfix">--}} {{--

                        <div class="coll-box">--}} {{--
                            <a href="#"><img src="{{ url_assets('') }}/assets/shopathome/images/iphone.jpg"
    alt=""></a>--}} {{--
                            <div class="coll-text">--}} {{--
                                <span>  </span>--}} {{--
                                <p>IPhone</p>--}} {{--
                                <a href="#"> Прегледај <i class="fa fa-angle-right"></i></a>--}} {{--
                            </div>--}} {{--
                        </div>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
                <div class="col-md-4">--}} {{--
                    <div class="coll-item clearfix">--}} {{--

                        <div class="coll-box">--}} {{--
                            <a href="#"><img src="{{ url_assets('') }}/assets/shopathome/images/samsung.jpg"
    alt=""></a>--}} {{--
                            <div class="coll-text">--}} {{--
                                <span> </span>--}} {{--
                                <p>Samsung</p>--}} {{--
                                <a href="#"> Прегледај <i class="fa fa-angle-right"></i></a>--}} {{--
                            </div>--}} {{--
                        </div>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
                <div class="col-md-4">--}} {{--
                    <div class="coll-item clearfix">--}} {{--

                        <div class="coll-box">--}} {{--
                            <a href="#"><img src="{{ url_assets('') }}/assets/shopathome/images/sony.jpg" alt=""></a>--}} {{--
                            <div class="coll-text">--}} {{--
                                <span> </span>--}} {{--
                                <p>Sony</p>--}} {{--
                                <a href="#"> Прегледај <i class="fa fa-angle-right"></i></a>--}} {{--
                            </div>--}} {{--
                        </div>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
            </div>--}} {{--
        </div>--}} {{--
    </div>--}}
    <!-- End Collection -->
    <div class="hidden-xs hidden-sm middle-content">
        <div class="container">
            <div class="col-lg-3 col-md-3">
                <div class="middle-shipp">
                    <div style="width: 84px !important; border:none !important;" class="mid-border"><img
                            class="img img-responsive" src="{{ url_assets('/shopathome/images/slika1.jpg') }}">
                    </div>
                </div>
                <br>
                <h2><span class="darkblue-f">СИГУРНА ДОСТАВА</span></h2>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="middle-shipp">
                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img
                            class="img img-responsive"
                            src="{{ url_assets('/shopathome/images/percentage.jpg') }}"></div>
                </div>
                <br>
                <h2><span class="darkblue-f">НАЈДОБРИ ПОНУДИ</span></h2>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="middle-shipp">
                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img
                            class="img img-responsive"
                            src="{{ url_assets('/shopathome/images/credit-card.jpg') }}"></div>
                </div>
                <br>
                <h2><span class="darkblue-f">ПЛАЌАЊЕ СО КАРТИЧКА</span></h2>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="middle-shipp">
                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img
                            class="img img-responsive" src="{{ url_assets('/shopathome/images/cash.jpg') }}">
                    </div>
                </div>
                <br>
                <h2><span class="darkblue-f">ПЛАЌАЊЕ ПРИ ДОСТАВА</span></h2>
            </div>
        </div>
    </div>
    <hr class="hr_red darkblue-f hr_arrivals">
    <!-- our work portfolio -->
    <div class="arrivals ">
        <div class="container" style="background:white">
            <div class="filters" style="background:white">
                <div class="filter clearfix" style="background:white">
                    <div class="holder">
                        <ul class="">
                            <li><a class="active darkblue-f ">Најпродавани Производи</a> </li>
                            {{--
                            <li><a href="#" data-filter=".class1"><i class="fa fa-star"></i> NEW ARRIVALS</a></li>--}} {{--
                            <li><a href="#" data-filter=".class2"><i class="fa fa-star"></i> BESTSELLERS</a></li>--}}
                            {{--
                            <li><a href="#" data-filter=".class3"><i class="fa fa-star"></i> FEATURED <i class="fa fa-star"></i></a></li>--}}
                        </ul>
                        <div class="holder-border"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div id="swipe1" class="demo1 clearfix swiper-container">
                    <ul class="clearfix swiper-wrapper">
                        @if(count($bestSellersArticles) > 0)
                        @foreach($bestSellersArticles as $product)
                        <li class="heightLaptop class2 swiper-slide">
                            <div class="arrival-overlay">
                                {{--<img src="{{ url_assets('') }}/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                    class="img-responsive" alt="{{$product->title}}" style="width:200px !important!;"> {{--
                                <img src="{{ url_assets('') }}/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                                <div style="background:#861953" class="sale">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <div class="discountCustom btn btn-danger"> <span>
                                            -
                                            {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                            ден.<br></span>
                                    </div>
                                    @endif
                                </div>
                                <div class="arrival-mask">
                                    <a href="{{route('product',[$product->id,$product->url])}}"
                                        class="medium-button button-red add-cart darkblue-b">Прегледај</a>
                                </div>
                            </div>
                            <div class="arr-content">
                                <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                    class="medium-button button-red centeredButton darkblue-b">Додади во
                                    кошничка</button>
                                <a href="{{route('product',[$product->id,$product->url])}}">
                                    <p>{{$product->title}}</p>
                                </a>
                                <ul>
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <span class="product-price-new-home" style="font-weight: bold;">
                                        <span
                                            id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    <span
                                        style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                        <span
                                            class="price crossed">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    @else
                                    <span class="product-price-new-home" style="font-weight: bold;">
                                        <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endforeach @endif
                    </ul>
                    {{--
                    <div class="swiper-pagination"></div>--}}
                </div>
                <hr class="hr_red darkblue-f ">
                <div class="filter clearfix">
                    <div class="holder">
                        <ul class="">
                            <li><a class="active darkblue-f">Препорачани Производи</a></li>
                            {{--
                            <li><a href="#" data-filter=".class1"><i class="fa fa-star"></i> NEW ARRIVALS</a></li>--}} {{--
                            <li><a href="#" data-filter=".class2"><i class="fa fa-star"></i> BESTSELLERS</a></li>--}}
                            {{--
                            <li><a href="#" data-filter=".class3"><i class="fa fa-star"></i> FEATURED <i class="fa fa-star"></i></a></li>--}}
                        </ul>
                        <div class="holder-border"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div id="swipe2" class="demo1 clearfix swiper-container">
                    <ul class="clearfix swiper-wrapper">
                        @foreach($recommendedArticles as $article)
                        <li class="heightLaptop class2 swiper-slide">
                            <div class="arrival-overlay">
                                {{--<img src="{{ url_assets('') }}/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                                <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}"
                                    class="img-responsive" alt="{{$article->title}}"> {{--
                                <img src="{{ url_assets('') }}/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                                <div style="background:#861953" class="sale">
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    <div class="discountCustom btn btn-danger"> <span>
                                            -
                                            {{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}
                                            ден.<br></span>
                                    </div>
                                    @endif
                                </div>
                                <div class="arrival-mask">
                                    <a href="{{route('product',[$article->id,$article->url])}}"
                                        class="medium-button button-red add-cart darkblue-b">Прегледај</a>
                                </div>
                            </div>
                            <div class="arr-content">
                                <button value="{{$article->id}}" data-add-to-cart="" id="add_to_cart"
                                    class="medium-button button-red centeredButton darkblue-b">Додади во
                                    кошничка</button>

                                <a href="{{route('product',[$article->id,$article->url])}} ">
                                    <p>{{$article->title}}</p>
                                </a>
                                <ul>
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    <span class="product-price-new-home" style="font-weight: bold;">
                                        <span
                                            id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    <span
                                        style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                        <span
                                            class="price crossed">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    @else
                                    <span class="product-price-new-home" style="font-weight: bold;">
                                        <span id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    </span>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End Filters -->

        </div>

    </div>
    <!-- end our work portfolio -->



    <!-- blog -->
    <div class="blog ">
        <hr class="hr_red darkblue-f ">
        <div class="container">
            <div class="filter clearfix">
                <div class="holder">
                    <ul class="">
                        <li><a class="active darkblue-f">Ексклузивни Производи</a></li>
                        {{--
                        <li><a href="#" data-filter=".class1"><i class="fa fa-star"></i> NEW ARRIVALS</a></li>--}} {{--
                        <li><a href="#" data-filter=".class2"><i class="fa fa-star"></i> BESTSELLERS</a></li>--}}
                        {{--
                        <li><a href="#" data-filter=".class3"><i class="fa fa-star"></i> FEATURED <i class="fa fa-star"></i></a></li>--}}
                    </ul>
                    <div class="holder-border"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div id="swipe5" class="demo1 clearfix swiper-container">
                <ul class="clearfix swiper-wrapper">
                    @foreach($exclusiveArticles as $article)
                    <li class="heightLaptop class2 swiper-slide">
                        <div class="arrival-overlay">
                            {{--<img src="{{ url_assets('') }}/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                            <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" class="img-responsive"
                                alt="{{$article->title}}"> {{--
                            <img src="{{ url_assets('') }}/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                            <div style="background:#62BDAB" class="sale">
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                <div class="discountCustom btn btn-danger"> <span>
                                        -
                                        {{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}
                                        ден.<br></span>
                                </div>
                                @endif
                            </div>
                            <div class="arrival-mask">
                                <a href="{{route('product',[$article->id,$article->url])}}"
                                    class="medium-button button-red add-cart darkblue-b">Прегледај</a>
                            </div>
                        </div>
                        <div class="arr-content">
                            <button value="{{$article->id}}" data-add-to-cart="" id="add_to_cart"
                                class="medium-button button-red centeredButton darkblue-b">Додади во кошничка</button>

                            <a href="{{route('product',[$article->id,$article->url])}} ">
                                <p>{{$article->title}}</p>
                            </a>
                            <ul>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                <span class="product-price-new-home" style="font-weight: bold;">
                                    <span
                                        id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                <span
                                    style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                    <span class="price crossed">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                @else
                                <span class="product-price-new-home" style="font-weight: bold;">
                                    <span id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr class="hr_red darkblue-f ">
    </div>
    <!-- end blog -->

    <!-- end .section-area-->
    <div id="klienti" class="mojotDivKlienti">

        <div class="container">
            <!-- Section Header -->
            <div class="section-header text-center">
                <h3></h3>
                <h4></h4>
            </div><!-- Section Header /- -->
            <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
                    <div id="swipe4" class="demo1 clearfix swiper-container">
                        <ul class="clearfix swiper-wrapper">
                            <li class="class2 swiper-slide">
                                <div class="overlay-logos" style="width: 50%;">
                                    <img class="img-responsive"
                                        src="{{ url_assets('/shopathome/images/logo_main (1).png') }}" alt="foto">
                                </div>
                            </li>
                            {{-- <li class="class2 swiper-slide">
                                <div class="overlay-logos" style="width: 50%;">
                                    <img class="img-responsive"
                                        src="{{ url_assets('/shopathome/images/paradiso.png') }}" alt="foto">
                                </div>
                            </li> --}}
                            <li class="class2 swiper-slide">
                                <div class="overlay-logos" style="width: 50%;">
                                    <img class="img-responsive"
                                        src="{{ url_assets('/shopathome/images/mam-40years-logo.png') }}"
                                        alt="foto">
                                </div>
                            </li>
                            <li class="class2 swiper-slide">
                                    <div class="overlay-logos" style="width: 50%;">
                                        <img class="img-responsive"
                                            src="{{ url_assets('/shopathome/images/mima.png') }}"
                                            alt="foto">
                                    </div>
                                </li>
                                
                            <li class="class2 swiper-slide">
                                    <div class="overlay-logos" style="width: 50%;">
                                        <img class="img-responsive"
                                            src="{{ url_assets('/shopathome/images/m&p.jpeg') }}"
                                            alt="foto">
                                    </div>
                                </li>
                            <li class="class2 swiper-slide">
                                <div class="overlay-logos" style="width: 50%;">
                                    <img class="img-responsive"
                                        src="{{ url_assets('/shopathome/images/berg.png') }}" alt="foto">
                                </div>
                            </li>
                            <li class="class2 swiper-slide">
                                <div class="overlay-logos" style="width: 50%;">
                                    <img class="img-responsive"
                                        src="{{ url_assets('/shopathome/images/FreeOn-logo.png') }}" alt="foto">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Indicators -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End content -->

{{--
<div class="call-to-action">--}} {{--
    <h4 style="text-align: center">Погледнете ги нашите производи</h4><br>--}} {{--
    <a href="#" class="medium-button button-red">Нарачај веднаш</a>--}} {{--
    <h1>Погледнете ги нашите производи</h1>--}} {{--
</div>--}}


@endsection