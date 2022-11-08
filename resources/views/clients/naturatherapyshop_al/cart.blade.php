@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">{!! trans('naturatherapy/global.cart') !!}</h1>
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
                                                <th class="text-center product-name" colspan="2">{!! trans('naturatherapy/global.product') !!}
                                                </th>
                                                <th class="text-center product-price">{!! trans('naturatherapy/global.price') !!}</th>
                                                <th class="text-center product-quantity">{!! trans('naturatherapy/global.quantity') !!}</th>
                                                <th class="text-center product-subtotal" colspan="2">
                                                    Total:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr class="cart_item">
                                                    <td class="text-center product-thumbnail">
                                                        <a
                                                            href="{{ $urlLang }}p/{{ $product->id }}/product{{ $product->id }}">
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
                                                            {{ number_format($product->price_retail_1, 3, ',', '.') }}
                                                            @if ($price_multiplier == 1) &#128; @else LEK  @endif
                                                        </del><br>
                                                        {{ $discount }} @if ($price_multiplier == 1) &#128; @else LEK  @endif
                                                    @else
                                                        {{ number_format($product->cena, 3, ',', '.') }}
                                                        @if ($price_multiplier == 1) &#128; @else LEK  @endif
                                                        @if (!empty($coupons))
                                                       
                                                            <div style="font-size:12.5px; padding: 5px 10px"
                                                                class="alert-success">
                                                                ({{ -$coupons[0]->value }}@if ($coupons[0]->discount_type == 'percent')
                                                                % @else @if ($price_multiplier == 1) &#128; @else LEK  @endif @endif)
                                                            </div>
                                                        @endif
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input table-shopping-qty="" class="input-text qty text"
                                                        max="{{ $product->total_stock }}" data-id="{{ $product->id }}"
                                                        type="_" value="{{ $product->quantity }}" />
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
                                                        {{ $product->quantity * $discount }} @if ($price_multiplier == 1) &#128; @else LEK  @endif
                                                    @else
                                                        {{ $product->quantity * $product->cena }}
                                                        @if ($price_multiplier == 1) &#128; @else LEK  @endif
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
                                            value="" placeholder="{!! trans('naturatherapy/global.discount_coupon') !!}">
                                        <input type="submit" id="coupon-check" button-coupon-check
                                            class="btn btn-lg btn-stroke" value="{!! trans('naturatherapy/global.check_out') !!}">
                                        <span id="span-coupon-check" data-coupon-check class="w-100"
                                            style="display: block"></span>
                                    </div>
                                @else
                                    <div class="coupons-pull-left text-left">
                                        <h5 style="margin: 0 !important; padding: 10px 20px;" class="alert-success">
                                            {!! trans('naturatherapy/global.insert_coupon') !!}</h5>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="cart_totals">
                                    <h2 class="heading relative bottom-line full-grey uppercase mb-30">
                                        {!! trans('naturatherapy/global.total') !!}:
                                    </h2>
                                    <?php $totalPrice = 0; ?>
                                    @foreach ($products as $product)
                                        <?php
                                        if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                                            $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                            $totalPrice = $totalPrice + $discount * $product->quantity;
                                        } else {
                                            $totalPrice = $totalPrice + $product->cena * $product->quantity;
                                        }
                                        ?>
                                        <?php
                                        if ($totalPrice < 15) {
                                            $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                                        } else {
                                            $cargoPrice = 0;
                                        }
                                        ?>
                                    @endforeach

                                    <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                    <table class="table shop_table">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th class="text-center">{!! trans('naturatherapy/global.order') !!}</th>
                                                <td style="text-align: center !important">
                                                    <span class="amount">{{ $totalPrice }}
                                                        @if ($price_multiplier == 1) &#128; @else LEK  @endif</span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th class="text-center">{!! trans('naturatherapy/global.delivery') !!}</th>
                                                <td style="text-align: center !important">
                                                    <span>{{ number_format($cargoPrice, 0, ',', '.') }}
                                                        @if ($price_multiplier == 1) &#128; @else LEK  @endif</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th class="text-center">{!! trans('naturatherapy/global.total') !!}:</th>
                                                <td style="text-align: center !important">
                                                    <strong><span class="amount">{{ $priceWithDelivery }}
                                                            @if ($price_multiplier == 1) &#128; @else LEK  @endif</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="actions">
                                    <div class="wc-proceed-to-checkout w-100">
                                        <a id="proceed"
                                            class="btn btn-lg btn-dark w-100"><span>{!! trans('naturatherapy/global.payment') !!}</span></a>
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
                                    <h2 class="heading uppercase bottom-line full-grey mb-30">{!! trans('naturatherapy/global.detail_order') !!}</h2>
                                </div>
                            </div>
                            <form data-form="" id="checkoutForm" method="POST" name="checkout"
                                class="checkout ecommerce-checkout row"
                                data-card-action="https://epay.halkbank.mk/fim/est3Dgate"
                                data-cash-action="{{ $urlLang }}checkout/generate">
                                {{ csrf_field() }}
                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>
                                <div class="col-md-8" id="customer_details">
                                    <div>
                                        <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                            id="billing_first_name_field">
                                            <label for="billing_first_name">{!! trans('naturatherapy/global.your_name') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input type="text" id="FirstName" name="FirstName" class="input-text"
                                                value="@if(old('FirstName')){{old('FirstName')}}@elseif (isset($formData) && isset($formData['FirstName'])) {{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }} @endif" placeholder="{!! trans('naturatherapy/global.your_name') !!}*"
                                                required />
                                        </p>
                                        <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                            id="billing_last_name_field">
                                            <label for="billing_last_name">{!! trans('naturatherapy/global.your_lastname') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input class="input-text" value="@if(old('LastName')){{old('LastName')}}@elseif (isset($formData) && isset($formData['LastName'])) {{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }} @endif" type="text"
                                                id="LastName" name="LastName" placeholder="{!! trans('naturatherapy/global.your_lastname') !!}*"
                                                required />
                                        </p>
                                        <p class="form-row form-row-first validate-required validate-email"
                                            id="billing_email_field">
                                            <label for="billing_email">E-mail
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input value="@if(old('Email')){{old('Email')}}@elseif (isset($formData) && isset($formData['Email'])) {{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }} @endif" class="input-text" type="Email"
                                                id="Email" name="Email" required />
                                        </p>
                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required ecommerce-validated"
                                            id="billing_country_field">
                                            <label for="billing_country">
                                                {!! trans('naturatherapy/global.country') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <select class="country_to_state country_select" id="Country" name="Country"
                                                required>
                                                @foreach ($all_countries as $ac)
                                                    <option @if (isset($country) && $country->id == $ac['id']) selected
                                                    @elseif($ac['id'] == 1)
                                                        selected @endif value="{{ $ac['id'] }}">
                                                        {{ $ac['country_name_en'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide address-field validate-required"
                                            id="billing_city_field"
                                            data-o_class="form-row form-row-wide address-field validate-required">
                                            <label for="billing_city">{!! trans('naturatherapy/global.city') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <select required id="City" class="country_to_state country_select" name="City">
                                                <option value="">-- {!! trans('naturatherapy/global.city') !!} --</option>
                                                <?php if (App::getLocale() == 'al') {
                                                    $city_name = 'city_name';
                                                } else {
                                                    $city_name = 'city_name_en';
                                                } ?>
                                                @foreach ($all_cities as $city)
                                                    @if ($city->id != 35)
                                                        <option @if (isset($user->city_id_shipping) && $user->city_id_shipping == $city->id) selected @endif value="{{ $city->id }}"
                                                            data-name="{{ $city->$city_name }}"
                                                            data-zip="{{ $city->zip }}">
                                                            {{ $city->$city_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </p>
                                        <p
                                            class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field">
                                            <label for="billing_address_1">{!! trans('naturatherapy/global.address') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input value="@if(old('Address')){{old('Address')}}@elseif (isset($formData) && isset($formData['Address'])) {{ $formData['Address'] }}@else{{ isset($user) ? $user->address_shiping : '' }} @endif" class="input-text" type="text"
                                                id="Address" name="Address" placeholder="{!! trans('naturatherapy/global.address') !!}"
                                                required />
                                        </p>
                                        <p class="form-row form-row-last validate-required validate-phone"
                                            id="billing_phone_field">
                                            <label for="billing_phone">
                                                {!! trans('naturatherapy/global.phone_number') !!}
                                                <abbr class="required"
                                                    style="text-decoration: none; border-bottom: none;"
                                                    title="Задолжително">*</abbr>
                                            </label>
                                            <input required minlength="9" value="@if(old('Telephone')){{old('Telephone')}}@elseif (isset($formData) && isset($formData['Telephone'])) {{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }} @endif"
                                                class="input-text" type="text" id="Telephone" name="Telephone"
                                                placeholder="{!! trans('naturatherapy/global.phone_number') !!}*" />
                                        </p>
                                        <p class="form-row notes ecommerce-validated" id="order_comments_field">
                                            <label for="order_comments">
                                                {!! trans('naturatherapy/global.comment') !!}</label>
                                            <textarea rows="4" class="input-text" id="confirm_comment" placeholder="
                        {!! trans('naturatherapy/global.enter_comment') !!}..." name="comments"></textarea>
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
                                            <h2 class="heading uppercase bottom-line full-grey">{!! trans('naturatherapy/global.delivery') !!}
                                            </h2>
                                            <ul class="payment_methods methods">
                                                <p class="p_paying">{!! trans('naturatherapy/global.type_of_delivery') !!}</p>
                                                <li class="payment_method_paypal">
                                                    <select class="country_to_state country_select" id="type_delivery"
                                                        name="type_delivery">
                                                        <option value="cargo" @if (isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery'] === 'cargo')
                                                        checked="selected" @else
                                                            selected="selected" @endif>
                                                            Cargo</option>
                                                    </select>
                                                </li>
                                            </ul>
                                            <ul class="payment_methods methods">
                                                <p class="p_paying">{!! trans('naturatherapy/global.payment_method') !!}</p>
                                                @foreach (\EasyShop\Models\AdminSettings::getField('paymentMethods') as $key => $i)
                                                    <li class="payment_method_bacs d-flex">
                                                        <input style="margin-top: 0; margin-right: 10px;"
                                                            class="input-radio" type="radio" @if ($key == 'Credit/Debit card') checked="true" @endif
                                                            name="paymentType" id="{{ $i["name"] }}"
                                                            value="{{ $i["name"] }}" @if (isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $i["name"])
                                                        checked="checked"
                                                @endif
                                                @if (!isset($formData) && $i["name"] === 'halk') checked="checked"
                                                @endif />
                                                <label for="payment_method_bacs">
                                                    {{ $i["display_name"] }}
                                                </label>
                                                <div class="payment_box payment_method_bacs" style="display: none;">
                                                </div>
                                                </li>
                                                @endforeach

                                            </ul>
                                            <input data-pay-button value="{!! trans('naturatherapy/global.order') !!}"
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

                if (paymentType === 'halk') {
                    $form.attr('action', $form.data('card-action'));

                    $.ajax({
                        url: $('meta[name="locale"]').attr('content') + 'checkout/generate',
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
                            console.log(result);
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

                                console.log($form.serialize());
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
