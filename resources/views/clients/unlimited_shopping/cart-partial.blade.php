<div class="ps-cart__listing">
@if(Session::has('cart_products'))
    <div class="ps-cart__content">
        <?php $vkupno = 0; $vkupnoProdukti = 0;?>
        @foreach(session()->get('cart_products') as $product)
            <?php $product = (object)$product; $vkupnoProdukti += $product->quantity; $vkupno += $product->price * $product->quantity; ?>
            <div class="ps-cart-item"><a class="ps-cart-item__close" title="Избриши {{$product->title}}" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"></a>
                <div class="ps-cart-item__thumbnail"><a href="{{$product->url}}"></a><img src="{{$product->image}}" alt=""></div>
                <div class="ps-cart-item__content">
                    <a class="ps-cart-item__title" href="{{$product->url}}">
                        {{$product->title}}
                        @if(isset($product->variation_value))
                            ({{$product->variation_value}})
                        @endif
                    </a>
                    <p><span>Количина:<i>{{$product->quantity}}</i></span><span>Вкупно:<i>
                        
                        {{number_format($product->price * $product->quantity)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                        
                </div>
            </div>
        @endforeach
    </div>
    <div class="ps-cart__total">
        <p>Вкупно продукти:<span>{{$vkupnoProdukti}}</span></p>
        <p>Вкупно:<span>
            {{number_format($vkupno)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}    
        </span></p>
    </div>
    <div class="paddingPC ps-cart__footer"><a class="ps-btn" href="{{route('cart')}}">Кошничка<i class="ps-icon-arrow-left"></i></a></div>
@else
    <p class="prazna">Вашата кошничка е празна!</p>
@endif
</div>