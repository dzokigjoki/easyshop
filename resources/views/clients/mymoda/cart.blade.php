@extends('clients.mymoda.layouts.default')
@section('content')


<style>
  .form-control {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
  }


  @media(max-width: 1200px) {
    #content {
      padding-top: 40px;
    }
  }


  #coupon-check {
    color: white;
    margin-top: 5px;
  }

  @media(max-width:767px) {
    .display_none {
      display: none !important;
    }

    .product-title {
      font-size: 15px;
    }

    .quantity-input {
      width: 61px !important;
    }

    .btn_delete {
      padding: 5px 10px;
    }

    .title_name {
      padding-bottom: 15px;
    }

    .btn_show {
      display: inline-block !important;
    }

    .btn_hide {
      display: none;
    }
  }

  #order-button {
    padding-top: 30px !important;
  }

  .error-message {
    background-color: #CA2028;
    color: white;
    padding: 10px;
    border-radius: 10px;
  }

  .input-item {
    padding-top: 10px !important;
  }

  .pt-10 {
    padding-top: 10px !important;
  }

  .quantity-input {
    width: 80px;
  }

  #cart-title {
    padding-top: 30px;
  }

  #main-section {
    padding-top: 40px;
    padding-bottom: 40px;
  }

  .tp-bgimg.defaultimg {
    margin-top: -90px;
  }

  .shipping-method {
    list-style: none;
  }
</style>

<?php
$formData = session()->get('formData');
?>

