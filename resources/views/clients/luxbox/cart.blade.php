@extends('clients.luxbox.layouts.default')
@section('content')
<style>
  .paymentLabel {
    color: #333 !important;
  }
  #place_order {
    cursor: pointer;
  }
  .p-35 {
    padding: 35px 0 0 !important;
  }
  @media(max-width: 767px) {
    .mb-mobile-33 {
      margin-bottom: 33px !important;
    }
  }
</style>
<div class="page-content">
  <section class="p-35 breadcrumb-section section-box">
    <div class="container">
      <div class="breadcrumb-inner">
        <h1>Кошничка</h1>
      </div>
    </div>
  </section>
  <section class="checkout-section section-box">
    <div class="woocommerce">
      <div class="container">
        <div class="entry-content">

          <div class="row">
            <?php $totalPrice = 0 ?>
            @foreach($products as $product)
            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity); ?>

            <?php $cargoPrice = 0; ?>

            @if($totalPrice < 1500) <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?> @endif <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?> @endforeach <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="woocommerce-checkout-review-order">
                <h2 id="order_review_heading">Вашите производи</h2>
                <table class="shop_table">
                  <tbody>
                    @foreach($products as $product)
                    <tr class="cart_item">
                      <td class="product-name flex-centered">
                        <img src="{{$product->image}}" alt="{{ $product->title }}">
                        <div class="review-wrap">
                          <span class="cart_item_title">
                            <a href="{{ $product->url }}">{{$product->title}}</a></span>
                          <span class="product-quantity">x{{$product->quantity}}</span>
                        </div>
                      </td>
                      <td class="product-total">
                        <span class="woocommerce-Price-amount amount">
                          {{number_format($product->cena, 0, ',', '.')}} МКД
                        </span>
                      </td>
                      <td style="padding-left: 40px;">
                        <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="remove">
                          <span class="lnr lnr-cross"></span>
                        </a>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="pt_35">
                        <ul>
                          <li class="cart-subtotal">
                            <span class="review-total-title">Цена:</span>
                            <p>
                              <span class="woocommerce-Price-amount amount">
                                <span>{{number_format($totalPrice, 0, ',', '.')}} МКД</span>
                              </span>
                            </p>
                          </li>
                          <li class="shipping">
                            <span class="review-total-title">Достава:</span>
                            <span>{{ $totalPrice >= 1500 ? 0 : $cargoPrice }} МКД</span>
                          </li>
                          <li class="order-total">
                            <span class="review-total-title">Вкупно:</span>
                            <p>
                              <span class="woocommerce-Price-amount amount">
                                {{$totalPrice >= 1500 ? number_format($totalPrice, 0, ',', '.') : number_format($priceWithDelivery, 0, ',',
                              '.')}} {{config( 'clients.' . config( 'app.client') . '.')}}
                                МКД
                              </span>
                            </p>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <form data-form="" class="checkout woocommerce-checkout" id="checkoutForm" method="POST" data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/" data-cash-action="{{route('checksum.generate')}}">
              {{ csrf_field() }}
              <div class="woocommerce-billing-fields">

                <h2>Лични податоци</h2>
                <div class="woocommerce-billing-fields__field-wrapper">

                  {{-- ime --}}
                  <p class="form-row-first">
                    <input type="text" class="input-text " value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" id="billing_first_name" equired="" name="FirstName" id="FirstName" autofocus="" placeholder="Име *">
                  </p>
                  {{-- prezime --}}
                  <p class="form-row-last">
                    <input type="text" class="input-text " required value="@if(old('LastName')){{old('LastName')}}
                                                @elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}
                                                @else{{isset($user) ? $user->last_name : ''}}@endif" type="text" name="LastName" id="billing_last_name" placeholder="Презиме *">
                  </p>
                  {{-- telephone --}}
                  <p class="form-row-first">
                    <input type="text" class="input-text" required name="Telephone" id="Telephone" value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" placeholder="Телефонски број *">
                  </p>
                  {{-- email --}}
                  <p class="form-row-last">
                    <input type="text" class="input-text " required value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" name="Email" id="Email" placeholder="Email *">
                  </p>

                  <p class="form-row-first">
                    <label for="billing_country">Држава <abbr class="required" title="required">*</abbr></label>
                    <select id="billing_country" class="country_select" name="Country">
                      <?php $all_countries = [$all_countries[0]]; // For now only Macedonia 
                      ?>
                      @foreach($all_countries as $ac)
                      <option @if(isset($country) && $country->id == $ac->id)
                        selected
                        @endif
                        value="{{$ac->id}}">{{$ac->country_name}}
                      </option>
                      @endforeach
                    </select>
                    {{-- <span class="select-btn"><i class="zmdi zmdi-caret-down"></i></span> --}}
                  </p>


                  <p class="form-row-last">
                    <label for="City">Град <abbr class="required" title="required">*</abbr></label>
                    <select id="City" name="City" class="country_select">
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
                    {{-- <span class="select-btn"><i class="zmdi zmdi-caret-down"></i></span> --}}
                  </p>


                  <p class="form-row-wide">
                    <input type="text" class="input-text" required name="Address" id="Address" value="@if(old('Address')){{old('Adress')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address_shiping : ''}}@endif" placeholder="Адреса *">
                  </p>


                  <input type="hidden" name="AmountToPay" value="{{ $priceWithDelivery * 100}}" />
                  <input type="hidden" name="AmountCurrency" value="MKD" />
                  <input type="hidden" name="Details1" value="Luxbox-Order" />
                  <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                  <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                  <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}" />
                  <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                  <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                  <input type="hidden" name="OriginalCurrency" value="MKD" />


                  <div class="form-row-first">
                    <h2>Начин на плаќање:</h2>
                    <ul class="payment_methods mb-mobile-33">
                      @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                      <li class="wc_payment_method">
                        <input style="width: auto" type="radio" name="paymentType" class="input-radio" checked="checked" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif>
                        <label>{{$i['display_name']}}</label>
                      </li>
                      @endforeach
                    </ul>
                    <div id="invoiceLabel" style="margin-bottom: 15px; color:red">* Фактурата ќе ја добиете на вашиот приложен емаил.</div>
                  </div>

                  <div class="form-row-last">
                    <h2>Начин на испорака:</h2>
                    <select class="form-control" name="type_delivery">
                      <option value="cargo" @if(isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery']==='cargo' ) checked="selected" @else selected="selected" @endif>
                        Карго</option>
                    </select>
                  </div>
                  <br>
                  <br><br>
                  <div class="form-row-first">
                  </div>
                  <input type="hidden" name="type_delivery" checked="checked" value="cargo" class="form-control text validates-as-required">
                </div>
              </div>

            </form>
            <div class="row text-right">
              <div class="col-lg-12 form-row-first">
                <button data-pay-button class="button alt au-btn btn-small">Плати</button>
              </div>
            </div>
            <br>

          </div>

        </div>
      </div>
    </div>
</div>
</section>
</div>
@stop

@section('scripts')
<script>
  $(document).ready(function() {
    if($("input[type=radio][name=paymentType]:checked").val() == 'casys') {
      $('#invoiceLabel').hide();
    }
    $("input[type=radio][name=paymentType]").on('change', function() {
      console.log($(this).val());
      if($(this).val() == 'gotovo') {
        $('#invoiceLabel').show();
      } else {
        $('#invoiceLabel').hide();
      }
    })
    var $form = $('#checkoutForm');
    var $button = $('[data-pay-button]');
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
            'Country': $("select[name='Country']").val(),
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
            'type_delivery': $("input[name='type_delivery']:checked").val(),
            'paymentType': $("input[name='paymentType']:checked").val()

          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(result) {
            if (result.status === 'success') {
              console.log(result);
              @if(\EasyShop\Models\AdminSettings::getField('pixelCode'))
              fbq('track', 'InitiateCheckout', {
                value: result.totalPrice,
                currency: window.ES.facebook_pixels_currency,
                num_items: result.productIds.length,
                content_ids: result.productIds,
                content_type: 'product'
              });
              @endif

              $("input[name='FirstName']").remove();
              $("input[name='LastName']").remove();
              $("input[name='Email']").remove();
              $("input[name='Telephone']").remove();
              $("select[name='Country']").remove();
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

  });
</script>
@stop