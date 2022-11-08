{{-- {{ dd($products) }} --}}
@extends('clients.e-commerce.layouts.default')

@section('content')
<style>
    .slikaKosnica {
    right: 56px !important;
}
.cenaUSD{
    font-weight: 700;
}
.title{
    text-transform: capitalize;
    color:#5ba515;
    margin-bottom: 0px !important;

}
</style>
    <body>
        <!-- pageWrapper -->
        <div id="pageWrapper">
            <!-- header -->

            <main>
                <!-- introBannerHolder -->
                <section class="introBannerHolder d-flex w-100 bgCover">
                    <div class="container-fluid">
                        <div class="row bgTitle">
                            <div class="col-12 pt-lg-10 pt-md-15 pt-sm-10 pt-6 text-center">
                                <h1 class="headingIV fwEbold playfair mb-4">My Cart</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- cartHolder -->
                
                <div class="cartHolder container ">
                    <div class="row">
                        <!-- table-responsive -->
                        <div class="col-12 table-responsive mb-xl-22 mb-lg-20 mb-md-16 mb-10">
                            <!-- cartTable -->
                            <table class="table cartTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-uppercase fwEbold border-top-0">product</th>
                                        <th scope="col" class="text-uppercase fwEbold border-top-0">price</th>
                                        <th scope="col" class="text-uppercase fwEbold border-top-0">quantity</th>
                                        <th scope="col" class="text-uppercase fwEbold border-top-0">total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)


                                                    <tr class="cart_item">
                                                        <td class="product-thumbnail">
                                                            <a href="{{ $product->url }}">
                                                                <img src="{{ $product->image }}" alt="">
                                                            </a>
                                                        </td>
                                                        <td class="product-name">
                                                            <a href="{{ $product->url }}"> {{ $product->title }} </a>

                                                        </td>
                                                        <td class="product-price">
                                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                <?php
                                                                $discount = \EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                                $discountPercentage = (($product->price_retail_1 - $discount) / $product->price_retail_1) * 100;
                                                                ?>
                                                                <del>
                                                                    <span>{{ number_format($product->price_retail_1, 0, ',', '.') }}МКД</span>
                                                                </del>
                                                                <br>
                                                                <div>
                                                                    <span
                                                                        class="amount">{{ $discount }}МКД</span>
                                                                </div>
                                                            @else

                                                                <span
                                                                    class="amount">{{ number_format($product->price_retail_1, 0, ',', '.') }}
                                                                    МКД</span>

                                                            @endif
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity buttons_added">
                                                                <input table-shopping-qty="" class="input-text qty text"
                                                                    max="1000" data-id="{{ $product->id }}" type="_"
                                                                    value="{{ $product->quantity }}" />

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
                                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                    <?php
                                                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                                                    if ($discount > $product->cena) {
                                                                        $discount = $product->cena;
                                                                    }
                                                                    ?>
                                                                    {{ $product->quantity * $discount }}
                                                                    ден.
                                                                @else
                                                                    {{ $product->quantity * $product->cena }} ден.
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="product-remove">
                                                            <a href="/cart/remove/{{ $product->id }}"
                                                                class="remove" title="Remove this item">
                                                                <i class="ui-close"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="testRow">
                        <form data-form="" class="checkout woocommerce-checkout" id="checkoutForm" method="POST"
                            data-cash-action="{{ route('checksum.generate') }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset class="couponForm mb-md-0 mb-5">
                                        <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                            <label for="code" class="fwEbold text-uppercase d-block mb-1">Име</label>
                                            <input type="text" id="code" class="form-control">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Презиме</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Телефонски
                                            број</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Email</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Држава</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Град</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <fieldset class="couponForm mb-md-0 mb-5">
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">Адреса</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                </fieldset>
                               </div>
                               <div class="col-lg-6">
                                <div class="d-flex justify-content-between">
                                    <strong class="txt fwEbold text-uppercase mb-1">subtotal</strong>
                                    <strong class="price fwEbold text-uppercase mb-1">900.00 $</strong>
                                </div>
                                <a href="javascript:void(0);"
                                    class="btn btnTheme w-600 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4 float-right">Proceed
                                    to checkout</a>
                            </div>
                            </div>
                  
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <form action="javascript:void(0);" class="cartForm mb-5">
                                <div class="form-group mb-0">
                                    <label for="note" class="fwEbold text-uppercase d-block mb-1">add note</label>
                                    <textarea id="note" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        
                        {{-- <div class="col-12 col-md-6">
                            <form action="javascript:void(0);" class="couponForm mb-md-0 mb-5">
                                <fieldset>
                                    <div class="mt-holder d-inline-block align-bottom mr-lg-5 mr-0 mb-lg-0 mb-2">
                                        <label for="code" class="fwEbold text-uppercase d-block mb-1">promo
                                            code</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>
                                    <button type="submit"
                                        class="btn btnTheme btnCart fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">Apply</button>
                                </fieldset>
                            </form>
                        </div> --}}
                       
                    </div>
                </div>
               

            </main>

        </div>
    </body>

@stop

@section('scripts')
<script>
  $(document).ready(function() {
           
           let productCartId = sessionStorage.getItem("productIds");

           let productCartPrice = sessionStorage.getItem("productprice");

           // document.getElementById("demo1").innerHTML = productCartId;
          
           let productCartTitle = sessionStorage.getItem("producttitle");

           // document.getElementById("demo2").innerHTML = productCartTitle;
           console.log($(this).attr("productImage"));
          
           let productCartImage = sessionStorage.getItem("productimage");
    // KOSNICKA
    $(".imgHolder").append('<img class="slikaKosnica" src="uploads/products/' +productCartId + '/sm_' + productCartImage + '""">');
    $(".title").append('<p>' + productCartTitle + '</p>');
    $(".priceSingle").append('<p>' + productCartPrice + '<span class="cenaUSD"> USD</span>'+'</p>');

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
