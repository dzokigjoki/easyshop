@extends('clients.barbakan.layouts.default')
@section('content')




    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Наплата</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="cart-details shadow bg-white stick-to-content mb-4">
                    <div class="bg-dark dark p-4">
                        <h5 class="mb-0">Вашата нарачка</h5>
                    </div>
                    <table class="cart-table">
                        @foreach(session()->get('cart_products') as $pid => $product)
                        <tr>
                            <td class="title">
                                <span class="name"><a href="#product-modal" data-toggle="modal">{{$product["title"]}}</a></span>
                                <span class="caption text-muted">x {{$product["quantity"]}}</span>
                            </td>
                            <td class="price">{{ $product["price"] * $product["quantity"]}} МКД</td>
                            <td class="actions">
                                <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                                <a href="/cart/remove/{{ $product["id"] }}" class="action-icon"><i class="ti ti-close"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>


                    <?php
                    if ($totalPrice <= 1000) {
                        $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                    } else {
                        $cargoPrice = 0;
                    }
                    ?>


                        <?php
                        if ($totalPrice <= 1000) {
                            $cargoPrice = config('clients.' . config('app.client') . '.type_delivery.cargo.price');
                        } else {
                            $cargoPrice = 0;
                        }
                        ?>

                        <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>


                        <div class="cart-summary">
                            <div class="row">
                                <div class="col-7 text-right text-muted">Вкупно без достава:</div>
                                <div class="col-5"><strong>$<span class="cart-products-total">{{ $totalPrice }}
                                            МКД</span></strong></div>
                            </div>
                            <div class="row">
                                <div class="col-7 text-right text-muted">Достава:</div>
                                <div class="col-5"><strong>$<span
                                            class="cart-delivery">{{ number_format($cargoPrice, 0, ',', '.') }}
                                            МКД</span></strong></div>
                            </div>
                            <hr class="hr-sm">
                            <div class="row text-lg">
                                <div class="col-7 text-right text-muted">Вкупно:</div>
                                <div class="col-5"><strong>$<span
                                            class="cart-total">{{ number_format($priceWithDelivery, 0, ',', '.') }}
                                            МКД</span></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 order-lg-first">
                    <form id="checkoutForm" method="POST" action="" data-cash-action="{{ route('checksum.generate') }}">
                        {{ csrf_field() }}
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Вашите информации
                            </h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>Име:</label>
                                    <input name="FirstName" id="FirstName" value="@if (old('FirstName')) {{ old('FirstName') }}@elseif(isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }} @endif" required
                                        autofocus type="text" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Презиме:</label>
                                    <input name="LastName" id="LastName" value="@if (old('LastName')) {{ old('LastName') }}@elseif(isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }} @endif" required
                                        type="text" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Адреса:</label>
                                    <input name="Address" id="Address" value="@if (old('Address')) {{ old('Address') }}@elseif(isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address : '' }} @endif" required type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Град:</label>
                                    <div class="select-container">
                                        <select id="City" name="City" class="form-control">
                                            <option value="">-- Избери град --</option>
                                            @foreach ($all_cities as $city)
                                                {{-- Don't show city Друго --}}
                                                @if ($city->id != 35)
                                                    <option @if (isset($user->city_id) && $user->city_id == $city->id) selected @endif value="{{ $city->id }}"
                                                        data-name="{{ $city->city_name }}"
                                                        data-zip="{{ $city->zip }}">
                                                        {{ $city->city_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="Country" value="1">
                                <div class="form-group col-sm-6">
                                    <label>Телефон:</label>
                                    <input name="Telephone" id="Telephone" value="@if (old('Telephone')) {{ old('Telephone') }}@elseif(isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }} @endif" required
                                        type="text" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Е-пошта:</label>
                                    <input name="Email" id="Email" value="@if (old('Email')) {{ old('Email') }}@elseif(isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }} @endif" required type="email"
                                        class="form-control">
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Испорака</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>Време на испорака:</label>
                                    <div class="select-container">
                                        <select class="form-control">
                                            <option>Најбрзо што може</option>
                                            <option>За 1 час</option>
                                            <option>За 2 часа</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Плаќање</h4>
                            <div class="row text-lg">

                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)

                        <div class="col-md-4 col-sm-6 form-group">
                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" checked="checked" name="paymentType" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) @endif />

                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description" style="margin-left: 10px; line-height:30px;">{{$i['display_name'] }}</span><br>

                                        </label>
                                    </div>


                                @endforeach



                            </div>
                        </div>
                        <div class="text-center">
                            <button data-pay-button="" class="btn btn-primary btn-lg"><span>Нарачај</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@stop



@section('scripts')

    <script>
        var $form = $('#checkoutForm');
        var $button = $('[data-pay-button]');


        $button.on('click', function(event) {

            var paymentType = $("input[name=paymentType]:checked").val();

            if (paymentType === 'casys') {

                $form.attr('action', $form.data('cpay-action'));

                $.ajax({
                    url: 'checkout/generate',
                    method: 'POST',
                    data: {
                        'Email': $("input[name='FirstName']").val(),
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
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

                            $form.append('<input type="hidden" name="Details2" value="' + result
                                .documentId + '" />');
                            $form.append('<input type="hidden" name="CheckSumHeader" value="' + result
                                .header + '" />');
                            $form.append('<input type="hidden" name="CheckSum" value="' + result
                                .checksum + '" />');
                            $form.append('<input type="hidden" name="AmountToPay" value="' + result
                                .totalPriceFull + '" />');
                            $form.append('<input type="hidden" name="OriginalAmount" value="' + result
                                .totalPrice + '" />');
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

            } else if (paymentType == 'gotovo') {
                $form.attr('action', $form.data('cash-action'));
                $form.submit();
                return true;
            }
        });
    </script>
@stop
