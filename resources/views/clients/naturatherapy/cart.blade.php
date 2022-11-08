@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('content')


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

<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">
                        {!! trans('naturatherapy/global.home') !!}</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    {!! trans('naturatherapy/cart.cart') !!}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="shop-section section elements py-5 py-xl-100">
    <div class="element-top">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="element-bottom">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="container" data-content="partial">

        <div class="mb-4 mb-md-5">
            <h2 class="h1 mb-4 mb-lg-5 text-center">{!! trans('naturatherapy/cart.productsincart') !!}
            </h2>
            <div class="table-responsive">
                <table class="table table-style-1 table-cart">
                    <thead>
                        <tr>
                            <th colspan="2">
                                {!! trans('naturatherapy/global.product') !!}</th>
                            <th>
                                {!! trans('naturatherapy/global.price') !!}</th>
                            <th>
                                {!! trans('naturatherapy/global.qty') !!}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td class="cart-item-img">

                                <img width="100" class="cart-item-img mr-3" @if($product->image)
                                src="{{ $product->image }}" alt="{{ $product->title }}"
                                @else
                                src="{{ url_assets('/easycms/pneumatik/img/no-image.png')}}"
                                @endif
                                />
                            </td>
                            <td class="table-name-col align-middle">
                                <a href="/p/{{ $product->id }}/{{ $product->url }}" class="link link-primary h5 font-weight-normal">{{ $product->title }}</a>
                            </td>
                            <td class="align-middle">
                                <span class="h5 text-green font-weight-normal">{{number_format($product->cena * $price_multiplier, 2, '.', '')}} @if($price_multiplier == 1) &#128; @else LEK  @endif</span>
                            </td>
                            <td class="table-action-col align-middle">
                                <div class="btn-toolbar cart-form">
                                    <div class="cart-order-controls-wrapper form-group mb-0">
                                        <input id="quantity" type="number" table-shopping-qty="" class="form-control h-100 increment-control" max="{{ $product->total_stock }}" data-id="{{ $product->id }}" value="{{ $product->quantity }}" />
                                        <div class="pl-1">
                                            <button type="button" class="controls control-increase">+</button>
                                            <button type="button" class="controls control-decrease">-</button>
                                        </div>
                                    </div>
                                    <div class="ml-lg-auto">
                                        <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="btn btn-no-style btn-lg ml-2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-right hidecartorno">
            <p class="h4">

                {!! trans('naturatherapy/cart.delivery') !!}:<br> <span data-cart-label="total_price" class="deliveryprice">{{ number_format( $cargoPrice * $price_multiplier, 2, '.', '') }}</span> @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
        </div>
        <div class="text-right">
            <p class="h4">
                {!! trans('naturatherapy/cart.total_price') !!}:<br> <span data-cart-label="total_price" class="total-price">{{ number_format( $totalPrice * $price_multiplier, 2, '.', '') }}</span> @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
        </div>
        <hr class="my-4">
        <form id="checkoutForm" class="form form-style-1" data-cash-action="{{route('checksum.generate')}}" method="POST">

            {{ @csrf_field() }}

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3 class="h1 mb-4 mb-lg-5">
                            {!! trans('naturatherapy/cart.head_1') !!}</h3>
                        <p class="mb-4 mb-lg-5">
                            {!! trans('naturatherapy/cart.text_2') !!}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.firstname') !!}" value="" id="FirstName" name="FirstName">
                            <div class="invalid-tooltip">Vendosni një emër!
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.lastname') !!}" value="" id="LastName" name="LastName">
                            <div class="invalid-tooltip">Vendosni një emër!
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-md-4">
                            <select required id="City" class="form-control country_select" name="City">
                                <option value="">-- {!! trans('naturatherapy/global.city') !!}--</option>
                                @foreach($all_cities as $city)
                                @if($city->id != 35)
                                <option @if(isset($user->city_id_shipping) && $user->city_id_shipping == $city->id)
                                    selected
                                    @endif
                                    value="{{$city->id}}"
                                    data-name="{{$city->city_name_en}}"
                                    data-zip="{{$city->zip}}">
                                    {{$city->city_name_en}}
                                </option>
                                @endif
                                @endforeach
                            </select>

                            <div class="invalid-tooltip">Hyni në qytet!</div>
                        </div>
                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.opstina') !!}" value="" id="municipality" name="municipality">
                            <div class="invalid-tooltip">
                                Hyni në një zgjidhje!</div>
                        </div>
                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.addresstodeliver') !!}" value="" id="Address" name="Address">
                            <div class="invalid-tooltip">Vendosni një adresë të dorëzimit!
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.email') !!}" value="" id="Email" name="Email">
                            <div class="invalid-tooltip">
                                Fut email</div>
                        </div>
                        <div class="col-md-6 form-group mb-md-4">
                            <input required type="text" class="form-control" placeholder="{!! trans('naturatherapy/global.phone') !!} (07X XXX XXX)" value="" id="Telephone" name="Telephone">
                            <div class="invalid-tooltip">
                                Vendosni një numër telefoni!</div>
                        </div>
                        <div class="col-12 form-group mb-md-4">
                            <textarea class="form-control" placeholder="{!! trans('naturatherapy/global.additional_comment') !!}" name="comments" rows="6"></textarea>
                        </div>

                        <hr class=w-100>

                        <div class="col-md-6 form-group mb-md-4">
                            <span>{!! trans('naturatherapy/global.nacinnaplakanje') !!} <br>
                                @foreach(\EasyShop\Models\AdminSettings::getField('paymentMethods') as $i)
                                <input style="margin-top: 10px; margin-left:10px;" type="radio" @if($i['display_name']=='Para në dorë' )checked="true" @endif name="paymentType" id="{{$i['name']}}" value="{{$i['name']}}" @if(isset($formData) && isset($formData['paymentType']) && $formData['paymentType']===$i['name']) checked="checked" @endif @if (!isset($formData) && $i['name']==='casys' ) checked="checked" @endif />
                                <span style="margin-left: 10px; line-height:30px;">{{$i['display_name']}}</span><br>
                                @endforeach
                            </span>
                        </div>


                        <!-- <input style="margin-top: 10px; margin-left:10px;" name="paymentType" id="gotovo" value="gotovo" checked="checked" /> -->


                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-secondary" disabled data-pay-button>{!! trans('naturatherapy/global.order') !!}</button>
                        </div>


                        <input type="hidden" name="Country" value="1">

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<hr class="my-0">
@endsection



@section("scripts")
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="{{ url_assets('/naturatherapy/javascript/cart.js') }}"></script>

<script>
    
    $(document).ready(function() {

        if ($("input[name='FirstName']").val() == '' || 
            $("input[name='LastName']").val() == '' ||
            $("input[name='Email']").val() == '' || 
            $("input[name='Telephone']").val() == '' || 
            $("input[name='Country']").val() == '' || 
            $("input[name='Address']").val() == '') {
            canSubmit = false;
        } else {
            canSubmit = true;
        }

        if (canSubmit) {
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
            $("input[name='Email']").val() == "" || $("input[name='Telephone']").val() == "" || $("input[name='Country']").val() == "" || $("input[name='Address']").val() == "") {
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
            var country = $("input[name='Country']").val();
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
                        'Country': $("input[name='Country']").val(),
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
                            $("input[name='Country']").remove();
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