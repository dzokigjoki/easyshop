@extends("clients.global-store.layouts.default")

@section('content')

    <main class="ps-main">
        <div class="ps-products-wrap pt-80 pb-80">
            <div class="ps-products search-cont" data-mh="product-listing">

                @if(!count($products))

                    <div class="col-sm-12">
                        <h1 class="text-center naslov">{{trans('globalstore.noResults')}}</h1>
                    </div>

                @else

                    <div class="col-sm-12 mb-25">
                        <h1 class="text-center naslov">{{trans('globalstore.resultsFor')}} "{{$search}}"</h1>
                    </div>

                    <div class="ps-product-action col-sm-12 pl-0">
                        <form action="{{route('search')}}" method="get">
                            <input type="hidden" name="search" value="{{$search}}">
                            <div class="ps-product__filter">
                                <select onchange="this.form.submit()" data-sort="" name="sort_by" class="filter-select">
                                    <option value="price_asc" @if($order_by == "price_asc" || empty($order_by)) selected=""
                                            @endif>{{trans('globalstore.price')}} ({{trans('globalstore.low')}} > {{trans('globalstore.high')}})</option>
                                    <option value="price_desc" @if($order_by == "price_desc") selected=""
                                            @endif>{{trans('globalstore.price')}} ({{trans('globalstore.high')}} > {{trans('globalstore.low')}})</option>
                                    <option value="title_asc" @if($order_by == "title_asc") selected=""
                                            @endif>{{trans('globalstore.name')}} (A - Z)</option>
                                    <option value="title_desc" @if($order_by == "title_desc") selected=""
                                            @endif>{{trans('globalstore.name')}} (Z - A)</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="ps-product__columns" data-products-list="">
                        @foreach($products as $article)
                            <div class="single-product-grid col-md-3">
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    <div class="spg-discount">
                                        {{(int)(((EasyShop\Models\Product::getPriceRetail1($article, false, 0)-$article->$myPriceGroup)/$article->$myPriceGroup)*100)}}%
                                    </div>
                                @endif
                                <div class="product-img-cont">
                                    <a href="{{route('product', [$article->id, $article->url])}}">
                                        <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                    </a>
                                    <a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">
                                        {{trans('globalstore.view')}}
                                    </a>
                                </div>
                                <a href="{{route('product', [$article->id, $article->url])}}">
                                    <p style="height: 50px;" class="grid-product-name">
                                        {{$article->title}}
                                    </p>
                                </a>
                                    <span style="font-size:25px !important;" class="product-price-cont">
                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            <del><span style="color:#565281; font-size: 20px !important;">{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></del>
                                        @else
                                            {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @endif
                                        </span>
                                {{--<a href="{{route('product', [$article->id, $article->url])}}" class="grid-product-add-to-cart" data-add-to-cart="" value="{{$article->id}}">--}}
                                {{--Додади во кошничка--}}
                                {{--</a>--}}
                                <a class="ps-btn mt-10 boldbtn" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">{{trans('globalstore.buy')}} <i class="ps-icon-next"></i></a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </main>

@endsection