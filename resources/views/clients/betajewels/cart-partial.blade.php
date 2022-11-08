<table class="widthh">
    @foreach(session()->get('cart_products') as $product)

        <?php $product = (object)$product; ?>
        <tr class="dropdown-tr">
            <td class="img dropdown-td">
                <a href="{{$product->url}}">
                    <img class="mini-cart-img" src="{{$product->image}}"/>
                </a>
            </td>
            <td class="dropdown-td">
                x{{$product->quantity}}
            </td>
            <td class="dropdown-td w-150">
            <span>
                <b>
                    <a style="font-weight: normal;color: #707070"
                       href="{{$product->url}}">{{$product->title}}
                    </a>
                </b>
            </span>
            </td>
            <td class="dropdown-td">
                {{ number_format($product->price, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
            </td>

        </tr>
    @endforeach
</table>
<span>
    <?php
$totalProducts = 0;
$totalPrice = 0;
?>@if (Session::has('cart_products'))
@foreach(session()->get('cart_products') as $pid => $product)
  <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
@endforeach
@endif
<h2 style="font-size:16px; color:#707070" class="cart-block-heading">{{trans('betajewels.total')}}: <i
      style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i>  {{\EasyShop\Models\AdminSettings::getField('currency')}}</h2>
<a id="viewCart"
href="{{URL::to('/cart')}}" class="customBtn">{{trans('betajewels.view_cart')}}</a>

</span>