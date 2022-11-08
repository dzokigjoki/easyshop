@extends('clients.naturatherapyshop.layouts.default')
@section('content')
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">Кошничка</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper oh pt-20">
        <section class="section-wrap shopping-cart">
            <div class="container relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-wrap mb-30">
                                    <table class="shop_table cart table">
                                        <thead>
                                            <tr>
                                                <th class="text-center product-name" colspan="2">Продукт</th>
                                                <th class="text-center product-price">Цена</th>
                                                <th class="text-center product-quantity">Количина</th>
                                                <th class="text-center product-subtotal" colspan="2">Вкупно</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr class="cart_item">
                                                    <td class="text-center product-thumbnail">
                                                        <a href="{{ $product->url }}">
                                                            <img width="100" class="img img-responsive" @if ($product->image)
                                                            src="{{ $product->image }}"
                                                        alt="{{ $product->title }}" @else
                                                            src="{{ url_assets('/bellina/images/no-image.png') }}"
                                            @endif />
                                            </a>
                                            </td>
                                            <td class="text-center product-name">
                                                <a href="#">{{ $product->title }}</a>
                                            </td>
                                            <td class="text-center product-price">
                                                <span class="amount">
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <?php
                                                        $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                        ?>
                                                        <del style="color: #C9302C">
                                                            {{ number_format($product->price_retail_1, 0, ',', '.') }} МКД.
                                                        </del><br>
                                                        {{ $discount }} МКД.
                                                    @else
                                                        {{ number_format($product->cena, 0, ',', '.') }} МКД.
                                                        <?php
                                                            $isPackage = EasyShop\Models\ProductCategory::where('product_id', '=', $product->id)->where('category_id', '=', 14)->first();
                                                        ?>
                                                        @if (!empty($coupons) && !isset($isPackage))
                                                                    <span style="font-size:14px; padding: 5px 10px"
                                                                        class="alert-success">
                                                                        Купон ({{ -$coupons[0]->value }}@if ($coupons[0]->discount_type == 'percent')% @else мкд. @endif)
                                                                    </span>
                                                        @endif
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input table-shopping-qty="" class="input-text qty text"
                                                        max="{{ $product->total_stock }}" data-id="{{ $product->id }}"
                                                        type="_" value="{{ $product->quantity }}" min="1" />
                                                    <div class="quantity-adjust">
                                                        <a href="#" class="plus">
                                                            <i class="fa fa-angle-up"></i>
                                                        </a>
                                                        <a href="#" class="minus">
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center product-subtotal">
                                                <span class="amount">
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <?php
                                                        $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                        ?>
                                                        {{ $product->quantity * $discount }} МКД.
                                                    @else
                                                        {{ $product->quantity * $product->cena }} МКД.
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center product-remove">
                                                <a href="{{ URL::to('cart/remove/') }}/{{ $product->id }}"
                                                    class="remove" title="Избриши">
                                                    <i class="ui-close"></i>
                                                </a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if (empty($coupons))
                                    <div class="coupons-pull-left text-left">
                                        <input type="text" id="promo_code" name="promo" class="input-text form-control"
                                            value="" placeholder="Купон за попуст">
                                        <input type="submit" id="coupon-check" button-coupon-check
                                            class="btn btn-lg btn-stroke" value="Провери">
                                        <span id="span-coupon-check" data-coupon-check class="w-100"
                                            style="display: block"></span>
                                    </div>
                                @else
                                    <div class="coupons-pull-left text-left">
                                        <h5 style="margin: 0 !important; padding: 10px 20px;" class="alert-success">Внесен
                                            купон</h5>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                 <?php $totalPrice = 0; $points = 0; $pointsCost = 0; $totalServicePrice = 0?>
                                 @foreach ($products as $product)
                                        <?php
                                        $user = null;
                                        if (auth()->check()) {
                                            $user = auth()->user();
                                        }
                                        if($product->type == 'service'){
                                            $totalServicePrice += $product->cena * $product->quantity;
                                        }
                                        else{
                                            if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                                                $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                $totalPrice = $totalPrice + $discount * $product->quantity;
                                            } else {
                                                $totalPrice = $totalPrice + $product->cena * $product->quantity;
                                            }
                                        }
                                        if(\EasyShop\Services\LoyaltyService::isProductInLoyaltyCategory($product)){
                                            $points -= (\EasyShop\Models\Product::getProductPoints($product) * $product->quantity);
                                            $pointsCost += (\EasyShop\Models\Product::getProductPoints($product) * $product->quantity);
                                        }
                                        else{
                                            $points += (\EasyShop\Models\Product::getProductPoints($product) * $product->quantity);
                                        }
                                        ?>
                                        <?php
                                        if ($totalPrice <= 1000) {
                                            $cargoPrice = config('clients.' . config('app.client') . '.type_delivery.cargo.price');
                                        } else {
                                            $cargoPrice = 0;
                                        }
                                        ?>
                                    @endforeach
                                    <?php 
                                    if($totalPrice == 0){
                                        $cargoPrice = 0;
                                    }
                                    $priceWithDelivery = $totalPrice + $totalServicePrice + $cargoPrice;
                                    ?>
                                @if (auth()->check())
                                        <div class="cart_totals">
                                            <h2 class="heading relative botton-line full-grey uppercase mb-30">Вашите поени:
                                            </h2>
                                            <div id="error" style="color: red; display: none;">&emsp;Немате доволно поени!</div>
                                            <table class="table shop_table">
                                                <tr class="cart-subtotal">
                                                    <th class="text-center">Цена во поени</th>
                                                    <td style="text-align: center !important">
                                                        <span class="amount"> {{$pointsCost}}
                                                            поени</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart-points-left">
                                                    <th class="text-center">Преостанати поени</th>
                                                    <td style="text-align: center !important">
                                                        <span class="amount" id="PointsLeft" @if((auth()->user()->points - $pointsCost) < 0) name="Error" style="color: red"@endif>
                                                            {{ auth()->user()->points - $pointsCost }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif
                                <div class="cart_totals">
                                    <h2 class="heading relative bottom-line full-grey uppercase mb-30">Вкупно за наплата:</h2>
                                    <table class="table shop_table">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th class="text-center">Цена</th>
                                                <td style="text-align: center !important">
                                                    <span class="amount">{{ $totalPrice }}
                                                        МКД.</span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th class="text-center">Достава</th>
                                                <td style="text-align: center !important">
                                                    <span>{{ number_format($cargoPrice, 0, ',', '.') }} МКД.</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th class="text-center">Вкупно</th>
                                                <td style="text-align: center !important">
                                                    <strong><span class="amount">{{ $priceWithDelivery }}
                                                            МКД.</span></strong>
                                                </td>
                                            </tr>
                                            @if(auth()->check())
                                            <tr class="order-total">
                                                <th class="text-center">Добиени поени по нарачка</th>
                                                <td style="text-align: center !important">
                                                    <strong><span class="amount">
                                                            @if ($points < 0) 0 @else {{$points}} @endif
                                                        </span></strong>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="actions">
                                    <div class="wc-proceed-to-checkout w-100">
                                        <a id="proceed" class="btn btn-lg btn-dark w-100"><span>Наплата</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="content-wrapper oh" id="elementtoScrollToID">
            <section class="section-wrap checkout pb-70">
                <div class="container relative">
                    <div class="row">
                        <div class="ecommerce col-xs-12">
                            <div class="row mb-30 mt-30">
                                <div class="col-md-12">
                                    <h2 class="heading uppercase bottom-line full-grey mb-30">Детали за нарачка</h2>
                                </div>
                            </div>
                            <form data-form="" id="checkoutForm" method="POST" name="checkout"
                                class="checkout ecommerce-checkout row"
                                data-card-action="https://vpos.halkbank.rs/fim/est3Dgate"
                                data-cash-action="{{ route('checksum.generate') }}">
                                {{ csrf_field() }}
                                <?php $cargoPrice = config('clients.' . config('app.client') . '.type_delivery.cargo.price'); ?>
                                <div class="col-md-8" id="customer_details">
                                    <div>
                                        <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                            id="billing_first_name_field">
                                            <label for="billing_first_name">Име
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input type="text" id="FirstName" name="FirstName" class="input-text"
                                                value="@if (old('FirstName')){{ old('FirstName') }}@elseif(isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }}@endif" placeholder="Име*" required />
                                        </p>
                                        <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                            id="billing_last_name_field">
                                            <label for="billing_last_name">Презиме
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input class="input-text" value="@if (old('LastName')){{ old('LastName') }}@elseif(isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }}@endif" type="text"
                                                id="LastName" name="LastName" placeholder="Презиме*" required />
                                        </p>
                                        <p class="form-row form-row-first validate-required validate-email"
                                            id="billing_email_field">
                                            <label for="billing_email">Е- пошта
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input value="@if (old('Email')){{ old('Email') }}@elseif(isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }}@endif" class="input-text" type="Email"
                                                id="Email" name="Email" placeholder="E- пошта" required />
                                        </p>
                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required ecommerce-validated"
                                            id="billing_country_field">
                                            <label for="billing_country">Држава
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <select class="country_to_state country_select" id="Country" name="Country"
                                                required>
                                                @foreach ($all_countries as $ac)
                                                    <option @if (isset($country) && $country->id == $ac['id'])
                                                        selected
                                                    @elseif($ac['id'] == 1)
                                                        selected
                                                @endif
                                                value="{{ $ac['id'] }}">{{ $ac['country_name'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide address-field validate-required"
                                            id="billing_city_field"
                                            data-o_class="form-row form-row-wide address-field validate-required">
                                            <label for="billing_city">Град
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <select required id="City" class="country_to_state country_select" name="City">
                                                <option value="">-- Град --</option>
                                                @foreach ($all_cities as $city)
                                                    @if ($city->id != 35)
                                                        <option @if (isset($user->city_id_shipping) && $user->city_id_shipping == $city->id)
                                                            selected
                                                    @endif
                                                    value="{{ $city->id }}"
                                                    data-name="{{ $city->city_name }}"
                                                    data-zip="{{ $city->zip }}">
                                                    {{ $city->city_name }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </p>
                                        <p
                                            class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field">
                                            <label for="billing_address_1">Адреса
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input value="@if (old('Address')){{ old('Address') }}@elseif(isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address_shiping : '' }}@endif" class="input-text" type="text"
                                                id="Address" name="Address" placeholder="Адреса" required />
                                        </p>
                                        <p class="form-row form-row-last validate-required validate-phone"
                                            id="billing_phone_field">
                                            <label for="billing_phone">Телефон
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input required minlength="9" value="@if (old('Telephone')){{ old('Telephone') }}@elseif(isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }}@endif"
                                                class="input-text" type="text" id="Telephone" name="Telephone"
                                                placeholder="Телефон*" />
                                        </p>
                                        <p class="form-row notes ecommerce-validated" id="order_comments_field">
                                            <label for="order_comments">Коментар</label>
                                            <textarea rows="4" class="input-text" id="confirm_comment"
                                                placeholder="Остави коментар..." name="comments"></textarea>
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                    {{-- halk hidden --}}
                                    <input type="hidden" name="clientid"
                                        value="{{ \EasyShop\Models\AdminSettings::getField('clientId') }}" />
                                    <input type="hidden" name="storetype" value="3d_pay_hosting" />
                                    <input type="hidden" name="trantype" value="Auth" />
                                    <input type="hidden" name="amount" value="{{ $totalPrice }}" />
                                    <input type="hidden" name="instalment" value="">
                                    <input type="hidden" name="currency"
                                        value="{{ \EasyShop\Models\AdminSettings::getField('currencyCode') }}" />
                                    <input type="hidden" name="okUrl" value="{{ route('halk.success') }}" />
                                    <input type="hidden" name="failUrl" value="{{ route('halk.fail') }}" />
                                    <input type="hidden" name="callbackUrl" value="{{ route('halk.success') }}" />
                                    <input type="hidden" name="lang" value="en" />
                                    <input type="hidden" name="refreshtime" value="0" />
                                    <input type="hidden" name="BillToName" value="BillToName">
                                    <input type="hidden" name="encoding" value="UTF-8">

                                </div>
                                <div class="col-md-4">
                                    <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                                        <div id="payment" class="ecommerce-checkout-payment">
                                            <h2 class="heading uppercase bottom-line full-grey">Плаќање и достава</h2>
                                            <ul class="payment_methods methods">
                                                <p class="p_paying">Начин на достава</p>
                                                <li class="payment_method_paypal">
                                                    <select class="country_to_state country_select" id="type_delivery"
                                                        name="type_delivery">
                                                        <option value="cargo" @if (isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery'] === 'cargo')
                                                        checked="selected" @else
                                                            selected="selected" @endif>
                                                            Карго</option>
                                                    </select>
                                                </li>
                                            </ul>
                                            <ul class="payment_methods methods">
                                                <p class="p_paying">Начин на плаќање</p>
                                                @foreach (\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                    <li class="payment_method_bacs d-flex">
                                                        <input style="margin-top: 0; margin-right: 10px;"
                                                            class="input-radio" type="radio" @if ($i['display_name'] == 'Картичка')checked="true" @endif
                                                            name="paymentType" id="{{ $i['name'] }}"
                                                            value="{{ $i['name'] }}" @if (isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $i['name']) checked="checked" @endif
                                                            @if (!isset($formData) && $i['name'] === 'halk')
                                                        checked="checked"
                                                @endif />
                                                <label for="payment_method_bacs">
                                                    {{ $i['display_name'] }}
                                                </label>
                                                <div class="payment_box payment_method_bacs" style="display: none;">
                                                </div>
                                                </li>
                                                @endforeach

                                            </ul>
                                            <input data-pay-button value="Нарачај"
                                                class="form-control submit btn btn-lg w-50" />

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".qty").on("input", function (e) {
                e.preventDefault();
                console.log($(this).val());
                if($(this).val() <= 0){
                    $(this).val(1);
                    console.log($(this).val());
                }
            });
            $("#proceed").click(function() {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#elementtoScrollToID").offset().top - 75
                }, 1000);
            });
            $("#coupon-check").click(function() {
                $("#span-coupon-check").css("margin", "10px 0 20px 0");
            })
            if ((sessionStorage.getItem("coupon_checked"))) {
                $("#FirstName").val(sessionStorage.getItem("old_first_name"));
                $("#LastName").val(sessionStorage.getItem("old_last_name"));
                $("#Email").val(sessionStorage.getItem("old_email"));
                $("#Telephone").val(sessionStorage.getItem("old_phone"));
                $("#Country").val(sessionStorage.getItem("old_country"));
                $("#City").val(sessionStorage.getItem("old_city"));
                $("#Address").val(sessionStorage.getItem("old_address"));
                $("#confirm_comment").val(sessionStorage.getItem("old_comment"));
                $("#type_delivery").val(sessionStorage.getItem("old_delivery_type"));
                $("#paymentType").val(sessionStorage.getItem("old_paymentType"));
                $("input[name='paymentType']:checked").removeAttr("checked");
                $("input[name='paymentType'][value=" + sessionStorage.getItem("old_paymentType") + "]").prop(
                    'checked', true);
            }

            if ($("input[name='FirstName']").val() == "" || $("input[name='LastName']").val() == "" ||
                $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $(
                    "select[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
                canSubmit = false;
            } else {
                if (!!validateEmail($("input[name='Email']").val())) {
                    canSubmit = true;
                }
            }

            if (canSubmit == true) {
                $('[data-pay-button]').attr('disabled', false);
            } else {
                $('[data-pay-button]').attr('disabled', true);
            }
        });
        jQuery(function($) {
            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');
            var canSubmit = false;
            $(':input').on('input', function() {
                var firstName = $("input[name='FirstName']").val();
                var lastName = $("input[name='LastName']").val();
                var email = $("input[name='Email']").val();
                var telephone = $("input[name='Telephone']").val();
                var country = $("select[name='Country']").val();
                var city = $("select[name='City']").val();
                var address = $("input[name='Address']").val();
                if (firstName == "" || lastName == "" || email == "" || telephone == "" || telephone
                    .length < 9 || country == "" || address == "") {
                    canSubmit = false;
                } else {
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                        canSubmit = true;
                    } else {
                        canSubmit = false;
                    }
                }
                if (canSubmit == true) {
                    $('[data-pay-button]').attr('disabled', false);
                } else {
                    $('[data-pay-button]').attr('disabled', true);
                }
            })
            $button.on('click', function(event) {
                var paymentType = $('[name=paymentType]:checked').val();
                var enoughPoints = $("#PointsLeft").attr('name');

                if(typeof enoughPoints !== typeof undefined && enoughPoints !== false){
                    $("#error").show();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }

                if (paymentType === 'halk') {
                    $form.attr('action', $form.data('card-action'));

                    $.ajax({
                        url: 'checkout/generate',
                        method: 'POST',
                        data: {
                            'FirstName': $("input[name='FirstName']").val(),
                            'LastName': $("input[name='LastName']").val(),
                            'Email': $("input[name='Email']").val(),
                            'Telephone': $("input[name='Telephone']").val(),
                            'Country': $("select[name='Country']").val(),
                            'City': $("select[name='City']").val(),
                            'Address': $("input[name='Address']").val(),
                            'Zip': $("input[name='Zip']").val(),
                            'Amount': $("input[name='amount']").val(),
                            'type_delivery': $("select[name='type_delivery']").val(),
                            'paymentType': $("input[name='paymentType']:checked").val()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(result) {
                            if (result.status === 'success') {
                                var name = $("input[name='FirstName']").val() + " " + $(
                                    "input[name='LastName']").val();

                                $("input[name='FirstName']").remove();
                                $("input[name='LastName']").remove();
                                $("input[name='Email']").remove();
                                $("input[name='Telephone']").remove();
                                $("select[name='Country']").remove();
                                $("[name='City']").remove();
                                $("input[name='Zip']").remove();
                                $("input[name='Address']").remove();
                                $("input[name='type_delivery']").remove();
                                $("input[name='paymentType']").remove();
                                $("input[name='amount']").remove();


                                $form.append('<input type="hidden" name="hash" value="' + result
                                    .hash + '" />');
                                $form.append('<input type="hidden" name="rnd" value="' + result
                                    .rnd + '" />');
                                $form.append('<input type="hidden" name="oid" value="' + result
                                    .oid + '" />');
                                $form.append('<input type="hidden" name="BillToName" value="' +
                                    name + '" />');
                                $form.append('<input type="hidden" name="amount" value="' +
                                    result.totalPrice + '" />');

                                $form.submit();
                            } else if (result.status === 'not_enough_stock') {
                                toastr.error("Производите " + result.productNames +
                                    ' моментално ги нема на залиха.');
                            }
                        },
                        error: function(val) {
                            toastr.error("Внесете ги сите полиња!");
                        }
                    });
                } else if (paymentType === 'gotovo') {
                    $form.attr('action', $form.data('cash-action'));
                    $form.submit();
                    return true;
                }
            });
        });
        function validateEmail(mail) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
                return (true)
            }
            return (false)
        }
    </script>
@stop
