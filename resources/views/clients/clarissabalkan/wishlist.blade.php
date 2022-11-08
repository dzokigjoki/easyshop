@extends('clients.clarissabalkan.layouts.default')
@section('content')

<style>
    .empty-wishlist {
        padding: 50px;
        text-align: center;
    }
    .pt-20 {
        padding-top: 20px;
    }
</style>
<main class="ps-main">

    <div class="container margin_30">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if(count($products) > 0)
                <div class="page_header">
                    <h1>Листа на желби</h1>
                </div>
             
                <table class="table cart-list">
                    <tbody>
                        @foreach($products as $product)
                        <tr wish-list-row="{{$product->id}}">
                            <td class="text-center" style="vertical-align:middle">
                                <div class="thumb_cart">
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <img class="img-fluid lazy" width="50"
                                            src="{{$product->image}}"
                                            data-src="{{$product->image}}"
                                            alt="{{$product->title}}">
                                    </a>
                                </div>
                            </td>
                            <td style="vertical-align:middle">
                                <div>
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <h5>{{ $product->title }}</h5>
                                    </a>
                                </div>
                                <div class="hidden-xs">
                                    {!! nl2br($product->short_description) !!}
                                </div>
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <?php
                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                    if($product->price != 0){
                                    $discountPercentage = (($product->price - $discount)/$product->price)*100;
                                    }
                                    ?>
                                @endif


                                 @if(isset($discount))
                                <span class="new_price">{{number_format($discount, 0, ',', '.')}}
                                    мкд.</span>
                                <span class="old_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
                                @else
                                <span class="new_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
                                @endif
                            </td>
                            <td style="vertical-align:middle" class="options">
                                <a style="font-size:24px; display:block;" data-add-to-cart="" value="{{$product->id}}"
                                    class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Купи"><i
                                        class="ti-shopping-cart"></i></a>
                                {{-- <a style="font-size:24px; display:block;" data-add-to-compare=""
                                    value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip"
                                    data-placement="left" title="Додади за компарација"><i
                                        class="ti-control-shuffle"></i></a> --}}
                                <a style="font-size:24px; display:block;" 
                                class="tooltip-1" 
                                data-toggle="tooltip" data-placement="left" value="{{ $product->id }}"
                                    data-remove-from-wish-list="" title="Избриши"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="container empty-wishlist">
                <h2 class="text-center">Вашата листа на желби моментално е празна</h2>
                <div class="row">
                 
                    <div class="col-sm-12 col-xs-12 pt-20">
                        <a class="btn_1" href="/">Кон почетна</a>
                    </div>
                </div>
            </div>
                @endif
            </div>
        </div>
    </div>
</main>
@stop