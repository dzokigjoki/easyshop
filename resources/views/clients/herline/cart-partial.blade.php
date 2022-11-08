<?php $totalPrice = 0; 
  $totalQuantity = 0;
  // $newPrice = null;
?>

<style>
    .cart-partial-img {
        width: 50px;
        height: auto;
    }

    .cart-partial-ul {
        padding: 0 !important;
    }

    .color-black {
        color: #000000;
        line-height: 19px;
        padding: 10px 0 10px 10px;
    }

    .cart-partial-title {
        font-size: 10px;
        line-height: 1.2;
        text-overflow: ellipsis;
        max-width: 200px;
        text-align: left;
    }
</style>

@if (session()->has('cart_products') && count(session('cart_products')))
<table>
    @foreach(session()->get('cart_products') as $product)
    <?php $product = (object)$product;
        $totalPrice += $product->price * $product->quantity;
        $totalQuantity += $product->quantity;
      ?>
    <tr>
        <td>
            <a href="{{$product->url}}">
                <img src="{{ $product->image }}" height="50" class="lazy cart-partial-img">
            </a>
        </td>
        <td class="color-black">
            <label class="cart-partial-title">{{$product->title}}
            </label>
        </td>
        <td style="white-space:nowrap" class="color-black">
            <span>x {{$product->quantity}}</span>
            <span>
                - <strong> {{ (int)$product->price * $product->quantity}} ден. </strong>
            </span>
        </td>
    </tr>
    <tr>
    </tr>
    @endforeach
</table>
@else

<div class="minicart-header no-items show">Вашата кошничка е празна.</div>

@endif
<div class="minicart-footer">
    <div class="minicart-actions clearfix">
        <a class="button" href="{{URL::to('/cart')}}">
            <span class="text">Види кошничка</span>
        </a>
    </div>
</div>