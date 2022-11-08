@extends('clients.bloomtea.layouts.default')
@section('content')
    <div class="bg0 p-t-95 p-b-50" id="cart-container">
        <div class="container" id="cart-desktop">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 p-b-50">
                    <div>
                        <h4 class="txt-m-124 cl3 p-b-28">
                            Информации за наплата
                        </h4>
                        <form id="checkoutForm"
                              method="POST"
                              action="{{route('checksum.generate')}}"
                              class="type_2">

                            {{ csrf_field() }}


                            <?php $totalPrice = 0; ?>
                            <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                            @foreach($products as $product)
                                <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                                <?php $priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                            @endforeach

                            <input type="hidden" name="AmountToPay" value="{{$priceWithDelivery * 100}}"/>
                            <input type="hidden" name="AmountCurrency" value="MKD"/>
                            <input type="hidden" name="Details1" value="{{ucfirst(env("CLIENT"))}}-Нарачка"/>
                            <input type="hidden" name="PayToMerchant"
                                   value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                            <input type="hidden" name="MerchantName"
                                   value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}"/>
                            <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
                            <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
                            <input type="hidden" name="OriginalAmount" value="{{$priceWithDelivery}}"/>
                            <input type="hidden" name="OriginalCurrency" value="MKD"/>


                            <div class="row p-b-50">
                                <div class="col-sm-12 p-b-23">
                                    <div class="col-md-4 col-sm-4 pull-left">
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Име <span class="cl12">*</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8 pull-left">
                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                               type="text" required="" name="FirstName">
                                    </div>
                                    {{--</div>--}}
                                </div>

                                <div class="col-sm-12 p-b-23">
                                    <div>
                                        <div class="col-md-4 col-sm-4 txt-s-101 cl6 p-b-10 pull-left">
                                            Презиме <span class="cl12">*</span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 pull-left">
                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                   type="text" required="" name="LastName"
                                                   id="LastName">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 p-b-23">
                                    <div>
                                        <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                            Email <span class="cl12">*</span>
                                        </div>

                                        <div class="col-sm-8 col-md-8 pull-left">
                                            <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                   type="text" required="" name="Email" id="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 p-b-23">
                                    <div>
                                        <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                            Телефон <span class="cl12">*</span></div>
                                        <div class="col-md-8 col-sm-8 pull-left">
                                            <input class="plh2 txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1"
                                                   type="text" required="" name="Telephone"
                                                   id="Telephone">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 p-b-23">
                                    {{--<div>--}}
                                    <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                        Адреса <span class="cl12">*</span>
                                    </div>

                                    <div class="col-md-8 col-sm-8 pull-left">
                                        <input class="plh2 txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1 m-b-20"
                                               type="text" required="" name="Address" id="Address">
                                    </div>
                                    {{--</div>--}}

                                </div>




                                <div class="col-sm-12 p-b-23">
                                    <div>
                                        <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                            Држава<span class="cl12">*</span>
                                        </div>

                                        <div class="col-md-8 col-sm-8 pull-left rs1-select2 rs2-select2 bg0 w-full bo-all-1 bocl15">
                                            <select class="js-select2" id="Country" name="Country">
                                                <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                                @foreach($all_countries as $ac)
                                                    <option @if(isset($country) && $country->id == $ac->id)
                                                            selected
                                                            @endif
                                                            value="{{$ac->id}}">{{$ac->country_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 p-b-23">
                                    <div>
                                        <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                            Град<span class="cl12">*</span>
                                        </div>

                                        <div class="col-md-8 col-sm-8 pull-left rs1-select2 rs2-select2 bg0 w-full bo-all-1 bocl15">
                                            <select class="js-select2" id="City" name="City">
                                                <option value="">-- Избери град --</option>
                                                @foreach($all_cities as $city)
                                                    {{-- Don't show city Друго --}}
                                                    @if($city->id != 35)
                                                        <option @if(isset($user->city_id) && $user->city_id == $city->id)
                                                                selected
                                                                @endif
                                                                value="{{$city->id}}"
                                                                data-name="{{$city->city_name}}"
                                                                data-zip="{{$city->zip}}">
                                                            {{$city->city_name}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="col-12 p-b-23">
                                        <div class="col-md-4 col-sm-4 pull-left txt-s-101 cl6 p-b-10">
                                            Начин на плаќање<span class="cl12">*</span>
                                        </div>
                                        {{--<span></span>--}}
                                        <div class="col-md-8 col-sm-8 pull-left flex-w flex-m bo-b-1 bocl15 p-rl-20 p-tb-16">
                                            <input class="m-r-15"
                                                   type="radio"
                                                   checked="checked"
                                                   value="gotovo"
                                                   id="paymentType2"
                                                   name="paymentType">
                                            <label class="txt-m-103 cl6" for="radio1">
                                                Во готово
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-12 p-b-23">
                                        <div class="col-sm-4 col-md-4 pull-left txt-s-101 cl6 p-b-10">
                                            Начин на испорака<span class="cl12">*</span>
                                        </div>
                                        {{--<span></span>--}}
                                        <div class="col-md-8 col-sm-8 pull-left flex-w flex-m bo-b-1 bocl15 p-rl-20 p-tb-16">
                                            <input type="radio" class="m-r-15" checked="checked" value="cargo"
                                                   name="type_delivery">
                                            <label class="txt-m-103 cl6" for="radio1">
                                                Карго
                                            </label>
                                        </div>
                                    </div>

                                    <button data-pay-button type="submit"
                                            class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                                        Нарачај
                                    </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-md-7 col-lg-7 col-xs-12 col-sm-12 p-b-50">
                    <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">


                        <?php $totalPrice = 0; ?>
                        <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                        @foreach($products as $product)
                            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
                            <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                        @endforeach
                        <h4 class="txt-m-124 cl3 p-b-11" style="padding-top: 15px;">
                            Вашата кошничка
                        </h4>

                        <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
							<span>
								{{--Продукт--}}
							</span>

                            <span>

							</span>
                        </div>

                        <!--  -->
                        @foreach($products as $product)
                            <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">

                            <span>
                                <img src="{{$product->image}}" style="width: 70px; height: auto;">
                            </span>

                                <span>
								{{$product->title}}
                                    <img class="m-rl-3" src="{{ url_assets('/bloomtea/images/icon-multiply.png') }}" alt="icon">
                                    {{$product->quantity}}
							</span>

                                <span>
								{{number_format($product->cena, 0, ',', '.')}} ден.
							</span>
                                <span>
                                <a class="fa fa-times" style="color: red;"
                                   href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a>
                            </span>
                            </div>
                        @endforeach


                        <div class="flex-w flex-m txt-m-103 p-tb-23">

                                <span class="size-w-61 cl6" style="padding-right: 10px;">
								Цена на продукти
							</span>

                            <span class="size-w-62 cl10">
								{{$totalPrice}} ден.
							    </span>

                            <br>
                            <span class="size-w-61 cl6" style="padding-right: 10px;">
								Достава
							</span>

                            <span class="size-w-62 cl10">
								{{$cargoPrice}} ден.
							    </span>
                            {{--</div>--}}

                            <br><br>
                            <hr>
                            {{--<div class="flex-w flex-m txt-m-103 p-tb-23">--}}
                            <span class="size-w-61 cl6" style="padding-right: 10px; font-weight: 700">
								Вкупно
							</span>

                            <span class="size-w-62 cl10">
								{{$priceWithDelivery}} ден.
							</span>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
