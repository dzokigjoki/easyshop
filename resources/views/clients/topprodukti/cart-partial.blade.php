<?php $totalPrice = 0; $total_quantity = 0; ?>
<li>
  <table class="table">
    <tbody>
@foreach($products as $product)
      <?php


        $totalPrice = $totalPrice + ($product->price  * $product->quantity);
        $total_quantity = $total_quantity + $product->quantity;
      ?>
      <tr>
        <td class="text-center"><a href="{{$product->url}}"><img class="img-thumbnail" title="{{$product->title}}" alt="{{$product->title}}" src="{{$product->image}}"></a></td>
        <td class="text-left"><a href="{{$product->title}}">{{$product->title}}</a></td>
        <td class="text-right">x {{$product->quantity}}</td>
        <td class="text-right">{{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
      </tr>
@endforeach
    </tbody>
  </table>
</li>
<li>
  <div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="text-right"><strong>{{trans('topprodukti.total')}}</strong></td>
          <td class="text-right">{{$totalPrice}}  {{\EasyShop\Models\AdminSettings::getField('currency')}} &nbsp;&nbsp;
          <input type="hidden" id="temp_totalprice_cart" value="{{$totalPrice}}">
          <input type="hidden" id="temp_totalquan_cart" value="{{$total_quantity}}">
          </td>
        </tr>
      </tbody>
    </table>
    <p class="checkout"><a href="{{route('cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {{trans('topprodukti.cart')}}</a></p>
  </div>
</li>