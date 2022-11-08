@extends('clients.watchstore_old.layouts.default')
@section('content')

        <!-- Intro Title Section 2 -->
        <div class="section-block intro-title-1 small bkg-grey-ultralight">
            <div class="row">
                <div class="column width-12">
                    <div class="title-container">
                        <div class="title-container-inner center">
                            <h1 class="title-xlarge font-alt-2 weight-light mb-0">{{$product->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Intro Title Section 2 End -->

        <div class="section-block replicable-content">

            <!-- Product Details -->
            <div class="row product">
                <div class="column width-6">
                    <div class="product-images">
                        <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                            <a class="overlay-link lightbox-link" data-group="product-lightbox-gallery" href="{{$product->image}}">
                                <img src="{{$product->image}}"
                                     data-zoom-image="{{$product->image}}"
                                     alt="{{$product->title}}"
                                     id="product-image">
                                <span class="overlay-info">
											<span>
												<span>
													<span class="icon-plus large"></span>
												</span>
											</span>
										</span>
                            </a>
                        </div>
                        <div class="product-thumbnails grid-container">
                            <div class="row">
                                <div class="column width-12">
                                    <div class="row grid content-grid-4">
                                        @foreach($product->images as $img)
                                            <div style="width: 120px;" class="grid-item grid-sizer">
                                                <div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                                                    <a class="overlay-link lightbox-link" data-group="product-gallery" href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                                        <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"  alt=""/>
                                                            <span class="overlay-info">
                                                                <span>
                                                                    <span>
                                                                        <span class="icon-plus"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column width-5 offset-1">
                    <div class="product-summary">
                        <hr>
                        <div class="product-price price"><ins><span class="amount"></span></ins></div>
                        <div style="font-size: 40px;" class="product-price" style="">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price"
                                      style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #9C2124; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
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
                        <br>
                        <div class="product-description">
                            <p>{{trans('watchstore.available')}}:  <b style="color: #d9534f">{{trans('watchstore.yes')}}</b></p>
                            <br>
                            <p>{!! $product->short_description !!}</p>
                        </div>
                        <div class="product-cart">
                            {{--<div class="form-select form-element medium pull-right">--}}
                                {{--<select name="type">--}}
                                    {{--<option selected="selected" value="">Black</option>--}}
                                    {{--<option value="">Black</option>--}}
                                    {{--<option value="">Green</option>--}}
                                    {{--<option value="">Blue</option>--}}
                                    {{--<option value="">Red</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <span style="float: left;margin-top: 12px;padding-right: 30px; padding-bottom: 20px;"><strong>{{trans('watchstore.quantity')}}:</strong></span>
                            <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="form-element quantity" size="4">
                            <button value="{{$product->id}}" data-add-to-cart="" class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.addToCart')}}</button>
                            <div class="row product-related">
                                <div class="column width-12">
                                    <div class="tabs product-tabs style-2">
                                        <ul class="tab-nav">
                                            <li class="active">
                                                <a style="color: #d9534f" href="#tabs-1-pane-1">{{trans('watchstore.description')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-panes">
                                            <div id="tabs-1-pane-1" class="active animate">
                                                <div class="tab-content">
                                                    {!! $product->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-meta">
                        </div>
                        <ul class="social-list list-horizontal">
                        </ul>
                        <hr class="hide show-on-mobile">
                    </div>
                </div>
            </div>
            <!-- Product Details End -->

            <!-- Related Info -->

            <!-- Related Info End -->

            <!-- Products Similar -->
            <div class="paddingBottom row products-similar">
                <div class="column width-12">
                    <hr>
                    <h5 class="mb-50">{{trans('watchstore.productFromSameCategory')}}: </h5>
                    <div id="product-grid" class="grid-container products fade-in-progressively no-padding-top" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="0">
                        <div class="row">
                            <div class="column width-12">
                                <div class="row grid content-grid-3">
                                    @foreach($relatedProducts as $article)
                                        <div class="heightLaptop grid-item product portrait grid-sizer">
                                            <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                                 data-hover-speed="700" data-hover-bkg-color="#000000"
                                                 data-hover-bkg-opacity="0.01">
                                                <a class="overlay-link" href="{{route('product', [$article->id, $article->url])}}">
                                                    <img
                                                            src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" class="img-responsive"
                                                            alt="{{$article->title}}">
                                                </a>
                                                </a>
                                                <div class="product-actions center">
                                                    <a href="{{route('product', [$article->id, $article->url])}}"
                                                       class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.view')}}</a>
                                                </div>
                                            </div>
                                            <div class="product-details center">
                                                <button value="{{$article->id}}" data-add-to-cart="" id="add_to_cart"
                                                        class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.addToCart')}}
                                                </button>
                                                <br>
                                                <br>
                                                <h3 class="product-title">
                                                    <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                                </h3>
                                                <div class="product-price" style="text-align: center">
                                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                        <span class="product-price price"
                                                              style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
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
                </div>
            </div>

            <!-- Products Similar End -->
        </div>
@endsection