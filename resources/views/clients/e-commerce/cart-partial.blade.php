<?php $totalPrice = 0;
$totalQuantity = 0;
// $newPrice = null;
?>

@if (Session::has('cart_products') && count(session()->get('cart_products'))>0)
<table class="font_size_12">
    @foreach(session()->get('cart_products') as $pid => $product)
    <?php $product = (object)$product;
    $totalPrice += $product->price * $product->quantity;
    $totalQuantity += $product->quantity;
    ?>
    <tr>
        <td>
            <a href="{{$product->url}}">
                <img src="{{ $product->image }}" height="50" class="lazy cart-partial-img">
                {{-- <img src="/uploads/products/27/sm_63062a3ac0382.png" alt="" /> --}}
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
    @endforeach
</table>
@else

<div class="minicart-header text_align_center no-items show">Вашата кошничка е празна.</div>

@endif
<div class="pt-10 minicart-footer">
    <div class="minicart-actions clearfix">
        <a class="button" href="{{URL::to('/cart')}}">
            <span class="text stilKopce">Види кошничка</span>
        </a>
    </div>
</div>