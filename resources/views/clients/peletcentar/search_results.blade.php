{{--@extends('clients.peletcentar.layouts.default')--}}
{{--@section('content')--}}

    {{--<div class="page_wrapper">--}}
        {{--<div class="container">--}}

            {{--<!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->--}}
            {{--<br>--}}
            {{--<ul class="breadcrumb">--}}
                {{--<li><a href="/">Почетна</a></li>--}}
                {{--<li>Пребарувaње - {{$search}}</li>--}}

            {{--</ul>--}}
            {{--<br>--}}
            {{--<div class="row">--}}
                    {{--<div class="title-bg">--}}
                        {{--<h2 class="title">Резултати од пребарувањето - {{$search}}</h2>--}}
                    {{--</div>--}}

                    {{--<!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->--}}

                    {{--<div class="section_offset">--}}
                        {{--<form action="{{URL::to('/search')}}" class="form-inline">--}}
                            {{--<header>--}}
                                {{--<!-- - - - - - - - - - - - - - Search by - - - - - - - - - - - - - - - - -->--}}
                                {{--<div>--}}
                                    {{--<aside class="widget widget_search">--}}
                                        {{--<form method="GET" class="search-form" action="http://easyshop.test/search"--}}
                                              {{--style="margin-top: 5px;">--}}
                                            {{--<label>--}}
                                                {{--<!-- <span class="screen-reader-text">Search for:</span> -->--}}
                                                {{--<!-- +389 78 333 383 +389 72 230 120 +389 2 55 11 300<br> -->--}}
                                                {{--<input type="hidden" class="search-field"--}}
                                                       {{--placeholder="Пребарај..." value="" name="search">--}}
                                            {{--</label>--}}
                                            {{--<input type="hidden" class="search-submit" value="Пребарај">--}}
                                        {{--</form>--}}
                                    {{--</aside> <!-- /.widget_search -->--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4" style="">--}}
                                {{--<input class="form-control" style="max-width: calc(100% - 90px); float: left; margin-top: 25px; "type="text" name="search"--}}
                                {{--value="{{$search}}"/>--}}
                                {{--<button type="submit" class="search-submit" style="display: inline; margin-top: 25px;" id="baraj">Барај</button>--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<div class="flat-top-bar-shop flat-reset">--}}
                                            {{--<!-- <span class="screen-reader-text">Search for:</span> -->--}}
                                            {{--<!-- +389 78 333 383 +389 72 230 120 +389 2 55 11 300<br> -->--}}
                                        {{--<div style="float:left;" class="clearfix">--}}
                                            {{--<input style="height: 35px; float: left;" type="search" class="mobileSearch form-control search-field"--}}
                                                    {{--value="{{$search}}" name="search">--}}
                                        {{--<button style="height: 35px; float: left;" type="submit" class="search-submit"><i style="float:left; width: 50px;" class="fa fa-search"></i></button>--}}
                                        {{--</div>--}}
                                        {{--<div class="flat-right flat-filter">--}}
                                            {{--<label style="font-size : 30px; font-weight: bold;">Подреди по:</label>--}}
                                        {{--<div class="flat-sortby">--}}
                                        {{--<div class="btn-group select-dropdown" style="padding-right: 15px;">--}}
                                        {{--<span class="select">--}}

                                             {{--<select onchange="this.form.submit()" name="sort_by" class="form-control">--}}
                                                  {{--<option @if($order_by == "title_asc" || empty($order_by)) selected=""--}}
                                                          {{--@endif  value="title_asc">Име (A - Z) </option>--}}
                                                  {{--<option @if($order_by == "title_desc") selected=""--}}
                                                          {{--@endif  value="title_desc">Име (Z - A) </option>--}}
                                                  {{--<option @if($order_by == "price_asc") selected=""--}}
                                                          {{--@endif  value="price_asc">Цена - (Ниска) </option>--}}
                                                  {{--<option @if($order_by == "price_desc") selected=""--}}
                                                          {{--@endif  value="price_desc">Цена - (Висока) </option>--}}
                                              {{--</select>--}}

                                        {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div> <!-- /.flat-sortby -->--}}

                                            {{--<div id="show_select">--}}
                                                {{--<span>Прикажи:</span>--}}
                                                {{--<div class="btn-group select-dropdown">--}}

                                                    {{--<select onchange="this.form.submit()" name="results_limit"--}}
                                                            {{--class="form-control" id="result_limit">--}}

                                                        {{--<option @if($results_limit == 20) selected=""--}}
                                                                {{--@endif value="20"--}}
                                                                {{--selected="">20--}}
                                                        {{--</option>--}}
                                                        {{--<option @if($results_limit == 50) selected=""--}}
                                                                {{--@endif  value="50">50--}}
                                                        {{--</option>--}}
                                                        {{--<option @if($results_limit == 75) selected=""--}}
                                                                {{--@endif  value="75">75--}}
                                                        {{--</option>--}}
                                                        {{--<option @if($results_limit == 100) selected="selected"--}}
                                                                {{--@endif  value="100">100--}}
                                                        {{--</option>--}}
                                                    {{--</select>--}}

                                                {{--</div>--}}
                                                {{--<!-- - - - - - - - - - - - - - End of number of products shown - - - - - - - - - - - - - - - - -->--}}
                                            {{--</div>--}}
                                        {{--</div> <!-- /.flat-filter -->--}}
                                    {{--</div> <!-- /.flat-top-bar-shop -->--}}
                                {{--</div>--}}
                            {{--</header>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<br>--}}

                            {{--@if(count($products) == 0)--}}
                                {{--<section class="theme_box">--}}
                                    {{--<p class="alert alert-warning">--}}
                                        {{--Не постојат артикли за ова пребарување--}}
                                    {{--</p>--}}
                                {{--</section>--}}
                            {{--@else--}}
                                {{--<?php $i = 0; ?>--}}
                                    {{--<div class="flat-our-products flat-row">--}}
                                        {{--<div class="container">--}}
                                                {{--<div class="col-md-12">--}}
                                                    {{--<div class="products-grid">--}}
                                                        {{--<main class="post-wrap">--}}
                                                            {{--<ul class="products-grid flat-reset">--}}
                                                                {{--@foreach($products as $product)--}}
                                                                    {{--@foreach ($products as $product)--}}
                                                                    {{--<li class="item col-md-4 wide-first">--}}
                                                                        {{--<div style="min-height: 500px; max-height: 500px;" class="item-inner ipadWidth">--}}
                                                                            {{--<div class="item-img">--}}
                                                                                {{--<div class="item-img-info">--}}
                                                                                    {{--<div class="pimg" style="text-align: center;">--}}
                                                                                        {{--<a class="product-image"--}}
                                                                                           {{--href="{{route('product', [$product->id, $product->url])}}">--}}
                                                                                            {{--<img src="{{\ImagesHelper::getProductImage($product,null,'md_')}}"--}}
                                                                                                 {{--class="item-image">--}}
                                                                                        {{--</a>--}}
                                                                                    {{--</div> <!-- /.pimg -->--}}

                                                                                    {{--<div class="box-hover">--}}
                                                                                        {{--<ul class="add-to-links">--}}
                                                                                            {{--<li><a class="add_to_cart_button buy_home"--}}
                                                                                                   {{--href="{{route('product', [$product->id, $product->url])}}"--}}
                                                                                                   {{--title="Add card">--}}
                                                                                                    {{--<i class="fa fa-eye"></i>--}}
                                                                                                    {{--<span>Прегледај</span>--}}
                                                                                                {{--</a>--}}
                                                                                            {{--</li>--}}
                                                                                        {{--</ul>--}}
                                                                                    {{--</div> <!-- /.box-hover -->--}}
                                                                                {{--</div> <!-- /.item-img-info -->--}}
                                                                            {{--</div> <!-- /.item-img -->--}}


                                                                            {{--<div class="info-inner">--}}
                                                                                {{--<br>--}}

                                                                                {{--<button value="{{$product->id}}"  data-add-to-cart="" id="add_to_cart"style="background-color: #D4362A" class="buy_home"><i class="fa fa-shopping-cart"></i> <span>Додади во кошничка</span></button>--}}
                                                                                {{--<div class="item-title">--}}
                                                                                    {{--<a href="{{route('product', [$product->id, $product->url])}}"--}}
                                                                                       {{--style="height: 80px;"--}}
                                                                                       {{--class="limit_text">{{$product -> title}}</a>--}}
                                                                                {{--</div>--}}

                                                                                {{--<div class="product-price" style="text-align: center">--}}
                                                                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                                        {{--<span class="product-price-new-home"--}}
                                                                                              {{--style="font-weight: bold;">--}}
                                                {{--<span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}--}}
                                                    {{--<span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>--}}
                                            {{--</span>--}}

                                                                                        {{--<span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">--}}
                                                    {{--<span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}--}}
                                                        {{--<span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>--}}
                                            {{--</span></span>--}}

                                                                                    {{--@else--}}


                                                                                        {{--<span class="product-price-new-home"--}}
                                                                                              {{--style="font-weight: bold;"> <span--}}
                                                                                                    {{--id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}--}}
                                                                                                {{--<span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>--}}
                                            {{--</span>--}}
                                                                                    {{--@endif--}}
                                                                                {{--</div>--}}
                                                                            {{--</div> <!-- /.info-inner -->--}}
                                                                        {{--</div> <!-- /.item -->--}}
                                                                    {{--</li>--}}
                                                                {{--@endforeach--}}
                                                            {{--</ul>--}}
                                                        {{--</main>--}}
                                                        {{--@endforeach--}}
                                                    {{--</div> <!-- /.products-grid -->--}}
                                                {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div> <!-- /.flat-our-products -->--}}
                        {{--</div>--}}


                    {{--@endif--}}
                    {{--<br><br>--}}

                    {{--<!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->--}}
                    {{--@if ($products && count($products))--}}
                        {{--<div style="margin:0 auto; float:right; " class="row">--}}
                            {{--<div class="clearfix pull-left toolbox-pagination" style="margin-top: 80px;">--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li>  {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                            {{--@endif--}}
            {{--<!--/ .row -->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@stop--}}
