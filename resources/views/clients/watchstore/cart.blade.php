@extends('clients.watchstore.layouts.default')
@section('content')
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="headline">
                        <h2>{{trans('watchstore.cart')}}</h2>
                    </div>
                    <div class="table-responsive">
                        <?php $totalPrice = 0; ?>
                        <?php $cargoPrice = 118 ?>

                        @foreach($products as $product)
                            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                            <?php $priceWithDelivery = $totalPrice >= 999 ? $totalPrice : $totalPrice + $cargoPrice;?>
                        @endforeach
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="cart-product item">{{trans('watchstore.product')}}</th>
                                <th class="cart-unit item">{{trans('watchstore.name')}}</th>
                                <th class="cart-unit item">{{trans('watchstore.price')}}</th>
                                <th class="cart-qty item">{{trans('watchstore.quantity')}}</th>
                                <th class="cart-sub-total last-item">{{trans('watchstore.total')}}</th>
                                <th class="cart-romove item">{{trans('watchstore.delete')}}</th>
                            </tr>
                            </thead>
                            <!-- /thead -->
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                </td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td style="border: none" class="cart-image">
                                        <a class="entry-thumbnail">
                                            <img style="width: 50px; height: 50px;" src="{{$product->image}}"
                                                 alt="{{$product->title}}"
                                                 title="{{$product->title}}"/>
                                        </a>
                                    </td>
                                    <td style="border: none; padding-top: 18px;" class="cart-product-name-info">
                                        <div>
                                            <h4 class="cart-product-description">
                                                <a href="{{$product->url}}"
                                                   class="product_title">{{$product->title}} @if(!$product->variationValuesAndIds()->isEmpty())
                                                        @foreach($product->variationValuesAndIds() as $variations)
                                                            @if($product->variation == $variations->id)
                                                                ({{$variations->value}})@endif
                                                        @endforeach
                                                    @endif</a>
                                            </h4>
                                        </div>
                                    </td>

                                    <td style="border: none; padding-top: 18px;" class="cart-product-price">
                                        <div style="font-size:16px;" class="">
                                            <h5>{{number_format($product->cena, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</h5>
                                        </div>
                                    </td>
                                    <td style="border: none; padding-top: 18px;" class="cart-product-quantity">
                                        <div class="quant-input" style="margin-top: 0">
                                            <input table-shopping-qty=""
                                                   data-id="{{$product->id}}"
                                                   @if(!empty($product->variation))
                                                   data-variation="{{$product->variation}}"
                                                   @endif
                                                   class="form-control"
                                                   type="_"
                                                   value="{{$product->quantity}}"/>
                                        </div>
                                    </td>
                                    <td style="border: none; padding-top: 18px;" class="cart-product-delivery">
                                        <div class="">
                                            <h5>{{number_format($product->cena * $product->quantity, 0, ',', '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</h5>
                                        </div>
                                    </td>
                                    <td style="border: none; padding-top: 18px;" class="romove-item">
                                        <h5>
                                            <a style="color:red;" class="fa fa-close table-shopping-remove"
                                               href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif">
                                                {{--<img src="/assets/watchstore/images/remove.png" alt="">--}}
                                            </a>
                                        </h5>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!-- /tbody -->
                        </table>
                        <!-- /table -->
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12 col-sm-offset-0 col-xs-12">
                            <?php $totalPrice = 0; ?>
                            <?php $cargoPrice = 118 ?>

                            @foreach($products as $product)
                                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                <?php $priceWithDelivery = $totalPrice >= 999 ? $totalPrice : $totalPrice + $cargoPrice;?>
                            @endforeach
                            <table class="table total-table">
                                <tbody>
                                <tr>
                                    <td class="total-table-title">{{trans('watchstore.totalForProducts')}}:</td>
                                    <td>{{number_format($totalPrice, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">{{trans('watchstore.price_delivery')}}:</td>
                                    <td>
                                        @if($totalPrice >= 1000)
                                            <?php $cargoPrice = 0 ?>
                                        @endif
                                        {{ $cargoPrice }}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>{{trans('watchstore.totalPrice')}}:</td>
                                    <td>{{number_format($priceWithDelivery, 0, ',',
                                            '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="md-margin"></div><!-- End .space -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="headline">
                        <h2>{{trans('watchstore.payment_details')}}</h2>
                    </div>
                    <div class="billing">
                        <form id="checkoutForm"
                              method="POST"
                              action="{{route('checksum.generate')}}"
                              class="type_2">

                            {{ csrf_field() }}

                            <div class="check-aside">
                                <div class="accordion-content second-row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{trans('watchstore.first_name')}}<span>*</span></label>
                                            <input value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"
                                                   type="text" class="form-control text validates-as-required"
                                                   required="" name="FirstName"
                                                   id="FirstName"
                                                   autofocus="">
                                        </div>
                                        <div class="col-md-6">
                                            <label>{{trans('watchstore.last_name')}}<span>*</span></label>
                                            <input required value="@if(old('LastName')){{old('LastName')}}
                                            @elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}
                                            @else{{isset($user) ? $user->last_name : ''}}@endif" type="text"
                                                   class="form-control text validates-as-required" name="LastName"
                                                   id="LastName"
                                            >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>{{trans('watchstore.phone_number')}}<span>*</span></label>
                                            <input required
                                                   value="@if(old('Telephone')){{old('Telephone')}}
                                                   @elseif(isset($formData) &&
                                               isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"
                                                   type="text" class="form-control text validates-as-required"
                                                   name="Telephone"
                                                   id="Telephone">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>{{trans('watchstore.email_text')}}</label>
                                            <input required
                                                   value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"
                                                   type="text" class="form-control text validates-as-required"
                                                   name="Email" id="Email"
                                            >
                                        </div>
                                    </div>
                                    <br>
                                    <label>{{trans('watchstore.country')}} <span>*</span></label>

                                    @if(config( 'app.client') == 'watchstore_al')

                                        <select readonly class="form-control" id="country_other" name="country_other">
                                            <option selected
                                                    value="Kosova">Kosova
                                            </option>
                                        </select>
                                    @else
                                        <select class="form-control" id="Country" name="Country">
                                            <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                            @foreach($all_countries as $ac)
                                                <option @if(isset($country) && $country->id == $ac->id)
                                                        selected
                                                        @endif
                                                        value="{{$ac->id}}">{{$ac->country_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <br>
                                    <label>{{trans('watchstore.city')}} <span>*</span></label>
                                    @if(config( 'app.client') == 'watchstore_al')


                                        <input type="text" class="form-control text validates-as-required"
                                               id="city_other" placeholder=""
                                               required value="@if(old('city_other'))
                                        {{old('city_other')}}@elseif(isset($formData) && isset($formData['city_other'])){{$formData['city_other']}}@endif"
                                               name="city_other">


                                    @else
                                        <select id="City" name="City" class="form-control">
                                            <option value="">-- Избери град --</option>
                                            @foreach($all_cities as $city)
                                                Don't show city Друго
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
                                    @endif

                                    <br>
                                        <label for="input-payment-postcode" class="control-label">ZIP</label>
                                        <input required type="text" class="form-control text validates-as-required" id="input-payment-postcode"
                                               value="@if(old('Zip')){{old('Zip')}}@elseif(isset($formData) && isset($formData['Zip'])){{$formData['Zip']}}@endif"
                                               name="Zip"><br>


                                    <label>{{trans('watchstore.address')}} <span>*</span></label>
                                    <input value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"
                                           type="text" class="form-control text validates-as-required"
                                           name="Address" id="Address"
                                    >

                                    <div><label>{{trans('watchstore.type_of_payment')}}:
                                            <strong>{{trans('watchstore.cash')}}</strong></label></div>

                                    <input type="hidden"
                                           name="paymentType"
                                           id="paymentType2"
                                           checked="checked"
                                           value="gotovo"
                                           class="form-control text validates-as-required">

                                    <div><label>{{trans('watchstore.type_of_delivery')}}:
                                            <strong>{{trans('watchstore.cargo')}}</strong></label></div>
                                    <input type="hidden"
                                           name="type_delivery"
                                           checked="checked"
                                           value="cargo"
                                           class="form-control text validates-as-required">
                                </div>


                                <div class="shipping">
                                    <input data-pay-button="" type="submit" class="customBtn icon-btn-left"
                                           value="{{trans('watchstore.order')}}"
                                           style="float:right; width:40%; padding:10px; line-height: unset;"><span
                                            class="icon icon-check_circle"></span>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection