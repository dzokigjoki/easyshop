@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">
        <div class="md-margin2x"></div><!-- Space -->

        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12 main-content">
                            <header class="content-title">
                                <h2 class="title">Резултати од пребарување: {{$search}} </h2>
                                {{--<p class="title-desc"></p>--}}<br>
                            </header>
                            <form action="{{URL::to('/search')}}" method="get" novalidate>
                            <div class="category-toolbar clearfix">
                                <div class="toolbox-filter clearfix">
                                    <input type="hidden" name="search"
                                           class="form-search form-element"
                                           value="{{$search}}">
                                    <div class="sort-box">
                                        <span class="separator">Подреди по:</span>
                                        <div class="btn-group select-dropdown">
                                            <div class="form-select form-element medium pull-right">
                                                <select onchange="this.form.submit()" name="sort_by" class="form-control"><i class="fa fa-arrow-down"></i>
                                                    <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                            @endif  value="title_asc"> Име (A-Z) </option>
                                                    <option @if($order_by == "title_desc") selected=""
                                                            @endif  value="title_desc"> Име (Z-A) </option>
                                                    <option @if($order_by == "price_asc") selected=""
                                                            @endif  value="price_asc"> Ниска </option>
                                                    <option @if($order_by == "price_desc") selected=""
                                                            @endif  value="price_desc"> Висока </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End .toolbox-filter -->
                                <div class="toolbox-pagination clearfix">
                                    <div id="show_select" class="view-count-box">
                                        <span class="separator">Прикажи:</span>
                                        <div class="btn-group select-dropdown">
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
                                    </div><!-- End .view-count-box -->

                                </div><!-- End .toolbox-pagination -->
                            </div><!-- End .category-toolbar -->
                            </form>
                            <div class="md-margin"></div><!-- .space -->
                            @if(count($products) == 0)
                                <section class="theme_box">
                                    <p class="alert alert-warning">
                                        {{trans('watchstore.noResults')}}
                                        <br>
                                    </p>
                                    <br>
                                </section>
                            @else
                                <?php $i = 0; ?>
                            <div id="products-tabs-content" class="row tab-content">
                                <div class="tab-pane active" id="all">
                                    @if(count($products) > 0)
                                        @foreach($products as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                <div class="item item-hover">
                                                    <div class="item-image-wrapper">
                                                        <figure class="item-image-container">
                                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                                alt="{{$product->title}}" class="item-image">
                                                                {{--<img src="/assets/topmarketmk/images/products/item2.jpg" alt="item1" class="">--}}
                                                            </a>
                                                        </figure>

                                                        <div class="item-price-container">
                                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                                                                <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}<span class="sub-price">мкд.</span></span>
                                                            @else
                                                                <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                                                            @endif
                                                        </div><!-- End .item-price-container -->
                                                        {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                            {{--<div class="discount-rect">--}}
                                                                {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($product, false, 0)-$product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%--}}
                                                            {{--</div>--}}
                                                        {{--@endif--}}
                                                    </div><!-- End .item-image-wrapper -->
                                                    <div class="item-meta-container">
                                                        <div class="item-action">
                                                            <a href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                                                <span class="icon-cart-text">Купи</span>
                                                            </a>
                                                        </div><!-- End .item-action -->
                                                        <br>
                                                        <h3 style="height:100px;" class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>

                                                    </div><!-- End .item-meta-container -->
                                                </div><!-- End .item -->
                                            </div><!-- End .col-md-4 -->
                                        @endforeach
                                    @endif
                                </div><!-- End .tab-pane -->
                            </div><!-- End #products-tabs-content -->
                            @endif
                        </div>
                    </div>
                </div>
                @if ($products && count($products))
                    <div class="section-block pagination-3 no-padding-top">
                        <div class="row">
                            <div class="column width-12">
                                <ul style="float:right">
                                    {{--<li><a class="pagination-previous disabled" href="#"><span--}}
                                    {{--class="icon-left-open-mini"></span></a></li>--}}
                                    <li>{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                                    {{--<li><a class="prebaraj pagination-next" href="#"><span--}}
                                    {{--class="icon-right-open-mini"></span></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection