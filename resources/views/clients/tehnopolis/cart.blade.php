@extends('clients.tehnopolis.layouts.default')

@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="secondary_page_wrapper">

        <div class="container1">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

            <ul class="breadcrumb" style="width: 100%">
                <li><a href="/">Дома</a></li>
                <li>Кошничка</li>
            </ul>

            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-smart clearfix">
                        <div class="panel-heading">
                            <h3 class="panel-title">Детали за наплата</h3>
                        </div>
                        <div style="padding: 10px 0px;">
                            <form id="checkoutForm"
                                  method="POST"
                                  action=""
                                  data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                                  data-cash-action="{{route('checksum.generate')}}"
                                  class="type_2">

                                {{ csrf_field() }}

                                <?php $totalPrice = 0; ?>
                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                                @foreach($products as $product)
                                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                    <?php $priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
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


                                <div class="col-xs-12" style="padding-top: 10px;">
                                    <table style="width: 100%;">
                                        <tr class="details_payment">
                                            <td><label for="FirstName" class="required">Име</label></td>
                                            <td><input type="text" required="" name="FirstName" id="FirstName"
                                                       class="form-control"
                                                       autofocus=""
                                                       value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                                <!--/ [col]-->
                                            </td>
                                        </tr>
                                        <!--/ .row -->
                                        <tr class="details_payment">
                                            <td>
                                                <label for="LastName" class="required">Презиме</label>
                                            </td>
                                            <td>
                                                <input type="text" required="" name="LastName" id="LastName"
                                                       class="form-control"
                                                       value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                            </td>
                                            <!--/ [col]-->
                                        </tr>
                                        <!--/ .row -->


                                        <tr class="details_payment">
                                            <td><label for="Email" class="required">Е-Пошта</label></td>
                                            <td><input type="email" required="" name="Email" id="Email"
                                                       class="form-control"
                                                       value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->


                                        <!--/ .row -->

                                        <tr class="details_payment">

                                            <td><label for="Telephone" class="required">Телефон</label></td>
                                            <td><input type="text" required="" name="Telephone" id="Telephone"
                                                       class="form-control"
                                                       value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->

                                        <tr class="details_payment">
                                            <td><label for="Country" class="required">Држава</label></td>
                                            <td>
                                                <div class="select block">
                                                    <select id="Country" name="Country" class="form-control">
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
                                            </td>
                                        </tr>

                                        <!--/ [col]-->

                                        <tr class="details_payment">
                                            <td>
                                                <label for="City" class="required">Град</label></td>
                                            <td>
                                                <div class="select block">
                                                    <select id="City" name="City" class="form-control">
                                                        <option value="">Избери град</option>
                                                        @foreach($all_cities as $city)
                                                            {{--Don't show city Друго --}}
                                                            @if($city->id != 35)
                                                                <option @if(isset($user->city_id) && $user->city_id == $city->id)
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
                                            </td>

                                        </tr>
                                        <!--/ [col]-->


                                        <tr class="details_payment">
                                            <td><label for="Address" class="required">Адреса</label></td>
                                            <td><input type="text" required="" name="Address" id="Address"
                                                       class="form-control"
                                                       value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>


                                            </td>
                                        </tr>
                                        <tr class="details_payment">
                                            <td><label>Начин на<br>плаќање</label></td>

                                            <td>
                                            <span>
                                                <input type="radio" checked="checked"
                                                       value="gotovo"
                                                       id="paymentType2"
                                                       name="paymentType">
                                                <label for="paymentType2">Во готово</label>
                                            </span>

                                            <span style="padding-left: 10px;">
                                                <input type="radio"
                                                       value="casys"
                                                       id="paymentType1"
                                                       name="paymentType">
                                                <label for="paymentType1">Kартичка</label>
                                            </span>
                                            </td>
                                            <!--/ [col]-->

                                        </tr>

                                        <tr>
                                            <td><label>Начин на <br>испорака</label></td>

                                            <td>
                                                <div class="form_el" style="height: 38px;padding-top: 8px;">

                                                    <input type="radio" checked="checked" value="cargo"
                                                           name="type_delivery">
                                                    <label>Карго</label>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </form>

                            <!--/ .contactform -->

                            <div class="col-xs-12">

                                <br>
                                <button type="submit"
                                        class="btn btn-danger"
                                        data-pay-button="" style="width: 100%; text-align: center">Нарачај
                                </button>
                            </div>
                            <!--/ [col]-->

                        </div>
                    </div>
                </div>
                {{-- CART --}}
                <div class="col-lg-8">
                    <div class="panel panel-smart" id="kosnicka_panel">

                        <div class="panel-heading">
                            <h3 class="panel-title">Кошничка</h3>
                        </div>

                        <div class="table-responsive shopping-cart-table">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">Продукт</th>
                                    <th class="text-center">Цена</th>
                                    <th class="text-center">Количина</th>
                                    <th class="text-center">Вкупно</th>
                                    <th style="width: 100px;" class="product_total_col">Избриши</th>
                                </tr>

                                </thead>

                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td style="min-width: 120px;">
                                            <a href="{{$product->url}}">
                                                <img data-src="{{$product->image}}"
                                                     class="img-thumbnail product-img"
                                                     style="height: 100px; width: 100px;"></a>
                                        </td>

                                        <td class="text-center cart-inside-text">
                                            <div><a href="{{$product->url}}"
                                                    class="product_title">{{$product->title}}</a>
                                            </div>
                                        </td>


                                        <td class="text-center cart-inside-text">
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                <p class="product_price alignleft">
                                                    <b>
                                                        {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0), 0, ',', '.')}}
                                                        <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                    </b>
                                                </p>
                                                <p class="product_price alignleft">
                                                    <s>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                    </span>
                                                    </s>
                                            @else
                                                <p class="product_price alignleft"><b>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                            @endif
                                        </td>
                                        <td class="text-center cart-inside-text">{{$product->quantity}}</td>
                                        <td class="text-center cart-inside-text">{{number_format($product->cena * $product->quantity, 0, ',', '.')}} ден
                                        </td>
                                        <td style="width: 100px ;text-align: center; vertical-align: middle; ">
                                            <a class="fa fa-times text-center" style="color: #999;"
                                               href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a></td>
                                    </tr>
                                @endforeach

                                </tbody>

                                <tfoot>

                                <tr style="margin-left: 10px;">
                                    <td colspan="3" style="font-weight: 700">Цена на продукти</td>
                                    <td colspan="3"
                                        class="total align_right" style="padding-left:110px;text-align: right">
                                        {{number_format($totalPrice, 0, ',', '.')}}
                                        ден
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" style="font-weight: 700">Испорака</td>
                                    <td colspan="3"
                                        class="align_right"
                                        style="padding-left:110px; text-align: right">{{ $totalPrice >= 2000 ? 0 : $cargoPrice }}
                                        ден
                                    </td>
                                </tr>

                                <tr>

                                    <td colspan="3" style="font-weight: 700">Вкупно</td>
                                    <td colspan="3" style="padding-left:110px; text-align: right">
                                        {{number_format($priceWithDelivery, 0, ',', '.')}}
                                        ден
                                    </td>

                                </tr>

                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
                <!--/ .table_wrap -->


                {{-- // CART --}}

            </div>

        </div>
    </div>


@endsection


@section('scripts')
    {{--TODO: move to global script--}}
    <script>
        $(document).ready(function () {
            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');


            $('[data-payment-type]').on('click', function () {
                console.log($(this).val());
            });

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

                                fbq('track', 'InitiateCheckout', {
                                    value: result.totalPrice,
                                    currency: window.ES.facebook_pixels_currency,
                                    num_items: result.productIds.length,
                                    content_ids: result.productIds,
                                    content_type: 'product'
                                });

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
//                                $form.submit();

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

