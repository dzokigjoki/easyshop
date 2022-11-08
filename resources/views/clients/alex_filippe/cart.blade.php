@extends('clients.alex_filippe.layouts.default')
<style>
    .required-field {
        color: #BF244C;
    }
</style>

@section('content')

    <?php
    
    $formData = session()->get('formData');
    $countryId = isset($country) ? $country->id :
        old('Country') ? old('Country') :
            (isset($formData) && isset($formData['Country'])) ? $formData['Country'] : 1;


    $delivery = $countryId == 1 ? 0 : 0;
    $delivery = round($delivery / \Session::get('selectedCurrencyDivider'), 2);

    ?>
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <br>
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
                                                            src="{{$item->image}}" alt="{{$item->title}}"

                                                            src="{{\ImagesHelper::getBlogImage($item, NULL, 'sm_')}}"
                                                            alt="{{$item->title}}"

                                                            title="{{$item->title}}" class="img-thumbnail"></a>
                                            </td>
                                            <td class="text-left">

                                                <a href="{{$item->url}}">{{$item->title}}


                                                </a>
                                                <?php $coupons = Session::get('coupons') ?>
                                                @if(!empty($coupons))
                                                    @foreach($coupons as $coupon)
                                                        @if($coupon->product_id === $item->id)
                                                            <img src="{{ url_assets('/alex_filippe/images/checked.png') }}" style="width: 15px;">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                {{ number_format($item->cena / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}
                                                {{\Session::get('selectedCurrency')}}
                                            <br>

                                                <?php $coupons = Session::get('coupons') ?>
                                                @if(!empty($coupons))
                                                    @foreach($coupons as $coupon)
                                                        @if($coupon->product_id === $item->id)
                                                           <p style="text-decoration: line-through; width: 120px;"> {{ number_format($item->price_retail_1 / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}

                                                            {{\Session::get('selectedCurrency')}}</p>
                                                        @endif

                                                    @endforeach
                                                @endif


                                            </td>
                                            <td class="text-left" style="width:200px;">
                                                {{--{{dd(Session::get('coupons'))}}--}}

                                                <div class="input-group btn-block pull-left"
                                                     style="max-width: 70px;">
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
{{--                                                {{dd(Session::get('coupons'))}}--}}
                                                <div class="input-group btn-block pull-left"
                                                     style="max-width: 70px; margin-top: -3px; ">
                                                    @if(!$item->variationValuesAndIds()->isEmpty())
                                                        <select
                                                                table-product-variation=""
                                                                class="form-control"
                                                                data-id="{{$item->id}}"
                                                                style="margin-top:3px; width: 70px;"
                                                                @if(!empty($item->variation))
                                                                data-variation="{{$item->variation}}"
                                                                @endif>
                                                            @foreach($item->variationValuesAndIds() as $variations)
                                                                <option
                                                                    @if($item->variation == $variations->id)
                                                                    selected @endif
                                                                    value="{{$variations->id}}">{{$variations->value}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>


                                            </td>


                                            <td class="text-left">
                                                <span id="item_total_{{$item->id}}" style="float:left;">

                                                    {{number_format($item->cena / Session::get('selectedCurrencyDivider') * $item->quantity, 2, ',', '.')}}

                                                </span>
                                                {{Session::get('selectedCurrency')}}

                                            </td>
                                            <td style="text-align: center;">
                                                <a class="fa fa-close table-shopping-remove"
                                                   href="{{URL::to('cart/remove/')}}/{{$item->id}}@if($item->variation)/{{$item->variation}}@endif"></a>
                                            </td>
                                        </tr>
                                        <?php $total_price = $total_price + ($item->cena / Session::get('selectedCurrencyDivider') * $item->quantity); ?>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li>
                                        <em>Цена продукти</em>

                                        <strong class="price">{{number_format($totalPrice / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}
                                            <span>{{ \Session::get('selectedCurrency')  }}</span></strong>
                                    </li>

                                    <li>
                                        <em>Поштарина</em>
                                        <strong class="price"><span data-delivery="">{{$delivery}}</span>
                                            <span>{{  \Session::get('selectedCurrency') }}</span></strong>
                                    </li>
                                    <li class="shopping-total-price">
                                        <em>ВКУПНО</em>
                                        <strong class="price">
                                            <span data-total="">{{number_format($totalPrice / \Session::get('selectedCurrencyDivider') + $delivery, 2, ',', '.')}}</span>
                                            <span>{{\Session::get('selectedCurrency')}}</span></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
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

                              
                                <form data-form=""
                                      method="POST"
                                      action=""
                                      id="checkoutForm"
                                      data-cash-action="{{route('checksum.generate')}}"

                                >

                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Име</label>
                                            <label class="required-field">*</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="FirstName"
                                               required=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Презиме</label>
                                            <label class="required-field">*</label>
                                        </div>
                                        <div class="col-md-8"> <input class="form-control" type="text" name="LastName"
                                               required=""
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif">
                                    </div></div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label>E-mail</label>
                                            <label class="required-field">*</label>
                                        </div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="Email"
                                               required=""
                                               value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif">
                                    </div></div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Телефон</label><label class="required-field">*</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="Telephone"
                                               required=""
                                               value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif">
                                    </div></div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Држава</label>
                                            <label class="required-field">*</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control input-sm" id="Country" name="Country">
                                                @foreach($all_countries as $ac)
                                                    @if($ac->id == 1)
                                                    <option 
                                                        @if(!is_null($countryId) && $countryId == $ac->id)
                                                            selected
                                                        @endif
                                                        value="{{$ac->id}}">{{$ac->country_name}}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Град</label>
                                            <label class="required-field">*</label>
                                        </div>
                                        <div class="col-md-8"> <input type="hidden" value="" id="city_value" name="City"/></div>

                                        {{-- Remove 'drugo' --}}
                                        <?php $all_cities = $all_cities->filter(function ($city) {
                                            return $city->id != 35;
                                        }); ?>

                                        <div class="col-md-8"><select id="city_id" class="form-control input-sm" required=""
                                                @if($countryId != 1) style="display: none" @endif>
                                            <option value="">{{trans('topprodukti.chose_city')}}</option>
                                            @foreach($all_cities as $city)
                                                <option data-zip="{{$city->zip}}"
                                                        value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select></div>

                                        <div class="col-md-8"><input @if($countryId == 1) style="display: none;" @endif
                                        class="form-control"
                                               type="text"
                                               id="city_other"
                                               name="city_other"
                                               value=""></div>
                                    </div>

                                    <div class="form-group row" id="zip_code"
                                         @if($countryId == 1) style="display: none" @endif>
                                        <div class="col-md-4"><label>Поштенски код</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text"
                                               name="Zip"
                                               id="zip_code_value"
                                        ></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"><label>Адреса</label>
                                            <label class="required-field">*</label>
                                        </div>
                                        <div class="col-md-8"><input class="form-control" name="Address" type="text"
                                               required=""
                                               value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@endif">
                                        </div>
                                    </div>


                            <div class="form-group row">
                                <div class="col-md-4"> <label>Испорака</label></div>

                                <div class="col-md-8">
                                @foreach(config( 'clients.' . config( 'app.client') . '.type_delivery') as $key => $delivery)

                                    <div class="checkbox" style="width:100%;">
                                        <label>
                                            <input type="radio" name="type_delivery" checked="" value="{{$key}}"
                                                   @if(isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery'] === $key) checked="checked" @endif >&nbsp
                                            {{$delivery['name']}} (<span
                                                    data-delivery="">{{round($delivery['price'] / \Session::get('selectedCurrencyDivider'), 2)}}</span> {{ \Session::get('selectedCurrency')  }}
                                            )
                                            <br>
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"> <label>Начин на плаќање</label></div>
                                <div class="col-md-8">
                                    <div class="checkbox" style="width: 100%;">
                                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                            <label>
                                                <input type="radio" checked="checked" name="paymentType"
                                                    value="{{$i['name']}}"
                                                    @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $i['name']) checked="checked"
                                                    @endif
                                                    @if (!isset($formData) && $i['name'] === 'card') checked="checked" @endif
                                                />
                                                {{$i['display_name'] }}
                                            </label>&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: left;">
                                <button style="float: left;margin: 0;width: 100%;margin-top: 15px;"
                                        data-pay-button type="submit" class="btn btn-primary">Купи <i
                                            class="fa fa-check"></i>
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
    {{--TODO: move to global script--}}
    scri
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
            var $form = $('#checkoutForm');
            var $button = $('[data-pay-button]');

            var selectedCurrency = $('#selectedCurrency').val();

            function handleCountryChange(countryId) {
                if (countryId == 1) {
                    $('#city_value').val('');
                    $('#city_other').hide().val('');
                    $('#city_id').show().val('');
                    $('#zip_code').hide();
                    $('#zip_code_value').val('');
                } else {
                    $('#city_value').val(35);
                    $('#city_other').show().val('');
                    $('#city_id').hide().val('');
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

            $button.on('click', function (event) {
                $form.attr('action', $form.data('cash-action'))
                $form.submit();
                return true;
            });

        });

    </script>
@stop