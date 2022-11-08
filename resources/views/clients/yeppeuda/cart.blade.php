@extends('clients.yeppeuda.layouts.default')
@section('content')

<section class="page-title text-center bg-light">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Кошничка</h1>
      </div>
    </div>
  </div>
</section>

<div class="content-wrapper oh pt-20">

  <!-- Cart -->
  <section class="section-wrap shopping-cart">
    <div class="container relative">
      <div class="row">
        <div class="col-12">
          <div class="checkout-page-coupon-area">
            <div class="checkoutAccordion" id="checkOutAccordion">
              @if(session()->has('error'))
              <h6>
                <span>
                  {{ session()->get('error') }}
                </span>
              </h6>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
              <div class="table-wrap mb-30">
                <table class="shop_table cart table">
                  <thead>
                    <tr>
                      <th class="product-name" colspan="2">Продукт</th>
                      <th class="product-price">Цена</th>
                      <th class="product-quantity">Количина</th>
                      <th class="product-subtotal" colspan="2">Вкупно</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach( $products as $product )
                    <tr class="cart_item">
                      <td class="product-thumbnail">
                        <a href="{{ $product->url }}">
                          <img width="100" class="img img-responsive" @if($product->image)
                          src="{{$product->image}}" alt="{{ $product->title }}"
                          @else
                          src="{{ url_assets('/bellina/images/no-image.png')}}"
                          @endif
                          />
                        </a>
                      </td>
                      <td class="product-name">
                        <a href="#">{{ $product->title }}</a>
                        <ul>
                          <li>Size: XL</li>
                          <li>Color: White</li>
                        </ul>
                      </td>
                      <td class="product-price">
                        <span class="amount">@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                          <del style="color: #C9302C">
                            {{number_format($product->price_retail_1, 0, ',', '.')}}
                            ден.</del><br>
                          @if(EasyShop\Models\Product::getPriceRetail1($product, true, 0) > $product->cena)
                          {{$product->cena}}
                          @else
                          {{EasyShop\Models\Product::getPriceRetail1($product, true, 0), 0, ',', '.'}}
                          @endif
                          ден.
                          @else
                          {{number_format($product->cena, 0, ',', '.')}} ден.
                          @if(!empty($coupons))
                          <span class="coupon-label">
                            Купон
                          </span>
                          @endif
                          @endif</span>
                      </td>
                      <td class="product-quantity">
                        <div class="quantity buttons_added">
                          <input table-shopping-qty="" class="input-text qty text" max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_" value="{{ $product->quantity }}" />
                          <div class="quantity-adjust">
                            <a href="#" class="plus">
                              <i class="fa fa-angle-up"></i>
                            </a>
                            <a href="#" class="minus">
                              <i class="fa fa-angle-down"></i>
                            </a>
                          </div>
                        </div>
                      </td>
                      <td class="product-subtotal">
                        <span class="amount">
                          @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                          <?php
                          $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                          if($discount > $product->cena){
                            $discount = $product->cena;
                          }
                          ?>
                          {{$product->quantity * $discount}}
                          ден.
                          @else
                          {{$product->quantity * $product->cena}} ден.
                          @endif
                        </span>
                      </td>
                      <td class="product-remove">
                        <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="remove" title="Remove this item">
                          <i class="ui-close"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row pt-10">
                  <div class="col-12 text-center">
                    <em style="color: red; text-transform:uppercase">Бесплатна достава над <strong style="color: red !important;">1200</strong> денари</em>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="cart_totals">
                <h2 class="heading relative bottom-line full-grey uppercase mb-30">Вкупно за наплата</h2>
                <?php $totalPrice = 0; ?>
                @foreach($products as $product)

                <?php
                if( \EasyShop\Models\Product::hasDiscount( $product->discount ) ) {
                  $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                  if($discount > $product->cena){
                    $discount = $product->cena;
                  }
                  $totalPrice = $totalPrice + ($discount * $product->quantity);
                } else {
                  $totalPrice = $totalPrice + ($product->cena * $product->quantity);
                }
                ?>

                <?php
                if ($totalPriceForDelivery <= 1200) {
                  $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                } else {
                  $cargoPrice = 0;
                }
                ?>
                @endforeach
                <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                <table class="table shop_table">
                  <tbody>
                    <tr class="cart-subtotal">
                      <th>Цена</th>
                      <td>
                        <span class="amount">{{number_format($totalPrice, 0, ',', '.')}} ден.</span>
                      </td>
                    </tr>
                    <tr class="shipping">
                      <th>Достава</th>
                      <td>
                        <span>{{ number_format($cargoPrice, 0, ',', '.')}} ден.</span>
                      </td>
                    </tr>
                    <tr class="order-total">
                      <th>Вкупно</th>
                      <td>
                        <strong><span class="amount">{{number_format($priceWithDelivery, 0, ',', '.')}} ден.</span></strong>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              @if(empty($coupons))
              <div class="coupon">
                <input type="text" id="promo_code" name="promo" class="input-text form-control" value placeholder="Купон за попуст">
                <input type="submit" id="coupon-check" button-coupon-check class="btn btn-lg btn-stroke" value="Провери">
                <span id="span-coupon-check" data-coupon-check class="w-100" style="display: block"></span>
              </div>
              @else
              <div class="coupon">
                <h5 style="padding: 10px 20px;" class="alert-success">Внесен купон</h5>
              </div>
              @endif
              <div class="actions">
                <div class="wc-proceed-to-checkout w-100">
                  <a id="proceed" class="btn btn-lg btn-dark w-100"><span>Продолжи кон наплата</span></a>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->

    </div> <!-- end container -->
  </section> <!-- end cart -->


  <div class="content-wrapper oh" id="elementtoScrollToID">

    <!-- Checkout -->
    <section class="section-wrap checkout pb-70">
      <div class="container relative">
        <div class="row">

          <div class="ecommerce col-xs-12">

            <div class="row mb-30 mt-30">
              <div class="col-md-12">
                <h2 class="heading uppercase bottom-line full-grey mb-30">Детали за нарачка</h2>
              </div>
            </div>
            <form data-form="" id="checkoutForm" method="POST" name="checkout" class="checkout ecommerce-checkout row" data-cpay-action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/" data-cash-action="{{route('checksum.generate')}}">

              {{ csrf_field() }}

              <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>
              <div class="col-md-8" id="customer_details">
                <div>

                  <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                    <label for="billing_first_name">Име
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <input type="text" id="FirstName" name="FirstName" class="input-text" value="@if(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" placeholder="Име*" required />
                  </p>
                  <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_last_name_field">
                    <label for="billing_last_name">Презиме
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <input class="input-text" value="@if(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif" type="text" id="LastName" name="LastName" placeholder="Презиме*" required />
                  </p>
                  <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                    <label for="billing_email">Е-пошта
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <input value="@if(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" class="input-text" type="Email" id="Email" name="Email" placeholder="E- пошта" required />
                  </p>
                  <p class="form-row form-row-wide address-field update_totals_on_change validate-required ecommerce-validated" id="billing_country_field">
                    <label for="billing_country">Држава
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <select class="country_to_state country_select" id="Country" name="Country" required>
                      <?php $all_countries = [$all_countries[0]]; // For now only Macedonia 
                      ?>
                      @foreach($all_countries as $ac)
                      <option @if(isset($user->country_id_shipping) && $user->country_id_shipping == $ac->id)
                        selected
                        @elseif($ac->id == 1)
                        selected
                        @endif
                        value="{{$ac->id}}">{{$ac->country_name}}
                      </option>
                      @endforeach
                    </select>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                    <label for="billing_city">Град
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <select required id="City" class="country_to_state country_select" name="City">
                      <option value="">-- Град --</option>
                      @foreach($all_cities as $city)
                      @if($city->id != 35)
                      <option @if(isset($user->city_id_shipping) && $user->city_id_shipping == $city->id)
                        selected
                        @endif
                        value="{{$city->id}}"
                        data-name="{{$city->city_name}}"
                        data-zip="{{$city->zip}}">
                        {{$city->city_name}}
                      </option>
                      @endif
                      @endforeach
                    </select> </p>
                  <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field">
                    <label for="billing_address_1">Адреса
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <input value="@if(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address_shiping : ''}}@endif" class="input-text" type="text" id="Address" name="Address" placeholder="Адреса" required />
                  </p>
                  <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                    <label for="billing_phone">Телефон
                      <abbr class="required" style="text-decoration: none; border-bottom: none;" title="Задолжително">*</abbr>
                    </label>
                    <input required value="@if(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" class="input-text" type="text" id="Telephone" name="Telephone" placeholder="Телефон*" />
                  </p>

                  <p class="form-row notes ecommerce-validated" id="order_comments_field">
                    <label for="order_comments">Забелешки</label>
                    <textarea rows="4" class="input-text" id="confirm_comment" name="comments"></textarea>
                  </p>

                  <div class="clear"></div>

                </div>


                <input type="hidden" name="AmountToPay" value="{{ $priceWithDelivery * 100}}" />
                <input type="hidden" name="AmountCurrency" value="MKD" />
                <input type="hidden" name="Details1" value="Yeppeuda-Order" />
                <input type="hidden" name="PayToMerchant" value="{{\EasyShop\Models\AdminSettings::getField('merchantId')}}"/>
                <input type="hidden" name="MerchantName" value="{{\EasyShop\Models\AdminSettings::getField('merchantName')}}" />
                <input type="hidden" name="PaymentOKURL" value="{{route("checkout.success")}}" />
                <input type="hidden" name="PaymentFailURL" value="{{route("checkout.fail")}}" />
                <input type="hidden" name="OriginalAmount" value="{{$totalPrice}}" />
                <input type="hidden" name="OriginalCurrency" value="MKD" />

              </div>
              <div class="col-md-4">
                <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                  <div id="payment" class="ecommerce-checkout-payment">
                    <h2 class="heading uppercase bottom-line full-grey">Плаќање и испорака</h2>

                    <input type="hidden" name="type_delivery" checked="checked" value="cargo" class="form-control text validates-as-required">

                    <ul class="payment_methods methods">
                      <p class="p_paying">Начин на плаќање</p>
                      @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $key => $i)
                      <li class="payment_method_bacs">
                        <input style="margin-top: 10px; margin-left:10px;" class="input-radio" type="radio" @if($key=='Картичка' )checked="true" @endif name="paymentType" id="{{$i['name']}}" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                        <label for="payment_method_bacs">
                         {{$i['display_name']}}
                        </label>
                        <div class="payment_box payment_method_bacs" style="display: none;">
                        </div>
                      </li>
                      @endforeach

                    </ul>
                    <div class="form-row place-order" id="order-button">
                      <button type="button" class="btn btn-lg w-50" disabled data-pay-button id="submit-contact">Нарачај</button>
                    </div>
                  </div>
                </div>
              </div> <!-- end col -->
            </form>

          </div> <!-- end ecommerce -->

        </div> <!-- end row -->
      </div> <!-- end container -->
    </section>
  </div>

