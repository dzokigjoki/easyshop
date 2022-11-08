@extends('clients.fitactive.layouts.default')
@section('content')
<style>
  .action-button {
    background-color: #CA2028;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin-top: 5px;
    cursor: pointer;
  }

  .hiraola-cart_btn {
    padding-top: 20px !important;
  }

  #empty-list {
    text-align: center !important;
    padding: 70px;

  }
</style>
<div class="container">
  <div class="row">
    <div class="col-12">
      <form action="javascript:void(0)">
        <div class="table-content table-responsive">
          {{-- {{dd($products)}} --}}
          @if(!is_null($products) && count($products) > 0)
          <table class="table">
            <thead>
              <tr>
                <th class="hiraola-product-thumbnail">Слика</th>
                <th class="cart-product-name">Продукт</th>
                <th class="hiraola-product-price">Цена</th>
                <th class="hiraola-cart_btn">Акции</th>
              </tr>
            </thead>
            <tbody>

              @foreach($products as $product)
              <tr wish-list-row="{{$product->id}}">
                <td class="hiraola-product-thumbnail"><a href="/p/{{ $product->id }}/{{$product->title}}"><img
                      class="product-image" src="{{ $product->image }}"></a>
                </td>
                <td class="hiraola-product-name"><a href="/p/{{ $product->id }}/{{$product->title}}">
                    {{ $product->title }}
                  </a></td>
                <td class="hiraola-product-price">
                  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <span class="ammount">
                      {{$product->price_discount}}
                      МКД
                    </span>
                    <del class="old-price text-muted">
                      {{number_format($product->price, 0, ',', '.')}} МКД
                    </del>
                  </span>
                  @else
                  <span class="ammount">{{number_format($product->price, 0, ',', '.')}}
                    МКД</span>
                  @endif
                </td>
                <td class="hiraola-cart_btn">
                  @if($product->active)
                  <a class="action-button" data-add-to-cart="" value="{{$product->id}}"><i class="fa fa-shopping-cart"
                      title="Додади во кошничка"></i></a>
                  @endif
                  <a class="action-button" data-remove-from-wish-list value="{{$product->id}}"><i class="fa fa-trash"
                      title="Избриши"></i></a>
                </td>
              </tr>





              @endforeach </tbody>
          </table>
          @else
          <h2 id="empty-list">Вашата листа на желби е празна</h2>

          @endif

        </div>
      </form>
    </div>
  </div>
</div>
@stop