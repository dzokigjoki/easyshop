<?php $totalPrice = 0 ?>

@foreach($products as $product)
    <?php $totalPrice = $totalPrice + ($product->price * $product->quantity) ?>
    <li>
        <a href="{{$product->url}}"><img src="{{$product->image}}" alt="{{$product->title}}" width="37" height="34"></a>
        <span class="cart-content-count">x {{$product->quantity}} </span>
        <strong><a href="{{$product->url}}">{{$product->title}}</a>
            @if(isset($product->variation_value))
                ({{$product->variation_value}})
            @endif
        </strong>
        <em>{{number_format($product->price / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</em>
    </li>
	@endforeach
<li class="text-right">
    Вкупна сума: {{number_format($totalPrice / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}} &nbsp;&nbsp;
    <a href="{{route('cart')}}" class="btn btn-primary">Види кошничка</a>
</li>