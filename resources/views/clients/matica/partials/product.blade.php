<div class="grid_item">

    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
    <?php 
    $hasDiscount = true;
    $price = number_format($product->$myPriceGroup, 0, ',', '.');
    $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, true, 0); 
    $discountPercentage = '-' . round((($product->$myPriceGroup - $discountPrice) / $product->$myPriceGroup) * 100) . '%';
?>
    @else
    <?php
    $price = number_format($product->$myPriceGroup, 0, ',', '.');
    $hasDiscount = false;
?>
    @endif
    <?php 
        $sticker = EasyShop\Models\Sticker::find($product->sticker_id);
    ?>
    <figure>
        @if(!is_null($sticker))
        @if(!empty($sticker->image) && !is_null($sticker->image))
        <img width="40" class="sticker-image-placement {{ $sticker->position }}" src="/uploads/stickers/{{ $sticker->id }}/{{ $sticker->image }}"
            alt="{{ $sticker->image }}">
        @elseif(!!$hasDiscount && $sticker->content == 'discount')
        <span style="background: {{ $sticker->color }}"
            class="{{ $sticker->position }} {{ $sticker->form }}">{{ $discountPercentage }}</span>
        @elseif($sticker->content != 'discount')
        <span style="background: {{ $sticker->color }}"
            class="{{ $sticker->position }} {{ $sticker->form }}">{{ trans('global.'. $sticker->content)}}</span>
        @endif
        @endif
        {{-- <span class="ribbon new">New</span> --}}
        <a href="{{route('product', [$product->id, $product->url])}}">
            <img class="img-fluid lazy"
                src="{{url_assets('/matica/img/products/product_placeholder_square_medium_matica.jpg')}}"
                data-src="{{\ImagesHelper::getProductImage($product, null, 'sm_')}}">
        </a>
        <ul>
            {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
            @if(auth()->user())
            <li><a data-add-to-wish-list="" value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip"
                    data-placement="left" title="Додади во листа на желби"><i class="ti-heart"></i><span>Додади во листа
                        на
                        желби</span></a></li>
            @endif
            @if(!$product->bundle)
            <li><a href="javascript://" data-add-to-cart="" value="{{$product->id}}" class="tooltip-1"
                    data-toggle="tooltip" data-placement="left" title="Во кошничка"><i
                        class="ti-shopping-cart"></i><span>Во кошничка</span></a></li>
            @endif
        </ul>
    </figure>
    {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
    <a href="{{route('product', [$product->id, $product->url])}}">
        <h3>{{$product->title}}</h3>
        {{-- <p>{{{ $product->manufacturer->name }}</p> --}}
    </a>
    <div class="price_box">
        @if($hasDiscount)
        <span class="new_price">{{ $discountPrice }} мкд</span>
        <span class="old_price">{{ $price }} мкд</span>
        @else
        {{-- Ako produktot ne e bundle so procentualen popust --}}
        @if($product->bundle_price_type != 'percent')
        <span class="new_price">{{ $price }} мкд</span>
        @endif
        @endif
    </div>
</div>