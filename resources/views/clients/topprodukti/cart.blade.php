@extends('clients.topprodukti.layouts.default')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form data-form="" action="{{route('checksum.generate')}}" method="post">


        <?php
            $formData = session()->get('formData');
        ?>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title">{{trans('topprodukti.cart')}}</h1>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-user"></i> {{trans('topprodukti.personalData')}}</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">{{trans('topprodukti.name')}}</label>
                                        <input class="form-control" type="text" name="FirstName" required=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">{{trans('topprodukti.surname')}}</label>
                                        <input class="form-control" type="text" name="LastName" required=""
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label">{{trans('topprodukti.email')}}</label>
                                        <input class="form-control" type="text" name="Email" required=""
                                               value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">{{trans('topprodukti.telephone')}}</label>
                                        <input class="form-control" type="text" name="Telephone" required=""
                                               value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-book"></i> {{trans('topprodukti.address')}}</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="address" class="required">
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">{{trans('topprodukti.shippingAddress')}}</label>
                                        <input type="text" class="form-control" required=""
                                               name="Address" value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@endif">
                                    </div>
                                    <div class="form-group required" style="display: none;">
                                        <label for="input-payment-address-1" class="control-label">{{trans('topprodukti.country')}}</label>
                                        <?php
                                            $selectedCountry = 1;
                                            $countryCode = 'mk';

                                            if (config( 'app.client') === 'topprodukti_rs') {
                                                $selectedCountry = 42;
                                                $countryCode = 'rs';
                                            } else if (config( 'app.client') === 'topprodukti_bg') {
                                                $selectedCountry = 10;
                                                $countryCode = 'bg';
                                            } else if (config( 'app.client') === 'topprodukti_cz') {
                                                $selectedCountry = 13;
                                                $countryCode = 'cz';
                                            } else if (config( 'app.client') === 'topprodukti_hr') {
                                                $selectedCountry = 11;
                                                $countryCode = 'hr';
                                            } else if (config( 'app.client') === 'topprodukti_hu') {
                                                $selectedCountry = 21;
                                                $countryCode = 'hu';
                                            } else if (config( 'app.client') === 'topprodukti_pl') {
                                                $selectedCountry = 37;
                                                $countryCode = 'pl';
                                            } else if (config( 'app.client') === 'topprodukti_si') {
                                                $selectedCountry = 44;
                                                $countryCode = 'si';
                                            } else if (config( 'app.client') === 'topprodukti_sk') {
                                                $selectedCountry = 43;
                                                $countryCode = 'sk';
                                            } else if (config( 'app.client') === 'topprodukti_ro') {
                                                $selectedCountry = 39;
                                                $countryCode = 'ro';
                                            }
                                        ?>
                                        <select id="country_id" class="form-control input-sm" name="Country" required="" >
                                            @foreach($all_countries as $ac)
                                                <option @if($selectedCountry == $ac->id) selected
                                                                          @endif value="{{$ac->id}}">{{$ac->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="display: none" class="form-group required country_other">
                                        <label class="control-label">{{trans('topprodukti.restCountries')}}</label>
                                        <input type="text" id="country_other" class="form-control"
                                               placeholder="Останати држави" name="country_other"
                                               value="@if(old('country_other')){{old('country_other')}}@elseif(isset($formData) && isset($formData['country_other'])){{$formData['country_other']}}@endif">
                                    </div>
                                    <?php
                                    // For macedonia remove drugo
                                    $hideCity = true;
                                    if (config( 'app.client') === 'topprodukti_mk') {
                                        $hideCity = false;
                                        $all_cities = $all_cities->filter(function($city) {
                                            return $city->id !== 35;
                                        });
                                    }
                                    ?>
                                    <div id="mkd_gradovi" class="form-group required"
                                            @if($hideCity)
                                                style="display: none;"
                                            @endif
                                            >
                                        <label for="input-payment-city" class="control-label">{{trans('topprodukti.city')}}</label>
                                        <select id="city_id" required=""  class="form-control select2" style="width:100%;"
                                                name="City">
                                            <option value="">{{trans('topprodukti.chose_city')}}</option>
                                            @foreach($all_cities as $ac)
                                                <option value="{{$ac->id}}">{{$ac->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="display: none" class="form-group required city_other">
                                        <label class="control-label">{{trans('topprodukti.city')}}</label>
                                        @if ($countryCode == 'hu')
                                            <select name="city_other" required="" id="city_other" class="form-control select2" style="width:100%;">
                                                @include('clients.topprodukti.partials.hu-cities')
                                            </select>
                                        @elseif ($countryCode == 'ro')
                                            <select name="city_other" required="" id="city_other" class="form-control select2" style="width:100%;">
                                                @include('clients.topprodukti.partials.ro-cities')
                                            </select>
                                        @else
                                        <input type="text" class="form-control" id="city_other" placeholder=""
                                               value="@if(old('city_other')){{old('city_other')}}@elseif(isset($formData) && isset($formData['city_other'])){{$formData['city_other']}}@endif"
                                               name="city_other">
                                        @endif
                                    </div>

                                    <div style="display: none" class="form-group required postenski">
                                        <label for="input-payment-postcode" class="control-label">{{trans('topprodukti.postCode')}}</label>
                                        <input type="text" class="form-control" id="input-payment-postcode"
                                               placeholder="{{trans('topprodukti.postCode')}}" value="@if(old('Zip')){{old('Zip')}}@elseif(isset($formData) && isset($formData['Zip'])){{$formData['Zip']}}@endif"
                                               name="Zip">
                                    </div>

                                    @include('clients.topprodukti.partials.cart-region')

                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            @if(count(config( 'clients.' . config( 'app.client') . '.type_delivery')))
                                <div class="col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-truck"></i> {{trans('topprodukti.typeDelivery')}}</h4>
                                        </div>
                                        <div class="panel-body">

                                            @foreach(config( 'clients.' . config( 'app.client') . '.type_delivery') as $key => $deliveryT)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="type_delivery" value="{{$key}}"
                                                               checked="checked">
                                                        {{$deliveryT['name']}}
                                                        - {{$deliveryT['price']}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(count(\EasyShop\Models\AdminSettings::getField('paymentMethods')))
                                <div class="col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-credit-card"></i> {{trans('topprodukti.typePayment')}}
                                            </h4>
                                        </div>
                                        <div class="panel-body">

                                            @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked="checked" name="paymentType"
                                                               value="{{$i['name']}}">
                                                        {{$i['display_name']}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"></h4>
                                        </div>
                                        <div class="panel-body">
                                            <p style="font-size: 12px; margin:0 0 3px;">&middot; {{trans('topprodukti.orderWithoutRisk')}}</p>

                                            <p style="font-size: 12px;margin:0 0 3px;">&middot; {{trans('topprodukti.deliveryEverywhere')}}</p>

                                            <p style="font-size: 12px;margin:0 0 3px;">&middot; {{trans('topprodukti.payOnDelivery')}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> {{trans('topprodukti.cart')}}</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">

                                            @if(session('error'))
                                            <h4 style="color: #F00">{{session('error')}}</h4>
                                            @endif

                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-left">{{trans('topprodukti.product')}}</td>
                                                    <td class="text-left">{{trans('topprodukti.quantity')}}</td>
                                                    <td class="text-right">{{trans('topprodukti.signlePrice')}}</td>
                                                    <td class="text-right">{{trans('topprodukti.total')}}</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $total_price = 0; ?>
                                                @foreach($products as $item)
                                                    <tr>
                                                        <td class="text-center"><a href="{{$item->url}}"><img
                                                                        src="{{$item->image}}" alt="{{$item->title}}"
                                                                        title="{{$item->title}}" class="img-thumbnail"></a>
                                                        </td>
                                                        <td class="text-left"><a
                                                                    href="{{$item->url}}">{{$item->title}}</a></td>
                                                        <td class="text-left">

                                                            <div class="input-group btn-block"
                                                                 style="max-width: 200px;">
                                                                <input table-shopping-qty=""
                                                                       data-id="{{$item->id}}"
                                                                       @if(!empty($item->variation))
                                                                       data-variation="{{$item->variation}}"
                                                                       @endif
                                                                       class="form-control"
                                                                       type="number"
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
                                                        <td class="text-right">{{$item->cena}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                                        <td class="text-right">
                                                            <span id="item_total_{{$item->id}}">{{$item->cena * $item->quantity}}</span> {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                            <a class="fa fa-close table-shopping-remove"
                                                               href="{{URL::to('cart/remove/')}}/{{$item->id}}@if($item->variation)/{{$item->variation}}@endif"></a>
                                                        </td>
                                                    </tr>
                                                    <?php $total_price = $total_price + ($item->cena * $item->quantity); ?>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <?php
                                                    $deliveries = config( 'clients.' . config( 'app.client') . '.type_delivery');
                                                    $delivery = array_pop($deliveries);
                                                ?>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>{{ $delivery['name'] }}</strong></td>
                                                    <td class="text-right">{{$delivery['price']}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>{{trans('global.email.total')}}</strong></td>
                                                    <td class="text-right">{{$total_price + $delivery['price']}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-pencil"></i> {{trans('topprodukti.comment')}}</h4>
                                    </div>
                                    <div class="panel-body">
                                        <textarea rows="4" class="form-control" id="confirm_comment"
                                                  name="comments"></textarea>
                                        <br>
                                        <!--
                                                                <label class="control-label" for="confirm_agree">
                                                                  <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                                                  <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                                        -->
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" id="button-confirm"
                                                       value="{{trans('topprodukti.order')}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
        {{csrf_field()}}
    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {


            $('[data-form]').submit(function () {
                $('#button-confirm').prop('disabled', true);
            });


            $("#city_id").on('change', function () {
                var selected_city = $("#city_id :selected").val();

                if (selected_city == '35') {
                    $(".city_other").show();
                    $(".postenski").show();
                } else {
                    $(".city_other").hide();
                    $(".postenski").hide();
                }
            });

            $("#country_id").on('change', function () {
                var selected_country = $("#country_id :selected").val();
                if (selected_country == '62') {
                    $("#mkd_gradovi").hide();
                    $(".country_other").show();
                    $(".city_other").show();
                    $(".postenski").show();
                } else if (selected_country == '1') {
                    $("#mkd_gradovi").show();
                    $(".country_other").hide();
                    $(".city_other").hide();
                    $(".postenski").hide();
                } else {
                    $("#mkd_gradovi").hide();
                    $(".country_other").hide();
                    $(".city_other").show();
                    $(".postenski").show();
                }
            });

            @if(in_array(config( 'app.client'), ['topprodukti_rs', 'topprodukti_bg', 'topprodukti_hr', 'topprodukti_si', 'topprodukti_sk', 'topprodukti_hu', 'topprodukti_pl', 'topprodukti_cz', 'topprodukti_ro']))
            $(".postenski").show();
            $("#city_id").val(35);
            $("#city_id").change();
            @endif

        })
    </script>
@stop