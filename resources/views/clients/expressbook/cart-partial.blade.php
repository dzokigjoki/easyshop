<ul>

    @foreach($products as $product)
        <li class="media">
            <div class="clearfix book cart-book">
                <a href="{{$product->url}}" class="media-left">
                    <div class="book-cover">
                        <img width="140" height="212"
                             src="{{$product->image}}"
                             data-echo="{{$product->image}}">
                    </div>
                </a>
                <div class="media-body book-details">
                    <div class="book-description">
                        <h3 class="book-title"><a href="single-book.html">{{$product->title}}</a></h3>

                        <p class="price m-t-20">
                            {{$product->quantity}} x
                            {{ number_format($product->price, 0, ',', '.')}} мкд.</p>
                    </div>
                </div>
            </div>
        </li>


    @endforeach
</ul>
<div class="cart-item-footer">
    <?php $totalPrice = 0;
    $totalProducts = 0;
    ?>
    @foreach($products as $product)
        <?php  $totalPrice = $totalPrice + ($product->price * $product->quantity);
        $totalProducts = $totalProducts + $product->quantity; ?>
    @endforeach
    <h3 class='total text-center'>Вкупно: <span>{{$totalPrice}} ден.</span></h3>
    <div class="proceed-to-checkout text-center">
        <a href="{{URL::to('/cart')}}">
            <button type="button" class="btn btn-primary btn-uppercase">Види кошничка</button>
        </a>
    </div>
</div>

