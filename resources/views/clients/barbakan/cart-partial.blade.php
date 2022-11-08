

@if(Session::has('cart_products') && count(session()->get('cart_products'))>0)
<table class="cart-table">
    @foreach(session()->get('cart_products') as $pid => $product)
    <tr>
        <td class="title">
            <span class="name"><a href="#product-modal" data-toggle="modal">{{$product["title"]}}</a></span>
            <span class="caption text-muted">x {{$product["quantity"]}}</span>
        </td>
        <td class="price">{{ $product["price"] * $product["quantity"]}} МКД</td>
        <td class="actions">
            <a href="/cart/remove/{{ $product["id"] }}" class="action-icon"><i class="ti ti-close"></i></a>
        </td>
    </tr>
    @endforeach
</table>
<div class="cart-summary">

    <hr class="hr-sm">
    <div class="row text-lg">
        <div class="col-7 text-right text-muted">Вкупно:</div>
        <div class="col-5"><strong><span class="cart-total">{{$totalPrice}}</span> МКД</strong></div>
    </div>
</div>
<a href="{{URL::to('/cart')}}" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Кон наплата</span></a>

@else
<div class="cart-empty">
    <i class="ti ti-shopping-cart"></i>
    <p>Вашата кошничка моментално е празна</p>
</div>
<a href="/" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Започни со купување</span></a>

@endif