@extends('clients.drbrowns.layouts.default')
@section('content')
    <!-- start of page content -->



    <style>
        .promo_code_input{
            box-shadow: inset 0 0 1px #1481bd !important;
            width: 100%;
            margin: 0;
    height: 42.5px;
    border-radius: 0;
        }
        

        .coupon-label{
            display: block;
    padding: 10px 0;
    margin: 0 0 15px -15px;
    background: lightblue;
    font-size: 18px;
    text-align: center;
    color: #1481bd;
        }
        
        .woocommerce-billing-fields{
            padding-top: 15px;
        }
        .blue_button_add{
            width: 100%;
    padding: 15px 0 !important;
    font-size: 12.5px !important;
        }

        .padding_0{
            padding: 0 !important;
        }
    </style>
    <div class="woocommerce-cart woocommerce-page page-content container">
        <div class="row">
            <div class="main col-xs-12 col-sm-8" role="main">
                <div class="table-container woocommerce">

                    <?php $formData = session()->get('formData'); ?>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="checkoutForm" method="POST" action="{{ route('checksum.generate') }}">

                        {{ csrf_field() }}

                        <?php $totalPrice = 0; ?>
                        <?php $cargoPrice = config( 'clients.' . config( 'app.client') .
                        '.type_delivery.cargo.price'); ?>
                        

                        @foreach ($products as $product)
                            <?php $totalPrice = $totalPrice + $product->cena * $product->quantity; ?>
                            <?php $priceWithDelivery = $totalPrice >= 1200 ? $totalPrice : $totalPrice +
                            $cargoPrice; ?>
                        @endforeach

                        <table class="table table-bordered shop_table cart" cellspacing="0">
                            <thead>

                                <tr>
                                    <!--<th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>-->
                                    <th class="product-wrap">Продукт</th>
                                    <th class="product-price">Цена</th>
                                    <th class="product-quantity">Количина</th>
                                    <th class="product-subtotal">Вкупно</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="cart_item">

                                        <td class="product-wrap">
                                            <div class="product-thumbnail">
                                                <a href="{{ route('product', [$product->id, $product->url]) }}">
                                                    <img src="{{ $product->image }}" alt="{{ $product->title }}"
                                                        title="{{ $product->title }}" class="img-thumbnail">
                                                </a>
                                            </div>
                                            <div class="product-detail">
                                                <h4 class="product-name">{{ $product->title }}</h4>
                                            </div>

                                        </td>


                                        <td class="product-price">
                                            <span class="mobile-show">Цена: </span>
                                            <span class="amount">
                                                <span class="myColor amount">{{ $product->cena }} мкд.</span>
                                            </span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <div class="myColor quantity">
                                                    x{{ $product->quantity }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="mobile-show">Вкупно: </span>
                                            <span class="amount">
                                                <span
                                                    class="myColor amount">{{ number_format($product->cena * $product->quantity, 0, ',', '.') }}
                                                    мкд.</span>
                                            </span>

                                        </td>
                                        <td>
                                            <div class="product-remove">
                                                <a href="{{ URL::to('cart/remove/') }}/{{ $product->id }}"
                                                    class="remove" title="Remove this item"><i
                                                        class="fa fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="cart-collaterals">
                        <div class="cart_totals">
                            <table>
                                <tr class="cart-subtotal">
                                    <th>Цена на продукти</th>
                                    <td><span class="amount">{{ number_format($totalPrice, 0, ',', '.') }} мкд.</span>
                                    </td>
                                </tr>
                                <tr class="shipping">
                                    <th>Достава</th>
                                    <td><span class="amount">
                                            @if ($totalPrice >= 1200)
                                                <?php $cargoPrice = 0; ?>
                                                {{ $cargoPrice }}
                                                {{ \EasyShop\Models\AdminSettings::getField('currency') }}
                                            @else
                                                {{ $cargoPrice }}
                                                {{ \EasyShop\Models\AdminSettings::getField('currency') }}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Вкупно</th>
                                    <td><strong>
                                            <span class="amount">{{ number_format($priceWithDelivery, 0, ',', '.') }}
                                                {{ \EasyShop\Models\AdminSettings::getField('currency') }}
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main col-xs-12 col-sm-4" role="main">
                <div class="woocommerce">
                    

                        @if (empty($coupons))

                            <div class="row">


                                <div class="col-sm-6 padding_0">
                                    <input type="text" id="promo_code" {{-- style="width: 40%; display: inline; float: left;" --}} name="promo"
                                        class="form-control promo_code_input" placeholder="Внесете купон за попуст" />

                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" id="coupon-check" button-coupon-check
                                        class="button blue_button_add">Провери купон
                                    </button>
                                </div>

                            </div>
                            <div class="row" style="padding-bottom: 25px;">
                                <span data-coupon-check class="w-100" style="display: block"></span>
                            </div>
                        @else
                            <span class="coupon-label">
                                Внесен купон
                            </span>
                        @endif

                        <div class="row">


                            <form id="checkoutForm" action="{{ route('checksum.generate') }}" method="post"
                                class="checkout woocommerce-checkout col-sm-12">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-xs-12">

                                        <div id="customer_details">
                                            <div class="woocommerce-billing-fields">

                                                <h3>Детали за наплата</h3>


                                                <p class="form-row form-row form-row-first validate-required"
                                                    id="billing_first_name_field">
                                                    <label for="FirstName" class="required">Име</label></td>
                                                    <input type="text" class="form-control" required="" name="FirstName"
                                                        id="FirstName" autofocus="" required="" value="@if (old('FirstName')) {{ old('FirstName') }}@elseif(isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }} @endif" />
                                                </p>

                                                <p class="form-row form-row form-row-last validate-required"
                                                    id="billing_last_name_field">
                                                    <label for="LastName" class="required">Презиме</label>
                                                    <input type="text" class="form-control" required="" name="LastName"
                                                        id="LastName" value="@if (old('LastName')) {{ old('LastName') }}@elseif(isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }} @endif" />

                                                </p>
                                                <div class="clear"></div>

                                                <p class="form-row form-row form-row-first validate-required validate-email"
                                                    id="billing_email_field"><label for="Email"
                                                        class="required">Е-Пошта</label>
                                                    <input type="email" class="form-control" required="" name="Email"
                                                        id="Email" value="@if (old('Email')) {{ old('Email') }}@elseif(isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }} @endif" />
                                                </p>

                                                <p class="form-row form-row form-row-last validate-required validate-phone"
                                                    id="billing_phone_field"><label for="Telephone"
                                                        class="required">Телефонски
                                                        број</label>
                                                    <input type="text" class="form-control" required="" name="Telephone"
                                                        id="Telephone" value="@if (old('Telephone')) {{ old('Telephone') }}@elseif(isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }} @endif" />

                                                </p>
                                                <div class="clear"></div>

                                                <p class="form-row form-row form-row-wide address-field update_totals_on_change"
                                                    id="billing_country_field">
                                                    <label for="Country" class="required">Држава</label>
                                                    <select id="Country" class="form-control" name="Country">
                                                        <?php $all_countries = [$all_countries[0]];
                                                        // For now only Macedonia
                                                        ?>
                                                        @foreach ($all_countries as $ac)
                                                            <option @if (isset($country) && $country->id == $ac->id) selected @endif
                                                                value="{{ $ac->id }}">{{ $ac->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </p>

                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                    id="billing_address_1_field"><label for="City"
                                                        class="required">Град</label>
                                                    <select id="City" name="City" class="form-control">
                                                        <option value="">-- Избери град --</option>
                                                        @foreach ($all_cities as $city)
                                                            {{-- Don't show city Друго --}}
                                                            @if ($city->id != 35)
                                                                <option @if (isset($user->city_id) && $user->city_id == $city->id) selected @endif
                                                                    value="{{ $city->id }}"
                                                                    data-name="{{ $city->city_name }}"
                                                                    data-zip="{{ $city->zip }}">
                                                                    {{ $city->city_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>


                                                <p class="form-row form-row form-row-wide" id="municipality_enter_field">
                                                    <label for="municipality" class="required">Населба</label>

                                                    <input type="text" class="form-control" required="" id="municipality"
                                                        name="municipality" value="@if (old('municipality')) {{ old('municipality') }}@elseif(isset($formData) && isset($formData['municipality'])){{ $formData['municipality'] }}@else{{ isset($user) ? $user->municipality : '' }} @endif" />

                                            </div>

                                            </p>





                                            <p class="form-row form-row form-row-wide address-field validate-required"
                                                id="billing_city_field"><label for="Address" class="required">Адреса</label>
                                                <input type="text" class="form-control" required="" name="Address"
                                                    id="Address" value="@if (old('Address')) {{ old('Address') }}@elseif(isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address : '' }} @endif" />
                                            </p>
                                            <p class="form-row form-row form-row-wide address-field validate-required"
                                                id="billing_city_field"><label for="comments"
                                                    class="required">Заебелешка</label>
                                                <textarea class="form-control" name="comments" id="comments" cols="40"
                                                    rows="10"></textarea>
                                            </p>
                                            {{-- <p style="float: left;"class="form-row form-row form-row-last address-field validate-required validate-postcode" --}}
                                            {{-- id="billing_postcode_field"> --}}
                                            {{-- <label for="billing_postcode" class="">Поштенски код <abbr class="required" --}}
                                            {{-- title="required">*</abbr></label> --}}
                                            {{-- <input type="text" class="input-text " name="billing_postcode" --}}
                                            {{-- id="billing_postcode" value=""/></p> --}}
                                            <label for="paymentType2">Начин на плаќање</label><br>
                                            <input type="radio" checked="checked" value="gotovo" id="paymentType2"
                                                name="paymentType">
                                            <label>Во готово</label><br>
                                            <label for="type_delivery">Начин на испорака</label><br>
                                            <input type="radio" checked="checked" value="cargo" name="type_delivery">
                                            <label>Карго</label>
                                            <div>
                                                <label>Бесплатна достава над 1200 ден.</label>
                                            </div>
                                            <div style="margin-top:50px;">
                                                <button style="float:right;" type="submit" class="button"
                                                    name="update_cart">Нарачај</button>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                        </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    </div><!-- end of page content -->


@endsection
