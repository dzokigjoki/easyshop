@extends('clients.matica.layouts.default')
@section('style')
<style>
  .bundle-item {
    /* padding-left: 90px; */
    margin: 0 !important;
    padding-left: 5px;
    font-weight: 400 !important;
  }

  #promo_code {
    width: auto;
    float: left;
  }

  .coupon-label {
    background-color: #293133;
    color: white;
    padding: 3px;
    border-radius: 3px;
  }

  .flex-centered {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 50%;
  }

  #coupon-check {
    background-color: #293133;
    color: white;
  }
</style>
<link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url_assets('/matica/css/cart.css?v=1')}}" rel="stylesheet">
<link href="{{url_assets('/matica/css/checkout.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
  <div class="container margin_30">
    <div class="page_header">
      <h1>Кошничка</h1>
    </div>
    <!-- /page_header -->
    <div class="row">
      <div class="col-md-8 col-sm-12">
        <table class="table table-striped cart-list">
          <thead>
            <tr>
              <th>Продукт</th>
              <th>Цена</th>
              <th>Количина</th>
              <th>Вкупно</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>
                <div class="thumb_cart">
                  <img src="{{ $product->image }}" alt="{{ $product->title }}" width="70">
                </div>
                <span class="item_cart">{{ $product->title }}</span>

                <?php $cartProduct = Session::get('cart_products')[$product->id] ?>
                @if(isset($cartProduct) && isset($cartProduct['bundle_items']) &&
                is_array($cartProduct['bundle_items']))
                <div>
                  <?php $bundleProducts = \EasyShop\Models\Product::whereIn('id', $cartProduct['bundle_items'][0])->get(); ?>
                  @foreach($bundleProducts as $bundleItem)
                  <div class="item_cart bundle-item">- {{$bundleItem->title}}</div>
                  @endforeach
                </div>
                @endif
              </td>
              <td>
                <?php 
                  $productMatica = \EasyShop\Models\Product::find($product->id);  
                ?>
                @if(isset($productMatica->bundle_price_type) && $productMatica->bundle_price_type == 'percent')
                <?php 
                  $bundleProductPrices = 0;
                  foreach($bundleProducts as $bundleProduct) {
                    $bundleProductPrices += (int)$bundleProduct->price_retail_1;
                  }                   
                  $bundlePriceDiscounted = $bundleProductPrices - (($cartProduct['price']/100) * $bundleProductPrices);
                ?>
                <strong>{{ number_format($bundlePriceDiscounted, 0, ",", ".")  }} мкд</strong>
                @elseif($product->discount > 0 && ($product->discount != $product->price_retail_1)) 
                  @if($product->discount > $product->cena)
                  {{ number_format((int)$product->cena, 0, ",", ".")  }} мкд
                  @else
                  {{ number_format((int)$product->discount, 0, ",", ".")  }} мкд
                  @endif
                @else
                  {{ number_format((int)$product->cena, 0, ",", ".")  }} мкд
                  @if(!empty($coupons))
                  <span class="coupon-label">
                    Купон
                  </span>
                  @endif
                @endif
              </td>
              <td>
                <div class="numbers-row---disable">
                  <input type="text" readonly table-shopping-qty data-cart-index="{{$product->id}}""
                  data-id=" {{ $product->id }}" value="{{ $product->quantity }}" class="qty2" />
                  {{-- <div class="inc button_inc">+</div><div class="dec button_inc">-</div> --}}
                </div>
              </td>
              <td>
                @if(isset($productMatica->bundle_price_type) && $productMatica->bundle_price_type == 'percent')
                <strong>{{ number_format($product->quantity * $bundlePriceDiscounted, 0, ",", ".") }} мкд</strong>
                @else
                <strong>{{ number_format($product->quantity * $product->cena, 0, ",", ".") }} мкд</strong>
                @endif
              </td>
              <td class="options">
                <a href="{{URL::to('cart/remove/')}}/{{$product->id}}"><i class="ti-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pt-3" style="color: #ff5353"><strong>* Бесплатна достава над 800 мкд</strong></div>

        <?php $coupons = Session::get('coupons') ?>
        {{-- <div class="pt-3" style="color: #ff5353"><strong>* Со нарачка на 2 книги добивате 20% попуст</strong></div>
        <div class="pt-3" style="color: #ff5353"><strong>* Со нарачка на 4 книги добивате 30% попуст</strong></div>
        <div class="pt-3" style="color: #ff5353"><strong>* Со нарачка на 6 книги добивате 40% попуст</strong></div>
        <div class="pt-3" style="color: #ff5353"><strong>* Со нарачка на 8 книги добивате 50% попуст</strong></div>
        <div class="pt-3" style="color: #ff5353"><strong>* Со нарачка на 10 книги добивате 65% попуст</strong></div> --}}
        <div class="form-group pt-3">
          @if(empty($coupons))

          <div class="row">
            <div class="flex-centered col-lg-12">
              <label for="FirstName" class="sr-only required">Купон за попуст</label>
              <input type="text" id="promo_code" {{-- style="width: 40%; display: inline; float: left;" --}}
                name="promo" class="form-control" placeholder="Купон за попуст" />
              <button type="submit" id="coupon-check" button-coupon-check
                class="flex-centered form-control btn btn-success">Провери
                купон
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
        <div class="pt-4">

        </div>
      </div>
      {{-- col-8 --}}
      <div class="col-md-4 col-sm-12">
        <form data-form="" id="checkoutForm" method="POST" class="contact-form"
          data-card-action="https://epay.halkbank.mk/fim/est3Dgate" data-cash-action="{{route('checksum.generate')}}"
          autocomplete="off">
          {{ csrf_field() }}
          @if(session()->has('error'))
          <div style="color: #ff5353" class="pb-3">{!! session('error') !!}</div>
          @endif
          <div class="checkout">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Име" name="FirstName" required
                value="{{ old('FirstName', (isset($formData) && isset($formData['FirstName'])) ? $formData['FirstName'] : '')   }}" />
              @if($errors->has('FirstName'))
              <div class="error">{{ $errors->first('FirstName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Презиме" name="LastName" required
                value="{{ old('LastName', (isset($formData) && isset($formData['LastName'])) ? $formData['LastName'] : '')   }}" />
              @if($errors->has('LastName'))
              <div class="error">{{ $errors->first('LastName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="E-Пошта" name="Email" required
                value="{{ old('Email', (isset($formData) && isset($formData['Email'])) ? $formData['Email'] : '') }}" />
              @if($errors->has('Email'))
              <div class="error">{{ $errors->first('Email') }}</div>
              @endif
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Телефон" name="Telephone" required
                value="{{ old('Telephone', (isset($formData) && isset($formData['Telephone'])) ? $formData['Telephone'] : '')   }}" />
              @if($errors->has('Telephone'))
              <div class="error">{{ $errors->first('Telephone') }}</div>
              @endif
            </div>

            <div class="form-group">
              <input type="hidden" name="Country" value="{{ $all_countries[0]->id }}">
              <input type="text" class="form-control" placeholder="Држава" value="Македонија" readonly>
            </div>

            <div class="form-group">
              <select class="select2 form-control" name="City" required>
                <option value="" selected>-- Град --</option>
                @foreach($all_cities as $city)
                @if($city->id != 35)
                <option @if (old('City', (isset($formData) && isset($formData['City'])) ? $formData['City'] : ''
                  )==$city->id )
                  selected="selected"
                  @endif
                  value="{{$city->id}}"
                  data-name="{{$city->city_name}}"
                  data-zip="{{$city->zip}}">{{$city->city_name}}
                </option>
                @endif
                @endforeach
              </select>
              @if($errors->has('City'))
              <div class="error">{{ $errors->first('City') }}</div>
              @endif
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Адреса" name="Address" required
                value="{{ old('Address', (isset($formData) && isset($formData['Address'])) ? $formData['Address'] : '')   }}" />
              @if($errors->has('Address'))
              <div class="error">{{ $errors->first('Address') }}</div>

              @endif
            </div>
            <div class="form-group">
              <h6>Начин на плаќање:</h6>
              <label class="container_radio">Во готово<a href="#0" class="info" data-toggle="modal"
                  data-target="#payments_method"></a>
                <input type="radio" name="paymentType" value="gotovo" checked>
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="Коментар"
                name="comments">{{ old('comments', (isset($formData) && isset($formData['comments'])) ? $formData['comments'] : '') }}</textarea>
            </div>
            <input type="hidden" value="cargo" name="type_delivery">
            <input type="hidden" name="clientid" value="{{\EasyShop\Models\AdminSettings::getField('clientId')}}" />
            <input type="hidden" name="storetype" value="3d_pay_hosting" />
            <input type="hidden" name="trantype" value="Auth" />
            <input type="hidden" name="amount" value="{{$totalPrice}}" />
            <input type="hidden" name="instalment" value="">
            <input type="hidden" name="currency" value="{{\EasyShop\Models\AdminSettings::getField('currencyCode')}}" />
            <input type="hidden" name="okUrl" value="{{ route('halk.success') }}" />
            <input type="hidden" name="failUrl" value="{{ route('halk.fail') }}" />
            <input type="hidden" name="callbackUrl" value="{{ route('halk.success') }}" />
            <input type="hidden" name="lang" value="en" />
            <input type="hidden" name="encoding" value="utf-8" />
            <input type="hidden" name="refreshtime" value="0" />
            {{-- <div class="form-group">

            @endif
          </div>
          <div class="form-group">
            <h6>Начин на плаќање:</h6>
            <label class="container_radio">Во готово<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
              <input type="radio" name="paymentType" value="gotovo" checked>
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="form-group">
            <textarea rows="6" class="form-control" placeholder="Коментар" name="comments">{{ old('comments', (isset($formData) && isset($formData['comments'])) ? $formData['comments'] : '') }}</textarea>
          </div>
          <input type="hidden" value="cargo" name="type_delivery">
          {{-- <div class="form-group">
            <h6>Начин на испорака:</h6>
            <label class="container_radio">Credit Card<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
              <input type="radio" name="payment" checked>
              <span class="checkmark"></span>
            </label>
          </div> --}}
      </div>
      </form>
    </div>
  </div>



  </div>
  <!-- /container -->
  <?php
    $newPrice = $totalPrice;

  //   /// Promocija za matica - cat 34
  //   $productsPromocijaMatica = \EasyShop\Models\ProductCategory::where('category_id', 34)->get();
  //   $productsPromocijaMaticaIds = [];
  //   foreach($productsPromocijaMatica as $productPromocijaMatica) {
  //       $productsPromocijaMaticaIds[] = $productPromocijaMatica->product_id;
  //   }

  //   $totalQuantityPromocijaMatica = 0;
  //   foreach ($products as $productItem) {
  //       if (in_array($productItem->id, $productsPromocijaMaticaIds)) {
  //           $totalQuantityPromocijaMatica += (int)$productItem->quantity;
  //       }
  //   }

  //   foreach ($products as $productItem) {
  //     if (in_array($productItem->id, $productsPromocijaMaticaIds)) { // Cat 34 Promocija
  //       if ($totalQuantityPromocijaMatica >= 10) {
  //         $newPrice = $newPrice - (65/100 * $productItem->cena * (int)$productItem->quantity);
  //       } else if ($totalQuantityPromocijaMatica >= 8) {
  //         $newPrice = $newPrice - (50/100 * $productItem->cena * (int)$productItem->quantity);
  //       } else if ($totalQuantityPromocijaMatica >= 6) {
  //         $newPrice = $newPrice - (40/100 * $productItem->cena * (int)$productItem->quantity);
  //       } else if ($totalQuantityPromocijaMatica >= 4) {
  //         $newPrice = $newPrice - (30/100 * $productItem->cena * (int)$productItem->quantity);
  //       } else if ($totalQuantityPromocijaMatica >= 2) {
  //         $newPrice = $newPrice - (20/100 * $productItem->cena * (int)$productItem->quantity);
  //       }
  //     }
  //   }
  // /// ------Promocija za matica


  // ==Promocija na site
  $totalQuantityPromocijaMatica = 0;

  if(!is_null($selectedGradualDiscount)) {
    
    foreach($selectedGradualDiscount->products as $gradualDiscountProduct) {
      $gradualDiscountProductIds[] = $gradualDiscountProduct->id;  
    }
    
    foreach ($products as $productItem) {
      if (in_array($productItem->id, $gradualDiscountProductIds)) {
        $totalQuantityPromocijaMatica += (int)$productItem->quantity;
      }
    }

    foreach ($products as $productItem) {
      foreach($selectedGradualDiscount->items as $item) {
        if ($totalQuantityPromocijaMatica >= $item->number_of_items && in_array($productItem->id, $gradualDiscountProductIds)) {
          $newPrice = $newPrice - ($item->discount_percentage/100 * $productItem->cena * (int)$productItem->quantity);
          break;
        }
      }
    }
  }

    $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); 
    $cargoPrice = $newPrice >= 800 ? 0 : $cargoPrice;
  ?>

  <div class="box_cart">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <ul>
            <li>
              @if($totalQuantityPromocijaMatica >= 1)
              <span class="cart-label">Цена на продукти</span> <span>{{ number_format($newPrice, 0, ",", ".") }}
                мкд</span> <span class="cart_page-discount">{{ number_format($totalPrice, 0, ",", ".") }} мкд</span>
              @else
              <span class="cart-label">Цена на продукти</span> {{ number_format($totalPrice, 0, ",", ".") }} мкд
              @endif
            </li>
            <li>
              <span class="cart-label">Испорака</span> {{ number_format($cargoPrice, 0, ',', '.') }} мкд
            </li>
            <li>
              <span class="cart-label">Вкупна цена</span> {{ number_format($newPrice + $cargoPrice, 0, ",", ".") }} мкд
            </li>
          </ul>
          <button class="btn_1 full-width cart" data-pay-button="">Нарачај</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /box_cart -->

</main>
<!--/main-->
@endsection

@section('scripts')
<script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
      $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
      $(".button_inc").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          if (oldValue > 2) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        $button.parent().find("input").val(newVal).change();
      });

      $(".select2").select2();
      $('[data-show-more]').on('click', function() {
        $(this).closest('[data-show-more-wrapper]').find('[data-show-more-books]').show();
        $(this).closest('[data-show-more-wrapper]').find('[data-show-more]').hide();
      });

      var $form = $('#checkoutForm');
      var $button = $('[data-pay-button]');

      $button.on('click', function(event) {
        var paymentType = $('[name=paymentType]:checked').val();
        if (paymentType === 'halk') {
          $form.attr('action', $form.data('card-action'));
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
              'Amount': $("input[name='amount']").val(),
              'type_delivery': $("select[name='type_delivery']").val(),
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
                $("select[name='Country']").remove();
                $("[name='City']").remove();
                $("input[name='Zip']").remove();
                $("input[name='Address']").remove();
                $("input[name='type_delivery']").remove();
                $("input[name='paymentType']").remove();
                $("input[name='amount']").remove();
                $form.append('<input type="hidden" name="hash" value="' + result.hash + '" />');
                $form.append('<input type="hidden" name="rnd" value="' + result.rnd + '" />');
                $form.append('<input type="hidden" name="oid" value="' + result.oid + '" />');
                $form.append('<input type="hidden" name="amount" value="' + result.totalPrice + '" />');
                $form.submit();
              } else if (result.status === 'not_enough_stock') {
                toastr.error("Производите " + result.productNames + ' моментално ги нема на залиха.');
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