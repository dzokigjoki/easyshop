@extends('clients.drbrowns.layouts.default')
@section('content')
    {{-- <link  rel="stylesheet" type="text/css" > --}}



    <style>
        ol, ul{
            list-style: unset;
        }
    </style>
    <div class="page-banner">
        <div class="container fadeInLeft ">
            <h2 class="page-title">{{ $product->title }}</h2>
        </div>
    </div>
    <!-- start of page content -->
    <div class="page-content container">

        <div class="row">

            <div class="main col-xs-12" role="main">




                <div itemscope itemtype="http://schema.org/Product" id="product-300"
                    class="product-essential product-detail post-300 product type-product status-publish has-post-thumbnail product_cat-posters sale shipping-taxable purchasable product-type-simple product-cat-posters instock">

                    <div class="row">

                        <div class="col-lg-5 col-md-5 col-sm-6 summary-before">

                            <div class="product-slider images">
                                <ul class="slides">
                                    <li data-thumb="{{ $product->image }}">
                                        <a class="zoomGalleryActive" href="{{ $product->image }}">
                                            <img src="{{ $product->image }}" data-zoom-image="{{ $product->image }}"
                                                alt="{{ $product->title }}">
                                        </a>
                                    </li>

                                    @foreach ($product->images as $img)
                                        <li
                                            data-thumb="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}">
                                            <a data-imagelightbox="gallery" class="zoomGalleryActive"
                                                href="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                                data-rel='prettyPhoto[product]'
                                                data-image="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                                data-zoom-image="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}">
                                                <img class="thumbnail_picture panel panel-default"
                                                    src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'md_') }}"
                                                    data-large-image="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-7 col-lg-7 product-review entry-summary">

                            <h1 itemprop="name" class="product_title entry-title">{{ $product->title }}</h1>

                            <div class="woocommerce-product-rating" itemprop="aggregateRating">
                                <!--<div class="star-rating" title="Rated 4 out of 5">-->
                                <!--<span style="width:80%">-->
                                <!--<strong itemprop="ratingValue" class="rating">4</strong> out of-->
                                <!--<span itemprop="bestRating">5</span>				based on-->
                                <!--<span itemprop="ratingCount" class="rating">4</span> customer ratings-->
                                <!--</span>-->
                                <!--</div>-->
                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span
                                        itemprop="reviewCount" class="count">4</span> customer reviews)</a>
                            </div>
                            <div>
                                <span style="color:#1481BD !important;">Достапност: <h4>Да</h4></span>
                            </div>
                            <br>

                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                    <span class="product-price price" style="font-weight: bold;">
                                        <span style="font-size:30px !important; color:#1481BD !important"
                                            id="current_price">{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                            <span style="font-size:30px !important; color:#1481BD !important;"
                                                class="price_currency">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span>
                                    </span>

                                    <span
                                        style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                        <span
                                            style="color: #d9534f; font-weight: bold">{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                            <span
                                                class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span>
                                        </span></span>


                                @else


                                    <span class="product-price price"
                                        style="font-size:30px; !important; font-weight: bold;"> <span
                                            style="color:#1481BD !important;"
                                            id="current_price">{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                            <span style="color:#1481BD !important;"
                                                class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span></span>

                                @endif

                                <br>
                                <br>

                                <form class="cart" method="post" enctype='multipart/form-data'>

                                    <div class="quantity">
                                        {{-- <input type="number" step="1" min="1"  name="quantity" value="1" title="Qty" --}}
                                        {{-- class="input-text qty text" size="4" /> --}}

                                        <input data-product-quantity="" type="number" value="1"
                                            class="form-control input-sm" />
                                    </div>
                                    <input type="hidden" name="add-to-cart" value="300" />

                                    <button value="{{ $product->id }}" data-add-to-cart="" id="add_to_cart"
                                        class="button add_to_cart_button product_type_simple">Додади во Кошничка
                                    </button>
                                </form>


                                {{-- <div class="product_meta"> --}}



                                {{-- <span class="posted_in">Категорија: <a href="#" rel="tag"></a></span> --}}


                                {{-- </div> --}}

                            </div>
                            <div style="margin-top:-50px;" class="woocommerce-tabs wc-tabs-wrapper">
                                <ul class="tabs wc-tabs">
                                    <li class="description_tab active">
                                        <a href="#tab-description">Опис</a>
                                    </li>
                                </ul>
                                <div style="color:#1481BD !important;" class="panel entry-content wc-tab"
                                    id="tab-description">
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>





                            <!--<div class="share-social-icons">-->

                            <!--<a href="http://www.facebook.com/sharer.php?u=http://cream.inspirythemes.biz/shop/flying-ninja/" target="_blank" title="Share on Facebook">-->
                            <!--<i class="fa fa-facebook"></i>-->
                            <!--</a>-->
                            <!--<a href="https://twitter.com/share?url=http://cream.inspirythemes.biz/shop/flying-ninja/" target="_blank" title="Share on Twitter">-->
                            <!--<i class="fa fa-twitter"></i>-->
                            <!--</a>-->
                            <!--<a href="//pinterest.com/pin/create/button/?url=http://cream.inspirythemes.biz/shop/flying-ninja/&amp;media=http://cream.inspirythemes.biz/wp-content/uploads/2013/06/poster_2_up.jpg&amp;description=Flying%20Ninja" target="_blank" title="Pin on Pinterest">-->
                            <!--<i class="fa fa-pinterest"></i>-->
                            <!--</a>-->
                            <!--<a href="//plus.google.com/share?url=http://cream.inspirythemes.biz/shop/flying-ninja/" target="_blank" title="Share on Google+">-->
                            <!--<i class="fa fa-google-plus"></i>-->
                            <!--</a>-->
                            <!--</div>-->

                        </div><!-- .summary -->

                    </div>


                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        @if ($relatedProducts)
                            <section class="related-products">

                                <h3 class="section-title">Продукти од иста категорија</h3>

                                <div class="related-products-wrapper">

                                    <div class="related-products-carousel">

                                        <div class="product-control-nav">
                                            <a class="prev"><i style="color: #1481BD;" class="fa fa-angle-left"></i></a>
                                            <a class="next"><i style="color: #1481BD;" class="fa fa-angle-right"></i></a>
                                        </div>

                                        <div class="products-top"></div>
                                        <div class="row product-listing">
                                            <div id="product-carousel" class="product-listing">
                                                @foreach ($relatedProducts as $article)
                                                    <div
                                                        class="item first post-301 product type-product status-publish has-post-thumbnail product_cat-posters sale shipping-taxable purchasable product-type-simple product-cat-posters instock">
                                                        {{-- <div style="min-height:448px;" class="item col-md-3 col-xs-6 first fadeInUp"> --}}
                                                        <article>
                                                            <figure>
                                                                <a
                                                                    href="{{ route('product', [$article->id, $article->url]) }}">
                                                                    <img style="min-height:300px; min-width:300px;"
                                                                        src="{{ \ImagesHelper::getProductImage($article, null, 'lg_') }}"
                                                                        class="img-responsive" alt="{{ $article->title }}">
                                                                </a>
                                                                <figcaption style="font-size:19px !important;">
                                                                    @if (EasyShop\Models\Product::hasDiscount($article->discount))
                                                                        <span class="product-price price"
                                                                            style="font-weight: bold;">
                                                                            <span style="color:#1481BD !important;"
                                                                                id="current_price">{{ EasyShop\Models\Product::getPriceRetail1($article, true, 0) }}
                                                                                <span style="color:#1481BD !important; "
                                                                                    class="price_currency">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span>
                                                                        </span>

                                                                        <span
                                                                            style="text-decoration: line-through; color: red; font-weight: bold; font-size: 16px; ">
                                                                            <span
                                                                                style="color: #1481BD; font-weight: bold">{{ number_format($article->$myPriceGroup, 0, ',', '.') }}
                                                                                <span
                                                                                    class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span>
                                                                            </span></span>


                                                                    @else


                                                                        <span class="product-price price"
                                                                            style="font-weight: bold;"> <span
                                                                                style="color:#1481BD !important;"
                                                                                id="current_price">{{ number_format($article->$myPriceGroup, 0, ',', '.') }}
                                                                                <span style="color:#1481BD !important;"
                                                                                    class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span></span>

                                                                    @endif
                                                                </figcaption>
                                                            </figure>
                                                            <br>
                                                            <button value="{{ $article->id }}" data-add-to-cart=""
                                                                id="add_to_cart"
                                                                class="button add_to_cart_button product_type_simple">Додади
                                                                во Кошничка
                                                            </button>
                                                            <h4 class="title">
                                                                <span
                                                                    href="{{ route('product', [$article->id, $article->url]) }}">{{ $article->title }}</span>
                                                            </h4>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </section>
                        @endif


                    </div><!-- #product-300 -->



                </div><!-- end of main -->

            </div><!-- end of .row -->
        </div>
    </div>

@endsection
