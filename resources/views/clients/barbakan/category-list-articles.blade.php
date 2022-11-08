@extends('clients.barbakan.layouts.default')
@section('content')
    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">{{ $category->title }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row">

                @foreach ($products as $product)
                    {{-- {{dd($product->image)}} --}}
                    <div class="col-md-4 col-xs-6">
                        <div class="menu-item menu-grid-item">
                            <a href="/p/{{ $product->id }}/{{ $product->title }}">
                                <img class="mb-4" src="/uploads/products/{{$product->id}}/md_{{$product->image}}" alt="Image">
                            </a>

                            <a href="/p/{{ $product->id }}/{{ $product->title }}">
                                <h6 class="mb-0">{{ $product->title }}</h6>
                            </a>

                            <span class="text-muted text-sm">{{ $product->short_description }}</span>
                            <div class="row align-items-center mt-4">
                                <div class="col-sm-6">
                                    <span class="text-md mr-4"><span
                                            data-product-base-price="">{{ $product->price}} МКД</span></span>
                                </div>
                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                    <a href="/p/3/barbakanm" class="btn btn-outline-secondary btn-sm"
                                        data-product="{&quot;id&quot;:3,&quot;title&quot;:&quot;\u0411\u0430\u0440\u0431\u0430\u043a\u0430\u043d#M&quot;,&quot;url&quot;:&quot;barbakanm&quot;,&quot;image&quot;:null,&quot;type&quot;:&quot;product&quot;,&quot;unit_code&quot;:&quot;000003&quot;,&quot;sku&quot;:null,&quot;short_description&quot;:&quot;200\u0433 \u0447\u0438\u0441\u0442\u043e \u0442\u0435\u043b\u0435\u0448\u043a\u043e \u043c\u0435\u0441\u043e,\r\n\u043a\u0430\u0440\u0430\u043c\u0435\u043b\u0438\u0437\u0438\u0440\u0430\u043d \u043a\u0440\u043e\u043c\u0438\u0434, \u0441\u043b\u0430\u043d\u0438\u043d\u0430,\r\n\u0447\u0435\u0434\u0430\u0440 \u043a\u0430\u0448\u043a\u0430\u0432\u0430\u043b \u0438 \u0441\u043e\u0441 \u043e\u0434 \u043f\u0435\u0447\u0443\u0440\u043a\u0438 - 200g veal-only mince, caramelised onions, bacon, cheddar &amp; mushroom sauce&quot;,&quot;description&quot;:&quot;&quot;,&quot;meta_title&quot;:&quot;\u0411\u0430\u0440\u0431\u0430\u043a\u0430\u043d#M&quot;,&quot;meta_keywords&quot;:&quot;&quot;,&quot;meta_description&quot;:&quot;200\u0433 \u0447\u0438\u0441\u0442\u043e \u0442\u0435\u043b\u0435\u0448\u043a\u043e \u043c\u0435\u0441\u043e,\r\n\u043a\u0430\u0440\u0430\u043c\u0435\u043b\u0438\u0437\u0438\u0440\u0430\u043d \u043a\u0440\u043e\u043c\u0438\u0434, \u0441\u043b\u0430\u043d\u0438\u043d\u0430,\r\n\u0447\u0435\u0434\u0430\u0440 \u043a\u0430\u0448\u043a\u0430\u0432\u0430\u043b \u0438 \u0441\u043e\u0441 \u043e\u0434 \u043f\u0435\u0447\u0443\u0440\u043a\u0438 - 200g veal-only mince, caramelised onions, bacon, cheddar &amp; mushroom sauceundefined&quot;,&quot;new_from&quot;:&quot;2021-04-16 00:00:00&quot;,&quot;new_to&quot;:&quot;2021-05-16 00:00:00&quot;,&quot;active&quot;:1,&quot;total_stock&quot;:0,&quot;minimum_stock&quot;:0,&quot;warranty_months&quot;:0,&quot;vat&quot;:&quot;18&quot;,&quot;price_retail_1&quot;:&quot;290.00&quot;,&quot;price_retail_2&quot;:&quot;0.00&quot;,&quot;price_wholesale_1&quot;:&quot;0.00&quot;,&quot;price_wholesale_2&quot;:&quot;0.00&quot;,&quot;price_wholesale_3&quot;:&quot;0.00&quot;,&quot;price_diners_24&quot;:&quot;0.00&quot;,&quot;is_exclusive&quot;:0,&quot;is_best_seller&quot;:0,&quot;is_recommended&quot;:0,&quot;visits&quot;:70,&quot;price_nlb_24&quot;:0,&quot;manufacturer_id&quot;:null,&quot;has_variations&quot;:0,&quot;discount&quot;:null,&quot;sell_on_web&quot;:1,&quot;show_on_web&quot;:1,&quot;created_at&quot;:&quot;2021-04-16 13:46:31&quot;,&quot;updated_at&quot;:&quot;2021-10-13 15:43:56&quot;,&quot;deleted_at&quot;:null,&quot;zemja_poteklo&quot;:null,&quot;tezina_kg&quot;:null,&quot;volumen_m3&quot;:null,&quot;carinski_tarifen_broj&quot;:null,&quot;price_nabavna&quot;:&quot;0.00&quot;,&quot;importer_id&quot;:null,&quot;daily_promotion&quot;:null,&quot;unit_id&quot;:null,&quot;discount_type&quot;:null,&quot;discount_value&quot;:null,&quot;google_product_category&quot;:null,&quot;mark_as_new&quot;:0,&quot;best_before&quot;:&quot;1970-01-01&quot;,&quot;parent_product&quot;:null,&quot;final_price_retail_1&quot;:&quot;290.00&quot;,&quot;physical_buy_only&quot;:0,&quot;package&quot;:null,&quot;order&quot;:1,&quot;purchases&quot;:1,&quot;minimum_stock_alert&quot;:10,&quot;sold_out&quot;:0,&quot;sticker_id&quot;:null,&quot;title_lang2&quot;:&quot;&quot;,&quot;url_lang2&quot;:&quot;&quot;,&quot;meta_description_lang2&quot;:&quot;&quot;,&quot;short_description_lang2&quot;:&quot;&quot;,&quot;description_lang2&quot;:&quot;&quot;,&quot;meta_title_lang2&quot;:&quot;&quot;}"><span>Додади</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@stop
