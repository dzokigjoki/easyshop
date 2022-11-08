@extends('clients.crystal-bella.layouts.default')
@section('content')

    <div class="content-container no-padding">
        <div class="container-full">
            <div class="main-content">
                <div class="row row-fluid">
                    <div class="col-sm-12">
                        <div class="rev_slider_wrapper fullwidthbanner-container">
                            <div id="rev_slider" class="rev_slider fullwidthabanner">
                                <ul>
                                    <li data-transition="slidehorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                        <img src="{{ url_assets('/crystal-bella/images/baner-alki.jpg') }}" alt="" width="1852" height="656" data-lazyload="{{ url_assets('/crystal-bella/images/baner-alki.jpg') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg">

                                        <div onclick='location.href="{{route('category',[5,'alki'])}}"' class="tp-caption home2-big-white tp-resizeme" data-x="500" data-y="198" data-width="['auto']" data-height="['auto']">
                                            АЛКИ
                                        </div>

                                        <div onclick='location.href="{{route('category',[5,'alki'])}}"' class="tp-caption white-button rev-btn" data-x="530" data-y="343" data-width="['auto']" data-height="['auto']" data-responsive_offset="on" data-responsive="off" data-end="8300">
                                            повеќе
                                        </div>

                                        {{--<div class="tp-caption tp-resizeme" data-x="550" data-y="295" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-responsive_offset="on" data-end="8300">--}}

                                        {{--</div>--}}
                                    </li>

                                    <li data-transition="slidehorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">

                                        <img src="{{ url_assets('/crystal-bella/images/baner-prsteni.jpg') }}" alt="" width="1852" height="718" data-lazyload="{{ url_assets('/crystal-bella/images/baner-prsteni.jpg') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                                        <div onclick='location.href="{{route('category',[4,'prsteni'])}}"' class="tp-caption home2-big-white tp-resizeme" data-x="420" data-y="198" data-width="['auto']" data-height="['auto']" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" data-end="8300">
                                            ПРСТЕНИ
                                        </div>

                                        <div  onclick='location.href="{{route('category',[4,'prsteni'])}}"' class="tp-caption white-button rev-btn" data-x="530" data-y="343" data-width="['auto']" data-height="['auto']" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" data-end="8300">
                                            повеќе
                                        </div>

                                        <div class="tp-caption tp-resizeme" data-x="796" data-y="399" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-start="500" data-responsive_offset="on" data-end="8300" style="z-index: 8;"></div>
                                    </li>

                                    <li data-transition="slidehorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">

                                        <img src="{{ url_assets('/crystal-bella/images/baner-lancinja.jpg') }}" alt="" width="1852" height="718" data-lazyload="{{ url_assets('/crystal-bella/images/baner-lancinja.jpg') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                                        <div onclick='location.href="{{route('category',[1,'lanchinja'])}}"' class="tp-caption home2-big-white tp-resizeme" data-x="420" data-y="198" data-width="['auto']" data-height="['auto']" data-elementdelay="0.05" data-end="8300">
                                            ЛАНЧИЊА
                                        </div>

                                        <div onclick='location.href="{{route('category',[1,'lanchinja'])}}"' class="tp-caption white-button rev-btn" data-x="530" data-y="343" data-width="['auto']" data-height="['auto']" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" data-end="8300">
                                            повеќе
                                        </div>

                                        <div class="tp-caption tp-resizeme" data-x="796" data-y="399" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-responsive_offset="on" data-end="8300" style="z-index: 8;"></div>
                                    </li>

                                    <li data-transition="slidehorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">

                                        <img src="{{ url_assets('/crystal-bella/images/baner-obetki.jpg') }}" alt="" width="1852" height="718" data-lazyload="{{ url_assets('/crystal-bella/images/baner-obetki.jpg') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                                        <div onclick='location.href="{{route('category',[11,'obetki'])}}"' class="tp-caption home2-big-white tp-resizeme" data-x="460" data-y="198" data-width="['auto']" data-height="['auto']" data-elementdelay="0.05" data-end="8300">
                                            ОБЕТКИ
                                        </div>

                                        <div onclick='location.href="{{route('category',[11,'obetki'])}}"' class="tp-caption white-button rev-btn" data-x="530" data-y="343" data-width="['auto']" data-height="['auto']" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-responsive="off" data-end="8300">
                                            повеќе
                                        </div>

                                        <div class="tp-caption tp-resizeme" data-x="796" data-y="399" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-responsive_offset="on" data-end="8300" style="z-index: 8;"></div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer tp-bottom"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="container">--}}
                    {{--<div class="row row-fluid mb-1 mt-2">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="product-categories-grid">--}}
                                {{--<div class="product-categories-grid-wrap row">--}}
                                    {{--<div class="wall-col col-md-6 col-sm-6 title-out product-category-wall">--}}
                                        {{--<div class="product-category-grid-item">--}}
                                            {{--<div class="product-category-grid-item-wrap">--}}
                                                {{--<div class="product-category-grid-featured-wrap">--}}
                                                    {{--<div class="product-category-grid-featured featured-1"></div>--}}
                                                {{--</div>--}}
                                                {{--<div class="product-category-grid-featured-summary">--}}
                                                    {{--<h3>--}}
                                                        {{--<a href="{{route('category',[4,'prsteni'])}}" class="white">--}}
                                                            {{--<small>Crystal Bella</small>--}}
                                                            {{--Прстени--}}
                                                        {{--</a>--}}
                                                    {{--</h3>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="wall-col col-md-6 col-sm-6 title-out product-category-wall">--}}
                                        {{--<div class="product-category-grid-item">--}}
                                            {{--<div class="product-category-grid-item-wrap">--}}
                                                {{--<div class="product-category-grid-featured-wrap">--}}
                                                    {{--<div class="product-category-grid-featured featured-2"></div>--}}
                                                {{--</div>--}}
                                                {{--<div class="product-category-grid-featured-summary">--}}
                                                    {{--<h3>--}}
                                                        {{--<a href="{{route('category',[1,'lanchinja'])}}" class="white">--}}
                                                            {{--<small>Crystal Bella</small>--}}
                                                            {{--Ланчиња--}}
                                                        {{--</a>--}}
                                                    {{--</h3>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--<div class="wall-col col-md-6 col-sm-6 title-out product-category-wall">--}}
                                    {{--<div class="product-category-grid-item">--}}
                                        {{--<div class="product-category-grid-item-wrap">--}}
                                            {{--<div class="product-category-grid-featured-wrap">--}}
                                                {{--<div class="product-category-grid-featured featured-3"></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="product-category-grid-featured-summary">--}}
                                                {{--<h3>--}}
                                                    {{--<a href="{{route('category',[5,'alki'])}}" class="white">--}}
                                                        {{--<small>Crystal Bella</small>--}}
                                                        {{--Алки--}}
                                                    {{--</a>--}}
                                                {{--</h3>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="wall-col col-md-6 col-sm-6 title-out product-category-wall">--}}
                                    {{--<div class="product-category-grid-item">--}}
                                        {{--<div class="product-category-grid-item-wrap">--}}
                                            {{--<div class="product-category-grid-featured-wrap">--}}
                                                {{--<div class="product-category-grid-featured featured-4"></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="product-category-grid-featured-summary">--}}
                                                {{--<h3>--}}
                                                    {{--<a href="{{route('category',[2,'obetki'])}}" class="white">--}}
                                                        {{--<small>Crystal Bella</small>--}}
                                                        {{--Обетки--}}
                                                    {{--</a>--}}
                                                {{--</h3>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="container">
                @if(count($bestSellersArticles) > 0)
                    <div class="row row-fluid mt-6">
                        <div class="col-sm-12">
                            <h2 class="text-center heading-center-custom">
                                Најпродавани
                            </h2>
                            <div data-layout="masonry" data-masonry-column="4" class="commerce products-masonry masonry">
                                <div class="products-masonry-wrap">
                                    <ul class="products masonry-products row masonry-wrap">

                                    @foreach($bestSellersArticles as $article)
                                        <li class="product masonry-item col-md-3 col-sm-6 col-xs-6 filter-prsteni nulla">
                                            <div class="product-container">
                                                <figure>
                                                    <div class="product-wrap">
                                                        <div class="product-images">
                                                            <div class="shop-loop-thumbnail shop-loop-front-thumbnail">
                                                                {{--<img width="375" height="505" src="{{ url_assets('') }}/assets/crystal-bella/images/products/product_328x328.jpg" alt=""/>--}}
                                                                <img width="375" height="505" src="{{\ImagesHelper::getProductImage($article)}}" alt=""/>
                                                            </div>
                                                            <div class="shop-loop-thumbnail shop-loop-back-thumbnail">
                                                                {{--<img width="375" height="505" src="{{ url_assets('') }}/assets/crystal-bella/images/products/product_328x328alt.jpg" alt=""/>--}}
                                                                <img width="375" height="505" src="{{\ImagesHelper::getProductImage($article)}}" alt=""/>
                                                            </div>
                                                            <div class="loop-action">
                                                                <div class="shop-loop-quickview">
                                                                    <a title="Прегледај" href="{{route('product', [$article->id, $article->url])}}">
                                                                    Прегледај
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <figcaption>
                                                        <div class="shop-loop-product-info">
                                                            <div class="info-content-wrap">
                                                                <h3 class="product_title">
                                                                    <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                                                </h3>
                                                                <div class="info-price">
                                                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                        <span class="price">
                                                                            <span class="amount red">
                                                                            {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                                                ден.
                                                                        </span>
                                                                    <del><span class="amount">{{number_format($article->$myPriceGroup)}} ден.</span></del>

                                                                    </span>
                                                                    @else
                                                                        <span class="price">
                                                                        <span class="amount">
                                                                            {{number_format($article->$myPriceGroup)}} ден.
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                                <div class="loop-add-to-cart">
                                                    <a value="{{$article->id}}" data-add-to-cart="" href="#" class="add_to_cart_button">
                                                        Додади во кошничка <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </div>

                <!-- Preporacani -->
                <div class="container">
                @if(count($recommendedArticles) > 0)
                    <div class="row row-fluid mt-6">
                        <div class="col-sm-12">
                            <h2 class="text-center heading-center-custom">
                                Препорачани
                            </h2>
                            <div data-layout="masonry" data-masonry-column="4" class="commerce products-masonry masonry">
                                <div class="products-masonry-wrap">
                                    <ul class="products masonry-products row masonry-wrap">
                                        @foreach($recommendedArticles as $article)
                                            <li class="product masonry-item col-md-3 col-sm-6 col-xs-6 filter-prsteni nulla">
                                                <div class="product-container">
                                                      <figure>
                                                        <div class="product-wrap">
                                                            <div class="product-images">
                                                                <div class="shop-loop-thumbnail shop-loop-front-thumbnail">
                                                                    {{--<img width="375" height="505" src="{{ url_assets('') }}/assets/crystal-bella/images/products/product_328x328.jpg" alt=""/>--}}
                                                                    <img width="375" height="505" src="{{\ImagesHelper::getProductImage($article)}}" alt=""/>
                                                                </div>
                                                                <div class="shop-loop-thumbnail shop-loop-back-thumbnail">
                                                                    {{--<img width="375" height="505" src="{{ url_assets('') }}/assets/crystal-bella/images/products/product_328x328alt.jpg" alt=""/>--}}
                                                                    <img width="375" height="505" src="{{\ImagesHelper::getProductImage($article)}}" alt=""/>
                                                                </div>
                                                                <div class="loop-action">
                                                                    <div class="shop-loop-quickview">
                                                                        <a title="Прегледај" href="{{route('product', [$article->id, $article->url])}}">
                                                                            Прегледај
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <figcaption>
                                                            <div class="shop-loop-product-info">
                                                                <div class="info-content-wrap">
                                                                    <h3 class="product_title">
                                                                        <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                                                    </h3>
                                                                    <div class="info-price">
                                                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                            <span class="price">
                                                                                <span class="amount red">
                                                                            {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                                                    ден.
                                                                        </span>
                                                                        <del><span class="amount">{{number_format($article->$myPriceGroup)}} ден.</span></del>

                                                                    </span>
                                                                        @else
                                                                            <span class="price">
                                                                        <span class="amount">
                                                                            {{number_format($article->$myPriceGroup)}} ден.
                                                                        </span>
                                                                    </span>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="loop-add-to-cart">
                                                        <a value="{{$article->id}}" data-add-to-cart="" href="#" class="add_to_cart_button">
                                                            Додади во кошничка <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </div>

                <div class="container">
                    <div class="row row-fluid">
                        <div class="col-sm-12">
                            <h3 class="text-center heading-center-custom">
                                нашиот блог
                            </h3>
                            <div class="post-grid-wrap">
                                <ul class="row grid col-3">
                                    @foreach($lastBlogs as $blog)
                                        <li class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                                            <article class="hentry">
                                                <div class="hentry-wrap">
                                                    <div class="entry-featured">
                                                        <a href="{{route('blog',[$blog->id,$blog->url])}}" title="{{$blog->title}}">
                                                            @if($blog->image)
                                                                <img width="600" height="450" src="{{\ImagesHelper::getBlogImage($blog)}}" alt="{{$blog->title}}"/>
                                                            @else
                                                                <img width="600" height="450" src="{{ url_assets('/crystal-bella/images/blog-logo.png') }}" alt="{{$blog->title}}"/>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="entry-info">
                                                        <div class="entry-header">
                                                            <h3 class="entry-title">
                                                                <a href="{{route('blog',[$blog->id,$blog->url])}}">{{$blog->title}}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection