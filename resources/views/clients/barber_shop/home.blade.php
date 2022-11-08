@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="slider" class="carousel slider slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="false" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800">
        <div class="slide--item bg-overlay bg-overlay-dark">
            <div class="bg-section">
                <img src="{{ url_assets('/barber_shop/images/sliders/slide-bg/1.jpg')}}" alt="background">
            </div>
            <div class="pos-vertical-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text--center">
                            <div class="slide--headline">We Will Make You Stylish</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 text--center">
                            <div class="slide--bio">Preparing your money is a daunting challenge for today's investors and will give you a complete account of the system. </div>
                            <div class="slide-action">
                                <a class="btn btn--primary btn--rounded" href="#">Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="slide--item bg-overlay bg-overlay-dark">
            <div class="bg-section">
                <img src="{{ url_assets('/barber_shop/images/sliders/slide-bg/2.jpg')}}" alt="background">
            </div>
            <div class="pos-vertical-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text--center">
                            <div class="slide--headline">We make amazing haircuts</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 text--center">
                            <div class="slide--bio">Preparing your money is a daunting challenge for today's investors and will give you a complete account of the system.</div>
                            <div class="slide-action">
                                <a class="btn btn--secondary btn--white btn--rounded mr-10" href="#">Read More </a>
                                <a class="btn btn--white btn--bordered btn--rounded" href="#">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="slide--item bg-overlay bg-overlay-dark">
            <div class="bg-section">
                <img src="{{ url_assets('/barber_shop/images/sliders/slide-bg/3.jpg')}}" alt="background">
            </div>
            <div class="pos-vertical-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text--center">
                            <div class="slide--headline">our clients trust us</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 text--center">
                            <div class="slide--bio">Preparing your money is a daunting challenge for today's investors and will give you a complete account of the system.</div>
                            <div class="slide-action">
                                <a class="btn btn--secondary btn--white btn--rounded mr-10" href="#">Read More </a>
                                <a class="btn btn--white btn--bordered btn--rounded" href="#">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section id="feature1" class="feature feature-1 text-center bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="heading text--center mb-80">
                            <h2 class="heading--title">Main services</h2>
                            <p class="heading--desc">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                            <div class="divider--line"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon feature--icon-animation">
                                <img src="{{ url_assets('/barber_shop/images/icons/1.png')}}" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Haircut Styles</h3>
                                <p>Proin gravida nibh velit auctor aliquet viel sollicitue lorem bibendum auctor, nisi conseque sagittis nibh id elit duis sed odio sit amet.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon feature--icon-animation">
                                <img src="{{ url_assets('/barber_shop/images/icons/2.png')}}" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Beard Trim</h3>
                                <p>Proin gravida nibh velit auctor aliquet viel sollicitue lorem bibendum auctor, nisi conseque sagittis nibh id elit duis sed odio sit amet.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon feature--icon-animation">
                                <img src="{{ url_assets('/barber_shop/images/icons/3.png')}}" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Hot Shave</h3>
                                <p>Proin gravida nibh velit auctor aliquet viel sollicitue lorem bibendum auctor, nisi conseque sagittis nibh id elit duis sed odio sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    <section id="working-time" class="working-time text-center bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{ url_assets('/barber_shop/images/background/2.jpg')}}" alt="Background" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading text--center mb-80">
                        <h2 class="heading--title text-white">Working Hours</h2>
                        <p class="heading--desc text-white">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                        <div class="divider--line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>sun</h3>
                        <ul class="list-unstyled mb-0">
                            <li>10.00 am</li>
                            <li>to</li>
                            <li>5.00 am</li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>mon</h3>
                        <ul class="list-unstyled mb-0">
                            <li>9.00 am</li>
                            <li>to</li>
                            <li>4.30 am</li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>tue</h3>
                        <ul class="list-unstyled mb-0">
                            <li>10.00 am</li>
                            <li>to</li>
                            <li>5.30 am</li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>wed</h3>
                        <ul class="list-unstyled mb-0">
                            <li>9.30 am</li>
                            <li>to</li>
                            <li>4.00 am</li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>thu</h3>
                        <ul class="list-unstyled mb-0">
                            <li>10.00 am</li>
                            <li>to</li>
                            <li>5.00 am</li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <div class="time-panel">
                        <h3>Fri</h3>
                        <ul class="list-unstyled mb-0">
                            <li>9.00 am</li>
                            <li>to</li>
                            <li>4.30 am</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="shop" class="shop shop-4">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="text--center heading heading-2 mb-70">
                            <h2 class="heading--title">Препорачани производи</h2>
                            <p class="heading--desc mb-0">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                            <div class="divider--line divider--center"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="swipe2" class="swiper-container">
                        <div class="swiper-wrapper">
                    @foreach($recommendedArticles as $article)
                        <div class="col-xs-12 col-sm-6 col-md-3 product-item swiper-slide">
                            <div class="product--img">
                                <a href="{{route('product',[$article->id,$article->url])}}">
                                    <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="Product" />
                                </a>
                                <div class="product--hover">
                                    <div class="product--action">
                                        <a  href="" value="{{$article->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product--content">
                                <div class="product--title">
                                    <h3><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h3>
                                </div>
                                <div class="product--price">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <span class="new-price">
                                            <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    <section id="pricing" class="pricing pricing-1 bg-overlay bg-overlay-dark bg-parallax">
            <div class="bg-section">
                <img src="{{ url_assets('/barber_shop/images/background/3.jpg')}}" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="heading text--center mb-70">
                            <h2 class="heading--title text-white">Our Pricing</h2>
                            <p class="heading--desc text-white">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                            <div class="divider--line"></div>
                        </div>
                    </div>
                    <!-- .col-md-6 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <!-- Pricing #1 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Haircut</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$20.00</span>
                            </div>
                            <p class="pricing--desc">Our stylist consults & delivers you a precision haircut.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #2 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Moustache Trim</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$10.00</span>
                            </div>
                            <p class="pricing--desc">Select & Change your hair color for new experience.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #3 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Beard Trim</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$15.00</span>
                            </div>
                            <p class="pricing--desc">Keep your beard clean and sharp with an awesome style.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #4 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Hair Wash</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$6.00</span>
                            </div>
                            <p class="pricing--desc">Relax and have a hot towel for cleaning your face.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #5 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Hair Color</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$18.00</span>
                            </div>
                            <p class="pricing--desc">Select & Change your hair color for new experience.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #6 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Face Mask</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$12.00</span>
                            </div>
                            <p class="pricing--desc">Our stylist consults & delivers you a precision haircut.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #7 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Men’s Facial</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$25.00</span>
                            </div>
                            <p class="pricing--desc">Relax and have a hot towel for cleaning your face.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- Pricing #8 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="pricing-panel">
                            <div class="pricing--content">
                                <h4 class="pricing--heading">Line Up</h4>
                                <div class="pricing--divider"></div>
                                <span class="price">$13.00</span>
                            </div>
                            <p class="pricing--desc">Keep your beard clean and sharp with an awesome style.</p>
                        </div>
                        <!-- .panel end -->
                    </div>
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
    
    <section id="shop" class="shop shop-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="text--center heading heading-2 mb-70">
                        <h2 class="heading--title">Ексклузивни производи</h2>
                        <p class="heading--desc mb-0">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                        <div class="divider--line divider--center"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="swipe1" class="swiper-container">
                    <div class="swiper-wrapper">
                @foreach($exclusiveArticles as $article)
                    <div class="col-xs-12 col-sm-6 col-md-3 product-item swiper-slide">
                        <div class="product--img">
                            <a href="{{route('product',[$article->id,$article->url])}}">
                                <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="Product" />
                            </a>
                            <div class="product--hover">
                                <div class="product--action">
                                    <a  href="" value="{{$article->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                                </div>
                            </div>
                        </div>
                        <div class="product--content">
                            <div class="product--title">
                                <h3><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h3>
                            </div>
                            <div class="product--price">
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    <span class="new-price">
                                        <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
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
                            </div>
                        </div>
                    </div>
                @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="blog" class="blog blog-grid pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading text--center mb-70">
                        <h2 class="heading--title">Our Blog Posts</h2>
                        <p class="heading--desc">Duis aute irure dolor in reprehenderit volupte velit esse cillum dolore eu fugiat pariatursint occaecat cupidatat non proident culpa.</p>
                        <div class="divider--line"></div>
                    </div>
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                <!-- Blog Entry #1 -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ url_assets('/barber_shop/images/blog/grid/1.jpg')}}" alt="entry image"/>
                            </a>
                            <div class="entry--overlay">
                                <a href="#"><i class="fa fa-chain"></i></a>
                            </div>
                        </div>
                        <div class="entry--content">
                            <div class="entry--meta">
                                <span>Oct 20, 2017</span>
                                <span><a href="#">barbers</a></span>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Foil shaver versus clippers & trimmers</a></h4>
                            </div>
                            <div class="entry--bio">
                                Are you a dedicated razor shaver? dude who hasn't really thought about trying a different..
                            </div>
                            <div class="entry--more">
                                <a href="#">read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- .blog-entry end -->
                </div>
                <!-- .col-md-4 end -->
    
                <!-- Blog Entry #2 -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ url_assets('/barber_shop/images/blog/grid/2.jpg')}}" alt="entry image"/>
                            </a>
                            <div class="entry--overlay">
                                <a href="#"><i class="fa fa-chain"></i></a>
                            </div>
                        </div>
                        <div class="entry--content">
                            <div class="entry--meta">
                                <span>Oct 15, 2017</span>
                                <span><a href="#">Styles</a></span>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Men’s hairstyles for all face shapes</a></h4>
                            </div>
                            <div class="entry--bio">
                                Most of the time, men don't know the haircuts that suit their face shape - but don't worry, we're here to..
                            </div>
                            <div class="entry--more">
                                <a href="#">read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- .blog-entry end -->
                </div>
                <!-- .col-md-4 end -->
    
                <!-- Blog Entry #3 -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ url_assets('/barber_shop/images/blog/grid/3.jpg')}}" alt="entry image"/>
                            </a>
                            <div class="entry--overlay">
                                <a href="#"><i class="fa fa-chain"></i></a>
                            </div>
                        </div>
                        <div class="entry--content">
                            <div class="entry--meta">
                                <span>Oct 25, 2017</span>
                                <span><a href="#">Haircut</a></span>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Basic tips for styling men’s hair</a></h4>
                            </div>
                            <div class="entry--bio">
                                The first tip is to choose a hairstyle that’s realistic for your lifestyle, hair type, and general image..
                            </div>
                            <div class="entry--more">
                                <a href="#">read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- .blog-entry end -->
                </div>
                <!-- .col-md-4 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-20 text--center">
                    <a href="#" class="btn btn--secondary btn--bordered btn--rounded">View More</a>
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section> --}}
 
    <section id="clients1" class="clients clients-carousel clients-carousel-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="carousel carousel-dots" data-slide="5" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="30" data-loop="true" data-speed="1000">
                        <div class="client">
                            <img class="center-block" src="{{ url_assets('/barber_shop/images/clients/1.png')}}" alt="client">
                        </div>
                        <div class="client">
                            <img class="center-block" src="{{ url_assets('/barber_shop/images/clients/2.png')}}" alt="client">
                        </div>
                        <div class="client">
                            <img class="center-block" src="{{ url_assets('/barber_shop/images/clients/3.png')}}" alt="client">
                        </div>
                        <div class="client">
                            <img class="center-block" src="{{ url_assets('/barber_shop/images/clients/4.png')}}" alt="client">
                        </div>
                        <div class="client">
                            <img class="center-block" src="{{ url_assets('/barber_shop/images/clients/5.png')}}" alt="client">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop