@extends('clients.lilit.layouts.default')
@section('content')
<div id="wrapper" class="wide-wrap">
    <div class="heading-container">
        <div class="container heading-standar">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li><span><a href="#" class="home"><span>Дома</span></a></span></li>
                    <li><span>Кошничка</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="container">
            <div class="row">
            <?php $totalPrice = 0; ?>
            <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

            @foreach($products as $product)
                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                @if($totalPrice >= 300)
                    <?php $cargoPrice = 118; ?>
                @endif
                <!--                                    --><?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                    <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                @endforeach
                <div class="pull-left col-md-8 col-lg-8 main-wrap">
                    <div class="main-content">
                        <div class="shop">
                            <form>
                                <table class="table shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove hidden-xs">&nbsp;</th>
                                        <th class="product-thumbnail hidden-xs">&nbsp;</th>
                                        <th class="product-name">Продукт</th>
                                        <th class="product-price text-center">Цена</th>
                                        <th class="product-quantity text-center">Количина</th>
                                        <th class="product-subtotal text-center hidden-xs">Вкупно</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr class="cart_item">
                                        <td class="product-remove hidden-xs">
                                            <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" class="remove" title="Remove this item">&times;</a>
                                        </td>
                                        <td class="product-thumbnail hidden-xs">
                                            <a href="{{$product->url}}">
                                                <img width="100" height="150" src="{{$product->image}}"
                                                     alt="{{$product->title}}"
                                                     title="{{$product->title}}"/>
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{$product->url}}">{{$product->title}}</a>
                                            {{--<dl class="variation">--}}
                                                {{--<dt class="variation-Color">Color:</dt>--}}
                                                {{--<dd class="variation-Color"><p>Green</p></dd>--}}
                                                {{--<dt class="variation-Size">Size:</dt>--}}
                                                {{--<dd class="variation-Size"><p>Extra Large</p></dd>--}}
                                            {{--</dl>--}}
                                        </td>
                                        <td class="product-price text-center">
                                            <span class="amount">{{number_format($product->cena, 0, ',', '.')}},00 мкд.</span>
                                        </td>
                                        <td class="product-quantity text-center">
                                            <div class="quantity">
                                                <input disabled style="border:none; background-color: transparent" type="number" step="1" min="0" name="qunatity" value="{{$product->quantity}}" title="Qty" class="input-text qty text" size="4"/>
                                            </div>
                                        </td>
                                        <td id="item_total_{{$product->id}}" class="product-subtotal hidden-xs text-center">
                                            <span class="amount">{{number_format($product->cena / Session::get('selectedCurrencyDivider') * $product->quantity, 2, ',', '.')}} мкд.</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <div class="coupon">
                                            </div>
                                            {{--<input type="submit" class="button update-cart-button" name="update_cart" value="Update Cart"/>--}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals">
                                    <h2>За наплата: </h2>
                                    <table>
                                        <tr class="cart-subtotal">
                                            <th>Цена на продукти</th>
                                            <td><span class="amount">{{number_format($totalPrice, 0, ',', '.')}} мкд.</span></td>
                                        </tr>
                                        <tr class="shipping">

                                            <th>Достава</th>
                                            @if($totalPrice < 1000)
                                                <?php $priceWithDelivery = $totalPrice + $cargoPrice ?>
                                            <td><span class="amount">{{ $cargoPrice }}
                                                    {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                </span>
                                            </td>
                                            @else
                                                <?php $cargoPrice = 0; $priceWithDelivery = $totalPrice + $cargoPrice?>
                                            <td><span class="amount">{{$cargoPrice}}
                                                    {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            </span>
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="order-total">
                                            <th>Вкупно</th>
                                            <td><strong>
                                                <span class="amount">{{number_format($priceWithDelivery, 0, ',',
                                                    '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                </span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 main-wrap">
                    <form id="checkoutForm"
                          method="POST"
                          action="{{route('checksum.generate')}}">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Име<br />
                                    <p class="form-control-wrap your-name">
                                        <input required="" name="FirstName"
                                               id="FirstName"
                                               autofocus=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"
                                               type="text" class="form-control text validates-as-required">
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>Презиме<br />
                                    <p class="form-control-wrap your-name">
                                        <input required="" name="LastName"
                                               id="LastName"
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"
                                               type="text" class="form-control text validates-as-required">
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>E-mail<br />
                                    <p class="form-control-wrap your-name">
                                        <input required="" name="Email" id="Email"
                                               value="@if(old('Email')){{old('Email')}}
                                               @elseif(isset($formData) && isset($formData['Email']))
                                               {{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"
                                               type="email" class="form-control text validates-as-required">
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>Телефонски број<br />
                                    <p class="form-control-wrap your-name">
                                        <input  required="" name="Telephone"
                                                id="Telephone"
                                                value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"
                                                type="text" class="form-control text validates-as-required">
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>Држава<br />
                                    <p class="form-control-wrap your-name">
                                        <select  id="Country" name="Country" class="form-control selectpicker "  data-style="select--ys"  data-width="100%">
                                            <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                            @foreach($all_countries as $ac)
                                                <option @if(isset($country) && $country->id == $ac->id)
                                                        selected
                                                        @endif
                                                        value="{{$ac->id}}">{{$ac->country_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>Град<br />
                                    <p class="form-control-wrap your-name">
                                        <select id="City" name="City"
                                                class="form-control" id="checkoutFormCity1">
                                            <option value="">-- Избери град --</option>
                                            @foreach($all_cities as $city)
                                                {{-- Don't show city Друго --}}
                                                @if($city->id != 35)
                                                    <option @if(isset($user->city_id) && $user->city_id ==
                                                        $city->id)
                                                            selected
                                                            @endif
                                                            value="{{$city->id}}"
                                                            data-name="{{$city->city_name}}"
                                                            data-zip="{{$city->zip}}"
                                                    >{{$city->city_name}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <h5>Адреса<br />
                                    <p class="form-control-wrap your-name">
                                        <input required="" name="Address" id="Address"
                                               value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"
                                               type="text" class="form-control text validates-as-required" id="checkoutFormAddress11">
                                    </p>
                                </h5>
                            </div>
                            <div class="col-sm-12">
                                <div><label>Начин на плаќање: <strong>Во готово</strong></label></div>

                                <input type="hidden"
                                       name="paymentType"
                                       id="paymentType2"
                                       checked="checked"
                                       value="gotovo">




                                <div><label>Начин на испорака: <strong>Карго</strong></label></div>
                                <input type="hidden"
                                       name="type_delivery"
                                       checked="checked"
                                       value="cargo">
                            </div>
                        </div>
                        <div class="wc-proceed-to-checkout">
                            <div class="wc-proceed-to-checkout">
                                <br>
                                <button style="font-size:18px; width:100%" data-pay-button="" class="checkout-button button alt wc-forward btn btn-danger">Наплата</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection