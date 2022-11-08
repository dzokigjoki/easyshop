@extends('clients.mobiin.layouts.default')
@section('content')
    <div class="container">
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">Пребарувај - {{$search}}</h1>
            <label></label>
            <form action="{{URL::to('/search')}}">

                <div class="product-filter">

                    <div class="row" style="background: #fff;padding: 10px 0;border: 1px solid #fff">
                        <div class="col-md-4 col-sm-5 clearfix">
                            <input style="float: left;width: 200px;" type="text" class="form-control" placeholder="Keywords" value="{{$search}}" name="search">
                            <input style="float: left;" type="submit" class="btn btn-primary" id="button-search" value="Барај">
                        </div>
                        <div class="col-sm-2 text-right">
                            <label style="padding-top: 5px" class="control-label" for="input-sort">Подреди:</label>
                        </div>
                        <div class="col-md-3 col-sm-2 text-right">
                            <select onchange="this.form.submit()" name="sort_by" class="form-control col-sm-3">
                                <option @if($order_by == "title_asc" || empty($order_by)) selected="" @endif  value="title_asc">{{trans('topprodukti.name')}} (A - Z)</option>
                                <option @if($order_by == "title_desc") selected="" @endif  value="title_desc">{{trans('topprodukti.name')}} (Z - A)</option>
                                <option @if($order_by == "price_asc") selected="" @endif  value="price_asc">{{trans('topprodukti.price')}} ({{trans('topprodukti.high')}}) </option>
                                <option @if($order_by == "price_desc") selected="" @endif  value="price_desc">{{trans('topprodukti.price')}} ({{trans('topprodukti.low')}}) </option>
                            </select>
                        </div>
                        <div class="col-sm-1 text-right">
                            <label  style="padding-top: 5px" class="control-label" for="input-limit">Прикажи:</label>
                        </div>
                        <div class="col-sm-2 text-right">
                            <select onchange="this.form.submit()" name="results_limit" class="form-control">
                                <option @if($results_limit == 20) selected="" @endif value="20" selected="selected">20</option>
                                <option @if($results_limit == 50) selected="" @endif  value="50">50</option>
                                <option @if($results_limit == 75) selected="" @endif  value="75">75</option>
                                <option @if($results_limit == 100) selected="" @endif  value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <br />

            <div class="row product-list">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="product-item">
                        <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                            <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                            <div>
                                <span class="btn btn-default">Преглед</span>
                            </div>
                        </a>
                        <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                        <div class="pi-price">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                            @else
                                <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            @endif
                        </div>
                        @if($product->is_exclusive)
                        @endif
                        <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                            Додади во кошничка
                        </span>
                    </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 text-center">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
        <!--Middle Part End -->
    </div>
    </div>
@endsection
@section('scripts')

@endsection