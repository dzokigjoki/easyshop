@extends('clients.tehnopolis.layouts.default')
@section('content')

    {{--<div class="secondary_page_wrapper">--}}
    <div class="container1">

        <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

        <ul class="breadcrumb">

            <li><a href="/">Почетна</a></li>
            <li>Пребарувај</li>

        </ul>
        <h2 class="page-header">Резултати од пребарувањето - {{$search}}</h2>
        <br>
        <form>
            <div class="row">
                <div class="z-index-0 col-sm-4">

                    <label>&nbsp;</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control input-md" placeholder="Пребарај" value="{{$search}}">
                        <span class="input-group-btn">
                            <button class="btn btn-md btn-danger" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="podredi_search">Подреди по: </label>
                    <select onchange="this.form.submit()" name="sort_by" class="form-control float-left" id="podredi_search">
                        <option @if($order_by == "title_asc" || empty($order_by)) selected="selected"@endif
                            value="title_asc">Име (A - Z)
                        </option>
                        <option @if($order_by == "title_desc") selected="selected" @endif
                            value="title_desc">Име (Z - A)
                        </option>
                        <option @if($order_by == "price_asc") selected="selected" @endif
                            value="price_asc">Цена - (Од најефтино)
                        </option>
                        <option @if($order_by == "price_desc") selected="selected" @endif
                            value="price_desc">Цена - (Од најскапо)
                        </option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>Прикажи: </label>
                    <span class="select">
                       <select onchange="this.form.submit()" name="results_limit" class="form-control">
                           <option @if($results_limit == 20) selected="selected"@endif value="20">20</option>
                           <option @if($results_limit == 50) selected="selected"@endif value="50">50</option>
                           <option @if($results_limit == 75) selected="selected"@endif value="75">75</option>
                           <option @if($results_limit == 100)selected="selected"@endif value="100">100</option>
                       </select>
                    </span>
                </div>
            </div>
        </form>
        <br><br>

            @if(count($products) == 0)
                <p class="alert alert-danger">
                    Нема артикли за ова пребарување
                </p>
            @else
                <section id="search_grid">
                    <div class="row product-list-row">
                @foreach($products as $product)
                            <div class="col-md-2 col-sm-3">
                                <a  href="{{route('product', [$product->id, $product->url])}}" class="product-col">
                                    <div class="image">
                        <span>
                            <img data-src="{{\ImagesHelper::getProductImage($product)}}"
                                 alt="{{$product->title}}" class="img-responsive product-img"/>
                        </span>
                                    </div>
                                    <div class="caption">
                                        <h4 class="subcategory-item-heading-constraint">
                                            {{$product->title}}
                                        </h4>
                                    </div>
                                    <div class="price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}} <span class="price_currency">ден</span></span>
                                            <span class="price-old">{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="price_currency">ден</span></span>
                                        @else
                                            <span class="price-new">{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="price_currency">ден</span></span>
                                        @endif
                                    </div>
                                    {{--<div class="cart-button button-group">--}}
                                    {{--<a class="btn btn-cart button-width" href="{{route('product', [$product->id, $product->url])}}">--}}
                                    {{--<i class="fa fa-shopping-cart"></i>--}}
                                    {{--Купи--}}
                                    {{--</a>--}}
                                    {{--</div>--}}
                                </a>
                            </div>
                @endforeach
                </div>
                </section>
                <footer class="bottom_box on_the_sides manufacturers-pagination" style="text-align: right;padding-top: 20px;">
                    {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}
                </footer>
        @endif
    </div>
    {{--</div>--}}
    <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->
    <!--/ .row -->

    {{--</div>--}}
@stop
