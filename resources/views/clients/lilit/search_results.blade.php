@extends('clients.lilit.layouts.default')
@section('content')
    <div id="wrapper" class="wide-wrap">
    <div class="heading-container">
        <div class="container heading-standar">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li><span><a href="{{route('home')}}" class="home"><span>Дома</span></a></span></li>
                    <li><span>{{$search}}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <form class="clearfix" action="{{route('search')}}" method="get">
                        <div class="col-lg-4 marginSearchMedia col-xs-12 col-sm-6 filters-row__select">
                            <div class="col-xs-12
                            input-outer">
                                <input class="col-xs-7 col-md-7 col-sm-7" placeholder="Пребарај" type="text" name="search" value="{{$search}}" maxlength="128">
                                <button style="background: #fe6367; border: 2px solid #fe6367; color:white" class="col-xs-5 col-md-5 col-sm-5 btn-btn-danger" type="submit" title="" class="icon icon-search">Пребарај</button>
                            </div>
                            <a href="#" class="search__close"><span class="icon icon-close"></span></a>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-6 marginMedia filters-row__select">
                            <label class="col-lg-offset-2 col-xs-6 col-sm-6 col-md-6 col-lg-4">Подреди по: </label>
                            <div class="col-lg-6 col-xs-6  col-sm-6 col-md-6  select-wrapper">
                                <select style="height: 42px;" onchange="this.form.submit()" name="sort_by" class="select--ys">
                                    <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                            @endif  value="title_asc">Име (A - Z)
                                    </option>
                                    <option @if($order_by == "title_desc") selected=""
                                            @endif  value="title_desc">Име (Z - A)
                                    </option>
                                    <option @if($order_by == "price_asc") selected=""
                                            @endif  value="price_asc">Цена - (Ниска)
                                    </option>
                                    <option @if($order_by == "price_desc") selected=""
                                            @endif  value="price_desc">Цена - (Висока)
                                    </option>
                                </select>
                            </div>
                            <a href="#" class="sort-direction icon icon-arrow_back"></a>
                        </div>
                        <div class="col-lg-4 col-sm-6 marginMedia filters-row__select">
                            <label class="col-lg-offset-2 col-xs-6 col-lg-4">Прикажи: </label>
                            <div class="col-lg-6 col-xs-6 select-wrapper">
                                <select style="height: 42px;" onchange="this.form.submit()" name="results_limit"
                                        class="select--ys show-qty" id="result_limit">
                                    <option @if($results_limit == 20) selected=""
                                            @endif value="20"
                                            selected="">20
                                    </option>
                                    <option @if($results_limit == 50) selected=""
                                            @endif  value="50">50
                                    </option>
                                    <option @if($results_limit == 75) selected=""
                                            @endif  value="75">75
                                    </option>
                                    <option @if($results_limit == 100) selected="selected"
                                            @endif  value="100">100
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="related products">
                                    <div class="related-title">
                                        <h3 style="margin-top:30px; text-align: center;"><span>Резултати од пребарување: {{$search}}</span></h3>
                                    </div>
                                    <ul class="products">
                                        @foreach($products as $product)
                                            <li  class="product">
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
                                                                <div class="middleCustom hidden-xs hidden-sm hidden-md yith-wcwl-add-to-wishlist">                                                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
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
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="shop-pagination">
                <div class="pull-right">
                    <div class="paginate_links">
                        <span class='page-numbers'>{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</span>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    </div>
@endsection