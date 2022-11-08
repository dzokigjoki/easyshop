@extends('clients.topmarket.layouts.default')

@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="page_wrapper">

        <div class="container">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            {{--<ul class="breadcrumb">--}}
                {{--<li><a href="/">Дома</a></li>--}}
                {{--<li>Кошничка</li>--}}
            {{--</ul>--}}
            <br>
            <section class="section_offset">

                <div class="title-bg">
                    <h2 class="title">Кошничка</h2>
                </div>


                <?php
                $formData = session()->get('formData');
                ?>


                <div class="row">
                    <div class="col-sm-4">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div style="padding: 10px 0px;">
                            <form data-form=""
                                    id="checkoutForm"
                                  method="POST"
                                  action="{{route('checksum.generate')}}"
                                  class="type_2">

                                {{ csrf_field() }}

                                <?php $totalPrice = 0; ?>
                                <?php $cargoPrice = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price'); ?>

                                @foreach($products as $product)
                                    <?php $totalPrice = $totalPrice + ($product->cena * $product->quantity);?>
<!--                                    --><?php //$priceWithDelivery = $totalPrice >= 2000 ? $totalPrice : $totalPrice + $cargoPrice; ?>
                                        <?php $priceWithDelivery = $totalPrice + $cargoPrice; ?>
                                @endforeach

                                <div class="col-xs-12">
                                    <table id="cart_table">
                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="FirstName"
                                                       class="required">Име</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="FirstName"
                                                       id="FirstName"
                                                       autofocus=""
                                                       required=""
                                                       value="@if(old('FirstName')){{old('FirstName')}}@elseif(isset($formData) && isset($formData['FirstName'])){{$formData['FirstName']}}@else{{isset($user) ? $user->first_name : ''}}@endif"/>
                                            </td>
                                        </tr>

                                        <!--/ [col]-->


                                        <!--/ .row -->
                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="LastName"
                                                       class="required">Презиме</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="LastName"
                                                       id="LastName"
                                                       value="@if(old('LastName')){{old('LastName')}}@elseif(isset($formData) && isset($formData['LastName'])){{$formData['LastName']}}@else{{isset($user) ? $user->last_name : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->


                                        <!--/ .row -->


                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="Email">Е-Пошта</label></td>
                                            <td class="cart_table_input">
                                                <input type="email" class="form-control"
                                                      name="Email" id="Email"
                                                       value="@if(old('Email')){{old('Email')}}@elseif(isset($formData) && isset($formData['Email'])){{$formData['Email']}}@else{{isset($user) ? $user->email : ''}}@endif"/>
                                            </td>
                                        </tr>

                                        <!--/ [col]-->


                                        <!--/ .row -->
                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="Telephone" class="required">Телефонски
                                                    број</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="Telephone"
                                                       id="Telephone"
                                                       value="@if(old('Telephone')){{old('Telephone')}}@elseif(isset($formData) && isset($formData['Telephone'])){{$formData['Telephone']}}@else{{isset($user) ? $user->phone : ''}}@endif"/>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->

                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="Country"
                                                       class="required">Држава</label></td>
                                            <td class="cart_table_input"><select id="Country" class="form-control"
                                                                                 name="Country">
                                                    <?php $all_countries = [$all_countries[0]]; // For now only Macedonia ?>
                                                    @foreach($all_countries as $ac)
                                                        <option @if(isset($country) && $country->id == $ac->id)
                                                            selected
                                                            @endif
                                                            value="{{$ac->id}}">{{$ac->country_name}}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                        </tr>
                                        <!--/ [col]-->


                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="City" class="required">Град</label>
                                            </td>
                                            <td class="cart_table_input"><select id="City" name="City"
                                                                                 class="form-control">
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
                                                </select></td>
                                        </tr>
                                        <!--/ [col]-->


                                        <tr>

                                            <td class="cart_table_label">
                                                <label for="Address"
                                                       class="required">Адреса</label></td>
                                            <td class="cart_table_input">
                                                <input type="text" class="form-control"
                                                       required="" name="Address" id="Address"
                                                       value="@if(old('Address')){{old('Address')}}@elseif(isset($formData) && isset($formData['Address'])){{$formData['Address']}}@else{{isset($user) ? $user->address : ''}}@endif"/>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="cart_table_label">
                                                <label for="phone">Начин на плаќање</label>
                                            </td>


                                            <td class="cart_table_input">
                                                <input type="radio" checked="checked" value="gotovo"
                                                       id="paymentType2"
                                                       name="paymentType">
                                                <label for="paymentType2">Во готово</label>
                                            </td>
                                        </tr>


                                        <tr>

                                            <td class="cart_table_inside">
                                                <label for="phone">Начин на испорака</label>
                                            </td>


                                            <td class="cart_table_input">
                                                <input type="radio" checked="checked"
                                                       value="cargo"
                                                       name="type_delivery">
                                                <label>Карго</label>
                                            </td>
                                        </tr>
                                        <!--/ [col]-->


                                    </table>
                                </div>
                            <br>

                                <div class="col-xs-12">
                                    <ul>
                                        <li class="row">

                                            <div class="col-sm-12">

                                                <div class="left_side">

                                                    <button type="submit" data-pay-button="" id="buy"
                                                            class="btn btn-custom-2 btn-block">Купи</button>

                                                </div>
                                            </div>
                                            <!--/ [col]-->
                                        </li>
                                    </ul>
                                </div>

                            </form>
                            <!--/ .contactform -->


                        </div>
                    </div>


                    <div class="col-sm-8" id="vkupno_cena">
                        <div class="">
                            <table class="table" id="summary_table">
                                <thead>

                                <tr>
                                    <th class="product_title_col">Производ</th>
                                    <th class="product_price_col">Цена</th>
                                    <th class="product_qty_col">Кол.</th>
                                    <th class="product_total_col">Вкупно</th>
                                    <th style="width: 100px;" class="product_total_col">Избриши</th>
                                </tr>

                                </thead>

                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="col-md-6">
                                                <img src="{{$product->image}}"
                                                     alt="{{$product->title}}"
                                                     title="{{$product->title}}"
                                                     class="img-thumbnail"></div>
                                            <div class="col-md-6"><a href="{{$product->url}}"
                                                                     class="product_title">{{$product->title}}</a>
                                                <a href="{{$product->url}}">
                                                    <br>
                                                </a></div>
                                        </td>
                                        <td>{{number_format($product->cena, 0, ',', '.')}}
                                        </td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{number_format($product->cena * $product->quantity, 0, ',', '.')}}

                                        </td>
                                        <td style="width: 100px;text-align: center;"><a
                                                    class="fa fa-times" style="font-size: 22px; color: #d9534f"
                                                    href="{{URL::to('cart/remove/')}}/{{$product->id}}"></a></td>
                                    </tr>
                                @endforeach


                                </tbody>

                                <tfoot>

                                <tr class="table-footer">

                                    <td colspan="3" class="bold"><label>Цена на продукти</label></td>
                                    <td colspan="2" class="total align_right"><label
                                                class="table_summary">{{number_format($totalPrice, 0, ',', '.')}}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                    </td>

                                </tr>

                                <tr class="table-footer">

                                    <td colspan="3" class="bold"><label>Испорака</label></td>
                                    <td colspan="2"
                                        class="total align_right"><label class="table_summary">{{ $cargoPrice }}
                                            {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                        {{--class="table_summary">{{ $totalPrice >= 2000 ? 0 : $cargoPrice }}--}}
                                    </td>

                                </tr>

                                <tr class="table-footer">

                                    <td colspan="3" class="grandtotal"><label>Вкупно</label></td>
                                    <td colspan="2"
                                        class="grandtotal align_right"><label class="table_summary">{{number_format($priceWithDelivery, 0, ',',
                                        '.')}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</label>
                                    </td>

                                </tr>

                                </tfoot>

                            </table>

                        </div>
                        <!--/ .table_wrap -->

                    </div>


                </div>

            </section>

        </div>
    </div>


@endsection


@section('scripts')
    {{--TODO: move to global script--}}
    <script>
        //        $(document).ready(function () {
        //            var $form = $('#checkoutForm');
        //            var $button = $('[data-pay-button]');
        //
        //            $button.on('click', function (event) {
        //
        //                var paymentType = $('[name=paymentType]:checked').val();
        //
        //                if (paymentType === 'gotovo') {
        //                    $form.attr('action', $form.data('cash-action'));
        //                    $form.submit();
        //                    return true;
        //                }
        //            });
        //
        //        });

    </script>

    <script>
        $('[data-form]').submit(function () {
            $("#buy").prop('disabled', true);
        });
    </script>

@stop

