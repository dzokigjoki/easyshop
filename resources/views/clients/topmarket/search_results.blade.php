@extends('clients.topmarket.layouts.default')
@section('content')

    <div class="page_wrapper">
        <div class="container">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul class="breadcrumb">
                <li><a href="/">Почетна</a></li>
                <li>Пребарувaње - {{$search}}</li>

            </ul>
            <br>
            <div class="row">

                <main class="col-md-12 col-sm-12">

                    <div class="title-bg">
                        <h2 class="title">Резултати од пребарувањето - {{$search}}</h2>
                    </div>

                    <!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->

                    <div class="section_offset">
                        <form action="{{URL::to('/search')}}" class="form-inline">
                            <header>
                                <div>
                                    <!-- - - - - - - - - - - - - - Search by - - - - - - - - - - - - - - - - -->
                                    <div class="col-md-3" style="">
                                        <input class="form-control" style="max-width: calc(100% - 90px); float: left; margin-top: 25px; "type="text" name="search"
                                               value="{{$search}}"/>
                                        <button type="submit" class="btn btn-custom-2" style="display: inline; margin-top: 25px;" id="baraj">Барај</button>
                                    </div>
                                    <br>
                                    <div id="dropdown_search">
                                        <!-- - - - - - - - - - - - - - Sort by - - - - - - - - - - - - - - - - -->
                                        <span>Подреди по:</span>
                                        <div class="btn-group select-dropdown" style="padding-right: 15px;">
                                        <span class="select">
                                              <select onchange="this.form.submit()" name="sort_by" class="form-control">
                                                  <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                          @endif  value="title_asc">Име (A - Z) </option>
                                                  <option @if($order_by == "title_desc") selected=""
                                                          @endif  value="title_desc">Име (Z - A) </option>
                                                  <option @if($order_by == "price_asc") selected=""
                                                          @endif  value="price_asc">Цена - (Ниска) </option>
                                                  <option @if($order_by == "price_desc") selected=""
                                                          @endif  value="price_desc">Цена - (Висока) </option>
                                              </select>
                                        </span>
                                        </div>

                                        <span id="nov_red_mobile">
                                            <br>
                                        </span>
                                        <span>Прикажи:</span>
                                        <div class="btn-group select-dropdown">
                                        <span class="select">
                                           <select onchange="this.form.submit()" name="results_limit"
                                                   class="form-control" id="result_limit">

                                               <option @if($results_limit == 20) selected=""
                                                       @endif value="20"
                                                       selected="">20</option>
                                               <option @if($results_limit == 50) selected=""
                                                       @endif  value="50">50</option>
                                               <option @if($results_limit == 75) selected=""
                                                       @endif  value="75">75</option>
                                               <option @if($results_limit == 100) selected="selected"
                                                       @endif  value="100">100</option>
                                           </select>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </form>
                    </div>
                    <br>

                    <div>
                        <div>
                            @if(count($products) == 0)
                                <section class="theme_box">
                                    <p class="alert alert-warning">
                                        Не постојат артикли за ова пребарување
                                    </p>
                                </section>
                            @else
                                <?php $i = 0; ?>
                                @foreach($products as $product)

                                    <div class="item item-hover" id="search_result">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container panel panel-default">
                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                    <img src="{{\ImagesHelper::getProductImage($product,null,'lg_')}}"

                                                         class="item-image">
                                                    <img src="{{\ImagesHelper::getProductImage($product,null,'lg_')}}"
                                                         class="item-image-hover"></a>
                                                <!-- End .item-price-container -->
                                            </figure>


                                        </div><!-- End .item-image-wrapper -->

                                        <!-- End .rating-container -->
                                        <h3 class="item-name" style="position: absolute">
                                            <a href="{{route('product', [$product->id, $product->url])}}"
                                               style="height: 80px;" class="limit_text">{{$product -> title}}</a>
                                            <div class="product-price" style="text-align: center">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                                @else


                                                    <span class="product-price-new-home"
                                                          style="font-weight: bold;"> <span
                                                                id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                                @endif
                                            </div>
                                            <div style="text-align: center">
                                                {{--@if($product->total_stock)--}}
                                                    <div style="text-align: center">
                                                        <button id="buy_home" data-add-to-cart class="btn btn-custom-2"
                                                                type="button" value="{{$product->id}}" onClick=""><span>Нарачај тука</span>
                                                        </button>
                                                    {{--</div>  @else--}}
                                                    {{--<button id="buy_home_disabled" class="btn btn-disabled"--}}
                                                            {{--data-add-to-cart="" disabled>Нарачај тука--}}
                                                    {{--</button>--}}
                                                {{--@endif--}}
                                            </div>
                                        </h3>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </main>
            </div>
            <br><br>

            <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->
            @if ($products && count($products))
                <div class="row">
                    <div class="clearfix pull-left toolbox-pagination" style="margin-top: 80px;">
                        <ul class="pagination">
                            <li>  {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                        </ul>
                    </div>
                    @endif
                </div></div>


        <!--/ .row -->
    </div>


@stop
