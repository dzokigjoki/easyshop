@extends('clients.ibutik.layouts.default')

@section('content')

    <div class="gap"></div>

    <div class="container">
        <div class="col-md-12" id="slider" style="">
            <div class="col-md-9" id="slider-9">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner1.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner2.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner3.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner4.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner5.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner6.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner7.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner8.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner9.jpg">
                        </li>
                        <li>
                            <img src="//assets.smartsoft.mk/easyshop/ibutik/img/baner/baner10.jpg">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3" id="slider-3">
{{--                @foreach($dailyPromotionsArticles as $article)--}}
                @if(isset($dailyPromotionsArticles[0]))
                    <a href="{{route('product',[$dailyPromotionsArticles[0]->id,$dailyPromotionsArticles[0]->url])}}">
                        <div class="product" id="slider3" style="height: 365px; margin-top: -45px;">
                            <ul class="product-labels">
                                <li>Дневна промоција</li>
                            </ul>
                            <div class="product-img-wrap">
                                {{--<img class="product-img" src="{{$dailyPromotionsArticles[0]->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($dailyPromotionsArticles[0])}}"
                                     alt=""/>
                            </div>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$dailyPromotionsArticles[0]->title}}</h5>
                                {{--</ul>--}}
                                @if($dailyPromotionsArticles[0]->discount)
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($dailyPromotionsArticles[0], true, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($dailyPromotionsArticles[0]->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($dailyPromotionsArticles[0]->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif

                            </div>
                        </div>
                        <a value="{{$dailyPromotionsArticles[0]->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </a>
                {{--@endforeach--}}
                    @endif
            </div>
        </div>

        <Br>
        {{--<div class="gap"></div>--}}

        @if(count($newestArticles) > 0)
            <h3 class="widget-title-lg baner-label" id="newest-label">Најнови</h3>
            <div class="row" data-gutter="15">
                @foreach($newestArticles[0] as $article)
                    <div class="col-md-4">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Најново</li>
                                @endif
                            </ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>

                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new" id="no-discount">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                                {{--<ul class="product-caption-feature-list">--}}
                                {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        {{--<div class="gap"></div>--}}



        @if(count($newestArticles[1]) > 0)
            <div class="row" data-gutter="15">
                @foreach($newestArticles[1] as $article)
                    <div class="col-md-3">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Ексклузивно</li>
                                @endif
                            </ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>
                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                                {{--<ul class="product-caption-feature-list">--}}
                                {{--<li>2 left</li>--}}
                                {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="gap"></div>


        <h3 class="widget-title-lg baner-label">Совети</h3>
        {{--<h3 class="widget-title-lg baner-label">Совети</h3>--}}
        <div class="row" data-gutter="15">
            @foreach($lastBlogs as $blog)
                <div class="col-md-4">
                    <div class="product ">
                        <div style="border: 1px solid #eee;" class="product-img-wrap">
                            {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                            <img class="product-img" src="{{\ImagesHelper::getBlogImage($blog)}}"
                                 alt=""/>
                        </div>

                        <a class="product-link" href="{{route('blog', [$blog->id, $blog->url])}}"></a>
                        <div class="product-caption">
                            <h5 class="product-caption-title">{{$blog->title}}</h5>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="gap"></div>
        <div class="gap"></div>
        {{--@if(count($recommendedArticles[2]) > 0)--}}
        {{--<div class="row" data-gutter="15">--}}
        {{--@foreach($recommendedArticles[2] as $article)--}}
        {{--<div class="col-md-3">--}}
        {{--<div class="product product-sm-left ">--}}
        {{--<ul class="product-labels">--}}
        {{--@if($article->is_exclusive)--}}
        {{--<li>Ексклузивно</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--<div class="product-img-wrap">--}}
        {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
        {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png" alt="" />--}}
        {{--</div>--}}
        {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
        {{--<div class="product-caption">--}}
        {{--<ul class="product-caption-rating">--}}
        {{--</ul>--}}
        {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
        {{--<div class="product-caption-price">--}}
        {{--<span class="product-caption-price-old">$143</span>--}}
        {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
        {{--</div>--}}
        {{--<ul class="product-caption-feature-list">--}}
        {{--<li>Free Shipping</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--@if(count($recommendedArticles[3]) > 0)--}}
        {{--<div class="row" data-gutter="15">--}}
        {{--@foreach($recommendedArticles[3] as $article)--}}
        {{--<div class="col-md-3">--}}
        {{--<div class="product product-sm-left ">--}}
        {{--<ul class="product-labels">--}}
        {{--@if($article->is_exclusive)--}}
        {{--<li>Ексклузивно</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--<div class="product-img-wrap">--}}
        {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
        {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png" alt="" />--}}
        {{--</div>--}}
        {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
        {{--<div class="product-caption">--}}
        {{--<ul class="product-caption-rating">--}}
        {{--</ul>--}}
        {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
        {{--<div class="product-caption-price">--}}
        {{--<span class="product-caption-price-old">$143</span>--}}
        {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
        {{--</div>--}}
        {{--<ul class="product-caption-feature-list">--}}
        {{--<li>Free Shipping</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}

        {{-- Best Sellers --}}
        {{--<div class="gap"></div>--}}
        <h4 class="widget-title-lg baner-label bestseller_recommended" id="bestseller_recommended">Најпродавани</h4>
        @if(count($bestSellersArticles[0]) > 0)
            <div class="row" data-gutter="15">
                @foreach($bestSellersArticles[0] as $article)
                    <div class="col-md-4">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Најпродавано</li>
                                @endif
                            </ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>
                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new" id="no-discount">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                                {{--<ul class="product-caption-feature-list">--}}
                                {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if(count($bestSellersArticles[1]) > 0)
            <div class="row" data-gutter="15">
                @foreach($bestSellersArticles[1] as $article)
                    <div class="col-md-3">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Ексклузивно</li>
                                @endif
                            </ul>
                            <div class="product-img-wrap">
                                {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>

                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                                {{--<ul class="product-caption-feature-list">--}}
                                {{--<li>2 left</li>--}}
                                {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        {{--@if(count($bestSellersArticles[2]) > 0)--}}
        {{--<div class="row" data-gutter="15">--}}
        {{--@foreach($bestSellersArticles[2] as $article)--}}
        {{--<div class="col-md-3">--}}
        {{--<div class="product product-sm-left ">--}}
        {{--<ul class="product-labels">--}}
        {{--@if($article->is_exclusive)--}}
        {{--<li>Ексклузивно</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--<div class="product-img-wrap">--}}
        {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
        {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png" alt="" />--}}
        {{--</div>--}}
        {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
        {{--<div class="product-caption">--}}
        {{--<ul class="product-caption-rating">--}}
        {{--</ul>--}}
        {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
        {{--<div class="product-caption-price">--}}
        {{--<span class="product-caption-price-old">$143</span>--}}
        {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
        {{--</div>--}}
        {{--<ul class="product-caption-feature-list">--}}
        {{--<li>Free Shipping</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--@if(count($bestSellersArticles[3]) > 0)--}}
        {{--<div class="row" data-gutter="15">--}}
        {{--@foreach($bestSellersArticles[3] as $article)--}}
        {{--<div class="col-md-3">--}}
        {{--<div class="product product-sm-left ">--}}
        {{--<ul class="product-labels">--}}
        {{--@if($article->is_exclusive)--}}
        {{--<li>Ексклузивно</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--<div class="product-img-wrap">--}}
        {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
        {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png" alt="" />--}}
        {{--</div>--}}
        {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
        {{--<div class="product-caption">--}}
        {{--<ul class="product-caption-rating">--}}
        {{--</ul>--}}
        {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
        {{--<div class="product-caption-price">--}}
        {{--<span class="product-caption-price-old">$143</span>--}}
        {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
        {{--</div>--}}
        {{--<ul class="product-caption-feature-list">--}}
        {{--<li>Free Shipping</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}


        {{-- Recommended --}}
        <div class="gap"></div>
        <h4 class="widget-title-lg baner-label" id="bestseller_recommended">
            Препорачани</h4>
        @if(count($recommendedArticles[0]) > 0)
            <div class="row" data-gutter="15">
                @foreach($recommendedArticles[0] as $article)
                    <div class="col-md-4">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Препорачано</li>
                                @endif
                            </ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>
                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new" id="no-discount">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                                {{--<ul class="product-caption-feature-list">--}}
                                {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            </div>

                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>

                @endforeach
            </div>
        @endif

        @if(count($recommendedArticles[1]) > 0)
            <div class="row" data-gutter="4">
                @foreach($recommendedArticles[1] as $article)
                    <div class="col-md-3">
                        <div class="product ">
                            <ul class="product-labels">
                                @if($article->is_exclusive)
                                    <li>Ексклузивно</li>
                                @endif
                            </ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                <img class="product-img" src="{{$article->image}}" alt=""
                                     title="Image Title"/>
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($article)}}"
                                     alt=""/>
                            </div>
                            <a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>
                            <div class="product-caption">
                                <h5 class="product-caption-title">{{$article->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    prvicna cena
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($article, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($article->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    popust
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($article->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <a value="{{$article->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart"
                           class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="gap"></div>


        {{--@if(count($recommendedArticles[2]) > 0)--}}
            {{--<div class="row" data-gutter="15">--}}
                {{--@foreach($recommendedArticles[2] as $article)--}}
                    {{--<div class="col-md-3">--}}
                        {{--<div class="product product-sm-left ">--}}
                            {{--<ul class="product-labels">--}}
                                {{--@if($article->is_exclusive)--}}
                                    {{--<li>Ексклузивно</li>--}}
                                {{--@endif--}}
                            {{--</ul>--}}
                            {{--<div class="product-img-wrap">--}}
                                {{--<img class="product-img" src="{{$article->image}}" alt=""--}}
                                     {{--title="Image Title"/>--}}
                                {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png"--}}
                                     {{--alt=""/>--}}
                            {{--</div>--}}
                            {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
                            {{--<div class="product-caption">--}}
                                {{--<ul class="product-caption-rating">--}}
                                {{--</ul>--}}
                                {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
                                {{--<div class="product-caption-price">--}}
                                    {{--<span class="product-caption-price-old">$143</span>--}}
                                    {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
                                {{--</div>--}}
                                {{--<ul class="product-caption-feature-list">--}}
                                    {{--<li>Free Shipping</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--@if(count($recommendedArticles[3]) > 0)--}}
            {{--<div class="row" data-gutter="15">--}}
            {{--@foreach($recommendedArticles[3] as $article)--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="product product-sm-left ">--}}
            {{--<ul class="product-labels">--}}
            {{--@if($article->is_exclusive)--}}
            {{--<li>Ексклузивно</li>--}}
            {{--@endif--}}
            {{--</ul>--}}
            {{--<div class="product-img-wrap">--}}
            {{--<img class="product-img" src="{{$article->image}}" alt="" title="Image Title" />--}}
            {{--<img class="product-img" src="https://assets.smartsoft.mk/easyshop/ibutik/img/500x500.png" alt="" />--}}
            {{--</div>--}}
            {{--<a class="product-link" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
            {{--<div class="product-caption">--}}
            {{--<ul class="product-caption-rating">--}}
            {{--</ul>--}}
            {{--<h5 class="product-caption-title">{{$article->title}}</h5>--}}
            {{--<div class="product-caption-price">--}}
            {{--<span class="product-caption-price-old">$143</span>--}}
            {{--<span class="product-caption-price-new">{{$article->price}} мкд.</span>--}}
            {{--</div>--}}
            {{--<ul class="product-caption-feature-list">--}}
            {{--<li>Free Shipping</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--@endif--}}

    </div>

    {{--<div class="gap"></div>--}}
    <div class="gap"></div>

@endsection
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/responsiveslides.min.js"></script>--}}


@section('scripts')
@endsection