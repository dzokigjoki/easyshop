@extends('clients.drbrowns.layouts.default')
@section('content')
    <div class="page-content container">

        <div class="row">
            <div class="main col-lg-12 col-md-12 col-xs-12" role="main">
                <form novalidate action="{{URL::to('/search')}}" style="margin-right: 100px; float:left;"
                      class="woocommerce-ordering" method="get">
                        <div class="col-lg-6 col-xs-12 col-md-6">
                            <span style="display: inline; float: left;">
                                    <input style="display: inline;float: left; width: 177px;"
                                   type="text" name="search"
                                   class="form-search form-element"
                                   value="{{$search}}">
                                    <button class="button">
                                        Пребарај
                                    </button>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                    <select onchange="this.form.submit()" name="sort_by" class="form-control"><i
                                class="fa fa-arrow-down"></i>
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
                        <div class="col-lg-2 col-md-4 col-xs-12">
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
                </form>
                <div class="products-top"></div>
                <h2 class="mb-30 color-grey">Резултати од пребарувањето - {{$search}}</h2>
                <br>
                <br>
                {{--<div class="row product-listing">--}}
                    {{--<div data-products-list="">--}}
                        {{--@include('clients.drbrowns.partials.category-products-list')--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="products-top"></div>
                <div class="row product-listing">
            @if(count($products) == 0)
                <section class="theme_box"><br>
                    <div class="alert alert-warning">
                        Нема артикли во оваа категорија
                    </div>
                </section>
                {{--@endif--}}
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <div style="" class="item col-md-3 col-xs-6 first fadeInUp">
                            <article>
                                <figure>
                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                        <img style="min-height:300px; min-width:300px;"
                                             src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                             alt="{{$product->title}}">
                                    </a>
                                    <figcaption>
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="product-price price"
                                                  style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                            <span style="text-decoration: line-through; color: red; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #1481BD; font-weight: bold">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="amount">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>    </span></span>


                                        @else


                                            <span class="product-price price"
                                                  style="font-weight: bold;"> <span
                                                        id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="amount">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span></span>

                                        @endif
                                    </figcaption>
                                </figure>
                                <br>
                                <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                        class="button add_to_cart_button product_type_simple">Додади во Кошничка
                                </button>
                                <h4 style="min-height:65px !important;" class="title">
                                    <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                </h4>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
                </div>
            </div>
        </div>
        <div class="section-block pagination-3 column width-9 no-padding-top">
            <div class="row">
                @if ($products && count($products))
                    <ul class="pagination">
                            {{--<li><a class="pagination-previous disabled" href="#"><span--}}
                            {{--class="icon-left-open-mini"></span></a></li>--}}
                            <li>{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                            {{--<li><a class="prebaraj pagination-next" href="#"><span--}}
                            {{--class="icon-right-open-mini"></span></a></li>--}}
                    </ul>
                    <!-- End .view-count-box -->
                @endif
            </div>
        </div>
        </div>
        </div>
@endsection