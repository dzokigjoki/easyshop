@extends('clients.shopathome.layouts.default')
@section('content')
    <div id="content">
        <div class="arrivals">
            <div class="container">
                <div style="text-align: center;" class="related-title">
                    <h5><span style="text-align: center;">Резултати од пребарување: {{$search}}</span></h5>
                </div>
                <br><br>
                <div class="filters">
                    <form action="{{route('search')}}" method="get">
                        <div class="col-lg-4 col-md-4 marginSearchMedia col-xs-12 col-sm-6 filters-row__select">
                            <div class="search-input">
                                    <input type="text" placeholder="Пребарај" name="search" value="{{$search}}">
                                    <input type="submit" name="btnSubmit" value="" />
                            </div>
                            {{--<div class="col-xs-12--}}
                            {{--search-input">--}}
                                {{--<input class="col-xs-7 col-md-7 col-sm-7" placeholder="Пребарај" type="text" name="search" value="{{$search}}" maxlength="128">--}}
                                {{--<input  type="submit" value="Пребарај" />--}}
                            {{--</div>--}}
                            <a href="#" class="search__close"><span class="icon icon-close"></span></a>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-6 marginMedia filters-row__select">
                            <label class="col-lg-offset-2 col-xs-6 col-sm-6 col-md-6 col-lg-4">Подреди по: </label>
                            <div class="col-lg-6 col-xs-6  col-sm-6 col-md-6  select-wrapper">
                                <select onchange="this.form.submit()" name="sort_by" class="selectBox select--ys">
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
                        <div class="col-lg-4 col-sm-6 col-md-4  marginMedia filters-row__select">
                            <label class="col-lg-offset-2 col-xs-6 col-lg-4">Прикажи: </label>
                            <div class="col-lg-6 col-xs-6 select-wrapper">
                                <select onchange="this.form.submit()"       name="results_limit"
                                        class="select--ys show-qty selectBox" id="result_limit">
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
                    <div class="clear"></div>
                    <br><br>
                    <div class="demo1 clearfix">
                        <ul class="filter-container clearfix">
                                @foreach($products as $product)
                                    <li class="heightLaptop class2">
                                        <div class="arrival-overlay">
                                            {{--<img src="/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                                            {{--<img src="/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                                            <img
                                                 src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                                 alt="{{$product->title}}">
                                            <div style="background:#EA5748" class="sale">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <div style="background:#861953" class="discountCustom btn btn-danger"> <span>
                                                        - {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                                            ден.<br></span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="arrival-mask">
                                                <a href="{{route('product',[$product->id,$product->url])}}" class="medium-button button-red add-cart">Прегледај</a>
                                            </div>
                                        </div>
                                        <div class="arr-content">
                                            <button  value="{{$product->id}}"
                                                     data-add-to-cart="" id="add_to_cart"
                                                     class="medium-button button-red centeredButton">Додади во кошничка</button>

                                            <a href="#"><p>{{$product->title}}</p></a>
                                            <ul>
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="product-price-new-home"
                                                          style="font-weight: bold;">
                                                                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                                    <span style="color: #861953; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
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
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                <nav style="float:right;" class="shop-pagination">
                    @if ($products && count($products))
                        <div class="pagination">
                            <div class="paginate_links">
                                <span style="list-style-type: none" class="paginate_links page-numbers current">{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</span>
                            </div>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection