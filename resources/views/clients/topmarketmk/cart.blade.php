@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">
        <div id="breadcrumb-container">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Дома</a></li>
                    <li class="active">Кошничка</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <header class="content-title">
                        <h1 class="title">Кошничка</h1>
                        <p class="title-desc">Сигурна и брза достава за максимум 48 часа!</p>
                    </header>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <div class="xs-margin"></div><!-- space -->
                    <div class="row">

                        <div class="col-md-12 col-sm-12 table-responsive">

                            <table class="table cart-table">
                                <thead>
                                <tr>
                                    <th class="table-title">Продукт</th>
                                    <th class="table-title">Цена</th>
                                    <th class="table-title">Количина</th>
                                    <th class="table-title">Вкупно</th>
                                    <th class="table-title">Избриши</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td class="item-name-col">
                                        <figure>
                                            <a href="{{$product->url}}">
                                                <img src="{{$product->image}}" alt="{{$product->title}}"
                                                     title="{{$product->title}}"/>
                                            </a>
                                        </figure>
                                        <header class="item-name"><a href="{{$product->url}}">{{$product->title}}</a></header>
                                        <ul>
                                            <li>Color: White</li>
                                            <li>Size: SM</li>
                                        </ul>
                                    </td>
                                    <td class="item-price-col"><span class="item-price-special">{{number_format($product->cena, 0, ',', '.')}} мкд.</span></td>
                                    <td>
                                        <div class="custom-quantity-input">
                                            <input table-shopping-qty=""
                                                   table-shopping-qty=""
                                                   data-id="{{$product->id}}"
                                                   @if(!empty($product->variation))
                                                   data-variation="{{$product->variation}}"
                                                   @endif
                                                   type="text"
                                                   name="quantity"
                                                   value="{{$product->quantity}}">
                                            <a href="#" onclick="return false;" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a>
                                            <a href="#" onclick="return false;" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>
                                        </div>
                                    </td>
                                    <td class="item-total-col"><span class="item-price-special">{{number_format($product->cena * $product->quantity, 0, ',', '.')}} мкд.</span>

                                    </td>
                                    <td class="item-code"> <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" class="close-button"></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div><!-- End .col-md-12 -->

                    </div><!-- End .row -->
                    <div class="lg-margin"></div><!-- End .space -->

                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12 col-sm-offset-0 col-xs-12">
                        <?php $totalPrice = 0; ?>
                        <?php $cargoPrice = 110 ?>

                            @foreach($products as $product)
                                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                <?php $priceWithDelivery = $totalPrice + $cargoPrice;?>
                            @endforeach
                            <table class="table total-table">
                                <tbody>
                                <tr>
                                    <td class="total-table-title">Цена на производи:</td>
                                    <td>{{number_format($totalPrice, 0, ',', '.')}} мкд.</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">Достава:</td>
                                    <td>
                                        {{$cargoPrice}} мкд.
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Вкупно за наплата:</td>
                                    <td>{{number_format($priceWithDelivery, 0, ',',
                                            '.')}} мкд.</td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="md-margin"></div><!-- End .space -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                    <div class="md-margin2x"></div><!-- Space -->
                </div><!-- End .col-md-12 -->
                <div class="topCustom col-lg-4 col-md-8 col-sm-10 col-sm-offset-1 col-xs-10 col-lg-offset-0 col-xs-offset-1">
                            <div class="row">
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

                                {!! csrf_field() !!}

                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                                @foreach($products as $product)
                                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                    <?php $priceWithDelivery = $totalPrice + $cargoPrice;?>
                                @endforeach

                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Име &#42;</span></span>
                                        <input type="text" class="form-control input-lg"
                                               required="" name="FirstName"
                                               id="FirstName"
                                               autofocus=""
                                               value="@if(old('FirstName')){{old('FirstName')}}
                                               @elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>

                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Презиме &#42;</span></span>
                                        <input type="text" class="form-control input-lg"
                                               required="" name="LastName"
                                               id="LastName"
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>

                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Е-пошта &#42;</span></span>
                                        <input type="email" class="form-control input-lg"
                                               required="" name="Email" id="Email"
                                               value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Телефон &#42;</span></span>
                                        <input type="text" class="form-control input-lg"
                                               required="" name="Telephone"
                                               id="Telephone"
                                               value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>

                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-address">
                                            </span><span class="input-text">Адреса &#42;</span></span>
                                        <input type="text" class="form-control input-lg"
                                               required="" name="Address" id="Address"
                                               value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif">
                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text">Држава *</span></span>
                                        <div class="large-selectbox clearfix">
                                            <select id="Country" class="selectBox form-control"
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
                                        </div><!-- End .large-selectbox-->
                                    </div><!-- End .input-group -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="input-icon input-icon-city"></span><span class="input-text">Град &#42;</span></span>
                                        <select id="City" name="City"
                                                class="form-control selectbox">
                                            <option value="">{{trans('watchstore.chose_city')}}</option>
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
                                    </div><!-- End .input-group -->
                                    <div class="input-group custom-checkbox md-margin">
                                        <div><label>Начин на плаќање: <strong>Во готово</strong></label></div>

                                        <input type="hidden"
                                               name="paymentType"
                                               id="paymentType2"
                                               checked="checked"
                                               value="gotovo"
                                               class="form-control text validates-as-required">

                                        <div><label>Начин на испорака: <strong>Карго</strong></label></div>
                                        <input type="hidden"
                                               name="type_delivery"
                                               checked="checked"
                                               value="cargo"
                                               class="form-control text validates-as-required"><br>
                                    </div><!-- End .input-group -->
                                    <div style="text-align: left;">
                                        <button style="width:100%" data-pay-button id="button-confirm" class="btn btn-custom-2"
                                                type="submit">НАРАЧАЈ
                                        </button>
                                    </div>
                                </form>
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .panel-body -->
                    </div><!-- End .panel-collapse -->
    </section><!-- End #content -->

@endsection