</div>
@stop

@section("scripts")
<script>
  $(document).ready(function() {

    $("#proceed").click(function() {
      $([document.documentElement, document.body]).animate({
        scrollTop: $("#elementtoScrollToID").offset().top - 75
      }, 1000);
    });

    if ($("input[name='FirstName']").val() == "" || $("input[name='LastName']").val() == "" ||
      $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $("select[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
      canSubmit = false;
    } else {
      canSubmit = true;
    }
    if (canSubmit == true) {
      $('[data-pay-button]').attr('disabled', false);
    } else {
      $('[data-pay-button]').attr('disabled', true);
    }

    $("#coupon-check").click(function() {
      $("#span-coupon-check").css("margin", "10px 0 20px 0");
    })



    if ((sessionStorage.getItem("coupon_checked"))) {

      $("#FirstName").val(sessionStorage.getItem("old_first_name"));
      $("#LastName").val(sessionStorage.getItem("old_last_name"));
      $("#Email").val(sessionStorage.getItem("old_email"));
      $("#Telephone").val(sessionStorage.getItem("old_phone"));
      $("#Country").val(sessionStorage.getItem("old_country"));
      $("#City").val(sessionStorage.getItem("old_city"));
      $("#Address").val(sessionStorage.getItem("old_address"));
      $("#confirm_comment").val(sessionStorage.getItem("old_comment"));
      $("#type_delivery").val(sessionStorage.getItem("old_delivery_type"));
      $("#paymentType").val(sessionStorage.getItem("old_paymentType"));
      $("[data-coupon-check]").html(sessionStorage.getItem("promo_code"));

      $("input[name='paymentType']:checked").removeAttr("checked");
      $("input[name='paymentType'][value=" + sessionStorage.getItem("old_paymentType") + "]").prop('checked', true);
    }

    sessionStorage.removeItem("promo_code");

    if ($("input[name='FirstName']").val() == "" || $("input[name='LastName']").val() == "" ||
      $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $("select[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
      canSubmit = false;
    } else {
      canSubmit = true;
    }

    if (canSubmit == true) {
      $('[data-pay-button]').attr('disabled', false);
    } else {
      $('[data-pay-button]').attr('disabled', true);
    }
  });
  jQuery(function($) {

    var $form = $('#checkoutForm');
    var $button = $('[data-pay-button]');
    var canSubmit = false;


    $(':input').on('input', function() {
      var firstName = $("input[name='FirstName']").val();
      var lastName = $("input[name='LastName']").val();
      var email = $("input[name='Email']").val();
      var telephone = $("input[name='Telephone']").val();
      var country = $("select[name='Country']").val();
      var city = $("select[name='City']").val();
      var address = $("input[name='Address']").val();

      if (firstName == "" || lastName == "" || email == "" || telephone == "" || country == "" || address == "") {
        canSubmit = false;
      } else {
        canSubmit = true;
      }

      if (canSubmit == true) {
        $('[data-pay-button]').attr('disabled', false);
      } else {
        $('[data-pay-button]').attr('disabled', true);
      }
    })

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
            'type_delivery': $("input[name='type_delivery']").val(),
            'paymentType': $("input[name='paymentType']:checked").val()

          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(result) {
            if (result.status === 'success') {

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
              $("textarea[name='comments']").remove();

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