<div class="top-title">Во вашата кошничка</div>
<div class="container">
    <table>
    @foreach(session()->get('cart_products') as $product)

        <?php $product = (object)$product; ?>
        <tr class="dropdown-tr">
            <td class="img dropdown-td">
                <a href="{{$product->url}}"><img
                            src="{{$product->image}}"/></a>
            </td>
            <td class="dropdown-td">
                                                            <span><b>
                                                                    <a href="{{$product->url}}">{{$product->title}}</a></b>
                                                            </span>
            </td>
            <td class="dropdown-td">
                {{ number_format($product->price, 0, ',', '.')}} мкд.
            </td>
            <td class="dropdown-td">
                x{{$product->quantity}}
            </td>
        </tr>
    @endforeach
</table>
<br>
<br>
<a href="{{URL::to('/cart')}}" class="btn icon-btn-left">
    <span class="icon icon-shopping_cart"></span>Види кошничка</a>
<br>
</div>