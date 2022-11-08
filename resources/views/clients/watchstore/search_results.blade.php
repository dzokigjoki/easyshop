@extends('clients.watchstore.layouts.default')
@section('content')
    <div class="search-result-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="headline">
                                <h2>Резултати од пребарувањето: {{$search}}</h2>
                            </div>
                            <div class="product-tab">
                                <ul class="nav nav-tabs women-tab" role="tablist">
                                    <li style="margin-right:10px; margin-left:10px;" role="presentation">Подреди по:
                                    </li>
                                    <li role="presentation" class="active">
                                        <select onchange="this.form.submit()" name="sort_by" class="form-control"><i
                                                    class="fa fa-arrow-down"></i>
                                            <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                    @endif  value="title_asc"> Име (A-Z)
                                            </option>
                                            <option @if($order_by == "title_desc") selected=""
                                                    @endif  value="title_desc"> Име (Z-A)
                                            </option>
                                            <option @if($order_by == "price_asc") selected=""
                                                    @endif  value="price_asc"> Ниска
                                            </option>
                                            <option @if($order_by == "price_desc") selected=""
                                                    @endif  value="price_desc"> Висока
                                            </option>
                                        </select>
                                    </li>
                                    <li style="margin-right:10px; margin-left:10px;" role="presentation">Прикажи:</li>
                                    <li role="presentation">
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
                                    </li>
                                </ul>
                                @if(count($products) == 0)
                                    <section class="theme_box"><br>
                                        <div class="alert alert-warning">
                                            {{trans('watchstore.emptyCategory')}}
                                        </div>
                                    </section>
                            @endif
                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            @if(count($products) > 0)
                                                @foreach($products as $product)
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <div class="product-single">
                                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                                <img    style="height:230px; width:254px;"
                                                                        src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                                        class=""
                                                                        alt="{{$product->title}}">
                                                            </a>
                                                            <div class="hot-wid-rating">
                                                                <h4 style="height:41px;">
                                                                    <a href="{{route('product',[$product->id,$product->url])}}">
                                                                        {{trans('watchstore.promotion2')}}:<br>
                                                                        {{$product->title}}
                                                                    </a>
                                                                </h4>
                                                                <div class="product-wid-price">
                                                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                        <span class="product-price price"
                                                                              style="color:black;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                                                        <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                                                    @else


                                                                        <span class="product-price price"
                                                                              style="color:black;"> <span
                                                                                    id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($products && count($products))
                    <div class="section-block pagination-3 no-padding-top">
                        <div class="row">
                            <div class="column width-12">
                                <ul style="list-style-type:none !important; float:right">
                                    {{--<li><a class="pagination-previous disabled" href="#"><span--}}
                                    {{--class="icon-left-open-mini"></span></a></li>--}}
                                    <li style="list-style-type: none !important;">{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                                    {{--<li><a class="prebaraj pagination-next" href="#"><span--}}
                                    {{--class="icon-right-open-mini"></span></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection