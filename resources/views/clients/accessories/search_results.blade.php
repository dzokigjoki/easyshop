@extends('clients.accessories.layouts.default')
@section('content')
<style>
    .btn-search-color{
        background-color: #CDA557 !important;
        border-color:#CDA557 !important;
    }

    .btn-search{
        border-width: 0;
        padding: 7px 14px;
        font-size: 14px;
        outline: 0!important;
        background-image: none!important;
        filter: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        text-shadow: none;
        border-radius: 0!important;
    }

    .input-height{
        height:35px;
        border-radius: 0!important;
    }
</style>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h4>Резултати од пребарување: {{$search}}</h4>
                    {{-- <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop Column Three</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->

        <!-- Begin Hiraola's Content Wrapper Area -->
        <div class="hiraola-content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{URL::to('/search')}}" method="get">
                            <div class="shop-toolbar">
                                <div class="product-view-mode">
                                    <div class="search-input">
                                        <input style="float: left;width: 200px;" type="text" class="form-control input-height" placeholder="Keywords" value="{{$search}}" name="search">
                                        <input type="submit" class="btn btn-primary btn-search-color btn-search" id="button-search" value="Барај">
                                    </div>
                                </div>
                                <div class="product-short">
                                    <label class="select-label">Подреди по:</label>
                                    <select onchange="this.form.submit()" name="sort_by" class="selectBox nice-select">
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
                                <div class="product-short">
                                    <label class="select-label">Прикажи: </label>
                                        <select onchange="this.form.submit()" name="results_limit"
                                        class="show-qty selectBox nice-select" id="result_limit">
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
                      
                        <div class="shop-product-wrap grid gridview-3 row">
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <div class="col-lg-4">
                                        <div class="slide-item">
                                            <div class="single_product">
                                                <div class="product-img">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                                        <img class="primary-img" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">
                                                    </a>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="hiraola-add_cart" href="" value="{{$product->id}}" data-add-to-cart="" data-placement="top" title="Додади во кошничка"><i
                                                                class="ion-bag"></i></a>
                                                            </li>                                            
                                                            <li class="quick-view-btn" ><a href="{{route('product',[$product->id,$product->url])}}"  title="Прегледај"><i class="ion-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name" href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h6>
                                                        <div class="price-box">
                                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                                                <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                                            @else
                                                                <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                                <br>
                                    <h1 class="text-center">Не се пронајдени резултати за вашето пребарување</h1>
                                <br>
                            @endif
                           
                        </div>
                        
                    <div class="row">
                        @if(!!$search)
                        <div class="col-sm-12 col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')

@endsection