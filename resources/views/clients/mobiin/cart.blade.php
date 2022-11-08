@extends('clients.mobiin.layouts.default')

@section('content')

    <?php

    $countryId = isset($country) ? $country->id : 1;

    $delivery = $countryId == 1 ? 118 : 300;

    ?>
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-8 col-sm-12">
                    <h1>Кошничка</h1>

                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                <table summary="Shopping cart">
                                    <thead>
                                    <tr>
                                        <th>Продукт</th>
                                        <th>Наслов</th>
                                        <th>Цена</th>
                                        <th>Количина</th>
                                        <th>Вкупно</th>
                                        <th>Избриши</th>
                                    </tr>
                                    </thead>
                                    <tbody><?php $total_price = 0; ?>
                                    @foreach($products as $item)
                                        <tr>
                                            <td class="text-center"><a href="{{$item->url}}"><img
                                                            src="{{ $item->image }}" alt="{{$item->title}}"
                                                            title="{{$item->title}}" class="img-thumbnail"></a>
                                            </td>
                                            <td class="text-left"><a
                                                        href="{{$item->url}}">{{$item->title}}</a></td>
                                            <td class="text-right">{{number_format($item->cena)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                            <td class="text-left">

                                                <div class="input-group btn-block"
                                                     style="max-width: 200px;">
                                                    <input table-shopping-qty=""
                                                           data-id="{{$item->id}}"
                                                           @if(!empty($item->variation))
                                                           data-variation="{{$item->variation}}"
                                                           @endif
                                                           class="form-control"
                                                           type="_"
                                                           value="{{$item->quantity}}"/>
                                                    <span class="input-group-btn"></span>
                                                </div>
                                                <div class="input-group btn-block"
                                                     style="max-width: 200px;">
                                                    @if(!$item->variationValuesAndIds()->isEmpty())
                                                        <select
                                                                table-product-variation=""
                                                                class="form-control"
                                                                data-id="{{$item->id}}"
                                                                style="margin-top:3px;"
                                                                @if(!empty($item->variation))
                                                                data-variation="{{$item->variation}}"
                                                                @endif
                                                        >
                                                            @foreach($item->variationValuesAndIds() as $variations)
                                                                <option
                                                                        @if($item->variation == $variations->id)
                                                                        selected @endif
                                                                        value="{{$variations->id}}">{{$variations->value}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>


                                            </td>


                                            <td class="text-right">
                                                <span id="item_total_{{$item->id}}">{{number_format($item->cena)}}</span> {{\EasyShop\Models\AdminSettings::getField('currency')}}

                                            </td>
                                            <td style="text-align: center;">
                                                <a class="fa fa-close table-shopping-remove"
                                                   href="{{URL::to('cart/remove/')}}/{{$item->id}}@if($item->variation)/{{$item->variation}}@endif"></a>
                                            </td>
                                        </tr>
                                        <?php $total_price = $total_price + ($item->cena * $item->quantity); ?>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li>
                                        <em>Цена продукти</em>
                                        <strong class="price">{{number_format($totalPrice)}}
                                            <span>{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></strong>
                                    </li>

                                    <li>
                                        <em>Поштарина</em>
                                        <strong class="price"><span data-delivery="">{{$delivery}}</span>
                                            <span>{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></strong>
                                    </li>
                                    <li class="shopping-total-price">
                                        <em>ВКУПНО</em>
                                        <strong class="price">
                                            <span data-total="">{{number_format($totalPrice + $delivery)}}</span>
                                            <span>{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-wrap" style="width: 100%; padding: 5px 0;">
                            <a href="{{URL::to('/')}}" class="btn btn-default" type="submit">Продолжи со купување <i
                                        class="fa fa-shopping-cart" style="color: #fff;"></i></a>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 class="widget-title">Детали за наплата</h1>

                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
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


                                <form method="POST"
                                      action=""
                                      id="checkoutForm"
                                      data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                                      data-cash-action="{{route('checksum.generate')}}"

                                >

                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Име</label>
                                        <input class="form-control" type="text" name="FirstName"
                                               required=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@else{{isset($user) ? $user->first_name : ''}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label>Презиме</label>
                                        <input class="form-control" type="text" name="LastName"
                                               required=""
                                               value="@if(old('LastName')){{old('LastName')}}@else{{isset($user) ? $user->last_name : ''}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="Email"
                                               required=""
                                               value="@if(old('Email')){{old('Email')}}@else{{isset($user) ? $user->email : ''}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label>Телефонски број</label>
                                        <input class="form-control" type="text" name="Telephone"
                                               required=""
                                               value="@if(old('Telephone')){{old('Telephone')}}@else{{isset($user) ? $user->phone : ''}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label>Држава</label>
                                        <select class="form-control input-sm" id="Country" name="Country">
                                            @foreach($all_countries as $ac)
                                                <option @if(!is_null($countryId) && $countryId == $ac->id) selected
                                                        @endif
                                                        value="{{$ac->id}}">{{$ac->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Град</label>
                                        <input type="hidden" value="" id="city_value" name="City"/>

                                        {{-- Remove 'drugo' --}}
                                        <?php $all_cities = $all_cities->filter(function ($city) {
                                            return $city->id != 35;
                                        }); ?>

                                        <select id="city_id" class="form-control input-sm" required=""
                                                @if($countryId != 1) style="display: none" @endif>
                                            <option value="">{{trans('topprodukti.chose_city')}}</option>
                                            @foreach($all_cities as $city)
                                                <option data-zip="{{$city->zip}}"
                                                        value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>

                                        <input @if($countryId == 1) style="display: none;" @endif
                                        class="form-control"
                                               type="text"
                                               id="city_other"
                                               name="city_other"
                                               value="">
                                    </div>

                                    <div class="form-group" id="zip_code"
                                         @if($countryId == 1) style="display: none" @endif>
                                        <label>Поштенски код</label>
                                        <input class="form-control" type="text"
                                               name="Zip"
                                               id="zip_code_value"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Адреса</label>
                                        <input class="form-control" name="Address" type="text"
                                               required=""
                                               value="@if(old('Address')){{old('Address')}}@endif">
                                    </div>

                                    <input type="hidden" name="AmountToPay" value="{{$totalPrice * 100}}"/>
                                    <input type="hidden" name="AmountCurrency" value="MKD"/>
                                    <input type="hidden" name="Details1" value="{{env("CLIENT")}}-Order"/>
                                    <input type="hidden" name="PayToMerchant"
                                           value="{{\EasyShop\Models\AdminSettings::getField('merchantId')"}}/>
                                    <input type="hidden" name="MerchantName"
                                           value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}"/>
                                    <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
                                    <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
                                    <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}"/>
                                    <input type="hidden" name="OriginalCurrency" value="MKD"/>


                                    <div class="form-group">
                                        <label>Метод на испорака</label>

                                        @foreach(config( 'clients.' . config( 'app.client') . '.type_delivery') as $key => $delivery)

                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="type_delivery" checked="" value="{{$key}}">&nbsp
                                                    {{$delivery['name']}} (<span
                                                            data-delivery="">{{round($delivery['price'])}}</span> {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                    )
                                                    <br>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label>Начин на плаќање</label>

                                        <div class="checkbox">
                                            @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                <label>
                                                    <input type="radio" checked="checked" name="paymentType"
                                                           value="{{$i['name']}}" />
                                                    {{$i['display_name']}}
                                                </label>&nbsp;&nbsp;&nbsp;
                                            @endforeach
                                        </div>
                                    </div>

                                    <div style="text-align: left;">
                                        <button style="float: left;margin: 0;width: 100%;margin-top: 15px;"
                                                data-pay-button type="submit" class="btn btn-primary">Купи <i class="fa fa-check"></i>
                                        </button>

                                    </div>
                                </form>
                                <input type="hidden" value="{{ \Session::get('selectedCurrency')  }}"
                                       id="selectedCurrency"/>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        var totalAmount = {{$totalPrice /  \Session::get('selectedCurrencyDivider')}};

        Number.prototype.formatMoney = function (c, d, t) {
            var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "," : t,
                s = n < 0 ? "-" : "",
                i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

        $(document).ready(function () {
            var selectedCurrency = $('#selectedCurrency').val();

            function handleCountryChange(countryId) {
                if (countryId == 1) {
                    $('#city_value').val('');
                    $('#city_other').hide().val('');
                    $('#city_id').show().val('');
                    $('#city_id').attr('required', 'required');
                    $('#zip_code').hide();
                    $('#zip_code_value').val('');
                } else {
                    $('#city_value').val(35);
                    $('#city_other').show().val('');
                    $('#city_id').hide().val('');
                    $('#city_id').removeAttr('required');
                    $('#zip_code').show();
                    $('#zip_code_value').val('');
                }

            }

            $('#city_id').change(function () {
                var selectedCity = $(this).val();
                $('#city_value').val(selectedCity);
                $('#zip_code_value').val($('#city_id').find(":selected").data('zip'));
            });

            $('#Country').change(function () {
                var selectedCountry = $(this).val();
                var delivery = 100;
                if (selectedCountry != 1) {
                    delivery = selectedCurrency === 'EUR' ? 5 : 300;
                } else {
                    delivery = selectedCurrency === 'EUR' ? 1.63 : 100;
                }

                $('[data-delivery]').text(delivery);

                var total = delivery + totalAmount;

                $('[data-total]').text(total.formatMoney(2, ',', '.'));

                handleCountryChange(selectedCountry);
            });
        });

    </script>
@stop
