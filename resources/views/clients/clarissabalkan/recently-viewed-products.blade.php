@extends('clients.clarissabalkan.layouts.default')
@section('content')
<main class="ps-main">
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page_header">
                    <h1>Последно гледани продукти</h1>
                </div>
                <table class="table cart-list">
                    <tbody>
                        @foreach($products as $product)
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <?php 
                            $hasDiscount = true;
                            $price = number_format($product->$myPriceGroup, 0, ',', '.');
                            $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, true, 0); 
                            $discountPercentage = '-' . ((int)(($price - $discountPrice) / $price) * 100) . '%';
                        ?>
                        @else
                        <?php
                            $price = number_format($product->$myPriceGroup, 0, ',', '.');
                            $hasDiscount = false;
                        ?>
                        @endif 
                        <tr wish-list-row="{{$product->id}}">
                            <td class="text-center" style="vertical-align:middle">
                                <div class="thumb_cart">
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <img class="img-fluid lazy" width="300"
                                            src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}"
                                            data-src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}"
                                            alt="{{$product->title}}">
                                    </a>
                                </div>
                                <div class="breadcrumbs">
                                    <ul>
                                        @if($product->parentCategory)
                                        <li><a href="#">{{ $product->parentCategory }}</a></li>
                                        @endif
                                        <li><a href="#">{{ $product->categories[0]->title }}</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td style="vertical-align:middle">
                                <div style="margin-bottom:25px;">
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <h3>{{ $product->title }}</h3>
                                    </a>
                                </div>
                                <div class="hidden-xs" style="margin-bottom:25px;">
                                    {!! nl2br($product->short_description) !!}
                                </div>
                                @if($hasDiscount))
                                <span class="new_price">{{$discountPrice}} мкд.</span>
                                <span class="old_price">{{$price}} мкд.</span>
                                @else
                                <span class="new_price">{{$price}} мкд.</span>
                                @endif
                            </td>
                            <td style="vertical-align:middle" class="options">
                                <a style="font-size:24px; display:block;" data-add-to-cart="" value="{{$product->id}}"
                                    class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Купи"><i
                                        class="ti-shopping-cart"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@stop