@extends('clients.luxbox.layouts.default')
@section('content')
<div class="page-content">
    <!-- Breadcrumb Section -->
    <section class="breadcrumb-contact-us breadcrumb-section section-box">
        <div class="container">
            <div class="breadcrumb-inner">
                <h1>Омилени производи</h1>
                <ul class="breadcrumbs">
                    <li><a class="breadcrumbs-1" href="/">Почетна</a></li>
                    <li>
                        <p class="breadcrumbs-2">Омилени производи</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Section -->

    <!-- Wishlist Section -->
    <section class="shop-cart-section wishlist-section section-box">
        <div class="woocommerce">
            <div class="container">
                <div class="entry-content">
                    <form class="woocommerce-cart-form" method="POST">
                        <table
                            class="shop_table shop_table_responsive cart woocommerce-cart-form__contents wishlist_table">
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-subtotal product-add-to-cart">Add to Cart</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                    <td class="product-remove">

                                        <a data-remove-from-wish-list value="{{$product->id}}" class="remove"><i
                                                class="zmdi zmdi-close"></i></a>
                                    </td>
                                    <td class="product-name" data-title="Product">
                                        <a href="/p/{{ $product->id }}/{{$product->title}}"><img
                                                src="{{ $product->image }}" alt="product"></a>
                                        <a href="/p/{{ $product->id }}/{{$product->title}}">{{ $product->title }}</a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="price-product">
                                            <span class="discounted-price">
                                                <strong>{{number_format($product->price_discount, 0, ',', '.')}}
                                                    МКД</strong>
                                            </span>
                                            <del class="old-price">
                                                {{number_format($product->price, 0, ',', '.')}} МКД
                                            </del>
                                        </span>
                                        @else
                                        <span class="woocommerce-Price-amount amount price-product"><strong>{{number_format($product->price, 0, ',', '.')}}
                                                МКД</strong></span>
                                        @endif
                                    </td>
                                    <td class="product-subtotal product-add-to-cart" data-title="Add to Cart">
                                        @if($product->active)
                                        <a data-add-to-cart="" value="{{$product->id}}"
                                            class="au-btn au-btn-wishlist btn-small">Додади во кошничка<i
                                                class="zmdi zmdi-arrow-right"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="actions" colspan="6">
                                        <a href="/" class="continue au-btn-black btn-small">Продолжи со купување<i
                                                class="zmdi zmdi-arrow-right"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Wishlist Section -->

</div>
@stop