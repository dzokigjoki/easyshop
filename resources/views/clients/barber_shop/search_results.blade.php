@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{ url_assets('/barber_shop/images/page-titles/3.jpg')}}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading mb-20">
                            <h3 class="heading-color">Резултати од пребарување: {{$search}}</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="/">Почетна</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <section id="shop" class="shop shop-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 product-options">
                    <form action="{{URL::to('/search')}}" method="get">
                        <div class="row">
                            <div class="col-lg-4 search-input pb-10-mobile">
                                <input style="float: left;width: 200px;" type="text" class="search-width mb-0-mob form-control input-height" placeholder="Keywords" value="{{$search}}" name="search">
                                <input style="height: 40px;" type="submit" class="btn btn--primary btn--rounded" id="button-search" value="Барај">
                            </div>
                            <div class="col-lg-4 product-select pull-left pull-none-xs pb-10-mobile">
                                <span>Прикажи по:</span>
                                <select onchange="this.form.submit()" name="results_limit"  class="show-qty selectBox nice-select select-prikazi" id="result_limit">
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
                                <div class="col-lg-4 product-select pull-right text-right pull-none-xs">
                                    <span>Подреди:</span>
                                    <i class="fa fa-angle-down angle-down-right"></i>
                                    <select onchange="this.form.submit()" name="sort_by" class="selectBox nice-select">
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
                            </div>
                        </div>
                    </div>
                </form>

            <div class="row">
            <div class="col-md-12">
                    <div class="row">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                            <div class="col-xs-12 col-sm-6 col-md-3 product-item">
                                <div class="product--img">
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" />
                                    <div class="product--hover">
                                        <div class="product--action">
                                                <a  href="" value="{{$product->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                    </div>
                                    <div class="product--price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="new-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                            <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                        @else
                                            <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else 
                            <br>
                                <h3 class="text-center">Не се пронајдени резултати за вашето пребарување</h3>
                            <br>
                        @endif
                    </div>
            </div>
        </div>
    </section>
@stop