@extends('clients.dorikele.layouts.default')
@section('content')
<div class="media-overlay bkg-black opacity-02"></div>
<div class="row">
    <div class="column width-12">
        <div class="title-container">

        </div>
    </div>
</div>
<!--</div>-->
<!-- Intro Title Section 2 End -->

<!-- Checkout -->
<div class="section-block cart-overview">
    <div class="row">
        <div style="margin-top:14px; overflow: auto" class="cart-review column width-7">
            <h3 class="widget-title">Кошничка</h3>
            <table class="table non-responsive">
                <thead>
                <tr>
                    <th class="product-thumbnail"></th>
                    <th class="product-name">ИМЕ</th>
                    <th class="product-price">ЦЕНА</th>
                    <th class="product-quantity">КОЛИЧИНА</th>
                    <th class="product-subtotal">ВКУПНО</th>
                    <th class="product-remove">ИЗБРИШИ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr class="cart-item">
                    <td class="product-thumbnail">

                            <img src="{{$product->image}}" alt="{{$product->title}}"
                                 title="{{$product->title}}"/>

                    </td>
                    <td class="product-name">
                        <a href="{{$product->url}}"
                           class="product_title">{{$product->title}}</a>
                        {{--<a href="{{$product->url}}">--}}
                            {{--<br>--}}
                        {{--</a>--}}
                    </td>
                    <td class="product-price">
                        <span class="amount">{{number_format($product->cena, 0, ',', '.')}}</span>
                    </td>
                    <td class="product-quantity">
                        {{$product->quantity}}
                    </td>
                    <td class="product-subtotal">
                        <span class="amount">{{number_format($product->cena * $product->quantity, 0, ',', '.')}}</span>
                    </td>
                    <td class="product-remove center">
                        <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="product-remove fa fa-times"></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <?php $totalPrice = 0; ?>
                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                @foreach($products as $product)
                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                    <!--                                    --><?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                    <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                @endforeach
                <tr class="table-footer">

                    <td colspan="3" class=""><label>Цена на продукти</label></td>
                    <td colspan="2" class=""><label
                                class="">{{number_format($totalPrice, 0, ',', '.')}}
                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                    </td>

                </tr>

                <tr class="cart-item">

                    <td colspan="3" class="bold"><label>Испорака</label></td>
                    <td colspan="2"
                        class=""><label class="table_summary">{{ $cargoPrice }}
                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                        {{--class="table_summary">{{ $totalPrice >= 2000 ? 0 : $cargoPrice }}--}}
                    </td>

                </tr>

                <tr class="cart-item">

                    <td colspan="3" class=""><label><h6>Вкупно</h6></label></td>
                    <td class="product-price"><label class="table_summary"><h6>{{number_format($priceWithDelivery, 0, ',',
                                            '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</h6></label>
                    </td>

                </tr>

                </tfoot>
            </table>
        </div>
        <div class="column width-4 push-1">
            <div class="aux-details box large">
                <div class="accordion product-addtional-info style-2">
                    <h3 class="widget-title">Детали за наплата</h3>

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
                                <form id="checkoutForm"
                                      method="POST"
                                      action="{{route('checksum.generate')}}"
                                      class="type_2">

                                {{ csrf_field() }}

                                <?php $totalPrice = 0; ?>
                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                                @foreach($products as $product)
                                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                    <!--                                    --><?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                                        <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                    @endforeach

                                    <input type="hidden" name="_token"
                                           value="rKL1uCK7yO90EysqEOPpiohC716qjyX8Mm7EFgNE">
                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label>Име</label>
                                        <input type="text" class="form-control"
                                               required="" name="FirstName"
                                               id="FirstName"
                                               autofocus=""
                                               required=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                    </div>
                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label>Презиме</label>
                                        <input type="text" class="form-control"
                                               required="" name="LastName"
                                               id="LastName"
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                    </div>
                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control"
                                               required="" name="Email" id="Email"
                                               value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                    </div>
                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label>Телефонски број</label>
                                        <input type="text" class="form-control"
                                               required="" name="Telephone"
                                               id="Telephone"
                                               value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                                    </div>
                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label for="Country"
                                               class="required">Држава</label>
                                        <select id="Country" class="form-control"
                                                name="Country">
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

                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label for="City" class="required">Град</label>
                                        <input type="hidden" value="" id="city_value" name="City"/>


                                        <select id="City" name="City"
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
                                        </select>

                                        <input style="display: none;" class="form-control"
                                               type="text"
                                               id="city_other"
                                               name="city_other"
                                               value="">
                                    </div>

                                    <div style="padding-bottom: 15px;" class="form-group">
                                        <label>Адреса</label>
                                        <input type="text" class="form-control"
                                               required="" name="Address" id="Address"
                                               value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>

                                    </div>
                                    {{--<div class="form-group">--}}
                                        {{--<label>Метод на испорака</label>--}}


                                        {{--<div class="checkbox">--}}
                                            {{--<label>--}}
                                                {{--<input type="radio" name="type_delivery" checked=""--}}
                                                       {{--value="novaPosta">&nbsp--}}
                                                {{--Карго (<span data-delivery="">100</span> МКД)--}}
                                                {{--<br>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<label>Начин на плаќање</label>--}}

                                        {{--<div class="checkbox">--}}
                                            {{--<label>--}}
                                                {{--<input type="radio" checked="checked"--}}
                                                       {{--name="paymentType" value="gotovo"/>--}}
                                                {{--Во готово--}}
                                            {{--</label>&nbsp;&nbsp;&nbsp;--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div style="text-align: left;">
                                        <button class="btn"
                                                style="background: #222222; width: 100%;color: white;"
                                                type="submit">Нарачај
                                        </button>
                                    </div>
                                </form>
                                <!--<input type="hidden" value="МКД" id="selectedCurrency"/>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
</div>
@endsection