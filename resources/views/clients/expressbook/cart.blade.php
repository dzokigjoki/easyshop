@extends('clients.expressbook.layouts.default')

@section('content')

<section id="cart-page">
    <div class="container">

        {{--@if('')--}}
        <br>
        <h2 style="">Кошничка</h2>
        <span>*Бесплатна достава над 1200ден.</span>
        <br><br>
        <!-- ========================================= CONTENT ========================================= -->
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->
        <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

        <div class="col-xs-12 col-md-4 no-margin sidebar panel">
            {{--<a class="simple-link block"--}}
            {{--href="{{route('home')}}">Продолжи со купување</a>--}}
            <form id="checkoutForm" method="POST" action="" class="type_2 panel"
                data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/"
                data-cash-action="{{route('checksum.generate')}}">

                {{ csrf_field() }}

                <?php $totalPrice = 0; ?>
                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                @foreach($products as $product)
                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                <?php $priceWithDelivery = $totalPrice >= 1200 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                <!--                            --><?php //$priceWithDelivery = $totalPrice + $cargoPrice; ?>
                @endforeach
                <div class="shopping-cart-box">
                    <div class="form-group">
                        <label for="FirstName" class="required">Име</label>
                        <input type="text" class="form-control" required="" name="FirstName" id="FirstName" autofocus=""
                            required=""
                            value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" />
                        <br>
                        <label for="LastName" class="required">Презиме</label>
                        <input type="text" class="form-control" required="" name="LastName" id="LastName"
                            value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif" />
                        <br>
                        <label for="Email" class="required">Е-Пошта</label>
                        <input type="email" class="form-control" required="" name="Email" id="Email"
                            value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" />
                        <br>
                        <label for="Telephone" class="required">Телефонски број</label>
                        <input type="text" class="form-control" required="" name="Telephone" id="Telephone"
                            value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" />
                        <br>
                        <label for="Country" class="required">Држава</label>
                        <select id="Country" class="form-control" name="Country">
                            <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                            @foreach($all_countries as $ac)
                            <option @if(isset($country) && $country->id == $ac->id)
                                selected
                                @endif
                                value="{{$ac->id}}">{{$ac->country_name}}
                            </option>
                            @endforeach
                        </select>
                        <br>
                        <label for="City">Град<span class="color-base">*</span></label>
                        <select id="City" name="City" class="form-control">
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
                        <br>

                        <label for="Address" class="required">Адреса</label>
                        <input type="text" class="form-control" required="" name="Address" id="Address"
                            value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif" />
                        <br>

                        <label for="paymentType2">Начин на плаќање</label>
                        <input type="radio" checked="checked" value="gotovo" id="paymentType2" name="paymentType">
                        <label>Во готово</label><br>

                        {{--<span>--}}
                        {{--<input type="radio"--}}
                        {{--value="casys"--}}
                        {{--id="paymentType1"--}}
                        {{--name="paymentType">--}}
                        {{--<label>Картичка</label><br>--}}
                        {{--</span>--}}

                        <label for="type_delivery">Начин на испорака</label>
                        <input type="radio" checked="checked" value="cargo" name="type_delivery">
                        <label>Карго</label>
                        <input type="hidden" name="AmountToPay" value="{{$priceWithDelivery * 100}}" />
                        <input type="hidden" name="AmountCurrency" value="MKD" />
                        <input type="hidden" name="Details1" value="{{ucfirst(env("CLIENT"))}}-Нарачка" />
                        <input type="hidden" name="PayToMerchant"
                            value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                        <input type="hidden" name="MerchantName"
                            value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                        <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}" />
                        <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                        <input type="hidden" name="OriginalAmount" value="{{$priceWithDelivery}}" />
                        <input type="hidden" name="OriginalCurrency" value="MKD" />


                        {{--<div class="form-group">--}}
                        {{--<label for="inputZip">Zip/Postal Code</label>--}}
                        {{--<input type="text" class="form-control" id="inputZip">--}}
                        {{--</div>--}}
                        {{--<a href="#" class="btn btn-top btn-border btn-full color-default">CALCULATE SHIPPING</a>--}}

                    </div>
                </div>
                {{--<div class="shopping-cart-box">--}}
                {{--<h4>NOTE</h4>--}}
                {{--<p>--}}
                {{--Add special instructions for your order...--}}
                {{--</p>--}}

                {{--<textarea class="form-control" rows="10"></textarea>--}}

                {{--</div>--}}<br>

                <?php 
                    if($totalPrice >= 1200) {
                        $cargoPrice = 0;
                    }
                ?>

                <div class="widget cart-summary panel" style="font-size: 18px;/">
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <span>Цена на продукти</span>
                                <div class="value pull-right"><strong>{{number_format($totalPrice, 0, ',', '.')}}
                                        {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></div>
                            </li>
                            <li id="dostava">
                                <span>Достава </span>
                                <div class="value pull-right"><strong><span id="cargo_price"> {{$cargoPrice}} </span>
                                        ден.</strong></div>

                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <span>Вкупно</span>
                                <div class="value pull-right">
                                    <strong>{{number_format($totalPrice + $cargoPrice, 0, ',', '.')}}
                                        {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong>
                                </div>
                            </li>
                        </ul>
                        <br>
                        <div class="buttons-holder" style="text-align: center">
                            <button data-pay-button="" class="btn btn-primary btn-uppercase" type="submit">Нарачај
                            </button>
                            <Br>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <div class="col-xs-12 col-md-8 items-holder no-margin panel panel-default">

            {{--<table class="table">--}}
            <div class="row">
                <div class="col-xs-12 col-sm-2 no-margin hidden-xs" style="text-align: center;">
                    <h5>Слика</h5>
                </div>
                <div class="col-xs-12 col-sm-3 hidden-xs" style="text-align: center;">
                    <h5>Производ</h5>
                </div>
                <div class="col-xs-12 col-sm-1 no-margin hidden-xs" style="text-align: center;">
                    <h5>Кол.</h5>
                </div>
                <div class="col-xs-12 col-sm-2 no-margin hidden-xs" style="text-align: center;">
                    <h5>Цена</h5>
                </div>

                <div class="col-xs-12 col-sm-2 no-margin hidden-xs" style="text-align: center;">
                    <h5>Вкупно</h5>
                </div>

                <div class="col-xs-12 col-sm-1 no-margin hidden-xs" style="text-align: center;">
                    <h5>Избриши</h5>
                </div>

            </div>
            <br>
            @foreach($products as $product)
            <div class="row no-margin cart-item" style="text-align: center;">
                <div class="col-xs-12 col-sm-2 no-margin">
                    <a href="{{$product->url}}" class="thumb-holder">
                        <img class="lazy" alt="" src="{{$product->image}}" />
                    </a>
                </div>

                <div class="col-xs-12 col-sm-3" style="vertical-align: middle">
                    <div class="title" style="vertical-align: center">
                        <a href="{{$product->url}}">
                            {{$product->title}}
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-1 no-margin">
                    <div class="quantity">
                        <div class="le-quantity">
                            <span>x {{$product->quantity}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-2 no-margin">
                    <div class="price">
                        {{number_format($product->cena, 0, ',', '.')}}
                    </div>
                    <a class="close-btn" href="#"></a>
                </div>
                <div class="col-xs-12 col-sm-2 no-margin hidden-sm hidden-xs">
                    <div class="price">
                        {{number_format($product->cena * $product->quantity),0,',','.'}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-1 no-margin">
                    <a class="fa fa-times" style="font-size: 22px; color: #d9534f"
                        href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>
                </div>
            </div><!-- /.cart-item -->
            <hr>
            @endforeach
            {{--</table>--}}
        </div>

    </div>
    {{--</div><!-- /.widget -->--}}


    {{--</div><!-- /.sidebar -->--}}

    <!-- ========================================= SIDEBAR : END ========================================= -->
    {{--</div>--}}
    <br><br>
</section>

@endsection