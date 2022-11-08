@extends('clients.ibutik.layouts.default')

@section('content')
    <div class="container">

        <br>
        <header class="page-header">
            <form action="{{URL::to('/search')}}">
                <ul class="category-selections clearfix" id="search_filters">


                    <!-- - - - - - - - - - - - - - Search by - - - - - - - - - - - - - - - - -->
                    <div class="v_centered" style="display: none">
                        <input style="max-width: calc(100% - 74px); " type="text" name="search" value="{{$search}}"/>
                        <button style="width: 70px; margin: 0;padding-top: 9px;padding-bottom: 9px;"
                                class="button_green">Барај
                        </button>
                    </div>

                    <li><span class="category-selections-sign">Подреди:</span>
                        <select class="category-selections-select" onchange="this.form.submit()" name="sort_by">
                            <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                    @endif  value="title_asc">Име (A - Z)
                            </option>
                            <option @if($order_by == "title_desc") selected=""
                                    @endif  value="title_desc">Име (Z - A)
                            </option>
                            <option @if($order_by == "price_desc") selected=""
                                    @endif  value="price_desc">Цена - (Висока)
                            </option>
                            <option @if($order_by == "price_asc") selected=""
                                    @endif  value="price_asc">Цена - (Ниска)
                            </option>
                        </select>
                    </li>


                    <li><span class="category-selections-sign">Прикажи:</span>
                        <select class="category-selections-select" onchange="this.form.submit()" name="results_limit">
                            <option @if($results_limit == 20) selected="" @endif value="20"
                                    selected="selected">20
                            </option>
                            <option @if($results_limit == 50) selected=""
                                    @endif  value="50">50
                            </option>
                            <option @if($results_limit == 75) selected=""
                                    @endif  value="75">75
                            </option>
                            <option @if($results_limit == 100) selected=""
                                    @endif  value="100">100
                            </option>
                        </select></li>
                </ul>


            </form>
            <h2>Резултати од пребарувањето - {{$search}}</h2>
        </header>


        <section id="category-items">

            <br>


            @if(count($products) == 0)

                <p class="alert alert-danger">
                    Нема артикли за ова пребарување
                </p>

            @else
                <?php $i = 0; ?>
                <div class="row" data-gutter="15">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <div class="product">
                                <ul class="product-labels"></ul>
                                <div style="border: 1px solid #eee;" class="product-img-wrap">
                                    {{--<img class="product-img" src="{{\ImagesHelper::getProductImage($item)}}" alt="{{$item->title}}" />--}}
                                    <img class="product-img" src="{{\ImagesHelper::getProductImage($product)}}"/>
                                </div>
                                <a class="product-link" href="{{route('product', [$product->id, $product->url])}}"></a>
                                <div class="product-caption">

                                    <h5 class="product-caption-title">{{$product->title}}</h5>

                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                      {{--prvicna cena--}}
                                        <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} ден.
                                                    </span>
                                            </span>

                                       <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($product->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                    @else
                                        <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($product->$myPriceGroup)}} ден.</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <a value="{{$product->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart" class="btn btn-lg btn-primary" href="#">
                                <i class="fa fa-shopping-cart"></i>Додади во кошничка
                            </a>
                        </div>


                    @endforeach</div>


            @endif
        </section>
        {{--<div class="col-md-9 paginate">--}}
        {{--<div class="items">--}}

        {{--@foreach($articles as $articleRow)--}}
        {{--<div class="row" data-gutter="15">--}}
        {{--@foreach($articleRow as $item)--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="product ">--}}
        {{--<ul class="product-labels"></ul>--}}
        {{--<div class="product-img-wrap">--}}
        {{--<img class="product-img" src="{{\ImagesHelper::getProductImage($item)}}" alt="{{$item->title}}" />--}}
        {{--<img src="https://assets.smartsoft.mk/easyshop/ibutik/images/200x200.png" />--}}
        {{--</div>--}}
        {{--<a class="product-link" href="{{route('product', [$item->id, $item->url])}}"></a>--}}
        {{--<div class="product-caption">--}}

        {{--<h5 class="product-caption-title">{{$item->title}}</h5>--}}
        {{--<div class="product-caption-price"><span class="product-caption-price-new">{{$item->price}} ден.</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
        {{--<p class="category-pagination-sign">{{$itemCount}} items found in {{$category->title}}. Showing {{$minAmount}} - {{$maxAmount}}</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
        {{--<!--<nav>--}}
        {{--<ul class="pagination category-pagination pull-right pagerEl">--}}
        {{--<ul class="category-pagination pagination pageNumbers"></ul>--}}
        {{--<li class="last lastPage"><a href="#"><i class="fa fa-long-arrow-right"></i></a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</nav>-->--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}



        {{--<header class="page-header">--}}
        {{--<h1 class="page-title">{{$category->title}}</h1>--}}
        {{--<ol class="breadcrumb page-breadcrumb">--}}
        {{--<li><a href="{{route('home')}}">Почетна</a></li>--}}
        {{--<i class="fa fa-angle-right"></i>--}}
        {{--<li class="active">{{$category->title}}</li>--}}
        {{--</ol>--}}
        {{--<ul class="category-selections clearfix">--}}
        {{--<li><span class="category-selections-sign">Прикажи:</span>--}}
        {{--<select class="category-selections-select" data-sort=""">--}}
        {{--<option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>--}}
        {{--<option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>--}}
        {{--<option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>--}}
        {{--<option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>--}}
        {{--<option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>--}}
        {{--</select>--}}
        {{--</li>--}}
        {{--<li><span class="category-selections-sign">Подреди по:</span>--}}
        {{--<select class="category-selections-select"  data-per-page="">--}}
        {{--<option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>--}}
        {{--<option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>--}}
        {{--<option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>--}}
        {{--</select>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</header>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-3 beforePaginate">--}}
        {{--<aside class="category-filters">--}}
        {{--<div class="category-filters-section">--}}
        {{--<h3 class="widget-title-sm">Цена</h3>--}}
        {{--<input type="text" data-price-slider="" />--}}
        {{--</div>--}}
        {{--@foreach($filters as $filter)--}}
        {{--<div class="category-filters-section">--}}
        {{--<h3 class="widget-title-sm">{{$filter->name}}</h3>--}}
        {{--@foreach($filter->attributes as $attribute)--}}
        {{--<div class="checkbox">--}}
        {{--<label>--}}
        {{--<input data-attribute="" data-id="{{$attribute->id}}" type="checkbox"--}}
        {{--{{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}--}}
        {{--/>{{$attribute->value}}--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endforeach--}}

        {{--</aside>--}}
        {{--</div>--}}
        {{--<section  data-products-list="">--}}
        {{--@include('clients.ibutik.partials.category-products-list')--}}
        {{--</section>--}}
        {{--</div>--}}
        {{--@if ($products && count($products))--}}
        {{--<div class="col-xs-12">--}}
        {{--<nav>--}}
        {{--<ul class="pagination category-pagination pull-right" id="pagination_footer">--}}
        {{--{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}--}}
        {{--</ul>--}}
        {{--</nav>--}}
        {{--</div>--}}
        {{--@endif--}}


        @if (count($products) > 0)
            <div class="row">
                <div class="col-xs-12">
                    <nav>
                        <ul class="pagination category-pagination pull-left">
                            <li style="padding: 10px">  {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    </div>
    <div class="gap"></div>

@endsection