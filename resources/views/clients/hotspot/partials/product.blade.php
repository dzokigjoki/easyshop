<style>
    .btn_product {
        background: #DF5D10 !important;
    }

    .btn_product:hover {
        background: #a74309 !important;
        color: #fff !important;
    }

    .whiteHover:hover {
        color: #fff !important;
    }



    .btn_sold_out {
    border: none;
    color: #fff;
    background: #e01819;
    outline: none;
    display: inline-block;
    text-decoration: none;
    padding: 12px 25px;
    color: #fff;
    font-weight: 500;
    text-align: center;
    font-size: 14px;
    font-size: 0.875rem;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    line-height: normal;
  }
    .whiteHover {
        color: #fff !important;
    }
</style>
<div class="box-shadow-hotspot grid_item">
    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
    <?php
    $hasDiscount = true;
    $price = $product->$myPriceGroup;
    $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
    $discountPercentage = '-' . round(($price - $discountPrice) / $price * 100) . '%';
    ?>
    @else
    <?php
    $price = $product->$myPriceGroup;
    $hasDiscount = false;
    ?>
    @endif
    <?php
    $sticker = EasyShop\Models\Sticker::find($product->sticker_id);
    ?>
    <figure>
        @if(!is_null($sticker))
        @if(!empty($sticker->image) && !is_null($sticker->image))
        <img width="40" class="sticker-image-placement {{ $sticker->position }}" src="/uploads/stickers/{{ $sticker->id }}/{{ $sticker->image }}" alt="{{ $sticker->image }}">
        @else
        <span style="background: {{ $sticker->color }}" class="{{ $sticker->position }} {{ $sticker->form }}">{{ trans('global.'. $sticker->content)}}</span>
        @endif
        @else
        @if($hasDiscount)
        <span class="ribbon off">{{ $discountPercentage }}</span>
        @endif
        @endif
        {{-- <span class="ribbon new">New</span> --}}
        <a href="{{route('product', [$product->id, $product->url])}}">
            <img class="img-fluid lazy" src="{{url_assets('/hotspot/img/products/product_placeholder_square_medium_hotspot.jpg')}}" data-src="{{\ImagesHelper::getProductImage($product, null, 'sm_')}}">
        </a>
        <ul>
            {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
            @if(auth()->user())
            <li><a data-add-to-wish-list="" value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Додади во листа на желби"><i class="ti-heart"></i><span>Додади во листа
                        на
                        желби</span></a></li>
            @endif
            {{-- <li><a href="javascript://" data-add-to-cart="" value="{{$product->id}}" class="tooltip-1"
            data-toggle="tooltip" data-placement="left" title="Во кошничка"><i class="ti-shopping-cart"></i><span>Во
                кошничка</span></a></li> --}}
        </ul>
    </figure>
    {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
    <a href="{{route('product', [$product->id, $product->url])}}">
        <h3 style="height:55px;">{{$product->title}}</h3>
        {{-- <p>{{{ $product->manufacturer->name }}</p> --}}
    </a>
    <div class="price_box">
        @if($hasDiscount)
        <span class="new_price">{{number_format( $discountPrice, 0 , ',', '.') }} мкд</span>
        <span class="old_price">{{ number_format($price, 0, ',', '.') }} мкд</span>
        @else
        <span class="new_price">{{number_format( $price, 0, ',', '.') }} мкд</span>
        @endif
    </div>
    <div class="price_box">
        

        @if($product->sold_out)
        <span class="btn_sold_out">SOLD OUT</span></a>

        @else

        <a href="javascript://" data-add-to-cart="" value="{{$product->id}}" class="tooltip-1 btn_1 cart btn_product">
            <span class="whiteHover">КУПИ</span></a>

        @endif
    </div>
</div>