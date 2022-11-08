<div class="basket">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <div class="basket-item-count">
            <span class="count">3</span>
            <img src="{{ url_assets('/expressbook/images/icon-cart.png') }}" alt="" />
        </div>

        <div class="total-price-basket">
            <span class="lbl">Кошничка:</span>
                                    <span class="total-price">
                                        {{--<span class="sign">мкд</span>--}}
                                        <span class="value">3219,00</span>
                                    </span>
        </div>
    </a>

    <ul class="dropdown-menu">
        <li>
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                        <div class="thumb">
                            <img alt="" src="{{ url_assets('/expressbook/images/products/product-small-01.jpg') }}" />
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <div class="title">Blueberry</div>
                        <div class="price">$270.00</div>
                    </div>
                </div>
                <a class="close-btn" href="#"></a>
            </div>
        </li>

        <li>
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                        <div class="thumb">
                            <img alt="" src="{{ url_assets('/expressbook/images/products/product-small-01.jpg') }}" />
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <div class="title">Blueberry</div>
                        <div class="price">$270.00</div>
                    </div>
                </div>
                <a class="close-btn" href="#"></a>
            </div>
        </li>

        <li>
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                        <div class="thumb">
                            <img alt="" src="{{ url_assets('/expressbook/images/products/product-small-01.jpg') }}" />
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <div class="title">Blueberry</div>
                        <div class="price">$270.00</div>
                    </div>
                </div>
                <a class="close-btn" href="#"></a>
            </div>
        </li>


        <li class="checkout">
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <a href="cart" class="le-button inverse">View cart</a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="checkout" class="le-button">Checkout</a>
                    </div>
                </div>
            </div>
        </li>

    </ul>
</div><!-- /.basket -->