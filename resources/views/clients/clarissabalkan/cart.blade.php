@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/cart.css?v=2')}}" rel="stylesheet">
<link href="{{url_assets('/clarissabalkan/css/checkout.css')}}" rel="stylesheet">

@stop
<style>
  .total {
    font-size: 1.15rem !important;
    margin-top: 0 !important;
  }
</style>
@section('content')
<main class="ps-main">
  <div class="container margin_30">
    <div class="row">
      <div class="col-md-8 col-sm-12">
        <div class="page_header">
          <h1>Вашата нарачка</h1>
        </div>
        <table class="table cart-list table-responsive">
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
                  <img src="{{ $product->image }}" alt="{{ $product->title }}" 
                    width="70">
                </div>
                <span class="item_cart">{{ $product->title }}</span>
              </td>
              <td>
                <strong>{{ number_format($product->cena, 0, ",", ".")  }} мкд</strong>
              </td>
              <td>
                <div class="numbers-row">
                  <input type="text" table-shopping-qty data-cart-index="{{$product->id}}""
                  data-id=" {{ $product->id }}" value="{{ $product->quantity }}" class="qty2" />
                  <div class="inc button_inc">+</div>
                  <div class="dec button_inc">-</div>
                </div>
              </td>
              <td colspan="2">
                <strong>{{ number_format($product->quantity * $product->cena, 0, ",", ".") }} мкд</strong>
              </td>
              <td class="options">
                <a href="{{URL::to('cart/remove/')}}/{{$product->id}}"><i class="ti-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="page_header">
          <h1>Детали за нарачка</h1>
        </div>
        <form data-form="" method="POST" action="{{route('checksum.generate')}}"
        id="checkoutForm"
        autocomplete="off">
          {{ csrf_field() }}
          <div class="checkout">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Име" name="FirstName" required
                value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif" />
              @if($errors->has('FirstName'))
              <div class="error">Полето Име е задолжително</div>
              @endif
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Презиме" name="LastName" required
                value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif" />
              @if($errors->has('LastName'))
              <div class="error">Полето Презиме е задолжително</div>
              @endif
            </div>

            <div class="form-group">
              <input type="email" class="form-control" placeholder="E-Пошта" name="Email" required
                value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif" />
              @if($errors->has('Email'))
              <div class="error">Полето Е- пошта е задолжително</div>
              @endif
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Телефон" name="Telephone" required
                value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif" />
              @if($errors->has('Telephone'))
              <div class="error">Полето Телефон мора да биде број</div>
              @endif
            </div>

            <div class="form-group">
              <input type="hidden" name="Country" value="{{ $all_countries[0]->id }}">
              <input type="text" class="form-control" placeholder="Држава" value="Македонија" readonly>
            </div>

            <div class="form-group">
              <select class="form-control" name="City" required>
                <option value="" selected>-- Град --</option>
                @foreach($all_cities as $city)
                @if($city->id != 35)
                <option @if($user->city_id_shipping == $city->id) selected @endif value="{{$city->id}}" data-name="{{$city->city_name}}" data-zip="{{$city->zip}}">
                  {{$city->city_name}}
                </option>
                @endif
                @endforeach
              </select>
              @if($errors->has('City'))
                <div class="error">Полето Град е задолжително</div>
              @endif
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Адреса" name="Address" required
                value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address_shiping : ''}}@endif" />
              @if($errors->has('Address'))
              <div class="error">Полето Адреса е задолжително</div>
              @endif
            </div>
            <div class="form-group">
              <h6>Начин на плаќање:</h6>
              @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
              <label class="container_radio">{{ $i['display_name'] }}<a href="#0" class="info" data-toggle="modal"
                  data-target="#payments_method"></a>
                <input type="radio" checked="checked" name="paymentType" value="{{$i['name']}}" @if(isset($formData) &&
                  isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif
                  @if(!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                <span class="checkmark"></span>
              </label>
              @endforeach
            </div>
            <input type="hidden" value="cargo" name="type_delivery">
          </div>
        </form>
      </div>
    </div>



  </div>
  <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); 
    $cargoPrice = $totalPrice >= 600 ? 0 : $cargoPrice;
  ?>

  <div class="box_cart">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <ul>
            <li>
              <span>Цена на продукти:</span> {{ number_format($totalPrice, 0, ",", ".") }} мкд
            </li>
            <li>
              <span>Испорака:</span> {{ number_format($cargoPrice, 0, ',', '.') }} мкд
            </li>
            <li class="total">
              <span>Вкупна цена:</span> {{ number_format($totalPrice + $cargoPrice, 0, ",", ".") }} мкд
            </li>
          </ul>
          <button class="btn_1 full-width cart" id="order-button" data-order>Нарачај</button>
        </div>
      </div>
    </div>
  </div>
</main>
@stop

@section('scripts')
<script>
  $(document).ready(function() {
      /* Input incrementer*/

      var $form = $('#checkoutForm');
    var $button = $('#order-button');
    var canSubmit = false;


    $(':input').on('input', function() {
      console.log(canSubmit);
      var firstName = $("input[name='FirstName']").val();
      var lastName = $("input[name='LastName']").val();
      var email = $("input[name='Email']").val();
      var telephone = $("input[name='Telephone']").val();
      var country = $("select[name='Country']").val();
      var city = $("[name='City']").val();
      var address = $("input[name='Address']").val();

      if (firstName == "" || lastName == "" || email == "" || telephone == "" || country == "" || address == "") {
        canSubmit = false;
      } else {
        canSubmit = true;
      }

      if (canSubmit == true) {
        $("#order-button").attr('disabled', false);
      } else {
        $("#order-button").attr('disabled', true);
      }
    })




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
    });
</script>
@stop