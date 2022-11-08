@extends('clients.dorikele.layouts.default')
@section('content')
    <br>
<div class="section-block replicable-content">

    <!-- Product Details -->
    <div class="row product">
        <div class="column width-6">
            <div class="product-images">
                <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                    <a class="overlay-link lightbox-link" data-group="product-lightbox-gallery" href="{{$product->image}}">
                        {{--<figure>--}}
                            <img src="{{$product->image}}"
                                 data-zoom-image="{{$product->image}}"
                                 alt="{{$product->title}}"
                                 id="product-image">

                        {{--</figure>--}}
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
                                <div class="grid-item grid-sizer" style="width: 150px;">
                                    <div style="float: left;" class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                                        <a class="overlay-link lightbox-link" href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                           data-rel='prettyPhoto[product]'
                                           data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                           data-zoom-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                            <img class="thumbnail_picture panel panel-default"
                                                 src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                                 data-large-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                 alt="">
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
                <ul class="breadcrumb left mb-20">
                    <li>
                        <a href="">Дома</a>
                    </li>
                    <li>
                        <a href="">{{$product -> title}}</a>
                    </li>
                </ul>
                <h3>{{$product -> title}}</h3>
                <hr>
                <p>Достапност:  <b>Да</b></p>
                <div class="product-price price"><ins><span class="amount">
               <div style="font-size: 40px;" class="product-price" style="">
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
                <br>
                <br>
                <div class="product-cart">
                    <span style="float: left;margin-top: 12px;padding-right: 30px; padding-bottom: 20px;"><strong>Количина:</strong></span>
                    <input style="padding-right: 10px; margin-right: 44px;" id="kol" type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="form-element quantity" size="4">
                    <button value="{{$product->id}}" data-add-to-cart="" class="hoverCrno button pill add-to-cart-button">Додади во Кошничка</button>
                </div>
                             <div class="product-description">
                    {{--<p>{{$product->short_description}}</p>--}}
                                 <?php echo $product->description; ?>
                </div>
                {{--<!--<hr>-->--}}
                {{--<!--<div class="product-meta">-->--}}
                {{--<!--<span class="sku-container">SKU: <span class="sku">19</span></span>-->--}}
                {{--<!--<span class="posted-in">Category: <a href="#">Clothes</a></span>-->--}}
                {{--<!--<span class="tagged-as">Tags: <a href="#">Men</a>, <a href="#">Women</a></span>-->--}}
                {{--<!--</div>-->--}}
                {{--<!--<hr>-->--}}
                {{--<!--<ul class="social-list list-horizontal">-->--}}
                {{--<!--<li><a href="#"><span class="icon-twitter-with-circle medium"></span></a></li>-->--}}
                {{--<!--<li><a href="#"><span class="icon-facebook-with-circle medium"></span></a></li>-->--}}
                {{--<!--<li><a href="#"><span class="icon-pinterest-with-circle medium"></span></a></li>-->--}}
                {{--<!--</ul>-->--}}
                {{--<hr class="hide show-on-mobile">--}}
            </div>

            </div>
        </div>
    </div>
    <!-- Product Details End -->

    <!-- Related Info -->
    {{--<div class="row product-related">--}}
        {{--<div class="column width-12">--}}
            {{--<div class="tabs product-tabs style-2">--}}
                {{--<ul class="tab-nav">--}}
                    {{--<li>--}}
                        {{--<a href="#" style="color:black;">Опис</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<div class="tab-panes">--}}
                    {{--<div id="tabs-1-pane-1" class="active animate">--}}
                        {{--<div class="tab-content">--}}
                            {{----}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- Related Info End -->

    <!-- Products Similar -->
    <div class="row products-similar">
        <div class="column width-12">
            <hr>
            <h5 class="mb-50">Продукти од иста категорија: </h5>
            <div id="product-grid" class="grid-container products fade-in-progressively no-padding-top" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="0">
                <div class="row">
                    <div class="column width-12">
                        <div class="row grid content-grid-3">
                            @foreach($relatedProducts as $article)
                            <div style="min-height: 420px;" class="grid-item grid-sizer product design">
                                <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
                                    <a class="overlay-link" href="">
                                        <img style="min-height: 350px;" src="{{\ImagesHelper::getProductImage($article)}}"
                                             class="attachment-shop_catalog" alt="Images">
                                    </a>
                                    <div class="product-actions center">
                                        <a href="{{route('product', [$article->id, $article->url])}}"
                                           data-toggle="modal" data-target=""
                                           class="hoverCrno button pill add-to-cart-button">
                                                                            <span>Прегледај
                                                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details center">
                                    <button value="{{$article->id}}" data-add-to-cart="" id="add_to_cart" class="hoverCrno button pill add-to-cart-button">Додади во Кошничка</button>
                                    <br>
                                    <br>
                                    <h3 class="product-title">
                                        <a href="{{route('product', [$article->id, $article->url])}}"
                                           style="color:black !important; height: 80px;"
                                           class="limit_text"><span class="font-alt-2"> {{$article -> title}}</span> </a>
                                    </h3>
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <span class="product-price-new-home"
                                              style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                    @else


                                        <span class="product-price-new-home"
                                              style="font-weight: bold;"> <span
                                                    id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                    @endif
                                    <div class="product-actions-mobile">

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