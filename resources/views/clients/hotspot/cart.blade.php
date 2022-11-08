@extends('clients.hotspot.layouts.default')
@section('style')
<style>
  .bundle-item {
    /* padding-left: 90px; */
    margin: 0 !important;
    padding-left: 5px;
    font-weight: 400 !important;
  }
  .white-bg {
    background: #fff !important;
  }
  .transparent-bg {
    background: transparent !important;
  }
</style>
<link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url_assets('/hotspot/css/cart.css?v=1')}}" rel="stylesheet">
<link href="{{url_assets('/hotspot/css/checkout.css')}}" rel="stylesheet">
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
              </td>
              <td>
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <div class="price_main"><span
                    class="new_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                    мкд.</span>
                  <br>
                  <span class="old_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                    мкд.</span>
                </div>
                @else
                <strong class="amount nowrap">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                  мкд.</strong>
                @endif
              </td>
              <td>
                {{--  <div class="numbers-row---disable">  --}}
                  <input table-shopping-qty="" class="white-bg qty2 form-control" max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_" value="{{ $product->quantity }}" />
                {{--  </div>  --}}
              </td>
              <td>
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <?php
                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                ?>
                <div class="price_main"><span class="new_price">{{$discount * $product->quantity}}
                    мкд.</span>
                  <br>
                  <span class="old_price">{{number_format($product->$myPriceGroup * $product->quantity, 0, ',', '.')}}
                    мкд.</span>
                </div>
                @else
                <strong
                  class="amount nowrap">{{number_format($product->$myPriceGroup * $product->quantity, 0, ',', '.')}}
                  мкд.</strong>
                @endif
              </td>
              <td class="options">
                <a href="{{URL::to('cart/remove/')}}/{{$product->id}}"><i class="ti-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pt-3" style="color: #ff5353"><strong>* Бесплатна достава над 1000 мкд</strong></div>
        <div class="pt-4">

        </div>
      </div>
      {{-- col-8 --}}
      <div class="col-md-4 col-sm-12">
        <form data-form="" method="POST" action="{{route('checksum.generate')}}" autocomplete="off">
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
      <?php
        $newPrice = $totalPrice;
        $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); 
        $cargoPrice = $newPrice >= 1000 ? 0 : $cargoPrice;
        $totalPriceWithoutDiscount = 0;
        foreach($products as $product) {
          $totalPriceWithoutDiscount += (int)$product->price_retail_1 * (int)$product->quantity;
        }
      ?>
      <div class="transparent-bg box_cart">
        <div class="container">
          <div class="row justify-content-end">
            <ul>
              <li>
                <span class="cart-label">Цена на продукти</span>
                @if($totalPrice != $totalPriceWithoutDiscount)
                <div class="price_main"><span class="new_price">{{number_format($totalPrice, 0, ',', '.')}}
                    мкд.</span>
                  <span class="old_price">{{number_format($totalPriceWithoutDiscount, 0, ',', '.')}}
                    мкд.</span>
                </div>
                @else
                <strong class="amount nowrap">{{number_format($totalPrice, 0, ',', '.')}}
                  мкд.</strong>
                @endif
              </li>
              <li>
                <span class="cart-label">Испорака</span> {{ number_format($cargoPrice, 0, ',', '.') }} мкд
              </li>
              <li>
                <span class="cart-label">Вкупна цена</span>
                {{ number_format($newPrice + $cargoPrice, 0, ",", ".") }}
                мкд.
              </li>
            </ul>
            <button class="btn_1 full-width cart" data-order>Нарачај</button>
          </div>
        </div>
      </div>
      <!-- /box_cart -->
    </div>
  </div>
  </div>
</main>
<!--/main-->
@endsection

@section('scripts')
<script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
      /* Input incrementer*/
      $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
      $(".button_inc").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          // Don't allow decrementing below zero
          if (oldValue > 2) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        $button.parent().find("input").val(newVal).change();
      });

      $('[data-order]').on('click', function() {
        $('[data-form]').submit();
      })
      $(".select2").select2();


      $('[data-show-more]').on('click', function() {
        $(this).closest('[data-show-more-wrapper]').find('[data-show-more-books]').show();
        $(this).closest('[data-show-more-wrapper]').find('[data-show-more]').hide();
      });
    });
</script>
@stop