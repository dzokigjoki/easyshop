@extends('clients.kliknikupi.layouts.default')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li>Кошничка</li>
            </ul>
        </div>
    </div>
    <!-- Content -->
    <div id="pageContent">
        <div class="container offset-18">
            {{--<h1 class="block-title text-inherit large text">Кошничка</h1>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping-cart-col">
                        <h2>Кошничка</h2>
                        <table class="shopping-cart-table">
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="product-image">
                                            <a href="{{$product->url}}">
                                                <img src="{{$product->image}}"
                                                     alt="{{$product->title}}"
                                                     title="{{$product->title}}"/>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="product-title">
                                            <a href="{{$product->url}}">{{$product->title}}</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="product-price unit-price">
                                            {{number_format($product->cena , 0, ',', '.')}} ден.
                                        </div>
                                    </td>
                                    <td>
                                        <div class="detach-quantity-desctope">
                                            <div class="input">
                                                <label>x</label>

                                                {{--<span class="minus-btn"></span>--}}
                                                {{--<input type="text" value="1" size="5"/>--}}
                                                <span>{{$product->quantity}}</span>
                                                {{--<span class="plus-btn"></span>--}}

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-price subtotal">
                                            {{number_format($product->cena * $product->quantity, 0, ',', '.')}} ден.
                                        </div>
                                    </td>
                                    <td>
                                        <a class="fa fa-times" href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="shopping-cart-btns">
                            <div class="pull-left">
                                <a class="btn btn-full icon-btn-left" href="{{route('home')}}"><span
                                            class="icon icon-keyboard_arrow_left"></span>Продолжи со купување</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12 shopping-cart-box-aside">
                        <form id="checkoutForm"
                              method="POST"
                              action="{{route('checksum.generate')}}"
                              class="type_2">

                        {{ csrf_field() }}

                        <?php $totalPrice = 0; ?>
                        <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                        @foreach($products as $product)
                            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                            <?php $priceWithDelivery = $totalPrice >= 1000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                            <!--                            --><?php //$priceWithDelivery = $totalPrice + $cargoPrice; ?>
                            @endforeach
                            <h2>Информации за достава</h2>
                            <div class="shopping-cart-box">
                                {{--<h4>ESTIMATE SHIPPING AND TAX</h4>--}}




                                {{--<p>Enter your destination to get a shipping estimate.</p>--}}

                                <div class="form-group">


                                    <label for="FirstName"
                                           class="required">Име</label>
                                    <input type="text" class="form-control"
                                           required="" name="FirstName"
                                           id="FirstName"
                                           autofocus=""
                                           required=""
                                           value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                    <label for="LastName"
                                           class="required">Презиме</label>
                                    <input type="text" class="form-control"
                                           required="" name="LastName"
                                           id="LastName"
                                           value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                    <label for="Email"
                                           class="required">Е-Пошта</label>
                                    <input type="email" class="form-control"
                                           required="" name="Email" id="Email"
                                           value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                    <label for="Telephone" class="required">Телефонски број</label>
                                    <input type="text" class="form-control"
                                           required="" name="Telephone"
                                           id="Telephone"
                                           value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
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
                                    <label for="City">Град<span class="color-base">*</span></label>
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
                                    <label for="Address"
                                           class="required">Адреса</label>
                                    <input type="text" class="form-control"
                                           required="" name="Address" id="Address"
                                           value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>
                                    <label for="comments">Забелешки:</label>
                                    <textarea rows="4" class="form-control" id="confirm_comment"
                                              name="comments"></textarea>
                                </div>
                                <label for="paymentType2">Начин на плаќање</label>
                                <input type="radio" checked="checked" value="gotovo"
                                       id="paymentType2"
                                       name="paymentType">
                                <label>Во готово</label><br>
                                <label for="type_delivery">Начин на испорака</label>
                                <input type="radio" checked="checked" value="cargo" name="type_delivery">
                                <label>Карго</label>


                                {{--<div class="form-group">--}}
                                {{--<label for="inputZip">Zip/Postal Code</label>--}}
                                {{--<input type="text" class="form-control" id="inputZip">--}}
                                {{--</div>--}}
                                {{--<a href="#" class="btn btn-top btn-border btn-full color-default">CALCULATE SHIPPING</a>--}}

                            </div>
                            {{--<div class="shopping-cart-box">--}}
                            {{--<h4>NOTE</h4>--}}
                            {{--<p>--}}
                            {{--Add special instructions for your order...--}}
                            {{--</p>--}}

                            {{--<textarea class="form-control" rows="10"></textarea>--}}

                            {{--</div>--}}
                            <div class="shopping-cart-box">
                                <table class="table-total">
                                    <tbody>
                                    <tr>
                                        <th class="text-left">Цена на продукти:</th>
                                        <td class="text-right">{{number_format($totalPrice, 0, ',', '.')}}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Испорака:</th>
                                        <td class="text-right">{{ $totalPrice >= 1000 ? 0 : $cargoPrice }}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Вкупно:</th>
                                        <td>{{number_format($priceWithDelivery, 0, ',',
                                    '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-full icon-btn-left"><span
                                            class="icon icon-check_circle"></span>Нарачај
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
