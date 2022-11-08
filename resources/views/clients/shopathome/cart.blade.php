@extends('clients.shopathome.layouts.default')
@section('content')
<style>
    .payment-type-label {
        font-size: 12px !important;
    }

    .shipping {
        background: transparent !important;
    }

    .submit-button {
        float: right !important;
        margin-top: 10px;
    }
</style>
<div id="content">
    <div class="checkout">
        <div class="container">
            <div class="check-anchor clearfix mb40">
                <div class="holder">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-star"></i>Кошничка</a></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <div class="holder-border"></div>
                </div>
            </div>
            <?php
            $formData = session()->get('formData');
            ?>

            <div class="check-infos">
                <div class="row">
                    <?php $totalPrice = 0; ?>

                    @foreach($products as $product)
                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>

                    <?php $cargoPrice = 0; ?>
                    @if($totalPrice < 1500)
                        <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>
                        @endif <!-- -->
                        <?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                        <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                        @endforeach
                        <div class="col-md-8">
                            <div class="check-details">
                                <div style="overflow-x: auto !important;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Продукт</th>
                                                {{--                                    @if(!$product->variationValuesAndIds()->isEmpty())--}}
                                                <th>Боја</th>
                                                {{--@endif--}}
                                                <th>Цена</th>
                                                <th>Количина</th>
                                                <th>Вкупно</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="check-body">
                                            @foreach($products as $product)
                                            <tr>
                                                {{--<td><img src="/assets/shopathome/upload/check2.png" alt=""></td>--}}
                                                <td><img src="{{$product->image}}" alt="{{$product->title}}"
                                                        title="{{$product->title}}" class="img-responsive"></td>
                                                <td>
                                                    <h6>{{$product->title}}

                                                    </h6>
                                                    {{--<p>Size: <span>XL</span></p>--}}
                                                    {{--<p>Color: <span>White</span></p>--}}
                                                </td>
                                                <td>
                                                    @if(!$product->variationValuesAndIds()->isEmpty())
                                                    @foreach($product->variationValuesAndIds() as $variations)
                                                    @if($product->variation ==
                                                    $variations->id)({{$variations->value}})@endif
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td>{{number_format($product->cena, 0, ',', '.')}} ден.</td>
                                                <td><input disabled type="text" value="{{$product->quantity}}"></td>
                                                <td>
                                                    <?php $cena = $product->cena / Session::get('selectedCurrencyDivider') * $product->quantity ?>
                                                    {{number_format($cena, 0, ',', '.')}}
                                                    <?php $cena = $product->cena / Session::get('selectedCurrencyDivider') * $product->quantity ?>
                                                    {{number_format($cena, 0, ',', '.')}}
                                                    ден.</td>
                                                <td><a
                                                        href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"><i
                                                            style="font-size:25px;margin-top:3px; color:#861953;"
                                                            class="fa fa-trash-o"></i> </a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="orders mb20">
                                    <h6>За Наплата</h6>
                                    <p>Продукти: <span>{{number_format($totalPrice, 0, ',', '.')}} ден. </span></p>
                                    <p>Достава: <span> {{ $totalPrice >= 1500 ? 0 : $cargoPrice }}
                                            {{config( 'clients.' . config( 'app.client') . '.')}} ден.</span></p>
                                    <p class="bd0"><strong>Вкупно: <span><strong>{{$totalPrice >= 1500 ? number_format($totalPrice, 0, ',', '.') : number_format($priceWithDelivery, 0, ',',
                                                    '.')}} {{config( 'clients.' . config( 'app.client') . '.')}}
                                                    ден.</strong></span></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form id="checkoutForm" method="POST"
                                data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                                data-cash-action="{{route('checksum.generate')}}">

                                {{ csrf_field() }}

                                <div class="check-aside">
                                    <div class="accordion-content second-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Име <span>*</span></label>
                                                <input
                                                    value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"
                                                    type="text" class="form-control text validates-as-required"
                                                    required="" name="FirstName" id="FirstName" autofocus="">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Презиме <span>*</span></label>
                                                <input required value="@if(old('LastName')){{old('LastName')}}
                                                @elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}
                                                @else{{isset($user) ? $user->last_name : ''}}@endif" type="text"
                                                    class="form-control text validates-as-required" name="LastName"
                                                    id="LastName">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Телефонски број <span>*</span></label>
                                                <input required type="text"
                                                    class="form-control text validates-as-required" name="Telephone"
                                                    id="Telephone">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>E-mail</label>
                                                <input required
                                                    value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"
                                                    type="text" class="form-control text validates-as-required"
                                                    name="Email" id="Email">
                                            </div>
                                        </div>

                                        <label>Држава <span>*</span></label>
                                        <select class="select" id="Country" name="Country">
                                            <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                            @foreach($all_countries as $ac)
                                            <option @if(isset($country) && $country->id == $ac->id)
                                                selected
                                                @endif
                                                value="{{$ac->id}}">{{$ac->country_name}}
                                            </option>
                                            @endforeach
                                        </select>

                                        <label>Град <span>*</span></label>
                                        <select id="City" name="City" class="select">
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

                                        <label>Адреса <span>*</span></label>
                                        <input
                                            value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"
                                            type="text" class="form-control text validates-as-required" name="Address"
                                            id="Address">




                                        <input type="hidden" name="AmountToPay" value="{{ $priceWithDelivery * 100}}" />
                                        <input type="hidden" name="AmountCurrency" value="MKD" />
                                        <input type="hidden" name="Details1" value="Kinderlend-Order" />
                                        <input type="hidden" name="PayToMerchant"
                                            value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                                        <input type="hidden" name="MerchantName"
                                            value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                                        <input type="hidden" name="PaymentOKURL"
                                            value="{{route("checkout.success")}}" />
                                        <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                                        <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                                        <input type="hidden" name="OriginalCurrency" value="MKD" />

                                        <div><label>Начин на плаќање: </label></div>

                                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                        <span class="payment-type-label">{{$key}}</span>
                                        <input style="padding-left: 10px;" type="radio" checked="checked"
                                            name="paymentType" class="validates-as-required" value="{{$i['name']}}"
                                            @if(isset($formData) && isset($formData['paymentType']) &&
                                            $formData['paymentType']===$i['name']) checked="checked" @endif @if
                                            (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                                        <br>

                                        @endforeach



                                        {{-- <input type="hidden"
                                               name="paymentType"
                                               id="paymentType2"
                                               checked="checked"
                                               value="gotovo"
                                               class="form-control text validates-as-required"> --}}

                                        <div><label>Начин на испорака: <strong>Карго</strong></label></div>
                                        <input type="hidden" name="type_delivery" checked="checked" value="cargo"
                                            class="form-control text validates-as-required">
                                    </div>




                                </div>
                        </div>
                        </form>

                        <div class="shipping">
                            <button data-pay-button="" type="submit"
                                class="btn btn-full icon-btn-left submit-button darkblue-b"
                                style="color:white">Нарачај</button>
                            {{-- <input data-pay-button="" type="submit" class="btn btn-full icon-btn-left" --}}
                            {{-- value="Нарачај" style="line-height: unset;"><span --}}
                            {{-- class="icon icon-check_circle"></span> --}}
                        </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- End Product Single -->

</div>
<!-- End content -->

@section('scripts')
<script>
    $(document).ready(function () {
            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');

            $button.on('click', function (event) {
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
                            'MerchantName': encodeURIComponent($("input[name='MerchantName']").val()),
                            'OriginalAmount': $("input[name='OriginalAmount']").val(),
                            'OriginalCurrency': $("input[name='OriginalCurrency']").val(),
                            'PaymentOKURL': $("input[name='PaymentOKURL']").val(),
                            'PaymentFailURL': $("input[name='PaymentFailURL']").val(),
                            'type_delivery': $("input[name='type_delivery']:checked").val(),
                            'paymentType': $("input[name='paymentType']:checked").val()

                        },
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.status === 'success') {
                                console.log(result);
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

                                $form.append('<input type="hidden" name="Details2" value="' + result.documentId + '" />');
                                $form.append('<input type="hidden" name="CheckSumHeader" value="' + result.header + '" />');
                                $form.append('<input type="hidden" name="CheckSum" value="' + result.checksum + '" />');
                                $form.append('<input type="hidden" name="AmountToPay" value="' + result.totalPriceFull + '" />');
                                $form.append('<input type="hidden" name="OriginalAmount" value="' + result.totalPrice + '" />');
                                $form.submit();

                            }
                            else if (result.status === 'not_enough_stock') {
                                toastr.error("Продуктите " + result.productNames + ' моментално ги нема на залиха.');
                            }
                        },
                        error: function (val) {
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
@endsection