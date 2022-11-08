@extends('clients.clothes.layouts.default')
@section('content')
<?php
    
  $formData = session()->get('formData');
  $countryId = isset($country) ? $country->id :
      old('Country') ? old('Country') :
          (isset($formData) && isset($formData['Country'])) ? $formData['Country'] : 1;


  $delivery = $countryId == 1 ? 0 : 0;
  $delivery = round($delivery / \Session::get('selectedCurrencyDivider'), 2);

  ?>
<style>
    .btn-background{
        background-color:#CF5053 !important; 
        border-color: #CF5053 !important; 
        color: white;
    }
</style>
<div class="main">
        <div class="container">
            <div class="header-page">
                <h1>Кошничка</h1>
            </div>
            <!-- /.header-page -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-8">
                    {{-- <form  class="shop-form"> --}}
                        <div class="table-responsive">
                            <table class="shop-table table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name">Продукт</th>
                                        <th class="product-price">Цена</th>
                                        <th class="product-quantity">Количина</th>
                                        <th class="product-subtotal">Вкупно</th>
                                    </tr>
                                </thead>
                                <tbody><?php $total_price = 0; ?>
                                    @foreach($products as $item)
                                        <tr class="cart_item">
                                            <td class="product-remove"><a href="{{URL::to('cart/remove/')}}/{{$item->id}}@if($item->variation)/{{$item->variation}}@endif" class="remove"><i class="fa fa-times"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="single-product.html">
                                                        <a href="{{$item->url}}"><img
                                                            src="{{$item->image}}" alt="{{$item->title}}"
            
                                                            src="{{\ImagesHelper::getBlogImage($item, NULL, 'sm_')}}"
                                                            alt="{{$item->title}}"
            
                                                            title="{{$item->title}}" class="img-thumbnail"></a>
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{$item->url}}">
                                                        {{$item->title}}
                                                </a>
                                            </td>
                                            <td class="product-price"><span class="amount">{{number_format($item->cena, 0, ',', '.')}}ден.</span></td>
                                            <td class="product-quantity">
                                                <div class="quantity">
                                                    {{-- <button class="minus-btn"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="2" />
                                                    <button class="plus-btn"><i class="fa fa-plus"></i></button> --}}
                                                    <div class="input-group btn-block pull-left"
                                                        style="max-width: 70px;">
                                                        <input table-shopping-qty=""
                                                            data-id="{{$item->id}}"
                                                            @if(!empty($item->variation))
                                                            data-variation="{{$item->variation}}"
                                                            @endif
                                                            class="form-control"
                                                            type="_"
                                                            value="{{$item->quantity}}"/>
                                                        <span class="input-group-btn"></span>
                                                    </div>
    {{--                                                {{dd(Session::get('coupons'))}}--}}
                                                    <div class="input-group btn-block pull-left"
                                                        style="max-width: 70px; margin-top: -3px; ">
                                                        @if(!$item->variationValuesAndIds()->isEmpty())
                                                            <select
                                                                    table-product-variation=""
                                                                    class="form-control"
                                                                    data-id="{{$item->id}}"
                                                                    style="margin-top:3px; width: 70px;"
                                                                    @if(!empty($item->variation))
                                                                    data-variation="{{$item->variation}}"
                                                                    @endif>
                                                                @foreach($item->variationValuesAndIds() as $variations)
                                                                    <option
                                                                        @if($item->variation == $variations->id)
                                                                        selected @endif
                                                                        value="{{$variations->id}}">{{$variations->value}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{number_format($item->cena / Session::get('selectedCurrencyDivider') * $item->quantity)}} ден.</span></td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.shop-table -->
                        </div>
                        <!-- /.table-responsive -->
                        <div class="row mgt-70">
                            <div class="col-md-6">
                                <div class="shop-totals">
                                    <h3>ВКУПНО</h3>
                                    <table class="totals-table">
                                        <tr>
                                            <td>Цена продукти: </td>
                                            <td><span class="amount">{{number_format($totalPrice, 0, ',', '.')}} ден. </span></td>
                                        </tr>
                                        <tr>
                                            <td>Достава: </td>
                                            <td> {{ $totalPrice >= 1000 ? 0 : $cargoPrice }}
                                                    {{config( 'clients.' . config( 'app.client') . '.')}} ден.</td>
                                        </tr>
                                        <tr>
                                            <td>Вкупно:</td>
                                            <td><span class="amount">{{number_format($totalPrice, 0, ',', '.')}} ден.</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
                <div class="col-lg-4">
                        <h4 class="widget-title pb-20">Детали за наплата</h4>
                        <div class="goods-page">
                                <div class="goods-data clearfix">
                                    <div class="table-wrapper-responsive">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
        
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{{session('error')}}</li>
                                                </ul>
                                            </div>
                                        @endif
        
                                      
                                        <form data-form=""
                                              method="POST"
                                              action=""
                                              id="checkoutForm"
                                              data-cash-action="{{route('checksum.generate')}}"
        
                                        >
        
                                            {{csrf_field()}}
        
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Име</label>
                                                    <label class="required-field">*</label></div>
                                                <div class="col-md-8"><input class="form-control" type="text" name="FirstName"
                                                       required=""
                                                       >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Презиме</label>
                                                    <label class="required-field">*</label>
                                                </div>
                                                <div class="col-md-8"> <input class="form-control" type="text" name="LastName"
                                                       required=""
                                                       >
                                            </div></div>
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>E-mail</label>
                                                    <label class="required-field">*</label>
                                                </div>
                                                <div class="col-md-8"><input class="form-control" type="text" name="Email"
                                                       required=""
                                                       >
                                            </div></div>
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Телефон</label><label class="required-field">*</label></div>
                                                <div class="col-md-8"><input class="form-control" type="text" name="Telephone"
                                                       required=""
                                                      >
                                            </div></div>
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Држава</label>
                                                    <label class="required-field">*</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-control input-sm" id="Country" name="Country">
                                                        @foreach($all_countries as $ac)
                                                            @if($ac->id == 1)
                                                            <option 
                                                                @if(!is_null($countryId) && $countryId == $ac->id)
                                                                    selected
                                                                @endif
                                                                value="{{$ac->id}}">{{$ac->country_name}}
                                                            </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Град</label>
                                                    <label class="required-field">*</label>
                                                </div>
        
                                            
                                                <div class="col-md-8">
                                                        <select class="form-control input-sm" id="City" name="City" class="select">
                                                                <option value="">-- Избери град --</option>
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
                                                </div>
                                            </div>
        
                                           
                                            <div class="form-group row">
                                                <div class="col-md-4"><label>Адреса</label>
                                                    <label class="required-field">*</label>
                                                </div>
                                                <div class="col-md-8"><input class="form-control" name="Address" type="text"
                                                       required=""
                                                       value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@endif">
                                                </div>
                                            </div>
        
        
                                    <div class="form-group row">
                                        <div class="col-md-4"> <label>Испорака</label></div>
        
                                        <div class="col-md-8">
                                        @foreach(config( 'clients.' . config( 'app.client') . '.type_delivery') as $key => $delivery)
        
                                            <div class="checkbox" style="width:100%;">
                                                <label>
                                                    <input type="radio" name="type_delivery" checked="" value="{{$key}}"
                                                           @if(isset($formData) && isset($formData['type_delivery']) && $formData['type_delivery'] === $key) checked="checked" @endif >&nbsp
                                                    {{$delivery['name']}} (<span
                                                            data-delivery="">{{round($delivery['price'] / \Session::get('selectedCurrencyDivider'), 2)}}</span> {{ \Session::get('selectedCurrency')  }}
                                                    )
                                                    <br>
                                                </label>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"> <label>Начин на плаќање</label></div>
                                        <div class="col-md-8">
                                            <div class="checkbox" style="width: 100%;">
                                                @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                                    <label>
                                                        <input type="radio" checked="checked" name="paymentType"
                                                            value="{{$i['name']}}"
                                                            @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType'] === $i['name']) checked="checked"
                                                            @endif
                                                            @if (!isset($formData) && $i['name'] === 'card') checked="checked" @endif
                                                        />
                                                        {{$i['display_name'] }}
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
        
                                    <div style="text-align: left;">
                                        <button style="float: left;margin: 0;width: 100%;margin-top: 15px;"
                                                data-pay-button type="submit" class="btn btn-background">Купи <i
                                                    class="fa fa-check"></i>
                                        </button>
        
                                    </div>
                                    </form>
                                    <input type="hidden" value="{{ \Session::get('selectedCurrency')  }}"
                                           id="selectedCurrency"/>
        
        
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
            <!-- /.main-content -->
        </div>
    </div>
@stop