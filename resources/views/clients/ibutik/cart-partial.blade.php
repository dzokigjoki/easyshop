<h3 style="color: #707070;">Во вашата кошничка</h3>
<table class="widthh">
	@foreach(session()->get('cart_products') as $product)

        <?php $product = (object)$product; ?>
		<tr class="dropdown-tr">
			<td class="img dropdown-td">
				<a href="{{$product->url}}"><img style="height: 37px; width: 34px;"
												 src="{{$product->image}}"/></a>
			</td>
			<td class="dropdown-td">
				x{{$product->quantity}}
			</td>
			<td class="dropdown-td">
                                                            <span><b>
                                                                    <a style="font-weight: normal;color: #707070" href="{{$product->url}}">{{$product->title}}</a></b>
                                                            </span>
			</td>
			<td class="dropdown-td">
				{{ number_format($product->price, 0, ',', '.')}} мкд.
			</td>

		</tr>
	@endforeach
</table>
<br>
<span>
                                              <?php
    $totalProducts = 0;
    $totalPrice = 0;
    ?>@if (Session::has('cart_products'))
		@foreach(session()->get('cart_products') as $pid => $product)
            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
		@endforeach
	@endif
	<h2 style="font-size:16px; color:#707070" class="cart-block-heading">Вкупно: <i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> ден.</h2>
                                </span>
<br>
<div>
	<a style="float:left;" href="{{URL::to('/cart')}}" class="btn btn-primary">Види кошничка</a>
	<!-- <a href="#" class="flat-right">Плати</a> -->
</div>
<br>
</div>