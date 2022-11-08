@extends('clients.kliknikupi.layouts.default')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li>{{$category->title}}</li>
            </ul>
        </div>
    </div>
    <!-- Content -->
    <div id="pageContent">
        <div class="container offset-0">
            <div class="row">
                <!-- left col -->
                <div class="slide-column-close">
                    <a href="#"><span class="icon icon-close"></span>CLOSE</a>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 aside leftColumn">
                    <div class="collapse-block open collapse-block-mobile">
                        <h3 class="collapse-block_title hidden">Filter:</h3>
                        <div class="collapse-block_content">
                            <div class="filters-mobile">

                            </div>
                        </div>
                    </div>

                    {{--<div class="collapse-block open">--}}
                    {{--<h3 class="collapse-block_title ">Цена</h3>--}}
                    {{--<div class="collapse-block_content">--}}
                    {{--<form>--}}
                    {{--<div class="price-slider">--}}
                    {{--<div class="priceSlider">--}}
                    {{--<input type="text" data-price-slider="" />--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{----}}
                    {{--<div class="price-input form-group">--}}
                    {{--<label>Од</label>--}}
                    {{--<input type="text" class="form-control" id="priceMin"/>--}}
                    {{--</div>--}}
                    {{--<div class="price-input form-group">--}}
                    {{--<label>До</label>--}}
                    {{--<input type="text" class="form-control" id="priceMax"/>--}}
                    {{--</div>--}}
                    {{--<div class="price-input">--}}
                    {{--<button type="submit" class="btn">Филтрирај</button>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    @include('clients.kliknikupi.category-list-article-leftSide')

                    {{--<div class="collapse-block open">--}}
                    {{--<h3 class="collapse-block_title ">SIZE</h3>--}}
                    {{--<div class="collapse-block_content">--}}
                    {{--<ul class="tags-list">--}}
                    {{--<li><a href="#">XS</a></li>--}}
                    {{--<li class="active"><a href="#">S</a></li>--}}
                    {{--<li><a href="#">M</a></li>--}}
                    {{--<li><a href="#">L</a></li>--}}
                    {{--<li><a href="#">XL</a></li>--}}
                    {{--<li><a href="#">XXL</a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="collapse-block open">--}}
                    {{--<h3 class="collapse-block_title ">GENDER</h3>--}}
                    {{--<div class="collapse-block_content">--}}
                    {{--<ul class="list-simple">--}}
                    {{--<li><a href="#">Men</a></li>--}}
                    {{--<li><a href="#">Women</a></li>--}}
                    {{--<li><a href="#">Unisex</a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    {{--ФИЛТРИ--}}
                    {{--@foreach($filters as $filter)--}}
                    {{--<div class="collapse-block open">--}}
                    {{--<h3 class="collapse-block_title ">{{$filter->name}}</h3>--}}
                    {{--<div class="collapse-block_content">--}}
                    {{--<div class="poll">--}}
                    {{--@foreach($filter->attributes as $attribute)--}}
                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<label class="radio">--}}
                    {{--<input data-attribute="" data-id="{{$attribute->id}}" type="checkbox"--}}
                    {{--{{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}--}}
                    {{--/>{{$attribute->value}}</label>--}}

                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--</div></div>--}}
                    {{--@endforeach--}}



                    {{--<div class="collapse-block open">--}}
                    {{--<h3 class="collapse-block_title ">Боја</h3>--}}
                    {{--<div class="collapse-block_content">--}}
                    {{--<div class="poll">--}}
                    {{--<p class="color-defaulttext2">--}}
                    {{--What is your favorite color?--}}
                    {{--</p>--}}
                    {{--<form class="pollForm" action="#">--}}
                    {{--<ul class="poll-list">--}}
                    {{--<li>--}}
                    {{--<label class="radio">--}}
                    {{--<input id="radio1" type="checkbox" name="radios" checked>--}}
                    {{--<span class="outer"><span class="inner"></span></span>Зелена</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<label class="radio">--}}
                    {{--<input id="radio2" type="checkbox" name="radios">--}}
                    {{--<span class="outer"><span class="inner"></span></span>Црвена</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<label class="radio">--}}
                    {{--<input id="radio3" type="checkbox" name="radios">--}}
                    {{--<span class="outer"><span class="inner"></span></span>Црна</label>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<label class="radio">--}}
                    {{--<input id="radio4" type="checkbox" name="radios">--}}
                    {{--<span class="outer"><span class="inner"></span></span>Магента</label>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<a href="#" class="btn">Избери</a>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                </div>


                <!-- center col -->
                <div class="col-md-8 col-lg-9 col-xl-9">
                    <div class="content offset-0">
                        <div class="filters-row row ">
                            <div class="pull-left">
                                <div class="filters-row_select hidden-sm hidden-xs">
                                    <label>Подреди по:</label>
                                    <span class="select">
                                            <select data-sort="" class="form-control sort-position">
                                                <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>
                                                <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>
                                                <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>
                                                <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>
                                                <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>
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
                            <div class="pull-right">
                                <div class="filters-row_select  hidden-sm hidden-xs">
                                    <label>Прикажи:</label>
                                    <select data-per-page="" class="form-control show-qty">
                                        <option value="15" {{$productFilters->limit == 15 ? 'selected="selected"': ''}}>
                                            15
                                        </option>
                                        <option value="45" {{$productFilters->limit == 45 ? 'selected="selected"': ''}}>
                                            45
                                        </option>
                                        <option value="90"
                                                selected="selected" {{$productFilters->limit == 90 ? 'selected="selected"': ''}}>
                                            90
                                        </option>
                                    </select>
                                    <a href="#" class="icon icon-arrow-down active"></a><a href="#"
                                                                                           class="icon icon-arrow-up"></a>
                                </div>
                                <a class="link-view-mobile hidden-lg hidden-md" href="#"><span
                                            class="icon icon-view_stream"></span></a>
                                <a class="link-mode link-grid-view active" href="#"><span
                                            class="icon icon-view_module"></span></a>
                                <a class="link-mode link-row-view" href="#"><span
                                            class="icon icon-view_list"></span></a>
                            </div>
                        </div>
                    </div>
                    <div data-products-list="">
                        @include('clients.kliknikupi.partials.category-products-list')
                        <br>
                        <h3>Најпопуларни</h3>
                        @foreach($bestSellersArticles as $product)
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-one-fifth">
                                <div class="product">
                                    <div class="product_inside">
                                        <div class="image-box">
                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                     alt="">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <div class="label-sale">Заштедувате <br>
                                                        {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                                        ден.
                                                    </div>
                                                @endif
                                            </a>
                                            <a href="{{route('product', [$product->id, $product->url])}}"
                                               data-toggle="modal" data-target="" class="quick-view">
											<span>
											<span class="icon icon-visibility"></span>Прегледај
											</span>
                                            </a>
                                            {{--@if($product->is_exclusive)--}}
                                            {{--<div class="countdown_box">--}}
                                            {{--<div class="countdown_inner">--}}
                                            {{--Treba da se zeme datum od baza--}}

                                            {{--@if((int)substr($product->discount['end_date'],0,4) >= 2099)--}}
                                            {{--<div class="countdown"--}}
                                            {{--data-date="{{\Carbon\Carbon::now()->addWeek(1)}}"></div>--}}
                                            {{--@else--}}
                                            {{--<div class="countdown"--}}
                                            {{--data-date="{{($product->discount)['end_date']}}"></div>--}}
                                            {{--@endif--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--@endif--}}

                                        </div>


                                        <h2 class="title">

                                            <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                        </h2>
                                        <div class="price view">
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                {{--namalena cena--}}
                                                {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                <span class="price_currency"> ден.</span>
                                                {{--stara cena--}}
                                                <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    ден.</span>

                                            @else
                                                {{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span
                                                        class="price_currency"> ден.</span>

                                            @endif
                                        </div>
                                        <div class="product_inside_hover">
                                            <button class="btn btn-product_addtocart" style="white-space: initial"
                                                    data-add-to-cart="" value="{{$product->id}}" onClick="">
                                                <span class="icon icon-shopping_basket"></span>
                                                Додади во кошничка
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    </div>
                </div>
            </div>
        </div>





@endsection