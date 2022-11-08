@extends('clients.watchstore_old.layouts.default')
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
    <div style="padding-bottom: 0px;" class="padding section-block cart-overview">
        <div class="row">
            <div style="margin-top:14px;" class="overflow cart-review column width-7">
                <h3 class="widget-title">{{trans('watchstore.cart')}}</h3>
                <table class="table non-responsive">
                    <thead>
                    <tr>
                        <th class="product-thumbnail"></th>
                        <th class="product-name">{{trans('watchstore.name')}}</th>
                        <th class="product-price">{{trans('watchstore.price')}}</th>
                        <th class="product-quantity">{{trans('watchstore.quantity')}}</th>
                        <th class="product-subtotal">{{trans('watchstore.total')}}</th>
                        <th class="product-remove">{{trans('watchstore.remove')}}</th>
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

                        <td colspan="3" class=""><label>{{trans('watchstore.totalForProducts')}}</label></td>
                        <td colspan="2" class=""><label
                                    class="">{{number_format($totalPrice, 0, ',', '.')}}
                                {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                        </td>

                    </tr>

                    <tr class="cart-item">

                        <td colspan="3" class="bold"><label>{{trans('watchstore.delivery')}}</label></td>
                        <td colspan="2"
                            class=""><label class="table_summary">{{ $cargoPrice }}
                                {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                            {{--class="table_summary">{{ $totalPrice >= 2000 ? 0 : $cargoPrice }}--}}
                        </td>

                    </tr>

                    <tr class="cart-item">

                        <td colspan="3" class=""><label><h6>{{trans('watchstore.totalPrice')}}</h6></label></td>
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
                        <h3 class="widget-title">{{trans('watchstore.details')}}</h3>

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

                                    {!! csrf_field() !!}

                                    <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                                    @foreach($products as $product)
                                        <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                        <!--                                    --><?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                                            <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                        @endforeach

                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label>{{trans('watchstore.name')}}</label>
                                            <input type="text" class="form-control"
                                                   required="" name="FirstName"
                                                   id="FirstName"
                                                   autofocus=""
                                                   value="@if(old('FirstName')){{old('FirstName')}}
                                                   @elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                        </div>
                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label>{{trans('watchstore.surname')}}</label>
                                            <input type="text" class="form-control"
                                                   required="" name="LastName"
                                                   id="LastName"
                                                   value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                        </div>
                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label>{{trans('watchstore.email')}}</label>
                                            <input type="email" class="form-control"
                                                   required="" name="Email" id="Email"
                                                   value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                        </div>
                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label>{{trans('watchstore.telephone')}}</label>
                                            <input type="text" class="form-control"
                                                   required="" name="Telephone"
                                                   id="Telephone"
                                                   value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                                        </div>
                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label for="Country"
                                                   class="required">{{trans('watchstore.country')}}</label>
                                            <select id="Country" class="customInput form-control"
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
                                            <label for="City" class="required">{{trans('watchstore.city')}}</label>
                                            <input type="hidden" value="" id="city_value" name="City"/>


                                            <select id="City" name="City"
                                                    class="customInput form-control">
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
                                        </div>

                                        <div style="padding-bottom: 15px;" class="form-group">
                                            <label>{{trans('watchstore.address')}}</label>
                                            <input type="text" class="form-control"
                                                   required="" name="Address" id="Address"
                                                   value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>

                                        </div>
                                        <div><label>{{trans('watchstore.typePayment')}}: <strong>{{trans('watchstore.cash')}}</strong></label></div>

                                        <input type="hidden"
                                               name="paymentType"
                                               id="paymentType2"
                                               checked="checked"
                                               value="gotovo"
                                               class="form-control text validates-as-required">

                                        <div><label>{{trans('watchstore.typeDelivery')}}: <strong>{{trans('watchstore.cargo')}}</strong></label></div>
                                        <input type="hidden"
                                               name="type_delivery"
                                               checked="checked"
                                               value="cargo"
                                               class="form-control text validates-as-required"><br>

                                        <div style="text-align: left;">
                                            <button data-pay-button id="button-confirm" class="btn"
                                                    style="background: #222222; width: 100%;color: white;"
                                                    type="submit">{{trans('watchstore.order')}}
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