@extends('clients.lilit.layouts.default')
@section('content')
    <div class="content-container no-padding">
        <div class="container-full">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <div class="main-content">
                        <div id="home-slider" data-autorun="yes" data-duration="6000"
                             class="hidden-xs heightt carousel slide fade dhslider dhslider-custom " data-height="">
                            <div class="carousel-inner dhslider-wrap">
                                <div class="item slider-item active">
                                    <div class="slide-bg slide-bg-1">
                                        <img src="{{ url_assets('/lilit/images/bannerLilit2.jpg') }}">
                                    </div>
                                </div>
                                <div class="item slider-item">
                                    <div class="slide-bg slide-bg-2">
                                        <img src="{{ url_assets('/lilit/images/bannerLilit1.jpg') }}">
                                    </div>
                                </div>
                            </div>

                            {{--<div class="carousel-inner dhslider-wrap">--}}
                                {{--<div class="item slider-item active">--}}
                                    {{--<div class="slide-bg slide-bg-1"></div>--}}
                                    {{--<div class="slider-caption caption-align-left">--}}
                                        {{--<div class="slider-caption-wrap">--}}
                                            {{--<span class="slider-top-caption-text">Летни попусти</span>--}}
                                            {{--<h2 class="slider-heading-text">НАЈНОВИ ПОНУДИ</h2>--}}
                                            {{--<div class="slider-caption-text">НОВИ ТРЕНДОВИ И КОЛЕКЦИИ</div>--}}
                                            {{--<div class="slider-buttons">--}}
                                                {{--<a href="#" class="btn btn-lg btn-white-outline">ВИДИ ПОВЕЌЕ</a>--}}
                                                {{--<a href="#" class="btn btn-lg btn-white-outline">НАРАЧАЈ ВЕДНАШ!</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item slider-item">--}}
                                    {{--<div class="slide-bg slide-bg-2"></div>--}}
                                    {{--<div class="slider-caption caption-align-right">--}}
                                        {{--<div class="slider-caption-wrap">--}}
                                            {{--<span class="slider-top-caption-text">Неверојатни дневни понуди!</span>--}}
                                            {{--<h2 class="slider-heading-text">ДО 50% ПОПУСТ</h2>--}}
                                            {{--<div class="slider-caption-text">НОВИ ТРЕНДОВИ И КОЛЕКЦИИ</div>--}}
                                            {{--<div class="slider-buttons">--}}
                                                {{--<a href="#" class="btn btn-lg btn-white">ВИДИ ПОВЕЌЕ</a>--}}
                                                {{--<a href="#" class="btn btn-lg btn-white-outline">НАРАЧАЈ ВЕДНАШ!</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<ol class="carousel-indicators parallax-content">--}}
                                {{--<li data-target="#home-slider" data-slide-to="0" class="active"></li>--}}
                                {{--<li data-target="#home-slider" data-slide-to="1"></li>--}}
                            {{--</ol>--}}
                        </div>
                        {{--<div class="product-categories-grid">--}}
                            {{--<div class="product-categories-grid-wrap clearfix">--}}
                                {{--<div class="product-category-wall">--}}
                                    {{--<div class="wall-col col-md-6 col-sm-12 title-in product-category-wall">--}}
                                        {{--<a href="{{route('category', [1, 'fustani'])}}">--}}
                                            {{--<div class="product-category-grid-item">--}}
                                                {{--<div class="product-category-grid-item-wrap">--}}
                                                    {{--<div class="product-category-grid-featured-wrap">--}}
                                                        {{--<div class="product-category-grid-featured bg-1"></div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-category-grid-featured-summary">--}}
                                                        {{--<h3>Фустани--}}
                                                            {{--<small>Во сите големини</small>--}}
                                                        {{--</h3>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="wall-col col-md-6 col-sm-12 title-out product-category-wall">--}}
                                        {{--<a href="{{route('category', [4, 'koshuli'])}}">--}}
                                            {{--<div class="product-category-grid-item">--}}
                                                {{--<div class="product-category-grid-item-wrap">--}}
                                                    {{--<div class="product-category-grid-featured-wrap">--}}
                                                        {{--<div class="product-category-grid-featured bg-2"></div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-category-grid-featured-summary">--}}
                                                        {{--<h3>--}}
                                                            {{--Кошули--}}
                                                            {{--<small>Најголем избор во Македонија</small>--}}
                                                        {{--</h3>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="wall-col col-md-6 col-sm-12 title-out product-category-wall">--}}
                                        {{--<a href="{{route('category', [7, 'bluzi'])}}">--}}
                                            {{--<div class="product-category-grid-item">--}}
                                                {{--<div class="product-category-grid-item-wrap">--}}
                                                    {{--<div class="product-category-grid-featured-wrap">--}}
                                                        {{--<div class="product-category-grid-featured bg-3"></div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product-category-grid-featured-summary">--}}
                                                        {{--<h3>Блузи--}}
                                                            {{--<small>Изгледајте совршено</small>--}}
                                                        {{--</h3>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="product-category-wall wall-row">--}}
                                {{--@if(count($bestSellersArticles) > 0)--}}
                                {{--@foreach($bestSellersArticles as $product)--}}
                                {{--<div class="wall-col col-sm-3 title-out height-auto product-category-wall">--}}
                                {{--<a href="{{route('product', [$product->id, $product->url])}}">--}}
                                {{--<div class="product-category-grid-item">--}}
                                {{--<div class="product-category-grid-item-wrap">--}}
                                {{--<div class="product-category-grid-featured-wrap">--}}
                                {{--<div class="product-category-grid-featured bg-4"></div>--}}
                                {{--</div>--}}
                                {{--<div class="product-category-grid-featured-summary">--}}
                                {{--<h4>{{$product->title}}<br> <small>D &amp; G and more</small></h4>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        @if($bestSellersArticles)
                        <div class="product-category-wall wall-row">
                            <h2 class="text-center"> Најпродавани производи</h2>
                            <br>
                        </div>
                        <div style="padding-bottom:0px !important;" class="content-container">
                            <div class="container">
                                <div class="col-md-12 main-wrap">
                                    <div class="main-content">
                                        <div class="shop-loop grid">
                                            <ul class="products">
                                            @if(count($bestSellersArticles) > 0)
                                                @foreach($bestSellersArticles as $product)
                                                <li class="product">
                                                    <div class="product-container">
                                                        <figure>
                                                            <div class="product-wrap">
                                                                <div class="product-images">
                                                                    <div class="shop-loop-thumbnail">
                                                                        <a class="overlay-link" href="{{route('product', [$product->id, $product->url])}}">
                                                                            <img
                                                                                 src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                                                                 alt="{{$product->title}}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="middleCustom hidden-xs hidden-sm hidden-md yith-wcwl-add-to-wishlist">
                                                                            {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                                {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                                        {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                                                        {{--ден.<br></span>--}}
                                                                                {{--</div>--}}
                                                                            {{--@endif--}}
                                                                                <div class="btn btn-danger"> <a style="color:white;" class="hoverA" href="{{route('product', [$product ->id, $product->url])}}"><span>Прегледај</span>
                                                                                        <br></a>
                                                                                </div>
                                                                    </div>

                                                                    <div class="clear"></div>
                                                                    {{--<div class="shop-loop-quickview">--}}
                                                                        {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                            {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                                    {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                                                    {{--ден.<br></span>--}}
                                                                            {{--</div>--}}
                                                                        {{--@endif--}}
                                                                    {{--</div>--}}
                                                                </div>
                                                            </div>
                                                            <figcaption>
                                                                <div class="shop-loop-product-info">
                                                                    <div class="">
                                                                        <div style="font-size:20px;" class="info-price">
                                                                            <span class="price">
                                                                                 @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                                    <span class="product-price-new-home"
                                                                                          style="font-weight: bold;">
                                                                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                 @else
                                                                                                        <span class="product-price-new-home" style="font-weight: bold;">
                                                                                        <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                        </span>
                                                                                </span>
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="info-title">
                                                                        <button value="{{$product->id}}"
                                                                                data-add-to-cart="" id="add_to_cart"
                                                                                class="btn btn-primary">Додади во кошничка</button>
                                                                        <h3 style="margin-top:10px;" class="product_title"><a href="{{route('product', [$product ->id, $product->url])}}">{{$product->title}}</a></h3>
                                                                    </div>

                                                                    {{--<div class="info-excerpt">--}}
                                                                        {{--Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id…--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="list-info-meta clearfix">--}}
                                                                        {{--<div class="info-price">--}}
                                                                            {{--<span class="price">--}}
                                                                                {{--<span class="amount">$17.45</span>--}}
                                                                            {{--</span>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="list-action clearfix">--}}
                                                                            {{--<div class="loop-add-to-cart">--}}
                                                                                {{--<button class="btn btn-primary" href="#">Додади во кошничка</button>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="yith-wcwl-add-to-wishlist">--}}
                                                                                {{--<div class="yith-wcwl-add-button">--}}
                                                                                    {{--<a href="#" class="add_to_wishlist">--}}
                                                                                        {{--Add to Wishlist--}}
                                                                                    {{--</a>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                </div>
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($recommendedArticles)
                        <div class="product-category-wall wall-row">
                            <h2 class="text-center"> Препорачани производи</h2>
                            <br>
                        </div>
                        <div style="padding-bottom:0px !important;" class="content-container">
                            <div class="container">
                                <div class="col-md-12 main-wrap">
                                    <div class="main-content">
                                        <div class="shop-loop grid">
                                            <ul class="products">
                                                    @foreach($recommendedArticles as $article)
                                                    <li class="product">
                                                        <div class="product-container">
                                                            <figure>
                                                                <div class="product-wrap">
                                                                    <div class="product-images">
                                                                        <div class="shop-loop-thumbnail">
                                                                            <a class="overlay-link" href="{{route('product', [$article->id, $article->url])}}">
                                                                                <img
                                                                                     src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" class="img-responsive"
                                                                                     alt="{{$article->title}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="middleCustom hidden-xs hidden-sm hidden-md yith-wcwl-add-to-wishlist">                                                                            {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                            {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                            {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                                                            {{--ден.<br></span>--}}
                                                                            {{--</div>--}}
                                                                            {{--@endif--}}
                                                                            <div class="btn btn-danger"> <a style="color:white;" class="hoverA" href="{{route('product', [$article ->id, $article->url])}}"><span>Прегледај</span>
                                                                                    <br></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clear"></div>
                                                                        {{--<div class="shop-loop-quickview">--}}
                                                                        {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                        {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                        {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                                                        {{--ден.<br></span>--}}
                                                                        {{--</div>--}}
                                                                        {{--@endif--}}
                                                                        {{--</div>--}}
                                                                    </div>
                                                                </div>
                                                                <figcaption>
                                                                    <div class="shop-loop-product-info">
                                                                        <div class="">
                                                                            <div style="font-size:20px;" class="info-price">
                                                                            <span class="price">
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
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="info-title">
                                                                            <button value="{{$article->id}}"
                                                                                    data-add-to-cart="" id="add_to_cart"
                                                                                    class="btn btn-primary">Додади во кошничка</button>
                                                                            <h3 style="margin-top:10px;" class="product_title"><a href="{{route('product', [$article ->id, $article->url])}}">{{$article->title}}</a></h3>
                                                                        </div>

                                                                        {{--<div class="info-excerpt">--}}
                                                                        {{--Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id…--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="list-info-meta clearfix">--}}
                                                                        {{--<div class="info-price">--}}
                                                                        {{--<span class="price">--}}
                                                                        {{--<span class="amount">$17.45</span>--}}
                                                                        {{--</span>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="list-action clearfix">--}}
                                                                        {{--<div class="loop-add-to-cart">--}}
                                                                        {{--<button class="btn btn-primary" href="#">Додади во кошничка</button>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="yith-wcwl-add-to-wishlist">--}}
                                                                        {{--<div class="yith-wcwl-add-button">--}}
                                                                        {{--<a href="#" class="add_to_wishlist">--}}
                                                                        {{--Add to Wishlist--}}
                                                                        {{--</a>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="footer-services">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4 footer-service-item">
                                        <a class="footer-service-item-i">
                                            <i class="footer-service-icon fa fa-send-o"></i>
                                            <h3 class="footer-service-title">БЕСПЛАТНА ДОСТАВА</h3>
                                            <span class="footer-service-text">
														над 1000 ден.
													</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 footer-service-item">
                                        <a class="footer-service-item-i">
                                            <i class="footer-service-icon fa fa-thumbs-up"></i>
                                            <h3 class="footer-service-title">ВИСОК КВАЛИТЕТ</h3>
                                            <span class="footer-service-text">
														По достапни цени!
													</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 footer-service-item">
                                        <a class="footer-service-item-i">
                                            <i class="footer-service-icon fa fa-tags"></i>
                                            <h3 class="footer-service-title">НЕДЕЛНИ ПОПУСТИ</h3>
                                            <span class="footer-service-text">Следете ги нашите неделни попусти</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="modal fade user-login-modal" id="userloginModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<form id="userloginModalForm">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal">--}}
    {{--<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>--}}
    {{--</button>--}}
    {{--<h4 class="modal-title">Login</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}
    {{--<div class="user-login-facebook">--}}
    {{--<button class="btn-login-facebook" type="button">--}}
    {{--<i class="fa fa-facebook"></i>Sign in with Facebook--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<div class="user-login-or"><span>or</span></div>--}}
    {{--<div class="form-group">--}}
    {{--<label>Username</label>--}}
    {{--<input type="text" id="username" name="log" required class="form-control" value="" placeholder="Username">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="password">Password</label>--}}
    {{--<input type="password" id="password" required value="" name="pwd" class="form-control" placeholder="Password">--}}
    {{--</div>--}}
    {{--<div class="checkbox clearfix">--}}
    {{--<div class="form-flat-checkbox pull-left">--}}
    {{--<input type="checkbox" name="rememberme" id="rememberme" value="forever"><i></i>&nbsp;Remember Me--}}
    {{--</div>--}}
    {{--<span class="lostpassword-modal-link pull-right">--}}
    {{--<a href="#lostpasswordModal" data-rel="lostpasswordModal">Lost your password?</a>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<span class="user-login-modal-register pull-left">--}}
    {{--<a data-rel="registerModal" href="#">Not a Member yet?</a>--}}
    {{--</span>--}}
    {{--<button type="submit" class="btn btn-default btn-outline">Sign in</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal fade user-register-modal" id="userregisterModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<form id="userregisterModalForm">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal">--}}
    {{--<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>--}}
    {{--</button>--}}
    {{--<h4 class="modal-title">Register account</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}
    {{--<div class="user-login-facebook">--}}
    {{--<button class="btn-login-facebook" type="button">--}}
    {{--<i class="fa fa-facebook"></i>Sign in with Facebook--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<div class="user-login-or"><span>or</span></div>--}}
    {{--<div class="form-group">--}}
    {{--<label>Username</label>--}}
    {{--<input type="text" name="user_login" required class="form-control" value="" placeholder="Username">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="user_email">Email</label>--}}
    {{--<input type="email" id="user_email" name="user_email" required class="form-control" value="" placeholder="Email">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="user_password">Password</label>--}}
    {{--<input type="password" id="user_password" required value="" name="user_password" class="form-control" placeholder="Password">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="user_password">Retype password</label>--}}
    {{--<input type="password" id="cuser_password" required value="" name="cuser_password" class="form-control" placeholder="Retype password">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<span class="user-login-modal-link pull-left">--}}
    {{--<a data-rel="loginModal" href="#loginModal">Already have an account?</a>--}}
    {{--</span>--}}
    {{--<button type="submit" class="btn btn-default btn-outline">Register</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal fade user-lostpassword-modal" id="userlostpasswordModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<form id="userlostpasswordModalForm">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal">--}}
    {{--<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>--}}
    {{--</button>--}}
    {{--<h4 class="modal-title">Forgot Password</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}
    {{--<div class="form-group">--}}
    {{--<label>Username or E-mail:</label>--}}
    {{--<input type="text" name="user_login" required class="form-control" value="" placeholder="Username or E-mail">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<span class="user-login-modal-link pull-left">--}}
    {{--<a data-rel="loginModal" href="#loginModal">Already have an account?</a>--}}
    {{--</span>--}}
    {{--<button type="submit" class="btn btn-default btn-outline">Sign in</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal fade shop product-quickview" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="product-quickview-content">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="single-product-images">--}}
                                    {{--<div class="single-product-images-slider">--}}
                                        {{--<a class="overlay-link" href="{{route('product', [$product->id, $product->url])}}">--}}
                                            {{--<img style="height: 350px;"--}}
                                                 {{--src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive"--}}
                                                 {{--alt="{{$product->title}}">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="summary entry-summary">--}}
                                    {{--<h1 class="product_title entry-title">Cras rhoncus duis viverra</h1>--}}
                                    {{--<div class="shop-product-rating">--}}
                                        {{--<div class="star-rating">--}}
                                            {{--<span style="width:80%"></span>--}}
                                        {{--</div>--}}
                                        {{--<a href="#reviews" class="shop-review-link">(<span class="count">1</span> customer review)</a>--}}
                                    {{--</div>--}}
                                    {{--<p class="price">--}}
                                        {{--<span class="amount">$12.00</span>–<span class="amount">$23.00</span>--}}
                                    {{--</p>--}}
                                    {{--<div class="product-excerpt">--}}
                                        {{--<p>--}}
                                            {{--Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id metus eget nibh imperdiet fermentum non in metus.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-actions res-color-attr">--}}
                                        {{--<form class="cart">--}}
                                            {{--<div class="product-options-outer">--}}
                                                {{--<div class="variation_form_section">--}}
                                                    {{--<div class="product-options icons-lg">--}}
                                                        {{--<table class="variations-table">--}}
                                                            {{--<tbody>--}}
                                                            {{--<tr>--}}
                                                                {{--<td><label>Color</label></td>--}}
                                                                {{--<td>--}}
                                                                    {{--<div class="select-option swatch-wrapper">--}}
                                                                        {{--<a href="#" title="Green" class="swatch-color green">Green</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="select-option swatch-wrapper selected">--}}
                                                                        {{--<a href="#" title="Red" class="swatch-color red">Red</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="select-option swatch-wrapper">--}}
                                                                        {{--<a href="#" title="White" class="swatch-color white">White</a>--}}
                                                                    {{--</div>--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                            {{--<tr>--}}
                                                                {{--<td><label>Size</label></td>--}}
                                                                {{--<td>--}}
                                                                    {{--<div class="select-option swatch-wrapper selected">--}}
                                                                        {{--<a href="#" title="Extra Large" class="swatch-anchor">--}}
                                                                            {{--<img src="images/sizes/XL.jpg" alt="thumbnail" width="35" height="35"/>--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="select-option swatch-wrapper">--}}
                                                                        {{--<a href="#" title="Extra Extra Large" class="swatch-anchor">--}}
                                                                            {{--<img src="images/sizes/XXL.jpg" alt="thumbnail" width="35" height="35"/>--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="select-option swatch-wrapper">--}}
                                                                        {{--<a href="#" title="Medium" class="swatch-anchor">--}}
                                                                            {{--<img src="images/sizes/M.jpg" alt="thumbnail" width="35" height="35"/>--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="select-option swatch-wrapper">--}}
                                                                        {{--<a href="#" title="Small" class="swatch-anchor">--}}
                                                                            {{--<img src="images/sizes/S.jpg" alt="thumbnail" width="35" height="35"/>--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                            {{--</tbody>--}}
                                                        {{--</table>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="single_variation_wrap">--}}
                                                {{--<div class="single_variation">--}}
                                                    {{--<span class="price"><span class="amount">$20.00</span></span>--}}
                                                {{--</div>--}}
                                                {{--<div class="variations_button">--}}
                                                    {{--<div class="quantity">--}}
                                                        {{--<input type="number" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">--}}
                                                    {{--</div>--}}
                                                    {{--<button type="submit" class="button">Add to cart</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                    {{--<div class="yith-wcwl-add-to-wishlist">--}}
                                        {{--<a href="#" class="add_to_wishlist">--}}
                                            {{--Add to Wishlist--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="product_meta">--}}
                                        {{--<span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>--}}
                                        {{--<span class="posted_in">Category: <a href="#">Aliquam</a></span>--}}
                                        {{--<span class="tagged_as">Tags: <a href="#">Men</a>, <a href="#">Women</a></span>--}}
                                        {{--<span class="posted_in">Brand: <a href="#">Adesso</a>, <a href="#">Carvela</a>.</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="share-links">--}}
                                        {{--<div class="share-icons">--}}
												{{--<span class="facebook-share">--}}
													{{--<a href="#" title="Share on Facebook"><i class="fa fa-facebook"></i></a>--}}
												{{--</span>--}}
                                            {{--<span class="twitter-share">--}}
													{{--<a href="#" title="Share on Twitter"><i class="fa fa-twitter"></i></a>--}}
												{{--</span>--}}
                                            {{--<span class="google-plus-share">--}}
													{{--<a href="#" title="Share on Google +"><i class="fa fa-google-plus"></i></a>--}}
												{{--</span>--}}
                                            {{--<span class="linkedin-share">--}}
													{{--<a href="#" title="Share on Linked In"><i class="fa fa-linkedin"></i></a>--}}
												{{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection