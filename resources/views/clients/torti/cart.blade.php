@extends('clients.torti.layouts.default')
@section('content')

<style>
  .pr-5percent {
    padding-right: 5% !important;
  }

  .bootstrap-datetimepicker-widget table td.active,
  .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #A04699 !important;
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  }

  .colorBlack {
    color: black;
  }

  .standard-font {
    font-family: 'Montserrat' !important;
    font-weight: 400;
  }

  .pr-15 {
    padding-right: 10px;
    padding-bottom: 5px;
  }

  .btn-primary {
    background-color: #A04699;
    border-color: #A04699;
  }

  .section-header {
    padding-left: 15px;
    padding-right: 15px;
  }

  .checkout-section .order-details .shop_table th {
    padding-right: 5% !important;
  }
</style>
<main>
  <div class="checkout-section woocommerce container-fluid">
    <div class="container">
      <div class="section-header">
        <h1 class="standard-font text-left">Кошничка</h1>
      </div>
      <div class="checkout-mail">

        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="checkout-title">
            <h3>Лични податоци</h3>
          </div>
          <form data-form="" id="checkoutForm" method="POST" action="{{route('checksum.generateTorti')}}" class="row">
            {{ csrf_field() }}
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label style="font-weight: normal" class="standard-font">Име</label>
              <input type="text" class="form-control standard-font" placeholder="Име" name="FirstName" required />
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label style="font-weight: normal" class="standard-font">Презиме</label>
              <input type="text" name="LastName" class="form-control standard-font" placeholder="Презиме" required />
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label style="font-weight: normal" class="standard-font">Телефонски број</label>
              <input type="text" class="form-control standard-font" placeholder="Телефонски број" name="Telephone" required />
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label style="font-weight: normal" class="standard-font">Адреса</label>
              <input type="text" class="form-control standard-font" placeholder="Адреса" name="Address" required />
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label style="font-weight: normal" class="standard-font">Е- маил</label>
              <input type="email" class="form-control standard-font" placeholder="Email" name="Email" required />
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label style="font-weight: normal" class="standard-font">Датум на достава/ подигнување</label>
                <input type='text' class="form-control" name="date_pickup" id='datetimepicker' />
              </div>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <h3 class="standard-font">Начин на плаќање</h3>
              @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
              <div class="payment-option">
                <input value="{{$i['name']}}" type="radio" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif name="paymentType">
                <label class="standard-font">{{$i['display_name']}}</label>
              </div>
              @endforeach
            </div>



            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <h3 class="standard-font">Начин на испорака</h3>
              <div class="payment-option">
                <input value="prodavnica" type="radio" name="deliveryType">
                <label class="standard-font">Подигнување од продавница</label>
              </div>
              <div class="payment-option">
                <input value="prodavnica" type="radio" name="deliveryType">
                <label class="standard-font">Достава</label>
              </div>



              <h3 class="standard-font">Дополнителни барања</h3>
              <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
            </div>


            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <button class="btn btn-lg btn-primary standard-font" type="submit" style="margin-top: 10px;" id="order">Нарачај</button>
            </div>
          </form>
        </div>



        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="checkout-title">
            <h3>Во кошничка</h3>
          </div>
          <div class="order-details">
            <table class="shop_table">
              <thead>
                <tr>
                  <th class="text-center">Слика</th>
                  <th class="text-center">Име</th>
                  <th class="text-center">Количина</th>
                  <th class="text-center">Дополнително</th>
                  <th class="text-center">Цена</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="cart_item">
                  <td style="position:relative" class="text-center">
                    @if(!is_null($product->additional) && isset($product->additional['cake_form']))
                    <img style="position: absolute; z-index: 500;" src="{{ url_assets('/torti/images/decorations/fill/'.$product->additional['cake_form'].'/'.$product->additional['fill'].'.png') }}" alt="">
                    <img style="position:absolute; z-index: 500" src="{{ url_assets('/torti/images/decorations/bottom/'.$product->additional['bottom_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['bottom_decoration_color'].'.png') }}" alt="">
                    <img style="position: absolute; z-index: 500" src="{{ url_assets('/torti/images/decorations/top/'.$product->additional['top_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['top_decoration_color'].'.png') }}" alt="">
                    <img style="position: relative;" src="{{ url_assets('/torti/images/decorations/shlag/'.$product->additional['cake_form'].'/'.$product->additional['cake_color'].'.png') }}" alt="">
                    @else
                    <img width="120" style="padding-top:10px; position: relative;" src="{{$product->image}}" style="" alt="">
                    @endif
                  </td>
                  <td class="pr-5percent text-center">
                    <a class="standard-font colorBlack" href="{{$product->url}}">
                      {{ $product->title }}</a>
                  </td>

                  <td class="pr-5percent text-center">
                    <span class="amount">
                      <input table-shopping-qty="" class="form-control quantity-input" @if(!empty($product->variation))
                      data-variation="{{$product->variation}}"
                      @endif
                      max="{{ $product->total_stock }}" data-id="{{ $product->id }}" type="_"
                      value="{{ $product->quantity }}" />
                    </span>
                  </td>

                  <td>
                    <?php $productVariations = explode('_', $product->variation); ?>
                    <?php $allVariations = $product->variationValuesAndIds()->pluck('id')->toArray() ?>
                    @if(!$product->variationValuesAndIds()->isEmpty())
                    <?php $variations = $product->variationValuesAndIds()->groupBy('name') ?>
                    @foreach($variations as $key => $value)
                    <label for="">{{$key}}</label>
                    <select style="width:auto" disabled table-product-variation="" class="form-control quantity-unput" data-id="{{$product->id}}" @if(!empty($product->variation))
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
                  </td>



                  <td class="pr-5percent text-center">
                    @if(!is_null($product->additional))
                    <?php
                    $product->cena = $product->additional['price'];
                    ?>
                    @endif
                    <span class="amount standard-font">{{number_format($product->cena, 0, ',', '.')}} МКД</span>
                  </td>
                  <td class="pr-5percent text-center">
                    <a style="color:black;" href="/cart/remove/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif">
                      <i class="fa fa-trash" style="color: red"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <?php $totalPrice = 0; ?>

            @foreach($products as $product)
            <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity); ?>

            <?php $cargoPrice = 0; ?>
            @if($totalPrice < 1500) <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?> @endif <?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; 
                                                                                                                                                  ?> <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?> @endforeach <div class="order-total">
              <table>
                <tbody style="font-size: 14px;">
                  <tr>
                    <td class="subtotal standard-font pr-15">Цена:</td>
                    <td class="bold standard-font">{{number_format($totalPrice, 0, ',', '.')}} МКД</td>
                  </tr>
                  <tr>
                    <td class="subtotal standard-font pr-15">Достава:</td>
                    <td class="bold standard-font">{{number_format($cargoPrice, 0, ',', '.')}} МКД</td>
                  </tr>
                  <tr>
                    <td class="subtotal standard-font pr-15">Вкупно:</td>
                    <td class="bold standard-font">{{number_format($priceWithDelivery, 0, ',', '.')}} МКД</td>
                  </tr>
                </tbody>
              </table>
          </div>

        </div>

      </div>
    </div>
  </div>
  </div>
</main>

@stop
@section('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>
<script>
  $(function() {
    var today = new Date();
    today.setDate(today.getDate());
    var tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    $('#datetimepicker').datetimepicker({
      minDate: tomorrow
    });
  });
</script>
@stop