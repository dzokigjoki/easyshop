@extends('clients.watchstore_old.layouts.default')
@section('content')
    <!-- Intro Title Section 2 -->
    <!--<div class="section-block intro-title-2 intro-title-2-3">-->
    <div class="media-overlay bkg-black opacity-02"></div>
    <div class="row">
        <div class="column width-12">
            <div class="title-container">

            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- Filter -->
    <div class="section-block clearfix no-padding-bottom" >
        <div class="row">
            <!-- Content Inner -->
            <!-- Filter -->
            <!-- END OF SIDEBAR !-->
            <div class="column width-12 content-inner">
                <div class="section-block pt-0 pb-50" >
                    <div class="row">

                    </div>
                </div>
                <div class="section-block no-padding column width-7" id="search-grid">
                    <div class="row"><br><br>
                        <div class="column width-12">
                            <h3 class="mb-30 color-grey">{{trans('watchstore.searchAgain')}}</h3>
                            <div class="search-form-container site-search">
                                <form action="{{URL::to('/search')}}" method="get" novalidate>
                                    <div class="row">
                                        <div class="column width-12">
                                            <div class="column width-6">
                                                <div class="field-wrapper">
                                                                <span style="display: inline; float: left;">
                                                                <input style="display: inline;float: left; width: 177px;"
                                                                       type="text" name="search"
                                                                       class="form-search form-element"
                                                                       value="{{$search}}">
                                                                </span>
                                                    <button style="display: inline;float: left;"
                                                            class="paddingSearch btn btn-primary" type="submit"><i
                                                                class="fa fa-search"></i></button>
                                                    <span class="border"></span><br>
                                                </div>
                                            </div>
                                            <div class="column width-3">
                                                <div class="form-select form-element medium pull-right">
                                                    <select onchange="this.form.submit()" name="sort_by" class="form-control"><i class="fa fa-arrow-down"></i>
                                                        <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                                @endif  value="title_asc">{{trans('watchstore.nameA-Z')}}</option>
                                                        <option @if($order_by == "title_desc") selected=""
                                                                @endif  value="title_desc">{{trans('watchstore.nameZ-A')}} </option>
                                                        <option @if($order_by == "price_asc") selected=""
                                                                @endif  value="price_asc">{{trans('watchstore.low')}} </option>
                                                        <option @if($order_by == "price_desc") selected=""
                                                                @endif  value="price_desc">{{trans('watchstore.high')}} </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="column width-3">
                                                <div class="form-select form-element medium pull-right">
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
                                    </div>
                                </form>
                                <div class="form-response"></div>
                            </div>
                            <br>
                            <h2 class="mb-30 color-grey">{{trans('watchstore.resultsFor')}} - {{$search}}</h2>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Filter End -->
                <!-- Product Grid -->
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

                    <div id="product-grid"
                         class="grid-container products fade-in-progressively no-padding-top"
                         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
                         data-animate-resize-duration="700">
                        <div class="row">
                            <div class="column width-12">
                                <div class="row grid content-grid-4">
                                        @foreach($products as $product)
                                            <div class="heightLaptop grid-item product portrait grid-sizer">
                                                <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                                     data-hover-speed="700" data-hover-bkg-color="#000000"
                                                     data-hover-bkg-opacity="0.01">
                                                    <a class="overlay-link" href="{{route('product', [$product->id, $product->url])}}">
                                                        <img
                                                                src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                                                alt="{{$product->title}}">
                                                    </a>
                                                    </a>
                                                    <div class="product-actions center">
                                                        <a href="{{route('product', [$product->id, $product->url])}}"
                                                           class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.view')}}</a>
                                                    </div>
                                                </div>
                                                <div class="product-details center">
                                                    <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                                            class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.addToCart')}}
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <h3 class="product-title">
                                                        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                                    </h3>
                                                    <div class="product-price" style="text-align: center">
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
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Product Grid End -->
        </div>
    </div>
    @if ($products && count($products))
        <div class="section-block pagination-3 no-padding-top">
            <div class="row">
                <div class="column width-12">
                    <ul>
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
@endsection