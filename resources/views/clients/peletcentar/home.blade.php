@extends('clients.peletcentar.layouts.default')
@section('content')
<div class="tp-banner-container">
    <div id="swipe1" style="margin-top:21px;" class="swiper-container">
        <ul class="swiper-wrapper">
            <li style="margin-left: -41px;" class="centeredContainer bannerMargin swiper-slide" data-transition="fade">
                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/1.jpg')}}"
                    alt="slider-image" />
                <div class="centered product-info ">
                    {{-- <h1 style="color:white; font-weight: normal !important;" class="class="font-ban"">Сопствена дистрибуција со четири возила</h1><br> --}}
                    <a href="{{route('blog', [11, 'dostava'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
                </div>
            </li>
            <li class="centeredContainer bannerMargin swiper-slide" data-transition="fade">
                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/2.jpg')}}"
                    alt="slider-image" />
                <div class="centered product-info ">
                    {{-- <h1 style="color:white; font-weight: normal !important;" class="font-ban">800m<sup>2</sup>   магацински и деловен простор</h1><br> --}}
                    <a href="{{route('blog', [10, 'galerija'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
                </div>
            </li>
            <li class="centeredContainer bannerMargin swiper-slide" data-transition="fade">

                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/3.jpg')}}"
                    alt="slider-image" />
                <div class="centered product-info">
                    {{-- <h1 style="color:white; font-weight: normal !important;" class="font-ban">Константен лагер за брза и ефикасна испорака</h1><br> --}}
                    <a href="{{route('blog', [11, 'dostava'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
                </div>
            </li>
            <li class="centeredContainer bannerMargin swiper-slide" data-transition="fade">
                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/4.jpg')}}"
                    alt="slider-image" />
                <div class="centered product-info ">
                    {{-- <h1 style="color:white; font-weight: normal !important;" class="font-ban">Истовар со хидраулична рампа и манипулација со рачен палетар</h1><br> --}}
                    <a href="{{route('category', [1, 'peleti'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
                </div>
            </li>
            <li class="centeredContainer bannerMargin swiper-slide" data-transition="fade">
                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/5.jpg')}}"
                    alt="slider-image" />
                <div class="centered product-info">
                    {{-- <h1 style="color:white; font-weight: normal !important;" class="font-ban"></h1><br> --}}
                    <a href="{{route('category', [6, 'kotli'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
                </div>
            </li>
            {{-- <li  class="centeredContainer bannerMargin swiper-slide" data-transition="fade">

                    <img class="img img-responsive" src="{{url_assets('/peletcentar/img/baner5.jpg')}}"
            alt="slider-image"/>
            <div class="centered product-info">
                <h1 style="color:white; font-weight: normal !important;" class="font-ban"></h1><br>
                <a href="{{route('category', [6, 'kotli'])}}" class="flat-read-more">ВИДИ ПОВЕЌЕ</a>
            </div>
            </li> --}}
        </ul>

        <div class="swiper-pagination"></div>
        {{--<!-- Add Arrows -->--}}
        {{--<div class="swiper-button-next"></div>--}}
        {{--<div class="swiper-button-prev"></div>--}}
        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
    </div>
</div>
<div class="flat-row-fix about">
    <div class="container">
        <div class="row">
            {{--  <div class="col-xs-4 col-md-4 col-sm-3 col-lg-3">
                <div class="iconbox center circle lagre">
                    <div class="box-header">
                        <i class="fa fa-truck"></i>
                        <img src="{{url_assets('/peletcentar/img/delivery-truck1.png')  }}">
                        <div class="box-title"><a href="#">Бесплатна достава</a></div>
                    </div>
                    <div class="box-content">
                        Бесплатна достава над 15 вреќи
                    </div>

                </div>
            </div>  --}}


            <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                <div class="iconbox center circle lagre">
                    <div class="box-header">
                        {{-- <i class="fa fa-calendar-o" aria-hidden="true"></i> --}}

                        <img src="{{ url_assets('/peletcentar/img/calendar.png') }}">
                        <div class="box-title"><a href="#">Неделни и месечни попусти</a></div>
                    </div>
                    <div class="box-content">
                        Следете ги нашите неделни и месечни попусти
                    </div>
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-4 -->

            <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                <div class="iconbox center circle lagre">
                    <div class="box-header">
                        {{-- <i class="fa fa-ticket"></i> --}}
                        <img src="{{ url_assets('/peletcentar/img/circular-arrow-clock.png') }}">
                        <div class="box-title"><a href="#">Online нарачки 24/7</a></div>
                    </div>
                    <div class="box-content">
                        Информирајте се и нарачајте во секое време од нашиот сајт
                    </div>
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-4 -->

            <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                <div class="iconbox center circle lagre">
                    <div class="box-header">
                        {{-- <i class="fa fa-ticket"></i> --}}
                        <img src="{{ url_assets('/peletcentar/img/packages.png') }}">
                        <div class="box-title"><a href="#">Залиха во секое време</a></div>
                    </div>
                    <div class="box-content">
                        Големи количини залиха во сопствен магацин
                    </div>
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-4 -->
        </div>
    </div><!-- /.container -->
</div>

<div id="content" class="marginMDSM page-wrap sidebar-left flat-reset">

    <div class="marginXS flat-our-products flat-row">
        <div class="flat-top-title flat-bg-eee">
            <br>
            <br>
            <h3>ИЗБОР НА КОТЛИ</h3>
        </div> <!-- /.flat-bottom-title -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="products-grid">
                        <div id="swipe2" class="marginLeftXs swiper-container post-wrap">
                            <div class="swiper-wrapper products-grid flat-reset">
                                @foreach($recommendedArticles as $article)
                                <div class="swiper-slide item wide-first">
                                    <a href="{{route('product',[$article->id,$article->url])}}">
                                        <div style="padding-bottom: 30px; border: none !important;" class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <div class="pimg product-image"
                                                        style="text-align: center; margin: 0 auto;">
                                                        <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                            class="item-image" />
                                                    </div> <!-- /.pimg -->

                                                    <div class="box-hover">
                                                        {{--<ul class="add-to-links">--}}
                                                        {{--<li class="add_to_cart_button buy_home">--}}
                                                        {{--<i class="fa fa-eye"></i>--}}
                                                        {{--<span>Прегледај</span>--}}
                                                        {{--</li>--}}
                                                        {{--</ul>--}}
                                                    </div> <!-- /.box-hover -->
                                                </div> <!-- /.item-img-info -->
                                            </div> <!-- /.item-img -->


                                            <div class="info-inner">
                                                <br>

                                                <a value="{{$article->id}}"
                                                    href="{{ route('product',[$article->id,$article->url])}}"
                                                                {{-- id="add_to_cart" --}}
                                                                 style="background-color: #D4362A; padding: 10px;"
                                                                class="buy_home">
                                                                {{-- <i class="fa fa-shopping-cart"></i> --}}
                                                            <span>Повеќе</span></a>
                                                        <div class="item-title">
                                                            <a href="{{route('product', [$article->id, $article->url])}}" class="limit_text">{{$article -> title}}</a>
                                                        </div>

                                                        <div class="product-price" style="text-align: center">
                                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                <span class="product-price-new-home"
                                                                      style="font-weight: bold;">
                                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                </span>
                                                            </span>
                                                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
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
                                                        </div>
                                                    </div> <!-- /.info-inner -->
                                                </div> <!-- /.item -->
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            {{--@endforeach--}}
                        </div> <!-- /.products-grid -->
                    </div>
                </div>
            </div>
        </div> <!-- /.flat-our-products -->
    
        <div class="flat-row-fix about pb-20 ponuda">
            <div class="container">
                <div class="row center-xs">
                    <div class="col-lg-8 col-xs-12 pb-20-xs">
                            <h2 class="color-ponuda">ДОБИЈТЕ ПОНУДА</h2>
                    </div>
                    <div class="col-lg-2 col-xs-12">
                        <a id="contact" class="btn btn--primary btn--bordered" href="#banner" >БАРАЊЕ ЗА ПОНУДА</a>
                    </div>
                    <div id="contactForm" style="z-index: 9999;">  
                    <form action="/contact" method="post">
                        <input placeholder="Име*" type="text" class="form-control" id="name" name="name" required>
                        <input placeholder="Е-пошта*" type="email" class="form-control" id="email" name="email" required>
                        <textarea style="height: 129px !important;" placeholder="Тип на понуда*" type="text"  id="message" name="message" required></textarea>         
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button type="submit" class="send-btn" value="Send">Испрати</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="marginXS flat-our-products flat-row">
                <div class="flat-top-title flat-bg-eee">
                    <br>
                    <br>
                    <h3>ИЗБОР НА ПЕЛЕТИ</h3>
                </div> <!-- /.flat-bottom-title -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products-grid">
                                <div id="swipe3" class="marginLeftXs swiper-container post-wrap">
                                    <div class="swiper-wrapper products-grid flat-reset">
                                        @foreach($bestSellersArticles as $article)
                                            <div class="swiper-slide item wide-first">
                                                <a href="{{route('product',[$article->id,$article->url])}}">
                                                    <div style="padding-bottom: 30px; border: none !important;" class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info">
                                                                <div class="pimg product-image"
                                                                     style="text-align: center; margin: 0 auto;">
                                                                    <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                                             class="item-image" />
                                                                </div> <!-- /.pimg -->
        
                                                                <div class="box-hover">
                                                                </div> <!-- /.box-hover -->
                                                            </div> <!-- /.item-img-info -->
                                                        </div> <!-- /.item-img -->
        
        
                                                        <div class="info-inner">
                                                            <br>
        
                                                 
                                                <a value="{{$article->id}}"
                                                    href="{{ route('product',[$article->id,$article->url])}}"
                                                                {{-- id="add_to_cart" --}}
                                                                 style="background-color: #D4362A; padding: 10px;"
                                                                class="buy_home">
                                                                {{-- <i class="fa fa-shopping-cart"></i> --}}
                                                            <span>Повеќе</span></a>
                                                            <div class="item-title">
                                                                <a href="{{route('product', [$article->id, $article->url])}}" class="limit_text">{{$article -> title}}</a>
                                                            </div>
        
                                                            <div class="product-price" style="text-align: center">
                                                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                    <span class="product-price-new-home"
                                                                          style="font-weight: bold;">
                                                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                    </span>
                                                                </span>
                                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
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
                                                            </div>
                                                        </div> <!-- /.info-inner -->
                                                    </div> <!-- /.item -->
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                {{--@endforeach--}}
                            </div> <!-- /.products-grid -->
                        </div>
                    </div>
                </div>
            </div> <!-- /.flat-our-products -->

        <div class="hide-xs flat-testimonial parallax prallax1">
            <div class=" flat-overlay">
                <img class="img img-responsive" src="{{url_assets('/peletcentar/img/testimonials.png')}}"
                     style="height: 100%;width:100%; filter:brightness(50%)">
            </div>
            <div class="container">
                <div class="row">
                    <div id="swipe4" class="swiper-container col-md-12">
                        <div class="flat-top-title flat-background-trans">
                            <h3>ШТО ВЕЛАТ НАШИТЕ КЛИЕНТИ</h3>
                        </div> <!-- /.flat-bottom-title -->

                        <div class="swiper-wrapper flat-testi-wrap">
                            <div class="swiper-slide item">
                                {{--<img style="width: 90px !important; height: 90px !important;" src="https://assets.smartsoft.mk/easyshop/peletcentar/img/tes1.jpg" alt="Image">--}}
                                <p>"Како угостителски објект ни беше потребно да имаме професионален дистрибутер на кој
                                    можеме да се потпреме во секое време. Можеме само да искажеме задоволство од начинот
                                    на
                                    кој се одвива нашата соработка, секогаш брзо испорачано, секогаш количини на лагер и
                                    секако
                                    квалитетни пелети кои ни ја олеснуваат манипулацијата односно чистењето на
                                    котелот."</p>
                                <label style="color: white">Мартин, Кафе бар Мартини - Скопје</label>
                            </div> <!-- /.item -->

                            <div class="swiper-slide item">
                                {{--<img style="width: 90px !important; height: 90px !important;" src="https://assets.smartsoft.mk/easyshop/peletcentar/img/tes2.jpg" alt="Image">--}}
                                <p>"Најголемиот проблем ни беше складирањето на пелети, а сакавме да извршиме уплата по
                                    поволни летни цени, опцијата да уплатиме поголема количина, а испораката да биде
                                    сукцесивна
                                    по мали нарачки во текот на сезоната е услуга која ни е од суштинско значење. Она
                                    што исто е
                                    битно што уплатените средства се сигурни и количини има секогаш на лагер кога и да
                                    извршиме
                                    нарачка, дури и во најголемата криза зимата 2017-та, сепак ни е битно што имаме
                                    соработка со
                                    компанија која влева доверба."</p>
                                <label style="color: white">Даниел – Light Jazz club restaurant - Скопје</label>
                            </div> <!-- /.item -->

                            <div class="swiper-slide item">
                                {{--<img style="width: 90px !important; height: 90px !important;" src="https://assets.smartsoft.mk/easyshop/peletcentar/img/tes3.jpg" alt="Image">--}}
                                <p>"Она што мене лично ми се допаѓа кога одам да купувам пелети е пријателската и
                                    пријатна
                                    атмосфера која владее во фирмата, сите млади и позитивни, а згора на се добри цени и
                                    секогаш
                                    има избор од неколку врсти и тоа ми дозволува да екпериментирам со котелот со
                                    различни класи
                                    и состав на пелети. Препорачувам да ги посетите."</p>
                                <label style="color: white">Томе Стојановски, Влае - Скопје - пензионер</label>
                            </div>
                            <div class="swiper-slide item">
                                <p>
                                    Во оваа денешна брканица времето е најскапоцено. Секогаш сум преполн со обврски и
                                    немам време да барам, да шетам, да експирементирам итн., а имам фамилија и возрасни
                                    родители на кои треба да им обезбедам огрев. Отварам веб, правам нарачка, плаќам со
                                    картичка
                                    и проблемот со нарачка на пелети за мене е веќе заборавена тема и продолжувам со
                                    секојдневните обврски. Дечките веќе не ме ни контактираат после нарачката, знаат
                                    каде живеам,
                                    знаат каде да ги остават пелетите, истовараат и си заминуваат.
                                </p>
                                <label style="color: white">Сашо - Ново Лисиче, Скопје - програмер</label>
                            </div>

                            <!-- /.item -->
                        </div> <!-- /.flat-testi-wrap -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div> <!-- /.flat-testimonial -->
        {{-- <div class="flat-lastest-post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="height:40px;"></div>
                        <div class="flat-top-title flat-background-trans v2">
                            <h3><span class="color">СОВЕТИ</span></h3>
                        </div> <!-- /.flat-bottom-title -->
                        <div class="flat-ltp-wrap">
                            @foreach($lastBlogs as $blog)
                                <div style="height: 370px;" class="item flat-reset">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <div class="pimg" style="text-align: center; margin: 0 auto;">
                                                <a class="product-image"
                                                   href="{{route('blog', [$blog->id, $blog->url])}}">
                                                    <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}"
                                                         class="item-image">
                                                </a>
                                            </div> <!-- /.pimg -->
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="add_to_cart_button buy_home"
                                                           href="{{route('blog', [$blog->id, $blog->url])}}"
                                                           title="Add card">
                                                            <i class="fa fa-eye"></i>
                                                            <span>Прегледај</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> <!-- /.box-hover -->
                                        </div> <!-- /.item-img-info -->
                                    </div> <!-- /.item-img -->


                                    <div class="flat-item-content" style="text-align: center;">
                                        <a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">
                                            <h4>{{$blog->title}}</h4></a>
                                        <p>
                                            {{$blog->short_description}}
                                        </p>
                                    </div>
                                </div> <!-- /.item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="partner-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide-client owl-carousel" data-auto="true" data-item="5" data-nav="false" data-dots="false">
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client ">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client ">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                            <div class="client">
                                <a href="#">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1.png') }}"  alt="standell">
                                    <img src="{{ url_assets('/peletcentar/img/partners/partner-logo-1-hover.png') }}"   alt="standell">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.partner-clients --> --}}
        <div class="partner-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="products-grid">
                        <div id="swipe5" class="marginLeftXs swiper-container post-wrap">
                            <div class="swiper-wrapper products-grid flat-reset">
                    

                                <div class="item-img-info swiper-slide item wide-first">
                                    <img src="{{ url_assets('/peletcentar/img/partners/bio_energy_logo.png') }}"  alt="standell">
                                </div>
                                <div class="item-img-info swiper-slide item wide-first">
                                    <img src="{{ url_assets('/peletcentar/img/partners/biodom_logo.png') }}"  alt="standell">
                                </div>
                                <div class="item-img-info swiper-slide item wide-first">
                                    <img src="{{ url_assets('/peletcentar/img/partners/eko_life_logo.png') }}"  alt="standell">
                                </div>
                                <div class="item-img-info swiper-slide item wide-first">
                                    <img src="{{ url_assets('/peletcentar/img/partners/eko_step_pellet_logo.png') }}"  alt="standell">
                                </div>
                                <div class="item-img-info swiper-slide item wide-first">
                                    <img src="{{ url_assets('/peletcentar/img/partners/logo_pellet4u.png') }}"  alt="standell">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        {{--@endforeach--}}
                    </div> <!-- /.products-grid -->
                </div>
            </div>
        </div>
        </div>

        {{-- <div class="row">
            <div class="col-lg-3">
            </div>
        </div> --}}

    </div><!-- /.flat-lastest-post -->
    {{-- <div class="empty-spacer"></div> --}}
    </div> <!-- /.page-wrap -->
    
@endsection