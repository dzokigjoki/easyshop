@extends('clients.finki-giftshop.layouts.default')

@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="page_wrapper">

        <div class="container">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            {{--<ul class="breadcrumb">--}}
            {{--<li><a href="/">Дома</a></li>--}}
            {{--<li>Кошничка</li>--}}
            {{--</ul>--}}
            <br>
            <section class="section_offset">

                <div class="title-bg">
                    <h2 class="title">Кошничка</h2>
                </div>
                <br>

                <?php
                $formData = session()->get('formData');
                ?>


                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div style="padding: 10px 0px;">
                            <form id="checkoutForm"
                                  method="POST"
                                  action="{{route('checksum.generate')}}"
                                  class="type_2"
                            >

                                {{ csrf_field() }}

                                <?php $totalPrice = 0; ?>
                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>
                                {{--                                {{dd($cargoPrice)}}--}}

                                @foreach($products as $product)
                                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                    <?php $priceWithDelivery = $totalPrice >= 4000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                                    <?php $delivery = $totalPrice >= 4000 ? 0 : $cargoPrice; ?>
                                @endforeach

                                <div class="col-xs-12">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{session('error')}}</li>
                                            </ul>
                                        </div>
                                    @endif
                                    <table id="cart_table">
                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="FirstName"
                                                       class="required">Име</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       name="FirstName"
                                                       id="FirstName"
                                                       autofocus=""
                                                       required=""
                                                       value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                            </td>
                                        </tr>

                                        <!--/ [col]-->


                                        <!--/ .row -->
                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="LastName"
                                                       class="required">Презиме</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="LastName"
                                                       id="LastName"
                                                       value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->


                                        <!--/ .row -->


                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="Email"
                                                       class="required">Е-Пошта</label></td>
                                            <td class="cart_table_input">
                                                <input type="email" class="form-control"
                                                       required="" name="Email" id="Email"
                                                       value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                            </td>
                                        </tr>

                                        <!--/ [col]-->


                                        <!--/ .row -->
                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="Telephone" class="required">Телефонски<br>
                                                    број</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="Telephone"
                                                       id="Telephone"
                                                       value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->

                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="Country"
                                                       class="required">Држава</label></td>
                                            <td class="cart_table_input"><select id="Country" class="form-control"
                                                                                 name="Country">
                                                    <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                                    @foreach($all_countries as $ac)
                                                        <option @if(isset($country) && $country->id == $ac->id)
                                                                selected
                                                                @endif
                                                                value="{{$ac->id}}">{{$ac->country_name}}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                        </tr>
                                        <!--/ [col]-->


                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="City" class="required">Град</label>
                                            </td>
                                            <td class="cart_table_input">
                                                <select id="City"
                                                        name="City"
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
                                                </select></td>
                                        </tr>
                                        <!--/ [col]-->


                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="Address"
                                                       class="required">Адреса</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="Address" id="Address"
                                                       value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>
                                            </td>
                                        </tr>

                                        <input type="hidden" name="AmountToPay" value="{{$totalPrice * 100}}"/>
                                        <input type="hidden" name="AmountCurrency" value="MKD"/>
                                        <input type="hidden" name="Details1" value="{{env("CLIENT")}}-Order"/>
                                        <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')"}}/>
                                        <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}"/>
                                        <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
                                        <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
                                        <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}"/>
                                        <input type="hidden" name="OriginalCurrency" value="MKD"/>


                                        <tr>
                                            <td class="cart_table_label">
                                                <label class="required">Начин на <br>плаќање</label>
                                            </td>
                                            <td class="">
                                                <input type="radio" checked="checked" value="gotovo"
                                                       id="paymentType2"
                                                       name="paymentType">
                                            </td>

                                        </tr>


                                        {{--<tr>--}}

                                        {{--<td class="cart_table_inside">--}}
                                        {{--<label for="phone">Начин на испорака</label>--}}
                                        {{--</td>--}}


                                        {{--<td class="cart_table_input">--}}
                                        {{--<input type="radio" checked="checked"--}}
                                        {{--value="cargo"--}}
                                        {{--name="type_delivery">--}}
                                        {{--<label>Карго</label>--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<!--/ [col]-->--}}


                                    </table>
                                </div>
                                <br>
                                <tr>
                                    <td class="order-btn-cell" style="padding: 30px 0;">
                                        <button data-pay-button="" type="submit" class="">Нарачај</button>
                                    </td>
                                </tr>

                            </form>

                            <!--/ .contactform -->


                        </div>
                        <br><br>
                    </div>


                    <div class="col-md-8 col-sm-12" id="vkupno_cena">
                        <div>
                            <table class="table" id="summary_table">
                                <thead>

                                <tr>
                                    <th class="product_title_col">Производ</th>
                                    <th class="product_price_col">Цена</th>
                                    <th class="product_qty_col">Кол.</th>
                                    <th class="product_total_col">Вкупно</th>
                                    <th style="width: 100px;" class="product_total_col">Избриши</th>
                                </tr>

                                </thead>

                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="col-md-6 cart-prod-img-container">
                                                <img style="width: 100px;" src="{{$product->image}}"
                                                     alt="{{$product->title}}"
                                                     title="{{$product->title}}"
                                                     class="img-thumbnail" />
                                            </div>
                                            <div class="col-md-6 cart-prod-name-container">
                                                <a href="{{$product->url}}" class="product_title">{{$product->title}}</a>
                                            </div>
                                        </td>
                                        <td>{{number_format($product->cena, 0, ',', '.')}}
                                        </td>
                                        <td class="text-center" style="white-space: nowrap;">{{$product->quantity}}

                                        </td>
                                        <td>{{number_format($product->cena * $product->quantity, 0, ',', '.')}}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        </td>
                                        <td style="width: 100px;text-align: center;">
                                            <a class="fa fa-times" style="font-size: 22px; color: #d9534f" href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>



                                <tr class="table-footer">

                                    <td colspan="3" class="bold"><label>Цена на продукти</label></td>
                                    <td colspan="2" class="total align_right"><label
                                                class="table_summary">{{number_format($totalPrice, 0, ',', '.')}}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                    </td>

                                </tr>

                                <tr class="table-footer">

                                    <td colspan="3" class="bold"><label>Испорака</label></td>
                                    <td colspan="2"
                                        class="total align_right"><label class="table_summary">{{ $delivery }}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                    </td>

                                </tr>

                                <tr class="table-footer">

                                    <td colspan="3" class="grandtotal"><label>Вкупно</label></td>
                                    <td colspan="2"
                                        class="grandtotal align_right"><label class="table_summary">{{number_format($priceWithDelivery, 0, ',',
                                            '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                    </td>

                                </tr>

                                </tfoot>

                            </table>

                        </div>
                        <!--/ .table_wrap -->


                    </div>


                </div>

            </section>

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



                                @if(\EasyShop\Models\AdminSettings::getField('pixelCode'))
                                fbq('track', 'InitiateCheckout', {
                                    value: result.totalPrice,
                                    currency: 'MKD',
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

