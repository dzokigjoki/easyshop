@extends('clients.dobra_voda.layouts.default')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')

    <style>
        .nowrap {
            white-space: nowrap;
        }

        .scroll-xs {
            overflow-y: auto;
        }

        .font-normal {
            font-weight: normal !important;
        }

    </style>
    <div class="content-container">
        <div class="container">
            <div class="row pb-30">
                <div class="col-md-12 pt-30 main-wrap">
                    <h2 style="margin: 0 0 35px 0;" class="text-left custom_heading">Кошничка</h2>
                </div>
                <div class="scroll-xs flex_100 pb-30 col-md-8 main-wrap">
                    <div class="main-content">
                        <div class="shop">
                            <table class="table shop_table cart">
                                <thead>
                                    <tr>

                                        <th class="product-thumbnail ">&nbsp;</th>
                                        <th class="product-name">Производ</th>
                                        <th class="product-quantity text-center">Пакување</th>
                                        <th class="product-price text-right">Цена</th>
                                        <th class="product-quantity text-center">Количина</th>
                                        <th class="product-subtotal text-right ">Вкупно</th>
                                        <th class="product-remove ">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="{{ $product->url }}">
                                                    <img style="width: 80px;" width="100" class="img img-responsive" @if ($product->image) src="{{ $product->image }}" alt="{{ $product->title }}"
                                            @else
                                                                    src="{{ url_assets('/herline/images/product/product-1.jpg') }}" @endif />
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ $product->url }}">{{ $product->title }}</a>
                                                {{-- <dl class="variation">
                                                <dt class="variation-Color"></dt>
                                                <dd class="variation-Color"><p></p></dd>
                                                <dt class="variation-Size"></dt>
                                                <dd class="variation-Size"><p></p></dd>
                                            </dl> --}}
                                            </td>
                                            <td class="text-center">
                                                @if (!is_null($product->package))

                                                    @if (str_contains(mb_strtolower($product->title), 'лименка'))
                                                        {{ $product->package }}
                                                        лименки
                                                    @else
                                                        {{ $product->package }}
                                                        @if ($product->package == 1)
                                                            шише
                                                        @else
                                                            шишиња
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="product-price text-right">
                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                    <span style="white-space: nowrap"
                                                        class="amount nowrap">{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                                        мкд.</span>
                                                    <br>
                                                    <del>
                                                        <span style="white-space: nowrap"
                                                            class="amount nowrap">{{ number_format($product->cena, 0, ',', '.') }}
                                                            мкд.</span>
                                                    </del>
                                                @else
                                                    <span
                                                        class="amount nowrap">{{ number_format($product->cena, 0, ',', '.') }}
                                                        мкд.</span>
                                                @endif
                                            </td>
                                            <?php $productVariations = explode('_', $product->variation); ?>
                                            <td class="product-quantity text-center">
                                                <div class="quantity">
                                                    <input table-shopping-qty="" class="input-text qty text" @if (!empty($product->variation)) data-cart-index="{{ $product->id }},{{ $product->variation }}"
                                                                    data-variation="{{ $product->variation }}" @endif
                                                        max="{{ $product->total_stock }}" data-id="{{ $product->id }}"
                                                        type="_" value="{{ $product->quantity }}" />
                                                </div>
                                            </td>
                                            <td class="nowrap product-subtotal text-right">
                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                    <?php
                                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                    ?>
                                                    <span class="amount">{{ number_format($product->quantity * $product->cena, 0, ',', '.') }}
                                                        мкд.</span>
                                                @else
                                                    <span class="amount">{{ number_format($product->quantity * $product->cena, 0, ',', '.') }}
                                                        мкд.</span>
                                                @endif
                                            </td>

                                            <td class="product-remove">
                                                <a @if ($product->variation) href="{{ URL::to('cart/remove/') }}/{{ $product->id }}/{{ $product->id . ',' . $product->variation }}"
                                            @else
                                                                    href="{{ URL::to('cart/remove/') }}/{{ $product->id }}" @endif
                                                    class="remove" title="Remove this item">&times;</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="zabeleski text-center">Потребна е минимална нарачка од 600 денари</p>
                            <div class="cart-collaterals row">
                                <?php $totalPrice = 0; ?>
                                @foreach ($products as $product)
                                    <?php $totalPrice = $totalPrice + $product->cena * $product->quantity; ?>

                                    <?php
                                    if ($totalPrice <= 800) {
                                        $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                                    } else {
                                        $cargoPrice = 0;
                                    }
                                    ?>
                                @endforeach
                                <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                @if (empty($coupons))
                                    <div class="col-sm-6 coupon-all">
                                        <div class="coupon">
                                            <input id="promo_code" class="input-text" name="coupon_code" placeholder="Купон"
                                                type="text">
                                            <input class="button mt-xxs-30" id="coupon-check" button-coupon-check
                                                value="Провери купон" type="submit">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-6">
                                        <h2 class="coupon-label">
                                            Внесен купон
                                        </h2>
                                        <input type="hidden" id="promocodename" value="1">
                                    </div>

                                @endif
                                <div class="cart_totals col-sm-6">
                                    <table>
                                        <tr class="order-total">
                                            <th class="align-left">
                                                <h2>Вкупно</h2>
                                            </th>
                                            <td class="w-25"><strong><span class="amount"
                                                        style="margin-bottom: .5rem;">{{ number_format($priceWithDelivery, 0, ',', '.') }}
                                                        мкд.</span></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 25px;">
                                <div class="col-md-12">

                                    <span data-coupon-check class="w-100" style="display: block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 flex_100 main-wrap">
                    <h5 class="pb-10 text-center">Детали за вашата нарачка</h5>
                    <div class="main-content">
                        <div class="shop">
                            <form data-form="" id="checkoutForm" method="POST" class="contact-form"
                                data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                                data-cash-action="{{ route('checksum.generate') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>Име*<br />
                                            <p class="form-control-wrap your-name">
                                                <input type="text" id="FirstName" name="FirstName" class="form-control text"
                                                    value="@if (old('FirstName')) {{ old('FirstName') }}@elseif(isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }} @endif" required />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>Презиме*<br />
                                            <p class="form-control-wrap your-name">
                                                <input type="text" id="LastName" name="LastName" class="form-control text"
                                                    value="@if (old('LastName')) {{ old('LastName') }}@elseif(isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }} @endif" required />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>Е- пошта*<br />
                                            <p class="form-control-wrap your-email">
                                                <input value="@if (old('Email')) {{ old('Email') }}@elseif(isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }} @endif" class="form-control text" type="email" id="Email"
                                                    name="Email" required />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>Телефон*<br />
                                            <p class="form-control-wrap your-email">
                                                <input required value="@if (old('Telephone')) {{ old('Telephone') }}@elseif(isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }} @endif" class="form-control text" type="text" id="Telephone"
                                                    name="Telephone" />
                                            </p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="AmountToPay" value="{{ $totalPrice * 100 }}" />
                                    <input type="hidden" name="AmountCurrency" value="MKD" />
                                    <input type="hidden" name="Details1" value="{{ env('CLIENT') }}-Order" />
                                    <input type="hidden" name="PayToMerchant"
                                        value="{{ \EasyShop\Models\AdminSettings::getField('merchantId')}}" />
                                    <input type="hidden" name="MerchantName"
                                        value="{{ \EasyShop\Models\AdminSettings::getField('merchantName') }}" />
                                    <input type="hidden" name="PaymentOKURL" value="{{ route('checkout.success') }}" />
                                    <input type="hidden" name="PaymentFailURL" value="{{ route('checkout.fail') }}" />
                                    <input type="hidden" name="OriginalAmount" value="{{ $totalPrice }}" />
                                    <input type="hidden" name="OriginalCurrency" value="MKD" />
                                    <input type="hidden" class="form-control text" name="Country" value="1">
                                    <input type="hidden" class="form-control text" name="City" value="27">

                                    <div class="col-sm-6">
                                        <div>Држава*<br />
                                            <p class="form-control-wrap your-name">
                                                <input type="text" class="form-control text" readonly value="Македонија">
                                            </p>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div>Град*<br />
                                            <p class="form-control-wrap your-name">
                                                <input type="text" class="form-control text" readonly value="Скопје">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>Адреса*<br />
                                            <p class="form-control-wrap your-name">
                                                <input value="@if (old('Address')) {{ old('Address') }}@elseif(isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address_shiping : '' }} @endif" class="form-control text" type="text" id="Address"
                                                    name="Address" required />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>Населба*<br />
                                            <p class="form-control-wrap your-name">
                                                <select class="form-control" id="municipality" name="municipality" required>

                                                    <option value="Центар">Центар
                                                    </option>
                                                    <option value="Аеродром">Аеродром
                                                    </option>
                                                    <option value="Карпош">Карпош
                                                    </option>
                                                    <option value="Кисела Вода">Кисела Вода
                                                    </option>
                                                    <option value="Чаир">Чаир
                                                    </option>
                                                    <option value="Шуто Оризари">Шуто Оризари
                                                    </option>
                                                    <option value="Бутел">Бутел
                                                    </option>
                                                    <option value="Гази Баба">Гази Баба
                                                    </option>
                                                    <option value="Ѓорче Петров">Ѓорче Петров
                                                    </option>
                                                    <option value="Сарај">Сарај
                                                    </option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="zabeleski text-center">Нарачките може да се направат само за
                                            горенадевените општини</p>

                                    </div>
                                    <div class="col-sm-12">
                                        <div>Забелешки<br />
                                            <p class="form-control-wrap your-email">
                                                <textarea rows="4" class="form-control text" id="confirm_comment"
                                                    name="comments"></textarea>
                                            </p>
                                        </div>
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
                                    <input type="hidden" name="lang" value="en" />
                                    <input type="hidden" name="refreshtime" value="0" />
                                    <input type="hidden" name="encoding" value="UTF-8">


                                    <div class="col-md-12">
                                        <p class="form-control-wrap your-name"></p>
                                        <div style="display:flex; align-items:center;">Начин на плаќање: <br>
                                            @foreach (\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                <input style="margin-top:0; margin-left: 10px;" type="radio"
                                                    checked="checked" name="paymentType" value="{{ $i['name'] }}" @if (isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $i['name']) checked="checked" @endif @if (!isset($formData) && $i['name'] === 'casys')
                                                checked="checked"
                                            @endif />
                                            <span @if ($i['name'] == 'casys') class="" @endif
                                                style="margin-left: 10px; line-height:30px;">{{ $i['display_name'] }}</span><br>
                                            @endforeach
                                        </div>
                                    </div>
                            </form>
                            <div class="col-md-12 mt-10 pb-35 pt-15">
                                <p class="form-control-wrap order_button">
                                    <button type="submit" data-pay-button class="form-control submit text-white">Нарачај</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve'
            });

            var firstName = $("input[name='FirstName']").val();
            var lastName = $("input[name='LastName']").val();
            var email = $("input[name='Email']").val();
            var telephone = $("input[name='Telephone']").val();
            var municipality = $("select[name='municipality']").val();
            var country = $("select[name='Country']").val();
            var city = $("[name='City']").val();
            var address = $("input[name='Address']").val();

            if (firstName == "" || lastName == "" || email == "" || telephone == "" || municipality == "" ||
                country == "" || address == "") {
                canSubmit = false;
            } else {
                canSubmit = true;
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
                var municipality = $("select[name='municipality']").val();
                var country = $("select[name='Country']").val();
                var city = $("[name='City']").val();
                var address = $("input[name='Address']").val();


                if (firstName == "" || lastName == "" || email == "" || telephone == "" || municipality ==
                    "" || country == "" || address == "") {
                    canSubmit = false;
                } else {
                    canSubmit = true;
                }

                if (canSubmit == true) {
                    $('[data-pay-button]').attr('disabled', false);
                } else {
                    $('[data-pay-button]').attr('disabled', true);
                }
            });

            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');


            $('[data-payment-type]').on('click', function() {
                console.log($(this).val());
            });

            $button.on('click', function(event) {

                var paymentType = $('[name=paymentType]:checked').val();
                if ($("input[name='OriginalAmount']").val() < 600 && ! $("#promocodename").val() == 1) {
                    toastr.error("Потребна е минимална нарачка од 600 денари");
                    return;
                }
                if (paymentType === 'casys') {

                    $form.attr('action', $form.data('cpay-action'));
                    $.ajax({
                        url: 'checkout/generate',
                        method: 'POST',
                        data: {
                            'FirstName': $("input[name='FirstName']").val(),
                            'LastName': $("input[name='LastName']").val(),
                            'Email': $("input[name='Email']").val(),
                            'Telephone': $("input[name='Telephone']").val(),
                            'municipality': $("select[name='municipality']").val(),
                            'Country': $("input[name='Country']").val(),
                            'City': $("input[name='City']").val(),
                            'Zip': $("input[name='Zip']").val(),
                            'Address': $("input[name='Address']").val(),
                            'AmountToPay': $("input[name='AmountToPay']").val(),
                            'AmountCurrency': $("input[name='AmountCurrency']").val(),
                            'Details1': $("input[name='Details1']").val(),
                            'PayToMerchant': $("input[name='PayToMerchant']").val(),
                            'MerchantName': encodeURIComponent($("input[name='MerchantName']")
                                .val()),
                            'OriginalAmount': $("input[name='OriginalAmount']").val(),
                            'OriginalCurrency': $("input[name='OriginalCurrency']").val(),
                            'PaymentOKURL': $("input[name='PaymentOKURL']").val(),
                            'PaymentFailURL': $("input[name='PaymentFailURL']").val(),
                            'type_delivery': $("input[name='type_delivery']:checked").val(),
                            'paymentType': $("input[name='paymentType']:checked").val()

                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(result) {
                            if (result.status === 'success') {



                                @if (\EasyShop\Models\AdminSettings::getField('pixelCode'))
                                    fbq('track', 'InitiateCheckout', {
                                    value: result.totalPrice,
                                    currency: window.ES.facebook_pixels_currency,
                                    num_items: result.productIds.length,
                                    content_ids: result.productIds,
                                    content_type: 'product'
                                    });
                                @endif

                                $("input[name='FirstName']").remove();
                                $("input[name='LastName']").remove();
                                $("input[name='Email']").remove();
                                $("input[name='Telephone']").remove();
                                $("select[name='municipality']").remove();
                                $("input[name='Country']").remove();
                                $("input[name='City']").remove();
                                $("input[name='Zip']").remove();
                                $("input[name='Address']").remove();
                                $("input[name='type_delivery']").remove();
                                $("input[name='paymentType']").remove();
                                $("input[name='Details2']").remove();
                                $("input[name='CheckSumHeader']").remove();
                                $("input[name='CheckSum']").remove();
                                $("input[name='AmountToPay']").remove();
                                $("input[name='OriginalAmount']").remove();

                                $form.append('<input type="hidden" name="Details2" value="' +
                                    result.documentId + '" />');
                                $form.append(
                                    '<input type="hidden" name="CheckSumHeader" value="' +
                                    result.header + '" />');
                                $form.append('<input type="hidden" name="CheckSum" value="' +
                                    result.checksum + '" />');
                                $form.append('<input type="hidden" name="AmountToPay" value="' +
                                    result.totalPriceFull + '" />');
                                $form.append(
                                    '<input type="hidden" name="OriginalAmount" value="' +
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
    </script>

@stop
