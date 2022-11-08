@extends('clients.sofu.layouts.default')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')

<section class="page-banner">
    <h2 class="page-title">Кошничка</h2>
</section>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="section-shopping-cart">
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-content content-page">
                        <div class="woocommerce">

                            <table class="shop_table cart" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Продукт</th>
                                        <th class="product-price">Цена</th>
                                        <th class="product-quantity">Количина</th>
                                        <th class="product-name">Големина</th>
                                        <th class="product-subtotal">Вкупно</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a @if($product->variation)
                                                href="{{URL::to('cart/remove/')}}/{{$product->id}}/{{$product->id.','.$product->variation}}"
                                                @else
                                                href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                                                @endif
                                                class="remove"
                                                title="Remove this item">&times;</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="{{ $product->url }}">
                                                <img style="width: 80px;" width="100" class="img img-responsive" @if($product->image)
                                                src="{{$product->image}}" alt="{{ $product->title }}"
                                                @else
                                                src="{{ url_assets('/herline/images/product/product-1.jpg')}}"
                                                @endif
                                                />
                                        </td>
                                        <td data-title="Product" class="product-name">
                                            <a href="">{{ $product->title }}</a>
                                        </td>
                                        <td data-title="Price" class="product-price">
                                            <span class="amount">@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                <span style="white-space: nowrap" class="amount nowrap">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    мкд.</span>
                                                <br>
                                                <del>
                                                    <span style="white-space: nowrap" class="amount nowrap">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        мкд.</span>
                                                </del>
                                                @else
                                                <span class="amount nowrap">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    мкд.</span>
                                                @endif</span>
                                        </td>
                                        <?php $productVariations = explode('_', $product->variation); ?>

                                        <td class="product-quantity">
                                            <div class="quantity">
                                                <input type="button" onclick="var qty_el = document.getElementById('qty-{{ $product->id }}'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty > 0) qty_el.value--;return false;" class="minus" value="-">


                                                <input table-shopping-qty="" class="input-text qty text" @if(!empty($product->variation))
                                                data-cart-index="{{$product->id}},{{$product->variation}}"
                                                data-variation="{{$product->variation}}"
                                                @endif
                                                max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_"
                                                value="{{ $product->quantity }}" />


                                                <input type="button" onclick="var qty_el = document.getElementById('qty-{{ $product->id }}'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" class="plus" value="+">

                                            </div>
                                        </td>
                                        <td data-title="Price" class="product-price">
                                            <span class="amount"><?php $allVariations = $product->variationValuesAndIds()->pluck('id')->toArray() ?>
                                                @if(!$product->variationValuesAndIds()->isEmpty())
                                                <?php $variations = $product->variationValuesAndIds()->groupBy('name') ?>
                                                @foreach($variations as $key => $value)
                                                <label class="font-normal" for="{{ $product->id }}">{{ $key }}
                                                    <?php $explodedVariations = explode('_', $product->variation) ?>
                                                    @foreach($value as $v)
                                                    @if(in_array($v['id'], $explodedVariations))
                                                    - <strong>{{ $v['value'] }}</strong>
                                                    @endif
                                                    @endforeach
                                                </label>
                                                @endforeach
                                                @endif</span>
                                        </td>
                                        <td data-title="Subtotal" class="product-subtotal">
                                            <span class="amount">@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                <?php
                                                $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                ?>
                                                <span class="amount">{{$product->quantity * $product->cena}} мкд.</span>
                                                @else
                                                <span class="amount">{{$product->quantity * $product->cena}} мкд.</span>
                                                @endif</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(empty($coupons))
                            <div class="coupon">
                                <input type="text" id="promo_code" name="promo" class="input-text form-control" value placeholder="Купон за попуст">
                                <input type="submit" id="coupon-check" button-coupon-check class="btn btn-lg btn-stroke" value="Провери">
                                <span id="span-coupon-check" data-coupon-check class="w-100" style="display: block"></span>
                            </div>
                            @else
                            <div class="coupon">
                                <h5 style="padding: 10px 20px;" class="alert-success">Внесен купон</h5>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="section-checkout container">
            <div class="row">

                <div class="entry-content content-page">
                    <div class="woocommerce">
                        <form data-form="" id="checkoutForm" method="POST" class="checkout wc-checkout" data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/" data-cash-action="{{route('checksum.generate')}}">
                            {{ csrf_field() }}
                            <div class="col-md-8 p_0_details" id="customer_details">
                                <div class="col-1">
                                    <div class="nr-billing-fields">
                                        <h3>Детали за нарачката</h3>
                                        <p class=" form-row form-row-first " id="billing_first_name_field">
                                            <label class="">Име <abbr class="required">*</abbr></label>
                                            <input type="text" id="FirstName" name="FirstName" class="input-text" value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" required />
                                        </p>
                                        <p class=" form-row form-row-last " id="billing_last_name_field">
                                            <label class="">Презиме <abbr class="required">*</abbr></label>
                                            <input type="text" id="LastName" name="LastName" class="input-text" value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif" required />
                                        </p>
                                        <div class="clear"></div>
                                        <p class=" form-row form-row-first  validate-email" id="billing_email_field">
                                            <label class="">Е-Пошта <abbr class="required">*</abbr></label>
                                            <input value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" class="input-text" type="email" id="Email" name="Email" required />
                                        </p>
                                        <p class=" form-row form-row-last  validate-phone" id="billing_phone_field">
                                            <label class="">Телефонски број <abbr class="required">*</abbr></label>
                                            <input required value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" class="input-text" type="text" id="Telephone" name="Telephone" />
                                        </p>
                                        <div class="clear"></div>
                                        <p class=" form-row form-row-first  validate-email" id="billing_email_field">
                                            <label class="">Град <abbr class="required">*</abbr></label>
                                            <div class="variations">
                                                <select required class="form-control select2" name="City">
                                                    <option value="">-- Град --</option>
                                                    @foreach($all_cities as $city)
                                                    @if($city->id != 35)
                                                    <option @if(isset($user->city_id_shipping) && $user->city_id_shipping == $city->id)
                                                        selected
                                                        @endif
                                                        value="{{$city->id}}"
                                                        data-name="{{$city->city_name}}"
                                                        data-zip="{{$city->zip}}">
                                                        {{$city->city_name}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </p>
                                        <p class=" form-row form-row-wide address-field " id="billing_address_1_field">
                                            <label class="">Адреса <abbr class="required">*</abbr></label>
                                            <input value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address_shiping : ''}}@endif" class="input-text" type="text" id="Address" name="Address" required />
                                            <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p_0_details">
                                <div class="nr-order-review">
                                    <h3 id="order_review_heading">Вашата Нарачка</h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <?php $totalPrice = 0; ?>
                                                @foreach($products as $product)

                                                <?php
                                                if( \EasyShop\Models\Product::hasDiscount( $product->discount ) ) {
                                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                if($discount > $product->cena){
                                                    $discount = $product->cena;
                                                }
                                                $totalPrice = $totalPrice + ($discount * $product->quantity);
                                                } else {
                                                $totalPrice = $totalPrice + ($product->cena * $product->quantity);
                                                }
                                                ?>

                                                <?php
                                                if ($totalPriceForDelivery <= 800) {
                                                $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                                                } else {
                                                $cargoPrice = 0;
                                                }
                                                ?>
                                                @endforeach
                                                <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                                <tr class="cart-subtotal">
                                                    <th>Цена на продукти</th>
                                                    <td><span class="amount">{{number_format($totalPrice, 0, ',', '.')}} мкд.</span></td>
                                                </tr>
                                                <tr class="cart-subtotal">
                                                    <th>Цена на достава</th>
                                                    <td><span class="amount">{{ number_format($cargoPrice, 0, ',', '.')}}</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Вкупно</th>
                                                    <td><strong><span class="amount">{{number_format($priceWithDelivery, 0, ',', '.')}}
                                                                мкд.</span></strong></span></strong> </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <input type="hidden" name="AmountToPay" value="{{$totalPrice * 100}}" />
                                        <input type="hidden" name="AmountCurrency" value="MKD" />
                                        <input type="hidden" name="Details1" value="Sofu-Order" />
                                        <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                                        <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                                        <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}" />
                                        <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                                        <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                                        <input type="hidden" name="OriginalCurrency" value="MKD" />
                                        <input type="hidden" name="Country" value="1">

                                        <div id="payment" class="nr-checkout-payment">
                                            <ul class="payment_methods methods">
                                                <li class="delivery">
                                                    <span>Начин на испорака: <br>
                                                        <select class="form-control" name="type_delivery">
                                                            <option value="cargo" @if(isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery']==='cargo' ) checked="selected" @else selected="selected" @endif>
                                                                Карго</option>
                                                        </select>
                                                    </span>
                                                </li>
                                                <li class="payment">
                                                    <span>Начин на плаќање: <br>
                                                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                        <input style="margin-top: 10px; margin-left:10px;" type="radio" checked="checked" name="paymentType" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                                                        <span style="margin-left: 10px; line-height:30px;">{{$i['display_name']}}</span><br>
                                                        @endforeach
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <input data-pay-button value="Нарачај" class="form-control button submit_button" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.ts-order-review -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@stop






@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {


        var firstName = $("input[name='FirstName']").val();
        var lastName = $("input[name='LastName']").val();
        var email = $("input[name='Email']").val();
        var telephone = $("input[name='Telephone']").val();
        var country = $("select[name='Country']").val();
        var city = $("[name='City']").val();
        var address = $("input[name='Address']").val();

        if (firstName == "" || lastName == "" || email == "" || telephone == "" || city == "" || country == "" || address == "") {
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
            $("input[name='paymentType'][value=" + sessionStorage.getItem("old_paymentType") + "]").prop('checked', true);
        }

        sessionStorage.removeItem("promo_code");

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
            var city = $("[name='City']").val();
            var address = $("input[name='Address']").val();

            if (firstName == "" || lastName == "" || email == "" || telephone == "" || country == "" || address == "") {
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
                        'Country': $("input[name='Country']").val(),
                        'City': $("[name='City']").val(),
                        'Zip': $("input[name='Zip']").val(),
                        'Address': $("input[name='Address']").val(),
                        'AmountToPay': $("input[name='AmountToPay']").val(),
                        'AmountCurrency': $("input[name='AmountCurrency']").val(),
                        'Details1': $("input[name='Details1']").val(),
                        'PayToMerchant': $("input[name='PayToMerchant']").val(),
                        'MerchantName': encodeURIComponent($("input[name='MerchantName']").val()),
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

                            @if(\EasyShop\Models\AdminSettings::getField('pixelCode'))
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
                            $("input[name='Country']").remove();
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

                            $form.append('<input type="hidden" name="Details2" value="' + result.documentId + '" />');
                            $form.append('<input type="hidden" name="CheckSumHeader" value="' + result.header + '" />');
                            $form.append('<input type="hidden" name="CheckSum" value="' + result.checksum + '" />');
                            $form.append('<input type="hidden" name="AmountToPay" value="' + result.totalPriceFull + '" />');
                            $form.append('<input type="hidden" name="OriginalAmount" value="' + result.totalPrice + '" />');
                            $form.submit();

                        } else if (result.status === 'not_enough_stock') {
                            toastr.error("Производите " + result.productNames + ' моментално ги нема на залиха.');
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