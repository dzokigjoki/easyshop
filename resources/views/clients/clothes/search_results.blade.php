@extends('clients.clothes.layouts.default')
@section('content')
<style>
    .btn-search-color{
        background-color:#CF5053 !important;
        border-color:#CF5053 !important;
        color:white !important;
    }

    .btn-search{
        border-width: 0;
        padding: 7px 14px;
        font-size: 14px;
        outline: 0!important;
        background-image: none!important;
        filter: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        text-shadow: none;
        border-radius: 0!important;
    }
</style>
<div class="main">
        <div class="container">
            <div class="header-page">
                <h1>Резултати од пребарување: {{$search}}</h1>
            </div>
            <!-- /.header-page -->
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="sidebar">
                        <aside class="widget">
                            <h4 class="widget-title">FILTER BY PRICE</h4>
                            <div class="options-price">
                                <div id="price-slider"></div>
                                <div class="price-range">
                                    <label for="amount">PRICE:</label>
                                    <input type="text" id="amount" readonly />
                                </div>
                                <button class="filter-price-btn">Filter</button>
                            </div>
                        </aside>
                    </div>
                    <!-- /.sidebar -->
                </div> --}}
                <div class="col-md-12">
                    <div class="main-content">
                            <form action="{{URL::to('/search')}}" method="get">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-4 product-view-mode">
                                            <div class="search-input">
                                                <input style="float: left;width: 200px;" type="text" class="form-control input-height" placeholder="Keywords" value="{{$search}}" name="search">
                                                <input type="submit" class="btn btn-primary btn-search-color btn-search" id="button-search" value="Барај">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 product-short" style="display:flex;">
                                            <label class="select-label" style="width: 25%; font-size: 13px;">Подреди по:</label>
                                            <select onchange="this.form.submit()" name="sort_by" class="form-control">
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
                                        <div class="col-lg-4 product-short" style="display:flex;" >
                                            <label class="select-label" style="width: 25%; font-size: 13px; margin-top: 7px;">Прикажи: </label>
                                                <select onchange="this.form.submit()" name="results_limit"
                                                class="form-control" id="result_limit">
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
                                </div>
                            </form>
                        <div class="box-product row"  style="padding-top: 50px;">
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <div class="main-img">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                                        <img class="img-responsive" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" />
                                                    </a>
                                                </div>
                                            </div>
                                            <h4 class="product-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h4>
                                            <p class="product-price">
                                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                                    <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                                @else
                                                    <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                                @endif
                                            </p>
                                            <div class="group-buttons">
                                                    <button type="submit" class="add-to-cart" data-add-to-cart=""  value="{{$product->id}}" id="add_to_cart" data-toggle="tooltip" data-placement="top" title="Додади во кошничка">
                                                            <span>Додади во кошничка</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                        </div>
                        <!-- /.box-product -->
                        <!-- /.pagination -->
                    </div>
                    <!-- /.main-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.main -->
@endsection