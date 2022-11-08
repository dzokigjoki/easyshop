<?php $totalPrice = 0; $total_quantity = 0; ?>

<p class="dropdown-cart-description">Производи</p>
<ul class="dropdown-cart-product-list">
    @foreach($products as $product)

        <?php


        $totalPrice = $totalPrice + ($product->price  * $product->quantity);
        $total_quantity = $total_quantity + $product->quantity;
        ?>

            <li class="item clearfix">
                <div class="dropdown-cart-details">
                    <table>
                        <tr>
                            <td>
                                <img style="width: 50px; height: 50px; padding-right: 15px;" src="{{$product->image}}"/>
                            </td>
                            <td>
                                <p class="" id="dd_table_description">
                                    <a href="{{$product->url}}">{{$product->title}} </a>
                                </p>
                            </td>
                            <td>
                                <p id="dd_table_price">
                                    {{$product->quantity}} x
                                    <span class="item-price">{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- End .dropdown-cart-details -->
            </li>
    @endforeach
</ul>


<ul class="dropdown-cart-total">
    <li><span class="dropdown-cart-total-title">Вкупно:</span><span>{{number_format($totalPrice, 0, ',', '.')}}
            ден.</span></li>
</ul><!-- .dropdown-cart-total -->
<div class="dropdown-cart-action">
    <a href="{{URL::to('/cart')}}" class="btn btn-custom-2 btn-block">Кошничка</a>
</div><!-- End .dropdown-cart-action -->
