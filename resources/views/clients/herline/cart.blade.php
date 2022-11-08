@extends('clients.herline.layouts.default')
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

    #coupon-check {
        color: white;
        margin-top: 5px;
    }
</style>
<div class="heading-container">
    <div class="container heading-standar">
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li><span><a href="#" class="home"><span>Почетна</span></a></span></li>
                <li><span>Кошничка</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <h2 style="margin: 0 0 35px 0;" class="text-center custom_heading">Кошничка</h2>
            </div>
            <div class="scroll-xs col-md-8 main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <table class="table shop_table cart">
                            <thead>
                                <tr>
                                    <th class="product-remove ">&nbsp;</th>
                                    <th class="product-thumbnail ">&nbsp;</th>
                                    <th class="product-name">Продукт</th>
                                    <th class="product-price text-right">Цена</th>
                                    <th class="product-quantity text-center">Количина</th>
                                    <th class="product-quantity text-center">Големина</th>
                                    <th class="product-subtotal text-right ">Вкупно</th>
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
                                            <img style="width: 80px;" width="100" class="img img-responsive"
                                                @if($product->image)
                                            src="{{$product->image}}" alt="{{ $product->title }}"
                                            @else
                                            src="{{ url_assets('/herline/images/product/product-1.jpg')}}"
                                            @endif
                                            />
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
                                    <td class="product-price text-right">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span style="white-space: nowrap"
                                            class="amount nowrap">{{number_format($product->cena, 0, ',', '.')}}
                                            мкд.</span>
                                        <br>
                                        <del>
                                            <span style="white-space: nowrap"
                                                class="amount nowrap">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                мкд.</span>
                                        </del>
                                        @else
                                        <span
                                            class="amount nowrap">{{number_format($product->cena, 0, ',', '.')}}
                                            мкд.</span>
                                        @endif
                                    </td>
                                    <?php $productVariations = explode('_', $product->variation); ?>
                                    <td class="product-quantity text-center">
                                        <div class="quantity">
                                            <input disabled table-shopping-qty="" class="input-text qty text"
                                                @if(!empty($product->variation))
                                            data-cart-index="{{$product->id}},{{$product->variation}}"
                                            data-variation="{{$product->variation}}"
                                            @endif
                                            max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_"
                                            value="{{ $product->quantity }}" />
                                        </div>
                                    </td>
                                    <td class="product-quantity text-center">
                                        <div class="quantity">
                                            <?php $allVariations = $product->variationValuesAndIds()->pluck('id')->toArray() ?>
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
                                            @endif
                                        </div>
                                    </td>
                                    <td class="nowrap product-subtotal text-right">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <?php
                                        $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                        ?>
                                        <span class="amount">{{$product->quantity * $product->cena}} мкд.</span>
                                        @else
                                        <span class="amount">{{$product->quantity * $product->cena}} мкд.</span>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(empty($coupons))

                        <div class="row">
                            <div class="col-sm-12">
                                <h5>
                                    Купон за попуст:
                                </h5>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" id="promo_code"
                                    {{-- style="width: 40%; display: inline; float: left;" --}} name="promo"
                                    class="form-control" placeholder="Внесете купон за попуст" />

                            </div>
                            <div class="col-sm-7">
                                <button type="submit" style="background: #FE6367; border-radius: 20px;" id="coupon-check" button-coupon-check
                                    class="btn btn-success">Провери купон
                                </button>
                            </div>

                        </div>
                        <div class="row" style="padding-top: 25px;">
                            <span data-coupon-check class="w-100" style="display: block"></span>
                        </div>
                        @else
                        <span style="background: #FE6367; border-radius: 20px; border: none;" class="btn btn-success coupon-label">
                            Внесен купон
                        </span>
                        @endif
                        <div class="cart-collaterals">
                            <?php $totalPrice = 0; ?>
                            @foreach($products as $product)
                            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity); ?>

                            <?php
                            if ($totalPrice < 1500) {
                                $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                            } else {
                                $cargoPrice = 0;
                            }
                            ?>
                            @endforeach
                            <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                            <div class="cart_totals pull-left">
                                <h2 class="text-left">Вкупно</h2>
                                <table>
                                    <tr class="cart-subtotal">
                                        <th>Цена на продукти</th>
                                        <td><span class="amount">{{number_format($totalPrice, 0, ',', '.')}} мкд.</span>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Цена на достава</th>
                                        <td><span class="amount">{{ number_format($cargoPrice, 0, ',', '.')}}
                                                мкд.</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Вкупно</th>
                                        <td><strong><span
                                                    class="amount">{{number_format($priceWithDelivery, 0, ',', '.')}}
                                                    мкд.</span></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <form data-form="" id="checkoutForm" method="POST" class="contact-form"
                            data-card-action="https://epay.halkbank.mk/fim/est3Dgate"
                            data-cash-action="{{route('checksum.generate')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>Име<br />
                                        <p class="form-control-wrap your-name">
                                            <input type="text" id="FirstName" name="FirstName" class="form-control text"
                                                value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"
                                                placeholder="Име*" required />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>Презиме<br />
                                        <p class="form-control-wrap your-name">
                                            <input type="text" id="LastName" name="LastName" class="form-control text"
                                                value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"
                                                placeholder="Презиме*" required />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>Е- пошта<br />
                                        <p class="form-control-wrap your-email">
                                            <input
                                                value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"
                                                class="form-control text" type="email" id="Email" name="Email"
                                                placeholder="E- пошта" required />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>Телефон<br />
                                        <p class="form-control-wrap your-email">
                                            <input required
                                                value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"
                                                class="form-control text" type="text" id="Telephone" name="Telephone"
                                                placeholder="Телефон*" />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>Држава<br />
                                        <p class="form-control-wrap your-name">
                                            <select class="form-control" name="Country" required>
                                                <?php $all_countries = [$all_countries[0]]; // For now only Macedonia 
                                                ?>
                                                @foreach($all_countries as $ac)

                                                <option @if(isset($user->country_id_shipping) &&
                                                    $user->country_id_shipping
                                                    == $ac->id)
                                                    selected
                                                    @elseif($ac->id == 1)
                                                    selected
                                                    @endif
                                                    value="{{$ac->id}}">{{$ac->country_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>Град<br />
                                        <p class="form-control-wrap your-name">
                                            <select required class="form-control" name="City">
                                                <option value="">-- Град --</option>
                                                @foreach($all_cities as $city)
                                                @if($city->id != 35)
                                                <option @if(isset($user->city_id_shipping) && $user->city_id_shipping ==
                                                    $city->id)
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
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div>Адреса<br />
                                        <p class="form-control-wrap your-name">
                                            <input
                                                value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address_shiping : ''}}@endif"
                                                class="form-control text" type="text" id="Address" name="Address"
                                                placeholder="Адреса" required />
                                        </p>
                                    </div>
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
                                <input type="hidden" name="clientid" value="{{\EasyShop\Models\AdminSettings::getField('clientId')}}" />
                                <input type="hidden" name="storetype" value="3d_pay_hosting" />
                                <input type="hidden" name="trantype" value="Auth" />
                                <input type="hidden" name="amount" value="{{$totalPrice}}" />
                                <input type="hidden" name="instalment" value="">
                                <input type="hidden" name="currency" value="{{\EasyShop\Models\AdminSettings::getField('currencyCode')}}" />
                                <input type="hidden" name="okUrl" value="{{ route('halk.success') }}" />
                                <input type="hidden" name="failUrl" value="{{ route('halk.fail') }}" />
                                <input type="hidden" name="callbackUrl" value="{{ route('halk.success') }}" />
                                <input type="hidden" name="lang" value="en" />
                                <input type="hidden" name="refreshtime" value="0" />
                                <input type="hidden" name="BillToName" value="BillToName">
                                <input type="hidden" name="encoding" value="UTF-8">

                                <div class="col-md-12">
                                    <p class="form-control-wrap your-name"></p>
                                    <div>Начин на испорака: <br>
                                        <p class="form-control-wrap your-name"></p>
                                        <select class="form-control" name="type_delivery">
                                            <option value="cargo" @if(isset($formData) &&
                                                isset($formData['type_delivery']) &&
                                                $formData['type_delivery']==='cargo' ) checked="selected" @else
                                                selected="selected" @endif>
                                                Falcon Logistic Courier</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p class="form-control-wrap your-name"></p>
                                    <div style="display:flex; align-items:center;">Начин на плаќање: <br>
                                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $paymentMethod)
                                        <input @if($paymentMethod['name']=='halk' ) class="" @endif style="margin-top:0; margin-left: 10px;" type="radio" checked="checked" name="paymentType" value="{{$paymentMethod['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$paymentMethod['name']) checked="checked" @endif @if (!isset($formData) && $paymentMethod['name']==='casys' ) checked="checked" @endif />
                                        <span @if($paymentMethod['name']=='halk' ) class="" @endif style="margin-left: 10px; line-height:30px;">{{$paymentMethod['display_name'] }}</span><br>
                                        @endforeach
                                    </div>
                                </div>
                        </form>
                        <div class="col-md-12 mt-10 pb-35">
                            <p class="form-control-wrap your-name">
                                <input data-pay-button value="Нарачај" class="form-control submit" />
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
<script>
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
        })
        // $('[data-payment-type]').on('click', function () {
        //     console.log($(this).val());
        // });

        $button.on('click', function(event) {

            var paymentType = $('[name=paymentType]:checked').val();
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
                        'City': $("[name='City']").val(),
                        'Zip': $("input[name='Zip']").val(),
                        'Address': $("input[name='Address']").val(),
                        'Amount': $("input[name='amount']").val(),
                        'type_delivery': $("select[name='type_delivery']").val(),
                        'paymentType': $("input[name='paymentType']:checked").val()

                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        if (result.status === 'success') {
                            var name = $("input[name='FirstName']").val()+" "+$("input[name='LastName']").val();
                            
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

                            $form.append('<input type="hidden" name="hash" value="' + result.hash + '" />');
                            $form.append('<input type="hidden" name="rnd" value="' + result.rnd + '" />');
                            $form.append('<input type="hidden" name="oid" value="' + result.oid + '" />');
                            $form.append('<input type="hidden" name="BillToName" value="' + name + '" />');
                            $form.append('<input type="hidden" name="amount" value="' + result.totalPrice + '" />');
                            
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