<div class="page-content-wrapper sp-y">
  <div class="cart-page-content-wrap">
    <div class="container container-wide">
      <div class="row">
        <div class="col-12">
          <div class="checkout-page-coupon-area">
            <div class="checkoutAccordion" id="checkOutAccordion">
            </div>
          </div>
        </div>
      </div>

      <h2 id="cart-title">Кошничка</h2>
      <div class="row" id="main-section">
        <div class="col-lg-4 col-xs-12">
          <div class="checkout-billing-details-wrap">
            <h4>Детали за нарачка</h5>
              <div class="billing-form-wrap">
                <form data-form="" id="checkoutForm" method="POST" class="contact-form" data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/" data-cash-action="{{route('checksum.generate')}}">
                  {{ csrf_field() }}

                  <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-item mt-0">
                        <label for="FirstName" class="sr-only required">Име</label>
                        <input type="text" id="FirstName" name="FirstName" class="form-control" value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" placeholder="Име*" required />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-item mt-md-0">
                        <label for="LastName" class="sr-only required">Презиме</label>
                        <input class="form-control" value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif" type="text" id="LastName" name="LastName" placeholder="Презиме*" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-item col-md-6 col-xs-12">
                      <label for="Email" class="sr-only required">Е- пошта</label>
                      <input value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" class="form-control" type="Email" id="Email" name="Email" placeholder="E- пошта" required />
                    </div>

                    <div class="input-item col-md-6 col-xs-12">
                      <label for="Telephone" class="sr-only">Телефон</label>
                      <input value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" class="form-control" type="text" id="Telephone" name="Telephone" placeholder="Телефон*" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-item col-md-6 col-xs-12">
                      <label for="Country" class="sr-only required">Држава</label>
                      <select class="form-control" name="Country">
                        <?php $all_countries = [$all_countries[0]]; // For now only Macedonia 
                        ?>
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

                    <div class="input-item col-md-6 col-xs-12">
                      <label for="City" class="sr-only required">Град</label>
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
                  </div>
                  <div class="input-item">
                    <label for="Address" class="sr-only required">Адреса</label>
                    <input value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@endif" class="form-control" type="text" id="Address" name="Address" placeholder="Адреса" required />
                  </div>

                  <input type="hidden" name="AmountToPay" value="{{$totalPrice * 100}}" />
                  <input type="hidden" name="AmountCurrency" value="MKD" />
                  <input type="hidden" name="Details1" value="{{env("CLIENT")}}-Order" />
                  <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                  <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                  <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}" />
                  <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                  <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                  <input type="hidden" name="OriginalCurrency" value="MKD" />

                  <br>
                  <div class="row">

                    <input type="hidden" name="type_delivery" checked="checked" value="cargo" class="form-control text validates-as-required">

                    <?php

                    $hideGotovo = false;

                    foreach ($products as $product) {
                      $productCategories = $product->categories()->get()->pluck('id')->toArray();

                      if (in_array(38, $productCategories)) {
                        $hideGotovo = true;
                        break;
                      }
                    }
                    ?>

                    @if($hideGotovo)
                    <div class="input-wrapper col-md-12 col-xs-12 pt-10">
                      <p class="alert-warning">Оваа нарачка може да ја платите само со картичка!</p>
                    </div>
                    @endif

                    <div class="input-wrapper col-md-12 col-xs-12 pt-10">
                      <span>Начин на плаќање: <br>
                        @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                        @if($hideGotovo && $i['name'] == "gotovo")
                        @break
                        @endif
                        <input style="margin-top: 10px; margin-left:10px;" type="radio" checked="checked" name="paymentType" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                        <span style="margin-left: 10px; line-height:30px;">{{$i['display_name']}}</span><br>

                        @endforeach
                      </span>
                    </div>

                  </div>
                </form>
                <div class="order-details-footer" id="order-button">
                  <button class="btn btn-lg btn-danger" style="width: 30%" type="submit" data-pay-button id="submit-contact">Нарачај</button>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-7 col-offset-lg-1 col-xs-12 ml-auto" id="content">
          <div class="order-details-area-wrap">
            <h4>Вашата нарачка</h4>
            <br>
            <div class="row">
              <div class="col-lg-4 col-xs-3 display_none">
                Продукти
              </div>
              <div class="col-lg-1 col-xs-2">
                Цена
              </div>
              <div class="col-lg-2 col-xs-3">
                Количина
              </div>
              <div class="col-lg-2 col-xs-3">
                Детали
              </div>
              <div class="col-lg-2 col-xs-2">
                Вкупно
              </div>

            </div>
            <hr>


            @foreach($products as $product)
            <div class="row row-cart">
              <div style="vertical-align:middle; text-align:center" class="col-lg-2 display_none">
                <img width="100" class="img img-responsive" @if($product->image)
                src="{{ $product->image }}" alt="{{ $product->title }}"
                @else
                src="{{ url_assets('/easycms/pneumatik/img/no-image.png')}}"
                @endif
                />
              </div>
              <div style="vertical-align:middle; text-align:center" class="col-lg-2 col-xs-12 title_name">
                <span class="product-title">{{ $product->title }}</span>
              </div>

              <div style="vertical-align:middle; text-align:center" class="col-lg-1 col-xs-2">
                <span>{{number_format($product->cena, 0, ',', '.')}} ден.</span>
              </div>
              <?php $productVariations = explode('_', $product->variation); ?>
              <div style="vertical-align:middle; text-align:center" class="col-lg-2 col-xs-3">
                <span class="input item product-quantity">
                  <input disabled table-shopping-qty="" class="form-control quantity-input" @if(!empty($product->variation))
                  data-cart-index="{{$product->id}},{{$product->variation}}"
                  data-variation="{{$product->variation}}"
                  @endif
                  max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_"
                  value="{{ $product->quantity }}" />
                </span>
              </div>

              <!-- <div style="vertical-align:middle; text-align:center" class="col-lg-2 col-xs-3">
                <span class="input item product-quantity">

                  <?php $allVariations = $product->variationValuesAndIds()->pluck('id')->toArray() ?>
                  @if(!$product->variationValuesAndIds()->isEmpty())
                  <?php $variations = $product->variationValuesAndIds()->groupBy('name') ?>
                  @foreach($variations as $key => $value)
                  <label for="">{{$key}}</label>
                  <select disabled table-product-variation="" class="form-control quantity-unput" data-id="{{$product->id}}" @if(!empty($product->variation))
                    data-cart-index="{{$product->id}},{{$product->variation}}"
                    @foreach($productVariations as $k => $v)
                    @if(in_array($v, $value->pluck('id')->toArray()))
                    data-variation="{{$v}}"
                    <?php unset($productVariations[$k]); ?>
                    @endif

                    @endforeach
                    @endif
                    >
                    <?php $explodedVariations = explode('_', $product->variation) ?>
                    @foreach($value as $v)
                    <option @if(in_array($v['id'], $explodedVariations)) selected @endif value="{{$v['id']}}">
                      {{$v['value']}}</option>
                    @endforeach
                  </select>
                  @endforeach
                  @endif
                </span>
              </div> -->
              <div style="vertical-align:middle; text-align:center" class="col-lg-2 col-xs-3">
                <span class="input item product-quantity">

                  <?php $allVariations = $product->variationValuesAndIds()->pluck('id')->toArray() ?>
                  @if(!$product->variationValuesAndIds()->isEmpty())
                  <?php $variations = $product->variationValuesAndIds()->groupBy('name') ?>
                  @foreach($variations as $key => $value)
                  <label style="white-space:nowrap" class="font-normal" for="{{ $product->id }}"><span style="font-weight:0px;">{{ $key }}</span>
                    <?php $explodedVariations = explode('_', $product->variation) ?>
                    @foreach($value as $v)
                    @if(in_array($v['id'], $explodedVariations))
                    <strong>{{ $v['value'] }}</strong>
                    @endif
                    @endforeach
                  </label>
                  @endforeach
                  @endif
                </span>
              </div>
              <div style="vertical-align:middle; text-align:center" class="col-lg-1 col-xs-2">
                <span>{{number_format($product->quantity * $product->cena, 0, ',', '.')}} ден.</span>
              </div>
              <div style="vertical-align:middle; text-align:center" class="col-lg-2 col-xs-3 btn_hide">
                <button class="btn btn_delete  btn-danger"><a style="color:black;" @if($product->variation)
                    href="{{URL::to('cart/remove/')}}/{{$product->id}}/{{$product->id.','.$product->variation}}"
                    @else
                    href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                    @endif
                    ><i class="fa fa-trash" style="color: #ffffff"></i></a></button>
              </div>
              <div style="vertical-align:middle; display:none; text-align:center" class="col-lg-2 col-xs-2 btn_show">
                <button class="btn btn_delete  btn-danger"><a style="color:black;" @if($product->variation)
                    href="{{URL::to('cart/remove/')}}/{{$product->id}}/{{$product->id.','.$product->variation}}"
                    @else
                    href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                    @endif>
                    <i class="fa fa-trash" style="color: #ffffff"></i></a></button>
              </div>
            </div>
            <hr>

            @endforeach

            <?php $totalPrice = 0; ?>
            @foreach($products as $product)
            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity); ?>

            <?php
            if ($totalPrice <= 2000) {
              $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
            } else {
              $cargoPrice = 0;
            }
            ?>
            @endforeach


            <?php $priceWithDelivery = $totalPrice + $cargoPrice ?>
            <div class="row">
              <div class="col-lg-3 col-xs-5">
                Цена на продукти:
              </div>
              <div class="col-lg-3 col-xs-5">
                {{number_format($totalPrice, 0, ',', '.')}} ден.
              </div>
            </div>
            <hr align="left" class="width_301">
            <div class="row">
              <div class="col-lg-3 col-xs-5">
                Испорака:
              </div>
              <div class="col-lg-3 col-xs-5">
                {{ number_format($cargoPrice, 0, ',', '.')}} ден.
              </div>
            </div>
            <hr align="left" class="width_301">
            <div class="row">
              <div class="col-lg-3 col-xs-5">
                Вкупно:
              </div>
              <div class="col-lg-3 col-xs-5">
                {{number_format($priceWithDelivery, 0, ',', '.')}} ден.
              </div>
            </div>
            <hr align="left" class="width_301">

            <br>
            @if(session()->has('error'))
            <h6>
              <span class="error-message">
                {{ session()->get('error') }}
              </span>
            </h6>
            @endif

            @if(empty($coupons))

            <div class="row">
              <div class="col-sm-12">
                <h5>
                  Купон за попуст:
                </h5>
              </div>
              <div class="col-sm-5">
                <input type="text" id="promo_code" {{-- style="width: 40%; display: inline; float: left;" --}} name="promo" class="form-control" placeholder="Внесете купон за попуст" />

              </div>
              <div class="col-sm-7">
                <button type="submit" id="coupon-check" button-coupon-check class="btn btn-success">Провери купон
                </button>
              </div>

            </div>
            <div class="row" style="padding-top: 25px;">
              <span data-coupon-check class="w-100" style="display: block"></span>
            </div>
            @else
            <span class="coupon-label">
              Внесен купон
            </span>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  jQuery(function($) {
    var $form = $('#checkoutForm');
    var $button = $('[data-pay-button]');

    $('[data-payment-type]').on('click', function() {
      console.log($(this).val());
    });

    $button.on('click', function(event) {

      var paymentType = $('[name=paymentType]:checked').val();

      if (paymentType === 'casys') {
        $form.attr('action', $form.data('cpay-action'));
        $.ajax({
          url: 'checkout/generate',
          method: 'POST',
          data: {
            'FirstName': $("input[name='FirstName']").val(),
            'LastName': $("input[name='LastName']").val(),
            'Email': $("input[name='Email']").val(),
            'Telephone': $("input[name='Telephone']").val(),
            'Country': $("[name='Country']").val(),
            'City': $("[name='City']").val(),
            'Zip': $("input[name='Zip']").val(),
            'Address': $("input[name='Address']").val(),
            'AmountToPay': $("input[name='AmountToPay']").val(),
            'AmountCurrency': $("input[name='AmountCurrency']").val(),
            'Details1': $("input[name='Details1']").val(),
            'PayToMerchant': $("input[name='PayToMerchant']").val(),
            'MerchantName': encodeURIComponent($("input[name='MerchantName']").val()),
            'OriginalAmount': $("input[name='OriginalAmount']").val(),
            'OriginalCurrency': $("input[name='OriginalCurrency']").val(),
            'PaymentOKURL': $("input[name='PaymentOKURL']").val(),
            'PaymentFailURL': $("input[name='PaymentFailURL']").val(),
            'type_delivery': $("input[name='type_delivery']").val(),
            'paymentType': $("input[name='paymentType']:checked").val()

          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(result) {
            if (result.status === 'success') {

              $("input[name='FirstName']").remove();
              $("input[name='LastName']").remove();
              $("input[name='Email']").remove();
              $("input[name='Telephone']").remove();
              $("[name='Country']").remove();
              $("[name='City']").remove();
              $("input[name='Zip']").remove();
              $("input[name='Address']").remove();
              $("input[name='type_delivery']").remove();
              $("input[name='paymentType']").remove();
              $("input[name='Details2']").remove();
              $("input[name='CheckSumHeader']").remove();
              $("input[name='CheckSum']").remove();
              $("input[name='AmountToPay']").remove();
              $("input[name='OriginalAmount']").remove();

              $form.append('<input type="hidden" name="Details2" value="' + result.documentId + '" />');
              $form.append('<input type="hidden" name="CheckSumHeader" value="' + result.header + '" />');
              $form.append('<input type="hidden" name="CheckSum" value="' + result.checksum + '" />');
              $form.append('<input type="hidden" name="AmountToPay" value="' + result.totalPriceFull + '" />');
              $form.append('<input type="hidden" name="OriginalAmount" value="' + result.totalPrice + '" />');
              $form.submit();

            } else if (result.status === 'not_enough_stock') {
              toastr.error("Продуктите " + result.productNames + ' моментално ги нема на залиха.');
            }
          },
          error: function(val) {
            toastr.error("Внесете ги сите полиња!");
          }
        });

      } else if (paymentType === 'gotovo') {
        $form.attr('action', $form.data('cash-action'));
        $form.submit();
        return true;
      }
    });
  })
</script>


@stop