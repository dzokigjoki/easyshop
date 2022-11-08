@extends('clients.betajewels.layouts.default')
@section('content')
<style>
    .x-button {
        margin-top: 11px;
    }
</style>
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="headline">
                        <h2>{{trans('betajewels.cart')}}</h2>
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
                                <th class="cart-product item">{{trans('betajewels.product')}}</th>
                                <th class="cart-unit item">{{trans('betajewels.name')}}</th>
                                <th class="cart-unit item">{{trans('betajewels.price')}}</th>
                                <th class="cart-qty item">{{trans('betajewels.quantity')}}</th>
                                <th class="cart-sub-total last-item">{{trans('betajewels.total')}}</th>
                                <th class="cart-romove item"></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                </td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="cart-image border-none">
                                        <a class="entry-thumbnail">
                                            <img class="cart-product-image" src="{{$product->image}}"
                                                 alt="{{$product->title}}"
                                                 title="{{$product->title}}"/>
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info pt-20 no-border">
                                        <div>
                                            <h4 class="cart-product-description">
                                                <a href="{{$product->url}}"
                                                   class="product_title">{{$product->title}}</a>
                                            </h4>
                                        </div>
                                    </td>

                                    <td class="cart-product-delivery pt-20 no-border">
                                        <div class="">
                                            <h5>{{number_format($product->cena, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</h5>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity pt-20 no-border">
                                        <div class="quant-input mt-0">
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
                                    <td class="cart-product-delivery pt-20 no-border">
                                        <div class="">
                                            <h5>{{number_format($product->cena * $product->quantity, 0, ',', '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</h5>
                                        </div>
                                    </td>
                                        <td class="rmove-item pt-20 no-border text-center ">
                                            <a href="{{URL::to('cart/remove/')}}/{{$product->id}}">
                                          <i class="color-red x-button fa fa-times"
                                          ></i>
                                            
                                              </a>
                                      </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                                    <td class="total-table-title"><span class="color-black">{{trans('betajewels.totalForProducts')}}:<span></td>
                                    <td><span class="color-black">{{number_format($totalPrice, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">
                                        <span class="color-black">
                                        {{trans('betajewels.price_delivery')}}:
                                        </span>
                                    </td>
                                    <td>
                                        @if($totalPrice >= 1000)
                                            <?php $cargoPrice = 0 ?>
                                        @endif
                                        <span class="color-black">
                                        {{ $cargoPrice }}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><span class="color-black">{{trans('betajewels.totalPrice')}}:</span></td>
                                    <td><span class="color-black">{{number_format($priceWithDelivery, 0, ',',
                                            '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="md-margin"></div><!-- End .space -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="headline">
                        <h2>{{trans('betajewels.payment_details')}}</h2>
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
                                            <span class="color-black">{{trans('betajewels.first_name')}}<span>*</span></span>
                                            <input value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"
                                                   type="text" class="form-control text validates-as-required"
                                                   required="" name="FirstName"
                                                   id="FirstName"
                                                   autofocus="">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="color-black">{{trans('betajewels.last_name')}}<span>*</span></span>
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
                                            <span class="color-black">{{trans('betajewels.phone_number')}}<span>*</span></span>
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
                                            <span class="color-black">{{trans('betajewels.email_text')}}</span>
                                            <input required
                                                   value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"
                                                   type="text" class="form-control text validates-as-required"
                                                   name="Email" id="Email"
                                            >
                                        </div>
                                    </div>
                                    <br>
                                    <span class="color-black">{{trans('betajewels.country')}} <span>*</span></span>

                                  
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
                              
                                    <br>
                                    <span class="color-black">{{trans('betajewels.city')}} <span>*</span></span>
                                 
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
                          

                                    <br>
                                        <span for="input-payment-postcode" class="control-label color-black">ZIP</span>
                                        <input required type="text" class="form-control text validates-as-required" id="input-payment-postcode"
                                               value="@if(old('Zip')){{old('Zip')}}@elseif(isset($formData) && isset($formData['Zip'])){{$formData['Zip']}}@endif"
                                               name="Zip"><br>


                                    <span class="color-black">{{trans('betajewels.address')}} <span>*</span></span>
                                    <input value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"
                                           type="text" class="form-control text validates-as-required"
                                           name="Address" id="Address"
                                    >
                                    <br>
                                    <div><span class="color-black">{{trans('betajewels.type_of_payment')}}:
                                            <strong>{{trans('betajewels.cash')}}</strong></span></div>

                                    <input type="hidden"
                                           name="paymentType"
                                           id="paymentType2"
                                           checked="checked"
                                           value="gotovo"
                                           class="form-control text validates-as-required">

                                    <div><span class="color-black">{{trans('betajewels.type_of_delivery')}}:
                                            <strong>{{trans('betajewels.cargo')}}</strong></span></div>
                                    <input type="hidden"
                                           name="type_delivery"
                                           checked="checked"
                                           value="cargo"
                                           class="form-control text validates-as-required">
                                </div>


                                <div class="shipping">
                                    <input data-pay-button="" type="submit" class="customBtn icon-btn-left"
                                           value="{{trans('betajewels.order')}}"
                                           id="pay-button"><span
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