<?php $totalPrice = 0; $total_quantity = 0; ?>
@foreach($products as $product)
      <?php
        $totalPrice = $totalPrice + ($product->price  * $product->quantity);
        $total_quantity = $total_quantity + $product->quantity;
      ?>

      <div class="animated_item">

          <div class="clearfix sc_product">

              <a href="{{$product->url}}" class="product_thumb"><img src="{{$product->image}}" alt="{{$product->title}}"></a>

              <a href="{{$product->url}}" class="product_name">{{$product->title}}</a>

              <p>{{$product->quantity}} x {{ number_format($product->price, 0, ',', '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</p>

              {{--<button class="close"></button>--}}

          </div><!--/ .clearfix.sc_product-->

      </div><!--/ .animated_item-->

@endforeach

<div class="animated_item">

    {{--<a href="{{URL::to('/cart')}}" class="button_grey">View Cart</a>--}}

    <a href="{{URL::to('/cart')}}" class="button_blue"><i class="fa fa-shopping-cart"></i> </a>

</div><!--/ .animated_item-->
    {{--</tbody>--}}
  {{--</table>--}}
{{--</li>--}}
{{--<li>--}}
  {{--<div>--}}
    {{--<table class="table table-bordered">--}}
      {{--<tbody>--}}
        {{--<tr>--}}
          {{--<td class="text-right"><strong>{{trans('topprodukti.total')}}</strong></td>--}}
          {{--<td class="text-right">{{$totalPrice}}  {{\EasyShop\Models\AdminSettings::getField('currency')}} &nbsp;&nbsp;--}}
          {{--<input type="hidden" id="temp_totalprice_cart" value="{{$totalPrice}}">--}}
          {{--<input type="hidden" id="temp_totalquan_cart" value="{{$total_quantity}}">--}}
          {{--</td>--}}
        {{--</tr>--}}
      {{--</tbody>--}}
    {{--</table>--}}
    {{--<p class="checkout"><a href="{{route('cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {{trans('topprodukti.cart')}}</a></p>--}}
  {{--</div>--}}
{{--</li>--}}