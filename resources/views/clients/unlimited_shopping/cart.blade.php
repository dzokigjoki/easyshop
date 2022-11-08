@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <style>
        .client-info label {
            width: 100%;
        }
    </style>

    <main class="ps-main">
        <div class="ps-content pt-40 pb-80">

            <h1 class="text-center mb-50 naslov">{{trans('globalstore.cart')}}</h1>
            <div class="ps-container">
                <div class="container">
                    <div class="ps-cart-listing col-md-8 col-sm-12 hidden-xs">
                        <table class="table ps-cart__table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Име</th>
                                <th>Цена</th>
                                <th>Количина</th>
                                <th>Вкупно</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $productsTotal = 0;
                            $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                            ?>


                            <?php $checkArray = [] ?>
                            @foreach($products as $product)

                                @if($product->quantity > 1)

                                    <?php
                                    array_push($checkArray, $product->title.' '.$product->quantity);
                                    ?>
                                @endif
                                <tr>
                                    <td>
                                        <div class="ps-remove" onclick='location.href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"'></div>
                                    </td>
                                    <td><a class="ps-product__preview" href="{{$product->url}}">
                                            {{$product->title}}
                                            @if(!$product->variationValuesAndIds()->isEmpty())
                                                @foreach($product->variationValuesAndIds() as $variations)
                                                    @if($product->variation == $variations->id)({{$variations->value}})@endif
                                                @endforeach
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ number_format($product->cena, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                    <td>
                                        <input type="hidden" class="hidden-name" value="{{$product->title}}"/>
                                        <input style="width: 100px; background-color: white;"
                                               table-shopping-qty=""
                                               data-id="{{$product->id}}"
                                               @if(!empty($product->variation))
                                               data-variation="{{$product->variation}}"
                                               @endif
                                               class="form-control"
                                               type="_"
                                               value="{{$product->quantity}}"/>
                                    </td>
                                    <td>{{ number_format($product->cena * $product->quantity, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                                </tr>

                                <?php $productsTotal += $product->cena * $product->quantity;
                                $totalPrice=0;?>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Цена на производи:</strong></td>
                                <td><strong> {{ number_format($productsTotal, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Достава:</strong></td>
                                <td><strong> {{ number_format($cargoPrice, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></td>
                                <?php $totalPrice = $productsTotal + $cargoPrice?>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Вкупно:</strong></td>
                                <td><strong>  {{ number_format($totalPrice, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>


                    <div class="ps-cart-listing col-md-8 col-sm-12 visible-xs">
                        <div class="panel panel-responsive">


                            <?php
                            $productsTotal = 0;
                            $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                            ?>


                            <?php $checkArray = [] ?>
                            @foreach($products as $product)

                                @if($product->quantity > 1)

                                    <?php
                                    array_push($checkArray, $product->title.' '.$product->quantity);
                                    ?>
                                @endif


                                <div>
                                    <img class="img img-responsive" style="margin:0 auto;" src="{{$product->image}}" alt="{{$product->title}}">
                                </div>
                                <div>

                                    <label style="font-size:16px; font-weight: 700; color:#27235e;">{{trans('globalstore.name')}}:</label>


                                    <span><a class="ps-product__preview" href="{{$product->url}}">
                                        {{$product->title}}
                                            @if(!$product->variationValuesAndIds()->isEmpty())
                                                @foreach($product->variationValuesAndIds() as $variations)
                                                    @if($product->variation == $variations->id)({{$variations->value}})@endif
                                                @endforeach
                                            @endif
                                    </a>
                                </span>
                                </div>
                                <div>
                                    <label style="font-size:16px; font-weight: 700; color:#27235e;">Цена:</label>


                                    <span> {{ number_format($product->cena, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                </div>
                                <div>
                                    <label style="font-size:16px; font-weight: 700; color:#27235e;">{{trans('globalstore.quantity')}}:</label>
                                    <span>
                                    <input type="hidden" class="hidden-name" value="{{$product->title}}"/>
                                    <input style="width: 100px; background-color: white;"
                                           table-shopping-qty=""
                                           data-id="{{$product->id}}"
                                           @if(!empty($product->variation))
                                           data-variation="{{$product->variation}}"
                                           @endif
                                           class="form-control"
                                           type="_"
                                           value="{{$product->quantity}}"/>
                                </span>
                                </div>
                                <div>
                                    <label style="font-size:16px; font-weight: 700; color:#27235e;">{{trans('globalstore.total')}}:</label>

                                    <span>{{$product->cena * $product->quantity}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    {{--</tr>--}}
                                </div>
                                <div style="text-align:center;">
                                <span>
                                    <div class="ps-remove" onclick='location.href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"'></div>
                                </span>
                                </div>
                                <hr>
                                <?php $productsTotal += $product->cena * $product->quantity;
                                $totalPrice=0;?>
                            @endforeach

                            <div class="panel panel-default" style="padding:15px;">
                                <div>

                                    <label style="color:#27235e;"><strong>Цена на производи:</strong></label>
                                    <label><strong>{{$productsTotal}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></label>
                                </div>
                                <div>
                                    <label style="color:#27235e;"><strong>Достава:</strong></label>
                                    <label><strong>{{$cargoPrice}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></label>
                                    <?php $totalPrice = $productsTotal + $cargoPrice?>
                                </div>
                                <div>
                                    <label style="color:#27235e;"><strong>Вкупно:</strong></label>
                                    <label><strong>{{$totalPrice}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</strong></label>
                                </div>
                            </div>

                        </div>
                    </div>









                    <div class="client-info col-lg-4 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                        <form data-form="" class="ps-checkout__form" method="POST" action="{{route('checksum.generate')}}">

                            <?php
                            $formData = session()->get('formData');
                            ?>

                            {{ csrf_field() }}

                            <input type="hidden" name="AmountToPay" value="{{($productsTotal + $cargoPrice) * 100}}"/>
                            <input type="hidden" name="AmountCurrency" value="MKD"/>
                            <input type="hidden" name="Details1" value="{{env("CLIENT")}}-Order"/>
                            <input type="hidden" name="PayToMerchant"
                                   value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                            <input type="hidden" name="MerchantName"
                                   value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}"/>
                            <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}"/>
                            <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}"/>
                            <input type="hidden" name="OriginalAmount" value="{{$productsTotal + $cargoPrice}}"/>
                            <input type="hidden" name="OriginalCurrency" value="MKD"/>

                            <div class="ps-checkout__billing">
                                <h3>Податоци за наплата</h3>
                                <fieldset style="border:none !important;" id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">*Име</label>
                                        <input autofocus class="form-control" type="text" name="FirstName" required=""
                                               value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">*Презиме</label>
                                        <input class="form-control" type="text" name="LastName" required=""
                                               value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label">*E-mail</label>
                                        <input class="form-control" type="email" name="Email" required=""
                                               value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">*Телефонски број</label>
                                        <input class="form-control" type="text" name="Telephone" required=""
                                               value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif">
                                    </div>
                                </fieldset>
                                <fieldset style="border:none !important;" id="address" required="" class="">
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">*Држава</label>
                                    <select class="form-control" name="Country">
                                      <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                      <option value="">-- Држава --</option>
                                      @foreach($all_countries as $ac)
                                      <option @if(isset($country) && $country->id == $ac->id)
                                        selected
                                        @endif
                                        value="{{$ac->id}}">{{$ac->country_name}}
                                      </option>
                                      @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">*Град</label>
                                        <select class="form-control" name="City">
                                          <option value="">-- Град --</option>
                                          @foreach($all_cities as $city)
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
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">*Адреса</label>
                                        <input class="form-control" type="text" name="Address" required=""
                                               value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->phone : ''}}@endif">
                                    </div>
                                </fieldset>
                                <fieldset style="border:none !important;" id="address" required="" class="">
                                @if(count(config( 'clients.' . config( 'app.client') . '.type_delivery')))
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
                                @endif
                                @if(count(\EasyShop\Models\AdminSettings::getField('paymentMethods')))
                                    @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $key => $i['name'])
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked="checked" name="paymentType"
                                                       value="{{$i['name']}}">
                                                {{$i['display_name']}}</label>
                                        </div>
                                    @endforeach
                                @endif



                         
                                    <button data-pay-button id="button-confirm" class="ps-btn ps-btn--fullwidth"
                                            type="submit">Купи<i class="ps-icon-next"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </main>


    <div id="modal-dialog" class="modal" style="margin-top:100px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                    <h3>
                        {{trans('globalstore.beforeSubmit')}}
                    </h3>
                    @foreach($checkArray as $item)
                        {{$item}}<br>
                    @endforeach

                </div>
                <div class="modal-body">
                    <p>  {{trans('globalstore.confirm')}}</p>
                </div>
                <div class="modal-footer">
                    <a href="#" id="btnYes"  data-pay-button class="btn confirm">Да</a>
                    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">Не</a>
                </div>
            </div>
        </div>
    </div>

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

            @if(in_array(config( 'app.client'), ['globalstore_rs', 'globalstore_bg', 'globalstore_hr', 'globalstore_si', 'globalstore_sk', 'globalstore_hu', 'globalstore_pl', 'globalstore_cz', 'globalstore_ro']))
            $(".postenski").show();
            $("#city_id").val(35);
            $("#city_id").change();
            @endif

        })
    </script>

    <script>
        $newArray = ("<?php echo(implode($checkArray))?>");


        $('#button-confirm').on('show', function() {
            var link = $(this).data('link'),
                confirmBtn = $(this).find('.confirm');
        })


        $('#btnYes').click(function() {

            // handle form processing here


            $('form').submit();

        });



        // alert($newArray);

    </script>

@stop