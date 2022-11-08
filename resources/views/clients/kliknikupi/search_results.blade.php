@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li>Пребарувaње - {{$search}}</li>
            </ul>
        </div>
    </div>
    <form action="{{URL::to('/search')}}" class="form-inline">
        <div class="col-md-8 col-lg-8 col-xl-8 col-md-offset-1">
            <div class="content offset-0">
                <div class="filters-row">
                    <div class="pull-left">

                        <div class="filters-row_select hidden-sm hidden-xs">
                            <input class="form-control" type="text" name="search"
                                   value="{{$search}}"/>
                            <button class="btn btn-sm" type="submit">Барај</button>
                            <label>Подреди по:</label>
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
                    </div>
                    <div class="pull-left">
                        <div class="filters-row_select  hidden-sm hidden-xs">
                            <label>Прикажи:</label>
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
                            <a href="#" class="icon icon-arrow-down active"></a><a href="#"
                                                                                   class="icon icon-arrow-up"></a>
                        </div>
                        {{--<a class="link-view-mobile hidden-lg hidden-md" href="#"><span--}}
                        {{--class="icon icon-view_stream"></span></a>--}}
                        {{--<a class="link-mode link-grid-view active" href="#"><span--}}
                        {{--class="icon icon-view_module"></span></a>--}}
                        {{--<a class="link-mode link-row-view" href="#"><span--}}
                        {{--class="icon icon-view_list"></span></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </form>



    <br><br><br>

    <div class="container offset-0">
        @if(count($products) == 0)
            <div id="pageContent">
                <div class="container offset-80">
                    <div class="on-duty-box">
                        <img src="/assets/kliknikupi/images/empty-search-icon.png" alt="">
                        <h1 class="block-title large">Нема резултати <br>за ова барање.</h1>
                        <div class="description">
                            Резултати за <span class="color-base">'{{$search}}'</span>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <?php $i = 0; ?>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-3">
                        <div class="product">
                            <div class="product_inside">
                                <div class="image-box">
                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                        <img src="{{\ImagesHelper::getProductImage($product)}}" alt="">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <div class="label-new">Попуст</div>
                                            <div class="label-sale">Заштеда <?php $percent = ((int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)) / (int)$product->$myPriceGroup * 100?>
                                                {{(int)$percent}}%
                                            </div>
                                        @endif
                                    </a>
                                    <a href="{{route('product', [$product->id, $product->url])}}"
                                       data-toggle="modal" data-target="" class="quick-view">
											<span>
											<span class="icon icon-visibility"></span>Прегледај
											</span>
                                    </a>
                                    @if($product->is_exclusive)
                                        <div class="countdown_box">
                                            <div class="countdown_inner">
                                                {{--Treba da se zeme datum od baza--}}

                                                @if((int)substr($product->discount['end_date'],0,4) >= 2099)
                                                    <div class="countdown" data-date="{{\Carbon\Carbon::now()->addWeek(1)}}"></div>
                                                @else
                                                    <div class="countdown" data-date="{{($product->discount)['end_date']}}"></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
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
                                        <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}ден.</span>

                                    @else
                                        {{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                                class="price_currency"> ден.</span>

                                    @endif
                                </div>
                                <div class="product_inside_hover">
                                    <button class="btn btn-product_addtocart"
                                            data-add-to-cart="" value="{{$product->id}}" onClick="">
                                        <span class="icon icon-shopping_basket"></span>
                                        Додади во кошничка
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>


            @if ($products && count($products))
                <div class="row">
                    <div>
                        <ul class="pagination">
                            <li>  {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                        </ul>
                    </div>
                </div>
            @endif
    </div>






@endsection