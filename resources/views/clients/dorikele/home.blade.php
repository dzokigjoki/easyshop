@extends('clients.dorikele.layouts.default')
@section('content')
    <!-- Content -->
    <section class="section-block featured-media window-height tm-slider-parallax-container">
        <div class="tm-slider-container fullscreen" data-featured-slider data-parallax data-scale-under="960">
            <ul class="tms-slides">
                <li class="tms-slide" data-image data-force-fit data-overlay-bkg-color="#000000"
                    data-overlay-bkg-opacity="0.4">
                    <div class="tms-content">
                        <div class="tms-content-inner center v-align-middle">
                            <div class="row">
                                <div class="column width-12">
                                    <h1 class="tms-caption title-xlarge font-alt-2 weight-light color-white mb-10"
                                        data-animate-in="preset:flipInX;duration:1000ms;"
                                        data-no-scale
                                    >

                                    </h1>
                                    <!--<img src="images/DK_logoCELOSNO.png" alt="Warhol Logo" />-->
                                    <div class="bannerPrv">
                                        <p class="tms-caption mb-50 lead color-white"
                                           data-animate-in="preset:slideInUpShort;duration:1000ms;delay:200ms;"
                                           data-no-scale
                                        ><strong>Погледнете ги нашите производи</strong></p>
                                        <div class="clear"></div>
                                        <a href="#shop-category" data-offset="-60"
                                           class="prebaraj tms-caption scroll-link button medium pill bkg-theme border-hover-white color-white color-hover-white text-uppercase"
                                           data-animate-in="preset:scaleOut;duration:1000ms;delay:500ms;"
                                           data-no-scale
                                        >Пребарај продавница</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img data-src="https://assets.smartsoft.mk/easyshop/dorikele/images/mainBanner.jpg" data-retina src="images/blank.png" alt=""/>
                </li>
            </ul>
        </div>
    </section>
    <!-- Fullscreen Slider Section End -->

    <!-- Category Grid -->
    <div id="shop-category"
         class="section-block grid-container fade-in-progressively full-width no-margins no-padding-top"
         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-filter-duration="700" data-set-dimensions
         data-animate-resize data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-3">
                    <div class="grid-item grid-sizer">
                        <div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut"
                             data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                            <a class="overlay-link" href="Listanje-Produkti.html">
                                <img src="https://assets.smartsoft.mk/easyshop/dorikele/images/maska.jpg" alt=""/>
                                <span class="overlay-info">
												<span>
													<span>
														<span class="project-title">Најнови Маски</span>
													</span>
												</span>
											</span>
                            </a>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut"
                             data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                            <a class="overlay-link" href="Listanje-Produkti.html">
                                <img src="https://assets.smartsoft.mk/easyshop/dorikele/images/cardholder.jpg" alt=""/>
                                <span class="overlay-info v-align-middle">
												<span>
													<span>
														<span class="project-title">Новчаник за картички</span>
													</span>
												</span>
											</span>
                            </a>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut"
                             data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                            <a class="overlay-link" href="Listanje-Produkti.html">
                                <img src="https://assets.smartsoft.mk/easyshop/dorikele/images/privezoci.jpg" alt=""/>
                                <span class="overlay-info">
												<span>
													<span>
														<span class="project-title">Привезоци</span>
													</span>
												</span>
											</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Grid End -->

    <!-- Product Grid -->
    <div class="section-block replicable-content pb-0">
        <div class="row">
            <div class="column width-6 push-3 center">
                <h2 class="mb-80"> Најпродавани производи</h2>
            </div>
        </div>
    </div>
    <div id="product-grid"
         class="section-block grid-container products fade-in-progressively no-padding-top pb-80"
         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
         data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-4">
                    @if(count($bestSellersArticles) > 0)
                        @foreach($bestSellersArticles as $product)
                            <div style="min-height: 550px;" class="grid-item product portrait grid-sizer">
                                <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                     data-hover-speed="700" data-hover-bkg-color="#000000"
                                     data-hover-bkg-opacity="0.01">
                                    <a class="overlay-link" href="{{route('product', [$product->id, $product->url])}}">
                                        <img style="min-height: 350px;"
                                             src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive"
                                             alt="{{$product->title}}">
                                    </a>
                                    </a>
                                    <div class="product-actions center">
                                        <a href="{{route('product', [$product->id, $product->url])}}"
                                           class="hoverCrno button pill add-to-cart-button">Прегледај</a>
                                    </div>
                                </div>
                                <div class="product-details center">
                                    <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                            class="hoverCrno button pill add-to-cart-button">Додади во Кошничка
                                    </button>
                                    <br>
                                    <br>
                                    <h3 class="product-title">
                                        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                    </h3>
                                    <div class="product-price" style="text-align: center">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="product-price price"
                                                  style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                            <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                        @else


                                            <span class="product-price price"
                                                  style="font-weight: bold;"> <span
                                                        id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="section-block replicable-content pb-0">
        <div class="row">
            <div class="column width-6 push-3 center">
                <h2 class="mb-80"> Совети</h2>
            </div>
        </div>
    </div>

    <div id="product-grid"
         class="section-block grid-container products fade-in-progressively no-padding-top pb-80"
         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
         data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-3">
                    @foreach($lastBlogs as $blog)
                        <div style="min-height: 550px;" class="grid-item product portrait grid-sizer">
                            <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                 data-hover-speed="700" data-hover-bkg-color="#000000"
                                 data-hover-bkg-opacity="0.01">
                                <a class="overlay-link"
                                   href="{{route('blog', [$blog->id, $blog->url])}}">
                                    <img style="min-height: 350px;"
                                         src="{{\ImagesHelper::getBlogImage($blog,null,'lg_')}}"
                                         class="item-image">
                                </a>
                                <div class="product-actions center">
                                    <a href="{{route('blog', [$blog->id, $blog->url])}}"
                                       class="hoverCrno button pill add-to-cart-button">Прегледај</a>
                                </div>
                            </div>
                            <div class="product-details center">
                                <br>
                                <br>
                                <h3 class="product-title">
                                    <a href="{{route('blog', [$blog->id, $blog->url])}}">
                                        {{$blog ->title}}
                                    </a>
                                </h3></div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>





    <div class="section-block replicable-content pb-0">
        <div class="row">
            <div class="column width-6 push-3 center">
                <h2 class="mb-80">Препорачани Производи</h2>
            </div>
        </div>
    </div>
    <div id="product-grid"
         class="section-block grid-container products fade-in-progressively no-padding-top pb-80"
         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
         data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-4">
                    @foreach($recommendedArticles as $article)
                        <div style="min-height: 550px;" class="grid-item product portrait grid-sizer">
                            <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                 data-hover-speed="700" data-hover-bkg-color="#000000"
                                 data-hover-bkg-opacity="0.01">
                                <a class="overlay-link"
                                   href="{{route('product', [$article->id, $article->url])}}">
                                    <img style="min-height: 350px;"
                                         src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                         class="item-image">
                                </a>
                                <div class="product-actions center">
                                    <a href="{{route('product', [$article->id, $article->url])}}"
                                       class="hoverCrno button pill add-to-cart-button">Прегледај</a>
                                </div>
                            </div>
                            <div class="product-details center">
                                <button value="{{$article->id}}" data-add-to-cart="" id="add_to_cart"
                                        class="hoverCrno button pill add-to-cart-button">Додади во Кошничка
                                </button>
                                <br>
                                <br>
                                <h3 class="product-title">
                                    <a href="{{route('product', [$article->id, $article->url])}}">
                                        {{$article ->title}}
                                    </a>
                                </h3>
                                <div class="product-price" style="text-align: center">
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <span class="product-price price"
                                              style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                    @else
                                        <span class="product-price price"
                                              style="font-weight: bold;"> <span
                                                    id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Product Grid End -->

    <!-- More -->
    <div style="background-color: #232323" class="section-block pt-50 pb-40 bkg-theme">
        <div class="row flex">
            <div class="column width-12 center">
                <a href="#"
                   class="prebaraj button medium pill border-white bkg-hover-theme color-white color-hover-white text-uppercase">Погледнете
                    ги сите продукти</a>
            </div>
        </div>
    </div>
    <!-- More End -->

    <!-- Hero 5 Section -->
    <div class="section-block hero-5 clear-height show-media-column-on-mobile bkg-grey-ultralight">
        <div class="media-column width-6">
            <div>
                <img style="height: 605px; width: 100%;"
                     src="https://assets.smartsoft.mk/easyshop/dorikele/images/posledenBanner.png"/>
            </div>
        </div>
        <div class="row rowWithMargin">
            <div class="column width-5 push-7">
                <div class="hero-content split-hero-content">
                    <div class="hero-content-inner left horizon"
                         data-animate-in="preset:turnInRight;duration:1000ms;" data-threshold="0.7">
                        <h2 class="mb-50">Останете во тек!</h2>
                        <p class="lead font-alt-2">Бидете известени за најновите попусти и акции во DoriKele</p>
                        <p>Ќе ви ги праќаме најновите производи и попусти по Email, можете да не отследете во секој
                            момент</p>
                        <div class="Најавете се!-form-container">
                            <form class="Најавете се!-form" action="php/subscribe.php" method="post" novalidate>
                                <div class="row">
                                    <div class="column width-12">
                                        <div class="field-wrapper">
                                            <input type="email" name="email"
                                                   class="form-email form-element no-padding-left no-padding-right"
                                                   placeholder="Email address*" tabindex="2" required>
                                        </div>
                                    </div>
                                    <div class="column width-12">
                                        <input type="submit" value="Најавете се!"
                                               class="form-submit button hoverCrno pill bkg-charcoal bkg-hover-theme color-white color-hover-white">
                                    </div>
                                </div>
                                <input type="text" name="honeypot" class="form-honeypot form-element">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero 5 Section End -->


@endsection