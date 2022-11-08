<div class="ps-cart__listing">
    @if(Session::has('cart_products'))
        <div class="ps-cart__content">
            <?php $vkupno = 0; $vkupnoProdukti = 0; ?>
            @foreach(session()->get('cart_products') as $product)
                <?php $product = (object)$product; $vkupnoProdukti += $product->quantity; $vkupno += $product->price * $product->quantity; ?>
                <div class="ps-cart-item"><a class="ps-cart-item__close" title="{{trans('globalstore.remove')}} {{$product->title}}" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation){{$product->variation}}@endif"></a>
                    <div class="ps-cart-item__thumbnail"><a href="{{$product->url}}"></a><img src="{{$product->image}}" alt=""></div>
                    <div class="ps-cart-item__content">
                        <a class="ps-cart-item__title" href="{{$product->url}}">
                            {{$product->title}}
                            @if(isset($product->variation_value))
                                ({{$product->variation_value}})
                            @endif
                        </a>
                        <p><span>{{trans('globalstore.quantity')}}:<i>{{$product->quantity}}</i></span><span>{{trans('globalstore.total')}}:<i>{{$product->price * $product->quantity}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</i></span></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ps-cart__total">
            <p>{{trans('globalstore.numberOfProducts')}}:<span>{{$vkupnoProdukti}}</span></p>
            <p>{{trans('globalstore.totalPrice')}}:<span>{{$vkupno}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></p>
        </div>
        <div class="paddingPC ps-cart__footer"><a class="ps-btn" href="{{route('cart')}}">{{trans('globalstore.gotocart')}} <i class="ps-icon-arrow-left"></i></a></div>
    @else
        <p class="prazna">{{trans('globalstore.emptyCart')}}</p>
    @endif
</div>