@extends('clients.expressbook.layouts.default')
@section('content')
<div class="container">

    {{--<div class="title-wrapper" style="background: url('/assets/expressbook/test-sliki/expressbook-golema1.jpg') center;">--}}
    {{--<div class="container"><div class="container-inner">--}}
    {{--<h1><span>{{$category->title}}</span>
    <!--CATEGORY-->
    </h1>--}}
    {{--<em>Over 4000 Items are available here</em>--}}
    {{--</div></div>--}}
    {{--</div>--}}

    {{--<div class="main">--}}
    {{--<div class="container">--}}
    {{--<ul class="breadcrumb">--}}
    {{--<li><a href="index.html">Дома</a></li>--}}
    {{--<li><a href="">Store</a></li>--}}
    {{--<li class="active">Кондури</li>--}}
    {{--</ul>--}}
    {{--<!-- BEGIN SIDEBAR & CONTENT -->--}}
    {{--<div class="row margin-bottom-40">--}}
    {{--<!-- BEGIN SIDEBAR -->--}}
    {{--<div class="sidebar col-md-3 col-sm-5">--}}
    {{--<ul class="list-group margin-bottom-25 sidebar-menu">--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>--}}
    {{--<li class="list-group-item clearfix dropdown active">--}}
    {{--<a href="javascript:void(0);" class="collapsed">--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--Mens--}}

    {{--</a>--}}
    {{--<ul class="dropdown-menu" style="display:block;">--}}
    {{--<li class="list-group-item dropdown clearfix active">--}}
    {{--<a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>--}}
    {{--<ul class="dropdown-menu" style="display:block;">--}}
    {{--<li class="list-group-item dropdown clearfix">--}}
    {{--<a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Classic </a>--}}
    {{--<ul class="dropdown-menu">--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="list-group-item dropdown clearfix active">--}}
    {{--<a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Sport  </a>--}}
    {{--<ul class="dropdown-menu" style="display:block;">--}}
    {{--<li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>--}}
    {{--<li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>--}}
    {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>--}}
    {{--</ul>--}}

    {{--<div class="sidebar-filter margin-bottom-25">--}}
    {{--<div style="margin-bottom: 40px;">--}}
    {{--<h3>Цена</h3>--}}
    {{--<p>--}}
    {{--<label for="amount">Цена:</label>--}}
    {{--<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">--}}
    {{--</p>--}}
    {{--<div id="slider-range"></div>--}}
    {{--</div>--}}

    {{--<h2>Филтри</h2>--}}
    {{--@foreach($filters as $k => $v)--}}
    {{--<h3>{{$v[0]}}</h3>--}}
    {{--@foreach($v[1] as $key => $value)--}}
    {{--<div class="checkbox-list">--}}
    {{--<label>--}}
    {{--<input data-id="{{$key}}" type="checkbox" />{{$value}}--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endforeach--}}

    {{--</div>--}}

    {{--<div class="sidebar-products clearfix">--}}
    {{--<h2>Најпродавани</h2>--}}
    {{--<div class="item">--}}
    {{--<a href="shop-item.html"><img src="/assets/expressbook/test-sliki/expressbook1.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
    {{--<h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
    {{--<div class="price">$31.00</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<a href="shop-item.html"><img src="/assets/expressbook/test-sliki/expressbook4.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
    {{--<h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
    {{--<div class="price">$23.00</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<a href="shop-item.html"><img src="/assets/expressbook/test-sliki/expressbook3.jpg" alt="Some Shoes in Animal with Cut Out"></a>--}}
    {{--<h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>--}}
    {{--<div class="price">$86.00</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- END SIDEBAR -->--}}
    {{--<!-- BEGIN CONTENT -->--}}
    {{--<div class="col-md-9 col-sm-7">--}}
    {{--<div class="row list-view-sorting clearfix">--}}
    {{--<div class="col-md-2 col-sm-2 list-view">--}}
    {{--<a href="javascript:;"><i class="fa fa-th-large"></i></a>--}}
    {{--<a href="javascript:;"><i class="fa fa-th-list"></i></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-10 col-sm-10">--}}
    {{--<div class="pull-right">--}}
    {{--<label class="control-label">Прикажи:</label>--}}
    {{--<select class="form-control input-sm">--}}
    {{--<option value="#?limit=24" selected="selected">24</option>--}}
    {{--<option value="#?limit=25">25</option>--}}
    {{--<option value="#?limit=50">50</option>--}}
    {{--<option value="#?limit=75">75</option>--}}
    {{--<option value="#?limit=100">100</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--<div class="pull-right">--}}
    {{--<label class="control-label">Подреди по:</label>--}}
    {{--<select class="form-control input-sm">--}}
    {{--<option selected value="created_at">Најнови</option>--}}
    {{--<option value="price-ASC">Цена (Ниска > Висока)</option>--}}
    {{--<option value="price-DESC">Цена (Висока > Ниска)</option>--}}
    {{--<option value="name-ASC">Име (A - Z)</option>--}}
    {{--<option value="name-DESC">Име (Z - A)</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- BEGIN PRODUCT LIST -->--}}

    {{--@foreach($articlesChunked as $articleRow)--}}
    {{--<div class="row product-list">--}}
    {{--@foreach($articleRow as $item)--}}
    {{--<!-- PRODUCT ITEM START -->--}}
    {{--<div class="col-md-4 col-sm-6 col-xs-12">--}}
    {{--<div class="product-item">--}}
    {{--<div class="pi-img-wrapper">--}}
    {{--<img src="{{\ImagesHelper::getProductImage($item)}}" class="img-responsive" alt="{{$item->title}}">--}}
    {{--<div>--}}
    {{--<a href="{{route('product', [$item->id, $item->url])}}" class="btn btn-default">Преглед</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<h3><a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a></h3>--}}
    {{--<div class="pi-price">{{$item->price}} МКД</div>--}}
{{--<a href="javascript:;"--}}
{{--data-id="{{$item->id}}"--}}
{{--data-slug="{{$item->url}}"--}}
{{--data-category-add-to-cart=""--}}
{{--class="btn btn-default add2cart">Во кошничка</a>--}}
{{--</div>--}}
{{--</div>--}}

{{--<!-- PRODUCT ITEM END -->--}}
{{--@endforeach--}}
{{--</div>--}}
{{--@endforeach--}}

{{--<!-- END PRODUCT LIST -->--}}
{{--<!-- BEGIN PAGINATOR -->--}}
{{--<div class="row">--}}
{{--<div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>--}}
{{--<div class="col-xs-12">--}}
{{--<ul class="pagination pull-right">--}}
{{--<li><a href="javascript:;">&laquo;</a></li>--}}
{{--<li><a href="javascript:;">1</a></li>--}}
{{--<li><span>2</span></li>--}}
{{--<li><a href="javascript:;">3</a></li>--}}
{{--<li><a href="javascript:;">4</a></li>--}}
{{--<li><a href="javascript:;">5</a></li>--}}
{{--<li><a href="javascript:;">&raquo;</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- END PAGINATOR -->--}}
{{--</div>--}}
{{--<!-- END CONTENT -->--}}
{{--</div>--}}
{{--<!-- END SIDEBAR & CONTENT -->--}}
{{--</div>--}}
{{--</div>--}}


{{--<!-- BEGIN STEPS -->--}}
{{--<div class="steps-block steps-block-red">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-4 steps-block-col">--}}
{{--<i class="fa fa-truck"></i>--}}
{{--<div>--}}
{{--<h2>Бесплатна достава</h2>--}}
{{--<em>низ цела Македонија за 48 часа</em>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-4 steps-block-col">--}}
{{--<i class="fa fa-gift"></i>--}}
{{--<div>--}}
{{--<h2>Висок квалитет</h2>--}}
{{--<em>по достапни цени</em>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-4 steps-block-col">--}}
{{--<i class="fa fa-phone"></i>--}}
{{--<div>--}}
{{--<h2>+38946250210 +38975492686</h2>--}}
{{--<em>Грижа за корисници</em>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- END STEPS -->--}}

<div class="hidden-xs hidden-sm breadcrumb">
    <div class="container">
        <ul class="breadcrumb ">
            <li><a href="{{route('home')}}">Дома</a></li>
            <li class="active">{{$category->title}}</li>
        </ul>
    </div>
</div>
@if(!$products)
<br>
<div class="col-md-12 col-sm-12" style="text-align: center;">
    <h2>Не постојат продукти во оваа категорија.</h2><br><br>
    <br><br><br><br><br>
</div>
@else
<div class="container offset-0">

    <div class="row">
        <div class="col-md-12 col-lg-12  col-xl-12 col-sm-12 col-xs-12">
            <div class="content offset-0">
                <div class="filters-row row" style="margin-left: 30px !important; ">

                    <div class="pull-left">
                        <div class="filters-row_select hidden-sm hidden-xs">
                            <label>Подреди по:</label>
                            <span class="select">
                                <select data-sort="" class="form-control sort-position">
                                    <option value="created_at"
                                        {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                        Најнови</option>
                                    <option value="price-ASC"
                                        {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                        Цена (Ниска > Висока)</option>
                                    <option value="price-DESC"
                                        {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                        Цена (Висока > Ниска)</option>
                                    <option value="title-ASC"
                                        {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име
                                        (A - Z)</option>
                                    <option value="title-DESC"
                                        {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                                        Име (Z - A)</option>
                                </select>
                            </span>
                        </div>
                        {{--<a class="btn slide-column-open hidden-lg hidden-md" href="#">FILTER</a>--}}
                        {{--<div class="filters-row_mode hidden-sm hidden-xs">--}}
                        {{--<a class="link-view link-sort-top active" href="#"><span--}}
                        {{--class="icon icon-sort "></span></a>--}}
                        {{--<a class="link-view link-sort-bottom" href="#"><span class="icon icon-sort"></span></a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="pull-left" style="padding-left: 15px;">
                        <div class="filters-row_select  hidden-sm hidden-xs">
                            <label>Прикажи:</label>
                            <select data-per-page="" class="form-control show-qty">
                                <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>
                                    12
                                </option>
                                <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>
                                    36
                                </option>
                                <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>
                                    99
                                </option>
                            </select>
                            <a href="#" class="icon icon-arrow-down active"></a><a href="#"
                                class="icon icon-arrow-up"></a>
                        </div>
                        <a class="link-view-mobile hidden-lg hidden-md" href="#"><span
                                class="icon icon-view_stream"></span></a>
                        <a class="link-mode link-grid-view active" href="#"><span
                                class="icon icon-view_module"></span></a>
                        <a class="link-mode link-row-view" href="#"><span class="icon icon-view_list"></span></a>
                    </div>
                </div>
            </div>

            <div data-products-list="">
                @include('clients.expressbook.partials.category-products-list')
            </div>
        </div>
    </div>
</div>


@endif
</div>
@endsection