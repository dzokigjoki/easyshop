@extends('clients.david_kompjuteri.layouts.default')
@section('content')






    <body class="relative">
        <main class="main-wrapper">

            <header class="nav-type-1">

                <!-- Fullscreen search -->
                <div class="search-wrap">
                    <div class="search-inner">
                        <div class="search-cell">
                            <form method="get">
                                <div class="search-field-holder">
                                    <input type="search" class="form-control main-search-input" placeholder="Search for">
                                    <i class="ui-close search-close" id="search-close"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end fullscreen search -->




                <!-- Page Title -->
                <section class="page-title text-center bg-light">
                    <div class="container relative clearfix">
                        <div class="title-holder">
                            <div class="title-text">
                                <h1 class="uppercase">Кошничка</h1>

                            </div>
                        </div>
                    </div>
                </section>

                <div class="content-wrapper oh">

                    <!-- Cart -->
                    <section class="section-wrap shopping-cart">
                        <div class="container relative">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="table-wrap mb-30">
                                        <table class="shop_table cart table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name" colspan="2">Производ</th>
                                                    <th class="product-price">Цена</th>
                                                    <th class="product-quantity">Количина</th>
                                                    <th class="product-subtotal" colspan="2">Вкупно</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($products as $product)


                                                    <tr class="cart_item">
                                                        <td class="product-thumbnail">
                                                            <a href="{{ $product->url }}">
                                                                <img src="{{ $product->image }}" alt="">
                                                            </a>
                                                        </td>
                                                        <td class="product-name">
                                                            <a href="{{ $product->url }}"> {{ $product->title }} </a>

                                                        </td>
                                                        <td class="product-price">
                                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                <?php
                                                                $discount = \EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                                $discountPercentage = (($product->price_retail_1 - $discount) / $product->price_retail_1) * 100;
                                                                ?>
                                                                <del>
                                                                    <span>{{ number_format($product->price_retail_1, 0, ',', '.') }}МКД</span>
                                                                </del>
                                                                <br>
                                                                <div>
                                                                    <span
                                                                        class="amount">{{ $discount }}МКД</span>
                                                                </div>
                                                            @else

                                                                <span
                                                                    class="amount">{{ number_format($product->price_retail_1, 0, ',', '.') }}
                                                                    МКД</span>

                                                            @endif
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                <input table-shopping-qty="" class="input-text qty text"
                                                                    max="1000" data-id="{{ $product->id }}" type="_"
                                                                    value="{{ $product->quantity }}" />

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
                                                        <td class="product-subtotal">
                                                            <span class="amount">
                                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                    <?php
                                                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                                    if ($discount > $product->cena) {
                                                                        $discount = $product->cena;
                                                                    }
                                                                    ?>
                                                                    {{ $product->quantity * $discount }}
                                                                    ден.
                                                                @else
                                                                    {{ $product->quantity * $product->cena }} ден.
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="product-remove">
                                                            <a href="/cart/remove/{{ $product->id }}"
                                                                class="remove" title="Remove this item">
                                                                <i class="ui-close"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="coupon">
                                                <!--    <input type="text" name="coupon_code" id="coupon_code" class="input-text form-control" value placeholder="Купон за код"> -->
                                                <!--    <input type="submit" name="apply_coupon" class="btn btn-lg btn-stroke" value="Внеси"> -->
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="actions">
                                                <input type="submit" class="btn btn-lg btn-dark" id="click"
                                                    value="Продолжи кон наплата">

                                                <br />


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <section class="section-wrap checkout pb-20">

                            <div class="container relative">
                                <div class="row">

                                    <div class="ecommerce col-xs-12">



                                        <form data-form="" id="checkoutForm" method="POST" name="checkout"
                                            class="checkout ecommerce-checkout row"
                                            data-cash-action="{{ route('checksum.generate') }}">
                                            {{ csrf_field() }}

                                            <div class="col-md-12">
                                                <h2 id="bot" class="heading uppercase bottom-line full-grey mb-30">Детали за
                                                    нарачка</h2>

                                            </div>

                                            <div class="col-md-7" id="customer_details">
                                                <div>
                                                    <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                                        id="billing_first_name_field">
                                                        <label for="FirstName">Име
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <input type="text" class="input-text" placeholder="Име"
                                                            value="@if (isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }}@endif" name="FirstName"
                                                            id="FirstName">
                                                    </p>
                                                    <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                                        id="billing_last_name_field">
                                                        <label for="LastName">Презиме
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <input type="text" class="input-text" placeholder="Презиме"
                                                            value="@if (isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }}@endif" name="LastName" id="LastName">
                                                    </p>


                                                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required ecommerce-validated"
                                                        id="billing_country_field">
                                                        <label for="billing_country">Држава
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <select name="Country" id="Country"
                                                            class="country_to_state country_select" title="Country *">
                                                            <?php $all_countries = [$all_countries[0]]; // For now only Macedonia
                                                            ?>
                                                            @foreach ($all_countries as $ac)
                                                                <option @if (isset($user->country_id_shipping) && $user->country_id_shipping == $ac->id)
                                                                    selected
                                                                @elseif($ac->id == 1)
                                                                    selected
                                                            @endif
                                                            value="{{ $ac->id }}">{{ $ac->country_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </p>


                                                    <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field"
                                                        id="billing_address_1_field">
                                                        <label for="Address">Адреса
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <input type="text" class="input-text" placeholder="Адреса"
                                                            value="@if (isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address_shiping : '' }}@endif" name="Address" id="Address">
                                                    </p>



                                                    <p class="form-row form-row-wide address-field validate-required"
                                                        id="billing_city_field"
                                                        data-o_class="form-row form-row-wide address-field validate-required">
                                                        <label for="billing_city">Град
                                                            <abbr class="required"
                                                                style="text-decoration: none; border-bottom: none;"
                                                                title="Задолжително">*</abbr>
                                                        </label>
                                                        <select required id="City" class="country_to_state country_select"
                                                            name="City">
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





                                                    <p class="form-row form-row-first validate-required validate-email"
                                                        id="billing_email_field">
                                                        <label for="Email">Е-пошта
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <input type="text" class="input-text" placeholder="Е-пошта"
                                                            value="@if (isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }}@endif" name="Email" id="Email">
                                                    </p>

                                                    <p class="form-row form-row-last validate-required validate-phone"
                                                        id="billing_phone_field">
                                                        <label for="Telephone">Телефон
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        <input type="text" class="input-text" placeholder="Телефон"
                                                            value="@if (isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }}@endif" name="Telephone"
                                                            id="Telephone">
                                                    </p>

                                                    <div class="clear"></div>

                                                </div>


                                                <div class="clear"></div>

                                                <div>

                                                    <p class="form-row notes ecommerce-validated" id="order_comments_field">
                                                        <label for="order_comments">Коментар</label>
                                                        <textarea name="confirm_comment" class="input-text"
                                                            id="confirm_comment" rows="2" cols="6"></textarea>
                                                    </p>
                                                </div>

                                                <div class="clear"></div>

                                            </div> <!-- end col -->

                                            <!-- Your Order -->
                                            <div class="col-md-5">
                                                <div class="order-review-wrap ecommerce-checkout-review-order"
                                                    id="order_review">
                                                    <h2 class="heading uppercase bottom-line full-grey">Вашата нарачка</h2>
                                                    <table class="table shop_table ecommerce-checkout-review-order-table">
                                                        <tbody>

                                                            <?php $totalPrice = 0; ?>
                                                            @foreach ($products as $product)

                                                                <?php
                                                                if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                                                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                                    if ($discount > $product->cena) {
                                                                        $discount = $product->cena;
                                                                    }
                                                                    $totalPrice = $totalPrice + $discount * $product->quantity;
                                                                } else {
                                                                    $totalPrice = $totalPrice + $product->cena * $product->quantity;
                                                                }
                                                                ?>

                                                                <?php
                                                                if ($totalPriceForDelivery <= 1200) {
                                                                    $cargoPrice = config('clients.' . config('app.client') . '.type_delivery.cargo.price');
                                                                } else {
                                                                    $cargoPrice = 0;
                                                                }
                                                                ?>
                                                            @endforeach
                                                            <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                                            <tr class="cart-subtotal">
                                                                <th>Вкупно без достава</th>
                                                                <td>
                                                                    <span class="amount">{{ $totalPrice }}
                                                                        МКД</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="shipping">
                                                                <th>Достава</th>
                                                                <td>
                                                                    @if ($cargoPrice)
                                                                        {{ $cargoPrice }} МКД
                                                                    @else
                                                                        <span>Бесплатна достава</span>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th><strong>Вкупно</strong></th>
                                                                <td>
                                                                    <strong><span
                                                                            class="amount">{{ $priceWithDelivery }}
                                                                            МКД</span></strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div id="payment" class="ecommerce-checkout-payment">
                                                        <h2 class="heading uppercase bottom-line full-grey">Начин на
                                                            плаќање</h2>
                                                        <ul class="payment_methods methods">
                                                           <!--nacin na plakjanje -->
                                                            {{-- @foreach (\EasyShop\Models\AdminSettings::getField('paymentMethods') as $key => $paymentM)
                                                                <li class="payment_method_bacs d-flex">
                                                                    <input style="margin-top: 0; margin-right: 10px;"
                                                                        class="input-radio" type="radio"
                                                                        @if ($key == 'Картичка')checked="true" @endif name="paymentType"
                                                                        id="{{ $paymentM['name'] }}"
                                                                        value="{{ $paymentM['name'] }}"
                                                                        @if (isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $paymentM['name']) checked="checked" @endif @if (!isset($formData) && $paymentM['name'] === 'halk')
                                                                    checked="checked"
                                                            @endif />
                                                            <label for="payment_method_bacs">
                                                                {{ $paymentM['display_name'] }}
                                                            </label>
                                                            <div class="payment_box payment_method_bacs"
                                                                style="display: none;">
                                                            </div>
                                                            </li>
                                                            @endforeach --}}


                                                        </ul>
                                                        <div class="form-row place-order" id="order-button">
                                                            <button type="button" class="btn btn-lg w-50" disabled
                                                                data-pay-button id="submit-contact">Нарачај</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end order review -->
                                        </form>

                                    </div> <!-- end ecommerce -->

                                </div> <!-- end row -->
                            </div> <!-- end container -->
                        </section> <!-- end checkout -->





                </div> <!-- end container -->
                </section> <!-- end cart -->






                <div id="back-to-top">
                    <a href="#top"><i class="fa fa-angle-up"></i></a>
                </div>

                </div> <!-- end content wrapper -->
        </main> <!-- end main wrapper -->
    </body>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {

            $("#proceed").click(function() {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#elementtoScrollToID").offset().top - 75
                }, 1000);
            });

            if ($("input[name='FirstName']").val() == "" || $("input[name='LastName']").val() == "" ||
                $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $(
                    "select[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
                canSubmit = false;
            } else {
                canSubmit = true;
            }
            if (canSubmit == true) {
                $('[data-pay-button]').attr('disabled', false);
            } else {
                $('[data-pay-button]').attr('disabled', true);
            }

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
                $("[data-coupon-check]").html(sessionStorage.getItem("promo_code"));

                $("input[name='paymentType']:checked").removeAttr("checked");
                $("input[name='paymentType'][value=" + sessionStorage.getItem("old_paymentType") + "]").prop(
                    'checked', true);
            }

            sessionStorage.removeItem("promo_code");

            if ($("input[name='FirstName']").val() == "" || $("input[name='LastName']").val() == "" ||
                $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $(
                    "select[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
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
                var country = $("select[name='Country']").val();
                var city = $("select[name='City']").val();
                var address = $("input[name='Address']").val();

                if (firstName == "" || lastName == "" || email == "" || telephone == "" || country == "" ||
                    address == "") {
                    canSubmit = false;
                } else {
                    canSubmit = true;
                }

                if (canSubmit == true) {
                    $('[data-pay-button]').attr('disabled', false);
                } else {
                    $('[data-pay-button]').attr('disabled', true);
                }
            })

            $button.on('click', function(event) {

                var paymentType = $('[name=paymentType]:checked').val();
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
                            'Country': $("select[name='Country']").val(),
                            'City': $("[name='City']").val(),
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
                            'type_delivery': $("input[name='type_delivery']").val(),
                            'paymentType': $("input[name='paymentType']:checked").val()

                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(result) {
                            if (result.status === 'success') {

                                @if (config('clients.' . config('app.client') . '.pixel.codes'))
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
                                $("select[name='Country']").remove();
                                $("[name='City']").remove();
                                $("input[name='Zip']").remove();
                                $("input[name='Address']").remove();
                                $("input[name='type_delivery']").remove();
                                $("input[name='paymentType']").remove();
                                $("input[name='Details2']").remove();
                                $("input[name='CheckSumHeader']").remove();
                                $("input[name='CheckSum']").remove();
                                $("input[name='AmountToPay']").remove();
                                $("input[name='OriginalAmount']").remove();
                                $("textarea[name='comments']").remove();

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
                                toastr.error("Продуктите " + result.productNames +
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
