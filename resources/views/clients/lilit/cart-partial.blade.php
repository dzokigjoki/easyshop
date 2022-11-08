@if (Session::has('cart_products'))
    <div id="shoppingCart">
        <div class="minicart">
            <div class="minicart-header no-items show">
                <ul class="paddingCart scroller">
                    <h5 class="pull-left">Во кошничка</h5><br><br><br>
                    @foreach(session()->get('cart_products') as $product)
                        <?php $product = (object)$product; ?>
                        <li style="min-height: 60px; list-style-type:none; text-align: left !important;">
                            <a class="pull-left" href="{{$product->url}}"><img class="marginRight" style="height: 37px; width: 34px;"
                                                                               src="{{$product->image}}"/><span class="marginRight" style="font-size:12px;">x{{$product->quantity}}</span></a>
                            <h3 class="marginRight alignCart"><b>
                                    <a style="font-size: 10px; font-weight: normal;color: #707070"
                                       href="{{$product->url}}">{{$product->title}}</a></b>
                            </h3>
                            <span style="text-align: left !important;">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="minicart-footer">
                <div class="minicart-actions clearfix">
                    <a class="button" href="{{route('cart')}}">
                        <span class="text">Види кошничка</span>
                    </a>
                </div>
            </div>
        </div>
        @else
            <div id="shoppingCart">
                <div class="minicart">
                    <h4 class="">
                        Вашата кошничка е празна!
                    </h4>
                    <div style="height:65%"></div>
                    <div class="minicart-footer">
                        <div class="minicart-actions clearfix">
                            <a class="button" href="{{route('cart')}}">
                                <span class="text">Види кошничка</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endif