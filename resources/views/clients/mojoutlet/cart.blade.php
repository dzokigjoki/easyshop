@extends('clients.shopathome.layouts.default')
@section('content')
    <!-- CONTENT section -->
        {{--<div class="breadcrumbs">--}}
            {{--<div class="container">--}}
                {{--<ol class="breadcrumb breadcrumb--ys pull-left">--}}
                    {{--<li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>--}}
                    {{--<li><a href="{{route('home')}}">Дома</a></li>--}}
                    {{--<li class="active">Кошничка</li>--}}
                {{--</ol>--}}
            {{--</div>--}}
        {{--</div>--}}
    <div id="pageContent">
        <div class="container">
            <!-- title -->
            <div class="title-box">
                <h1 class="text-center text-uppercase title-under">КОШНИЧКА</h1>
            </div>
            <?php $totalPrice = 0; ?>
            <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

            @foreach($products as $product)
                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                <?php $priceWithDelivery = $totalPrice >= 1000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
            @endforeach

            <input type="hidden" name="AmountToPay" value="{{$priceWithDelivery * 100}}"/>
            <input type="hidden" name="AmountCurrency" value="MKD"/>
            <input type="hidden" name="Details1" value="{{ucfirst(env("CLIENT"))}}-Нарачка"/>
            <input type="hidden" name="PayToMerchant"
                   value="{{\EasyShop\Models\AdminSettings::getField('merchantId')"}}/>
            <input type="hidden" name="MerchantName"
                   value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}"/>
            <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
            <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
            <input type="hidden" name="OriginalAmount" value="{{$priceWithDelivery}}"/>
            <input type="hidden" name="OriginalCurrency" value="MKD"/>



            <!-- /title -->
            <div class="row">
                <!--================= col-left =================-->
                <div class="mobileCartOverflow col-md-12 col-lg-8">

                {{--<div class="divider--lg"></div>--}}
                <!-- Shopping cart table -->
                    <table class="shopping-cart-table">
                        <thead>
                        <tr>
                            <th>Продукт</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Цена</th>
                            <th>Количина</th>
                            <th>Вкупно</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div class="shopping-cart-table__product-image">
                                        <a href="{{$product->url}}">
                                            <img src="{{$product->image}}"
                                                 alt="{{$product->title}}"
                                                 title="{{$product->title}}"
                                                 class="img-responsive">
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-text">
                                    <h5 class="shopping-cart-table__product-name text-left text-uppercase">
                                        <a style="color:black;" href="{{$product->url}}">{{$product->title}}</a>
                                    </h5>
                                </td>
                                <td class="cart-text">
                                    {{--<a class="shopping-cart-table__create icon icon-create " href="#"></a>--}}
                                    <a class="shopping-cart-table__delete icon icon-delete visible-xs" href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>
                                </td>
                                <td class="cart-text">
                                    <div style="color:black;" class="shopping-cart-table__product-price unit-price">
                                        {{number_format($product->cena, 0, ',', '.')}} ден.
                                    </div>
                                </td>
                                <td class="cart-text">
                                    <div class="shopping-cart-table__input">
                                        <!--  -->
                                        <div style="color: black;" class="number input-counter">
                                            x{{$product->quantity}}
                                        </div>
                                        <!-- / -->
                                    </div>
                                </td>
                                <td class="cart-text">
                                    <div class="shopping-cart-table__product-price subtotal">
                                        <span style="color:black;" id="item_total_{{$product->id}}">{{number_format($product->cena / Session::get('selectedCurrencyDivider') * $product->quantity, 0, ',', '.')}} ден.</span>
                                    </div>
                                </td>
                                <td class="cart-text">
                                    <a class="icon icon-delete icon icon-clear" href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>


                                    {{--<div class="cart__item__control">--}}
                                    {{--<div class="cart__item__delete"><a href="{{URL::to('cart/remove/')}}/{{$product->id}}"--}}
                                    {{--class="icon icon-delete"><span>Избриши</span></a>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <br>
                    <ul class="pull-right" style="list-style: none; margin-right:20px;">

                        <li colspan="" class="total align_right">
                            <label class="padding-right-15-lg" style="color:#1fc0a0 !important;">Цена на продукти: </label>
                            <label class="table_summary" style="float:right; font-weight: 700">{{number_format($totalPrice, 0, ',', '.')}}
                                {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                        </li>

                        <li colspan="" class="total aligh_right">
                            <label style="color:#1fc0a0 !important;">Испорака:</label>
                            <label class="table_summary" style="float:right; font-weight: 700">
                                {{ $totalPrice >= 1000 ? 0 : $cargoPrice }}
                                {{\EasyShop\Models\AdminSettings::getField('currency')}}
                            </label>
                            {{--class="table_summary">{{ $totalPrice >= 2000 ? 0 : $cargoPrice }}--}}
                        </li>
                        <hr>
                        <li class="grandtotal align_right">
                            <label style="color:#1fc0a0 !important;">Вкупно:</label>
                            <label class="table_summary" style="float:right; font-weight: 700">{{number_format($priceWithDelivery, 0, ',',
                                '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                        </li>
                    </ul>
                </div>
                <div class="cartMobileMargin col-md-12 col-lg-4">
                    <!-- NAME & ADDRESS -->
                    <h2 class="title-checkout">
                        <span class="icon color icon-local_shipping"></span>
                        Внеси податоци
                    </h2>
                    <form id="checkoutForm"
                          method="POST"
                          action="{{route('checksum.generate')}}">

                         {{ csrf_field() }}
                        <!-- row-col-2 -->
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="checkoutFormFirstName">Име <sup>*</sup></label>
                                    <input type="text" class="form-control"
                                           required="" name="FirstName"
                                           id="FirstName"
                                           autofocus=""
                                           value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                </div>
                                <div class="form-group">
                                    <label for="checkoutFormCompany">Презиме</label>
                                    <input type="text" class="form-control"
                                           required="" name="LastName"
                                           id="LastName"
                                           value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="checkoutFormEmailAddress">Е-пошта  <sup>*</sup></label>
                                    <input type="email" class="form-control"
                                           required="" name="Email" id="Email"
                                           value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                </div>
                            </div>
                        </div>
                        <!-- /row-col-2 -->
                        <div class="form-group">
                            <div class="form-group">
                                <label for="checkoutFormTelephone1">Телефонски број <sup>*</sup></label>
                                <input type="text" class="form-control"
                                       required="" name="Telephone"
                                       id="Telephone"
                                       value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkoutFormCountry1">Држава<sup>*</sup></label>
                            <select id="Country" class="form-control"
                                    name="Country">
                                <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                @foreach($all_countries as $ac)
                                    <option @if(isset($country) && $country->id == $ac->id)
                                            selected
                                            @endif
                                            value="{{$ac->id}}">{{$ac->country_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="checkoutFormCity1">Град <sup>*</sup></label>
                                <select id="City" name="City"
                                        class="form-control">
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
                            </div>
                        <div class="form-group">
                            <label for="checkoutFormAddress11">Адреса <sup>*</sup></label>
                            <input type="text" class="form-control"
                                   required="" name="Address" id="Address"
                                   value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>
                        </div>
                        <!-- row-col-2 -->
                        <!-- /row-col-2 -->

                             {{--<tr>--}}
                                 {{--<td class="cart_table_label"><label for="phone">Начин на плаќање</label>--}}
                                 {{--</td>--}}


                                 {{--<td class="cart_table_input">--}}
                                     {{--<input type="radio" value="casys"--}}
                                            {{--id="paymentType1"--}}
                                            {{--name="paymentType" style="display: none">--}}
                                     {{--<label for="paymentType1">Картичка</label>--}}
                                     {{--<br>--}}
                                     {{--<input type="radio" checked="checked" value="gotovo"--}}
                                            {{--id="paymentType2"--}}
                                            {{--name="paymentType">--}}
                                     {{--<label for="paymentType2">Во готово</label>--}}
                                 {{--</td>--}}
                             {{--</tr>--}}

                             <div class="col-sm-12">
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         <h4 class="panel-title"> Забелешка</h4>
                                     </div>
                                     <div class="panel-body">
                                        <textarea rows="4" class="form-control" id="confirm_comment"
                                                  name="comments"></textarea>
                                         <br>
                                     </div>
                                 </div>
                             </div>

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

                        <button style="width:100%"  data-pay-button="" type="submit" class="btn btn--ys">Нарачај</button>
                    </form>
                    {{--<div class="divider--xl"></div>--}}
                    <!-- /NAME & ADDRESS  -->
                </div>
                <!--================= /col-left =================-->
                <!--================= col-center =================-->

                        <!-- /Shopping cart table -->
                        <!-- button -->
                        <div class="row shopping-cart-btns">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <a class="btn btn--ys btn--light pull-left btn-right" href="{{route('home')}}"><span class="icon icon-keyboard_arrow_left"></span>Врати се на почетна</a>
                                <div class="divider divider--xs visible-xs"></div>
                            </div>
                        </div>
                        <!-- /button -->
                <!--================= /col-center =================-->
            </div>
        </div>
    </div>
    <!-- End CONTENT section -->

@endsection