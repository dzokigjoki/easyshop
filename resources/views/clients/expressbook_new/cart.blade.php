@extends('clients.expressbook_new.layouts.default')

@section('content')



    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">Кошничка</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Кошничка</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- product tab start -->
    <section class="whish-list-section theme1 pt-50 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-30 pb-25">Продукти во кошничка</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" scope="col">Слика</th>
                                    <th class="text-center" scope="col">Производ</th>
                                    <th class="text-center" scope="col">Количина</th>
                                    <th class="text-center" scope="col">Цена</th>
                                    <th class="text-center" scope="col">Вкупно</th>
                                    <th class="text-center" scope="col">Акции</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <img src="{{ $product->image }}" alt="img" />
                                        </th>
                                        <td class="text-center">
                                            <span class="whish-title">{{ $product->title }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="product-count style">
                                                <div class="count d-flex justify-content-center">
                                                    <input table-shopping-qty="" type="number" min="1" max="100"
                                                        data-id="{{ $product->id }}" step="1"
                                                        value="{{ $product->quantity }}" />
                                                    <div class="button-group">
                                                        <button class="count-btn increment">
                                                            <i class="fas fa-chevron-up"></i>
                                                        </button>
                                                        <button class="count-btn decrement">
                                                            <i class="fas fa-chevron-down"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-list-price">
                                                {{ number_format($product->cena, 0, ',', '.') }}
                                                МКД</span>
                                        </td>

                                        <td class="text-center">
                                            {{ number_format($product->quantity * $product->cena, 0, ',', '.') }} МКД
                                        </td>
                                        <td class="text-center">
                                            <a href="#">
                                                <span class="trash"> <a href="/cart/remove/{{ $product->id }}"><i
                                                            class="fas fa-trash-alt"></i></a></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- checkout area start -->
    <div class="check-out-section pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3 class="title">Податоци за нарачката</h3>
                        <form class="personal-information" id="checkoutForm" method="POST" action=""
                            data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                            data-cash-action="{{ route('checksum.generate') }}">

                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Име <span class="required">*</span></label>
                                        <input type="text" class="form-control" required="" name="FirstName" id="FirstName"
                                            autofocus="" required="" value="@if (old('FirstName')) {{ old('FirstName') }}@elseif(isset($formData) && isset($formData['FirstName'])){{ $formData['FirstName'] }}@else{{ isset($user) ? $user->first_name : '' }} @endif" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Презиме <span class="required">*</span></label>
                                        <input type="text" class="form-control" required="" name="LastName" id="LastName"
                                            value="@if (old('LastName')) {{ old('LastName') }}@elseif(isset($formData) && isset($formData['LastName'])){{ $formData['LastName'] }}@else{{ isset($user) ? $user->last_name : '' }} @endif" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Е-Пошта <span class="required">*</span></label>
                                        <input type="email" class="form-control" required="" name="Email" id="Email"
                                            value="@if (old('Email')) {{ old('Email') }}@elseif(isset($formData) && isset($formData['Email'])){{ $formData['Email'] }}@else{{ isset($user) ? $user->email : '' }} @endif" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20px">
                                        <label for="inputState" class="form-label">Држава <span class="required">*</span></label>
                                        <select id="Country" class="form-select mb-3" name="Country">
                                            <?php $all_countries = [$all_countries[0]];
                                            // For now only Macedonia
                                            ?>
                                            @foreach ($all_countries as $ac)
                                                <option @if (isset($country) && $country->id == $ac->id) selected @endif value="{{ $ac->id }}">
                                                    {{ $ac->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20px">
                                        <label for="inputState" class="form-label">Град <span class="required">*</span></label>
                                        <select id="City" name="City" class="form-select mb-3">
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
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Адреса <span class="required">*</span></label>
                                        <input type="text" class="form-control" required="" name="Address" id="Address"
                                            value="@if (old('Address')) {{ old('Address') }}@elseif(isset($formData) && isset($formData['Address'])){{ $formData['Address'] }}@else{{ isset($user) ? $user->address : '' }} @endif" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Телефон <span class="required">*</span></label>
                                        <input type="text" class="form-control" required="" name="Telephone" id="Telephone"
                                            value="@if (old('Telephone')) {{ old('Telephone') }}@elseif(isset($formData) && isset($formData['Telephone'])){{ $formData['Telephone'] }}@else{{ isset($user) ? $user->phone : '' }} @endif" />
                                    </div>
                                </div>
                            </div>

                            <div class="additional-info-wrap">
                                <div class="additional-info">
                                    <label class="mb-2">Коментар</label>
                                    <textarea placeholder="Вашиот коментар овде..." name="message"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div class="your-order-area">
                        <h3 class="title">Вашата нарачка</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Продукт</li>
                                        <li>Вкупно</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach ($products as $product)
                                            <li>
                                                <span class="order-middle-left">{{ $product->title }} X
                                                    {{ $product->quantity }}</span>
                                                <span
                                                    class="order-price">{{ number_format($product->quantity * $product->cena, 0, ',', '.') }}
                                                    МКД</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <?php if ($totalPrice <= 1200) { $cargoPrice=config(' clients.' .
                                        config( 'app.client') . '.type_delivery.cargo.price' ); } else { $cargoPrice=0;
                                        } ?> <ul>
                                        <li class="your-order-shipping">Испорака</li>
                                        @if ($cargoPrice)
                                            <li>{{ number_format($cargoPrice, 0, ',', '.') }} МКД</li>
                                        @else
                                            <li>Бесплатна достава</li>
                                        @endif
                                        </ul>
                                </div>
                                <div class="your-order-total">
                                    <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                    <ul>
                                        <li class="order-total">Вкупно</li>
                                        <li>{{ number_format($priceWithDelivery, 0, ',', '.') }} МКД</li>
                                    </ul>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <p class="form-control-wrap your-name"></p>
                                    <div>Начин на испорака: <br>
                                        <p class="form-control-wrap your-name"></p>
                                        <select class="form-control form_white" name="type_delivery">
                                            @foreach (config(' clients.' . config( 'app.client') . '.type_delivery') as $key => $i['name'])

                                                <option value="{{ $key }}" @if (isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery'] === 'cargo') checked="selected" @else selected="selected" @endif>
                                                    {{ $i['name']['name'] }} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="form-control-wrap your-name"></p>
                                    <div>Начин на плаќање: <br>
                                        <select class="form-control form_white" name="paymentType">
                                            @foreach (\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                <option value="{{ $i['name'] }}">
                                                    {{ $i['display_name']  }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <input type="hidden" name="AmountToPay" value="{{ $priceWithDelivery * 100 }}" />
                                <input type="hidden" name="AmountCurrency" value="MKD" />
                                <input type="hidden" name="Details1" value="{{ ucfirst(env('CLIENT')) }}-Нарачка" />
                                <input type="hidden" name="PayToMerchant"
                                    value="{{ \EasyShop\Models\AdminSettings::getField('merchantId') }}" />
                                <input type="hidden" name="MerchantName"
                                    value="{{ \EasyShop\Models\AdminSettings::getField('merchantName') }}" />
                                <input type="hidden" name="PaymentOKURL" value="{{ route('checkout.success') }}" />
                                <input type="hidden" name="PaymentFailURL" value="{{ route('checkout.fail') }}" />
                                <input type="hidden" name="OriginalAmount" value="{{ $priceWithDelivery }}" />
                                <input type="hidden" name="OriginalCurrency" value="MKD" />

                            </div>

                        </div>
                        <div class="Place-order mt-25">
                            </form>
                            <button data-pay-button="" class="btn btn--xl btn-block btn-primary"
                                type="submit">Нарачај</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->

@section('scripts')

    <script>
        var $form = $('#checkoutForm');
        var $button = $('[data-pay-button]');


        $button.on('click', function(event) {

            var paymentType = $('[name=paymentType]').val();

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

            } else if (paymentType === 'gotovo') {
                $form.attr('action', $form.data('cash-action'));
                $form.submit();
                return true;
            }
        });
    </script>
@stop

@endsection
