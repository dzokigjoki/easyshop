@extends('clients.mymoda.layouts.default')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url_assets('/mymoda/css/product.css?v=3') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css">



    <style>
        @media(min-width: 992px) {
            .custom-heading {
                font-size: 24px !important;
                font-weight: bold !important;
                margin-bottom: 0 !important;
                text-align: left !important;
            }
        }

        @media(max-width: 991px) {
            .custom-heading {
                margin-top: 10px !important;
                font-size: 18px !important;
                font-weight: bold !important;
                margin-bottom: 0 !important;
                text-align: left !important;
            }
        }

        #footer-mob {
            display: initial;
        }

        .flex-end {
            display: flex !important;
            align-items: end !important;
        }

        #wish-icon,
        .red {
            color: #ca2028 !important;
        }

        #unit-code {
            font-size: 12px;
            color: gray !important;
        }

        #unit-code-mobile {
            font-size: 12px !important;
            font-weight: normal;
            color: gray !important;
        }

        button.mfp-close {
            margin-top: 30px;
            margin-right: 10px;
        }

        #bottom-bar {
            position: fixed;
            bottom: 0;
            height: 75px;
            background-color: #F3F0F0;
            z-index: 9999;
        }

        @media(min-width: 776px) {
            /* #unit-code-mobile {
                                                                  display: none;
                                                                }

                                                                #unit-code {
                                                                  display: inline;
                                                                } */
        }

        #quantity {

            width: 100px !important;
        }

        .fa-facebook {
            padding: 10px;
            border-radius: 30px;
            width: 45px;
        }

        .fa-twitter {

            padding: 10px;
            border-radius: 30px;
            width: 45px;
        }

        .salefordiscount {
            background: #CB1A23;
            color: white;
            padding: 3.5px 5px;
        }

        .nav-tabs {
            justify-content: center;
            display: flex;
        }

        .nav-tabs li {
            font-size: 21px;
        }

        .tab-content {
            padding: 20px 10px;
        }

        .price_old_big {
            font-size: 31px;
        }

        .price_big {
            font-size: 45px !important;
        }

        #desktop-header {

            font-size: 31px;
        }

        .mt-15 {
            margin-top: 15px !important;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-25 {
            margin-top: 25px;
        }


        /* @media(max-width: 776px) {
                                                                #unit-code-mobile {
                                                                  display: inline;
                                                                }

                                                                #unit-code {
                                                                  display: none;
                                                                }
                                                              } */

        @media(max-width: 1200px) {
            #mobile-header {
                display: block !important;
                padding-bottom: 0 !important;
            }
        }

        @media(min-width: 1200px) {
            #mobile-header {
                display: none !important;
            }
        }

        @media(max-width: 575px) {

            .nav-tabs li {
                font-size: 17px;
            }

        }

    </style>
    <div class="ps-breadcrumb ps-breadcrumb--2">

        <div class="ps-container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-1 col-md-8 col-sm-8 col-xs-12 ">
                    <ol class="breadcrumb">
                        <li><a href="/">??????????????</a></li>
                        <li><a>{{ $product->title }}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="visible-md w-100" id="bottom-bar">
        <div class="row" id="footer_row">
            <div class="col-xs-7">
                <?php $variations = $product->variationValuesAndIds()->groupBy('name'); ?>
                @if (!empty($variations))
                    <button class="ps-btn w-100 mt-15 direct-buy_footer direct_buy_button modal_click"
                        value="{{ $product->id }}" data-toggle="modal" data-add-to-cart data-target="#modal_varijacii"
                        id="open_modal" data-direct="true"><i class="exist-minicart mr-5"></i> ???????? ????????????</button>
                @else
                    <button class="ps-btn w-100 mt-15 direct-buy_footer direct_buy_button modal_click"
                        value="{{ $product->id }}" data-add-to-cart data-direct="true"><i class="exist-minicart mr-5"></i>
                        ???????? ????????????</button>
                @endif
            </div>

            <div class="col-xs-5 text-center">
                @if (EasyShop\Models\Product::hasDiscount($product->discount))
                    <h4 class="ps-product__price mt-20">
                        {{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                        ??????
                        <br>
                        <del class="old-price">
                            {{ number_format($product->price, 0, ',', '.') }} ??????</del>
                    </h4>
                @else
                    <h4 class="ps-product__price mt-25">
                        {{ number_format($product->price, 0, ',', '.') }} ??????
                    </h4>
                @endif
            </div>
        </div>
        <div class="modal fade" id="modal_varijacii" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-5">
                                <img width="100" class="img img-responsive img_model" @if ($product->image) src="{{ $product->image }}" alt="{{ $product->title }}"
              @else
                                                                          src="{{ url_assets('/easycms/pneumatik/img/no-image.png') }}" @endif />
                            </div>

                            <div class="col-xs-7" class="padding-left-5">
                                <div class="row padding-right-15"><strong>{{ $product->title }}</strong></div>
                                <div class="row">
                                    @if (EasyShop\Models\Product::hasDiscount($product->discount))
                                        <h5 class="ps-product__price mt-20 model_title_margin">
                                            {{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                            ??????
                                            <br>
                                            <del class="old-price">
                                                {{ number_format($product->price, 0, ',', '.') }} ??????</del>
                                        </h5>
                                    @else
                                        <h5 class="ps-product__price price_big mt-25 model_price">
                                            {{ number_format($product->price, 0, ',', '.') }} ??????
                                        </h5>
                                    @endif
                                </div>
                                <div class="row">
                                    <?php $variations = $product->variationValuesAndIds()->groupBy('name');
                                    ?>
                                    @if (!empty($variations) && count($variations) > 0)

                                        @foreach ($variations as $key => $value)

                                            @if ($key == '????????????????')
                                                <h5 class="margin_top_5">{{ $key }}</h5>
                                                @foreach ($value as $v)
                                                    <label>
                                                        <input data-product-variation type="radio"
                                                            value="{{ $v->id }}" name="variations[]"
                                                            class="card-input-element" />
                                                        <div class="panel panel-default card-input">
                                                            <div class="panel-body variations_click">
                                                                {{ $v->value }}
                                                            </div>
                                                        </div>

                                                    </label>
                                                @endforeach

                                            @elseif($key != '????????????????')
                                                <h5 class="mt-30">{{ $key }}</h5>
                                                <select data-product-variation class="form-control variation-select"
                                                    name="variations[]" id="">
                                                    <option disabled selected value> -- ???????????????? {{ $key }} --
                                                    </option>
                                                    @foreach ($value as $v)
                                                        <option value="{{ $v->id }}">{{ $v->value }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        @endforeach

                                    @endif
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <button class="ps-btn btn-xs-6 btn-xs-offset-3 btn_modal disabled" disabled
                                value="{{ $product->id }}" data-direct="true" data-add-to-cart="" id="direct_buy_btn"><i
                                    class="exist-minicart mr-5"></i> ????????
                                ????????????</button>
                        </div>

                    </div>
                    <!-- <div class="modal-footer">
                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div> -->
                </div>

            </div>
        </div>
    </div>


    <div class="ps-product--detail">
        <div class="ps-container-fluid">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12 ">
                    {{-- <h1 class="ps-product__title text-left" id="mobile-header">{{ $product->title }}

        </h1>
        <h4 id="unit-code-mobile">??????????: {{$product->unit_code}}</h4> --}}
                    <div class="mt-15 ps-product__thumbnail">
                        <div class="ps-product__images-large" id="img-slider">
                            @if (count($product->images) > 0)
                                @foreach ($product->images as $img)
                                    <div class="item margin_top_20"><img class="main-img"
                                            src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            alt=""><a class="ps-product__zoom single-image-popup"
                                            href="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"><i
                                                class="exist-zoom"></i></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        @if (count($product->images) > 0)
                            <div class="ps-product__nav">
                                {{-- <div class="item"><img src="{{$product->image}}" alt=""><a class="ps-product__zoom single-image-popup"
              href="{{$product->image}}"><i class="exist-zoom"></i></a>
          </div> --}}
                                @foreach ($product->images as $img)
                                    <div class="item">
                                        <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            alt="">
                                    </div>
                                @endforeach

                            </div>
                            <div class="clearfix"></div>

                        @endif
                        <div class="Features">
                            <div class="item" data-toggle="modal" data-target="#shareModal">
                                <div class="">
                                    <div class="Icon ifa-188"></div>
                                    <span>??????????????</span>
                                </div>

                                </a>
                            </div>

                            <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModal"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="shareModalLongTitle">??????????????</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                {{-- <span aria-hidden="true">&times;</span> --}}
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">??????????????</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <a target="_blank"
                                    href="https://api.whatsapp.com/send?phone=0038971683682&text={{ url()->current() }}.">
                                    <div class="Icon ifa-578"></div>
                                    <span>???? ?????????? ???????????</span>
                                </a>
                            </div>
                        </div>

                        {{-- <a href="#" onclick="da_share.tw();">Tweat This</a> --}}
                        {{-- <a href="#" onclick="da_share.gp();">Share on Google Plus</a> --}}
                    </div>

                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="align_left" class="ps-product__info">
                        <div class="d-flex">
                            <h5 style="margin-right: auto;">{{ $product->categories()->first()->title }}</h5>
                            @if (EasyShop\Models\Product::hasDiscount($product->discount))
                                <div class="salefordiscount">
                                    ????????????
                                </div>
                            @endif
                        </div>

                        <h1 class="ps-product__title text-left custom-heading">

                            <span id="desktop-header"> {{ $product->title }}


                            </span>

                        </h1>
                        <h4 id="unit-code">??????????: {{ $product->unit_code }}</h4>
                        {{-- <h4 id="unit-code">????????????????????: @if ($product->total_stock) ????
                            ???????????? @else ???????? ???? ???????????? @endif
                        </h4> --}}

                        @if (EasyShop\Models\Product::hasDiscount($product->discount))
                            <h4 class="mt-15 ps-product__price price_big">
                                <del class="old-price price_old_big">
                                    {{ number_format($product->price, 0, ',', '.') }} ??????</del>
                                <br>
                                {{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                ??????

                            </h4>
                        @else
                            <h4 class="mt-15 ps-product__price price_big">
                                {{ number_format($product->price, 0, ',', '.') }} ??????
                            </h4>
                        @endif

                        @if ($product->total_stock > 0)
                            <h4 style="padding-top: 10px;">??????????????! <span class="red bold">????????
                                    {{ $product->total_stock }} ???????????????? ???? ????????????!</span> </h4>
                        @endif




                        <div>
                            <?php $variations = $product->variationValuesAndIds()->groupBy('name'); ?>
                            @if (!empty($variations) && count($variations) > 0)

                                @foreach ($variations as $key => $value)

                                    @if ($key == '????????????????')
                                        <h5 class="margin_top_5">{{ $key }}</h5>
                                        @foreach ($value as $v)
                                            <label>
                                                <input data-product-variation type="radio" value="{{ $v->id }}"
                                                    name="variations[]" class="card-input-element varijacii" />
                                                <div class="panel panel-default card-input">
                                                    <div class="panel-body variations_click_nomodal">
                                                        {{ $v->value }}
                                                    </div>
                                                </div>

                                            </label>
                                        @endforeach

                                    @elseif($key != '????????????????')
                                        <h5 class="mt-30">{{ $key }}</h5>
                                        <select data-product-variation class="form-control variation-select varijacii"
                                            name="variations[]" id="">
                                            <option disabled selected value> -- ???????????????? {{ $key }} -- </option>
                                            @foreach ($value as $v)
                                                <option value="{{ $v->id }}">{{ $v->value }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                @endforeach

                            @endif
                        </div>

                        <div class="pt-20">
                            <img src="{{ url_assets('/mymoda/images/payments.jpg') }}" alt="">
                        </div>

                        <div class="pt-20">
                            <a href="#" onclick="da_share.fb();">
                                <i class="fa fa-facebook"></i>

                            </a>
                            <a href="#" onclick="da_share.tw();">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>

                        <br>

                        <br>
                        @if (isset($parentProducts) && !empty($parentProducts) && count($parentProducts) > 0)
                            <h5 class="mt-30">????????</h5>
                            @foreach ($parentProducts as $parentProduct)
                                <label>
                                    <input data-product-parent type="radio"
                                        value="{{ '/p/' . $parentProduct->id . '/' . $parentProduct->url }}"
                                        name="parent_product" class="card-input-element" />
                                    <div class="panel panel-default card-input">
                                        <div class="panel-body">
                                            <img width="100"
                                                src="{{ ImagesHelper::getProductImage($parentProduct, $id = null, $size = 'lg_') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        @elseif(isset($childrenProducts) && !empty($childrenProducts) && count($childrenProducts) >
                            0)
                            <h5 class="mt-30">????????</h5>
                            @foreach ($childrenProducts as $childrenProduct)
                                @if ($childrenProduct->id != $product->id)
                                    <label>
                                        <input data-product-parent type="radio"
                                            value="{{ '/p/' . $childrenProduct->id . '/' . $childrenProduct->url }}"
                                            name="parent_product" class="card-input-element" />
                                        <div class="panel panel-default card-input">
                                            <div class="panel-body">
                                                <img width="100"
                                                    src="{{ ImagesHelper::getProductImage($childrenProduct, $id = null, $size = 'lg_') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </label>
                                @endif
                                @foreach ($childrenProduct->children as $childProduct)
                                    @if ($childProduct->id != $product->id)
                                        <label>
                                            <input data-product-parent type="radio"
                                                value="{{ '/p/' . $childProduct->id . '/' . $childProduct->url }}"
                                                name="parent_product" class="card-input-element" />
                                            <div class="panel panel-default card-input">
                                                <div class="panel-body">
                                                    <img width="100"
                                                        src="{{ ImagesHelper::getProductImage($childProduct, $id = null, $size = 'lg_') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </label>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                    <div class="ps-product__divider"></div>
                    <br>
                    <div class="flex-end row justify_rowp">
                        <div class="col-sm-3 col-xs-5">
                            <label for="quantity" class="mt-10 label_position">????????????????</label>
                            <input data-product-quantity name="quantity" id="quantity" type="number" class="form-control"
                                value="1" min="1" max="10">
                        </div>
                        <div class="col-sm-5 col-xs-7 pb-15">
                            <button class="ps-btn w-100" value="{{ $product->id }}" data-add-to-cart=""><i
                                    class="exist-minicart mr-5"></i>
                                ???????????? ???? ????????????????</button>
                        </div>
                        <div class="hidden-md col-sm-4 col-xs-4 pb-15">
                            <button class="ps-btn w-100 direct_buy_button " value="{{ $product->id }}" data-direct="true"
                                data-add-to-cart="" id="direct_buy_btn disable_base"><i class="exist-minicart mr-5"></i>
                                ????????
                                ????????????</button>
                        </div>

                    </div>

                    <input id="direct_buy" type="hidden" name="direct_buy" value="">
                    <div class="ps-product__divider"></div>

                    @if (auth()->user())
                        <div class="row">

                            <div class="col-sm-5 col-xs-12 mb-40">
                                <button id="wishlist-button" class="ps-btn w-100" value="{{ $product->id }}"
                                    data-add-to-wish-list><i class="fa fa-heart mr-5"></i> ???????????? ???? ?????????? ???? ??????????</button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        {{-- <div class="col-sm-4 col-xs-12">
            <h4 class="color-black">??????????: {{$product->unit_code}}</h4>

      </div> --}}
                    </div>
                    <div class="row">
                        <a id="whatsapp" class="col-lg-4 col-md-4 col-sm-4 col-xs-6"
                            href="https://api.whatsapp.com/send?phone=0038971683682&text={{ url()->current() }}.">
                            <img class="icon-img" src="{{ url_assets('/mymoda/images/icons/whatsapp.png') }}" alt="">
                            ?????????????? ?????????? WhatsApp</a>
                        <a href="tel:+38971683682" class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="phone"><img
                                src="{{ url_assets('/mymoda/images/icons/phone.png') }}" class="icon-img" alt=""> ??????????????
                            ??????????
                            ??????????????</a>
                    </div>

                    <br><br>

                </div>
                <div class="col-xs-12">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#home" role="tab" data-toggle="tab">
                                ????????
                            </a>
                        </li>
                        <li><a href="#profile" role="tab" data-toggle="tab">
                                ????????????????
                            </a>
                        </li>
                        <li>
                            <a href="#messages" role="tab" data-toggle="tab">
                                ????????????????????
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <div class="row">
                                <div class="col-xs-12">
                                    {{-- <div class="row">
                                        <div class="col-sm-6">
                                            <img
                                                src="{{ url_assets('/mymoda/images/fustani.jpg') }}" alt="">
                                        </div>
                                        <div class="col-sm-6">
                                            <img
                                                src="{{ url_assets('/mymoda/images/patiki.png') }}" alt="">
                                        </div>
                                    </div> --}}
                                    @if ($product->description)
                                        <div class="ps-product__short-desc">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="row">





                                <div class="col-xs-12">




                                    <h5 style="text-align: center;"><strong>???????????????????? ???? ???????? ???????? ???? ???????????????????????? ????
                                            ??????????????????&nbsp;?????????????? ????????????????????.</strong></h5>
                                    <br><br>
                                    <h4>???????? ????????????????</h4>
                                    <br>
                                    <ul>
                                        <li><span>?????????? ???? ???????????????? ?? ???? 1 ???? 5 ?????????????? ????????. ???? ?????????? ???? ????????????????????
                                                ???????????????????? ?? ??????????????, ???????????????????? ???????? ???? ???????? ???????????? ?????????? ????
                                                ????????????????????.</span></li>
                                        <li>
                                            <p><span><strong style="color: #ff2a00;">???????????? ?????????????????????????????? ?????????????????? ????
                                                        COVID19 ?????????? ???? ???????????????? ???????? ???? ????????
                                                        ??????????????????.</strong></span></p>
                                            <p><span><strong style="color: #ff2a00;">???? ????????O???????????? ????
                                                        ??????????????????????.</strong></span></p>
                                        </li>
                                    </ul>
                                    <p class="pt-10 pb-10">&nbsp;<strong>?????????????????? ???? ????????????</strong></p>
                                    <ul>
                                        <li><span>?????????????? ???? ?????????????????? ???????????????? ???? ???????????????????? ???????????? ???? ?????????????????? ????
                                                ???????????????? ???? 09:00 ???? 16:00 ??????????. ???? ???????????? ???? ???????????????? ???? ?????????????????? ????
                                                ???????????????????? ???????? ?????? ???? ???????? ???????????????? ???? ?????????????????????? ???? ?????????????????? ????
                                                ???????????????? ???????? ???? ?????????? ??????????????????. ?????????????? ?????????????? ???? ?????????? ???? ????
                                                ???????????????? ???? ????????????????, ?????????? ???????????????? ???????????????????? ???? ???? ???????????????????????????? ????
                                                ???????????? ?????? ???? ?????????? ???????????????? ?????? ???????????????????? ???? ?????????????????? ?? ???? ???????? ???? ????
                                                ???????????????????? ???? ?????? ???????????? ???? ????????????????. ?????????????? ?? ?????? ?????????????? ???????? ??????????????
                                                ???? ?????????? ???? ???? ???????????????? ?????????? ???????????????? ???? ???????? ?????????????? ?????? ??????.</span>
                                        </li>
                                    </ul>
                                    <p class="pt-10 pb-10">&nbsp;<strong>???????? ???? ????????????????</strong></p><br>
                                    <ul>
                                        <li><strong>???????????? ???? ?????????????? ???? ?????????????????? ?????? 2.000 ???????????? ??
                                                ??????????????????.</strong></li>
                                        <li><strong>???????????? ???? ?????????????? ???? ?????????????????? ?????? 2.000 ???????????? ?? 110
                                                ????????????.</strong></li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p><strong>?????????????? ???? ???????????? ?????? ?????????????????????? ???? ????????????????????</strong></p>
                                    <p>???????????? ???????????? ???? ???? ?????????????? ???? ???????????? ???????????????? ????????????, ???????? ?? ???? ?????? ?????????????????? ???? ????
                                        ???????????? ?????????????????????? ???? ???????????? ????????????????.<br><br>?????????????????????????? ???? ???????????? ???? ???????????? ??????
                                        ????????????????????a ???? ???????????????? ???????? ???? ???????? ???? 15 ?????????????? ????????. ?????????????????? ???? ???????????? ????
                                        ?????????????????? ???? ???? ?????????? ???? ??????????????????, ?????????? ???????? ?????????????????? ?????????? ?????????????? ?????? ????????????????
                                        ????????????????. <br><br><strong>???????????????? ???? ???????????? ??????????????????
                                            ????????????.</strong><br><br>????????????????
                                        ???? ???????????? ???? ?????????????????????? ????????????????????, ???????????? ???? ???????????????????? ???????????????????? ???????????? ?? ???? ??
                                        ??????????
                                        ?????????????? ???????????? ???? ???????????? ????????????????????.</p>
                                    <p>&nbsp;</p>
                                    <p><strong>????????????????????</strong></p>
                                    <p><br>???????????? ???????????????????? ???????????? ???? ???? ???? ?????????????? ????????????????, ???? ???????????? ?????????????????? ????
                                        ????????????????????
                                        ?? ?????????????? ???? ???????? ?????? ?????????????? ???????????????????? (???????????????? ???????????? ?????? ??????????????????????) ??????
                                        ???????????????????? ???? ?? ???? ???????????????????? ???? ???????????? ??????????????, ???? ???????????? ???? ???? ???????????????? ????????????????????
                                        ????
                                        ???????? ???? ???????????? <strong>071&nbsp;683 682</strong>, <strong>09-17??</strong>, ?????? ??????
                                        ???? ????
                                        ?????????????????? ?????????? ???? ???????? ???????????????? (??????, ?????????????? ?? ??????????????) ???? ????????????????
                                        <strong>info@mymoda.mk</strong> ?????? ?????? ???? ???? ???????????????? ?????????????????? ???????????? ?????? ????????????
                                        ????
                                        ?????????????????? ????????????/?????????????? ???? ??????????????.
                                    </p>
                                    <p><br>???? ???????????? ???? ???? ???????????????????????? ???????????????? ???? ?????? ???? 24 ???????? ???? ?????????????? ???? ????????????????.
                                        ???????????? ?????????????????? ???? ???? ???????????????? ???? ?????????????????????????? ???????????????? ???? ?????????????????? ??????????
                                        ??????.<br>???????????????? ???? ???????????????????? ???????? ???? ???? ?????????????????? ???? ?????????????? ???? ????????????
                                        ???????????????????????? ????
                                        ???????????? ????????????????.<br>?????????????????? ???? ???????????? ???? ?????????????????? ???? ???? ?????????? ???? ??????????????????, ??????????
                                        ???????? ?????????????????? ?????????????????? ?????????? ???????????????????? ?????? ???????????????? ????????????????. ???? ???? ???? ???????????? ??????
                                        ?????????? ????????????????, ???????????? ???????????????????????? ???????? ???? ???????? ?????????????????? ?? ???????????????? ???? ??????????????????
                                        ???????????????? ???????????? ???? ??????????????????. <br>???? ?????????????? ???? ???????????????????? ?????????????????????? ????????
                                        ???????????????????? ??
                                        ??????????????, ?? ?????????? ???? ?????????????????? ?????????????????? ????????????.<br>?????????????????????? ?????????????????? ???? ????????????
                                        ????
                                        ???????????????? ?????? ?????????????????????? ???????? ???? ???????? ?? ???? 15 ?????????????? ????????.<br><br>????????????????
                                        ????????????????????.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>








            </div>
        </div>
    </div>

    @if (count($relatedProducts))
        <div class="ps-section--relate-products pt-20">
            <div class="ps-container-fluid">
                <div class="ps-section__header text-center">
                    <h3 class="ps-heading">???????????? ??????????????????</h3>
                </div>

                @if (count($relatedProducts) > 0)
                    <div class="row">
                        @foreach ($relatedProducts as $product)
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <a href="/p/{{ $product->id }}/{{ $product->url }}">
                                    <div class="ps-product--1" data-mh="product-item">
                                        <div class="ps-product__thumbnail">
                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                <?php
                                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                if ($product->price != 0) {
                                                $discountPercentage = (($product->price - $discount) / $product->price) *
                                                100;
                                                }
                                                ?>
                                                @if (isset($discountPercentage))
                                                    <div class="ps-badge ps-badge--sale-hot ps-badge--1st">
                                                        <span>-{{ (int) $discountPercentage }}%</span>
                                                    </div>
                                                @endif
                                            @endif
                                            <img src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                alt="">
                                            @if (auth()->user())

                                                <a class="ps-product__wishlist hidden-xs" data-add-to-wish-list
                                                    value="{{ $product->id }}">
                                                    <img class="wish-icon"
                                                        src="{{ url_assets('/mymoda/images/icons/wish-icon.png') }}"
                                                        alt="">
                                                </a>
                                            @endif


                                            <a class="ps-btn ps-product__shopping hidden-xs" data-add-to-cart=""
                                                value="{{ $product->id }}"><i class="exist-minicart"></i>????????</a>


                                        </div>
                                        <div class="ps-product__content"><a class="ps-product__title"
                                                href="/p/{{ $product->id }}/{{ $product->url }}">
                                                {{ $product->title }}</a>
                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                <span class="ps-product__price">
                                                    <span class="discounted-price">
                                                        {{ $discount }}
                                                        ??????
                                                    </span>
                                                    <del class="old-price product-page-old-price">
                                                        {{ number_format($product->price, 0, ',', '.') }} ??????
                                                    </del>
                                                </span>
                                            @else
                                                <span
                                                    class="ps-product__price">{{ number_format($product->price, 0, ',', '.') }}
                                                    ??????</span>
                                            @endif

                                        </div>
                                        <div class="text-center">
                                            <a class="ps-btn visible-xs margin_top_10" data-add-to-cart=""
                                                value="{{ $product->id }}"><i class="exist-minicart"></i></a>
                                            <a class="ps-btn visible-xs margin_top_10" data-add-to-wish-list
                                                value="{{ $product->id }}"><i class="fa fa-heart"></i></a>
                                        </div>


                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- </div> --}}
            </div>
        </div>


        <footer class="Footer-67005 dsg_4879 visible-xs" id="footer">
            <div class="ST1">
                <div class="BankLogos ST20 ST21" style="background:#fff">
                    <div class="Container W1180">
                        <div class="row">
                            <div class="col-12">
                                <span><img src="https://static.farktor.com/Library/System/Img/comodo.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/GeoTrust.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/rapid.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/maestro.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/master.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/visa.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/ameciranexpress.png"></span>
                                <span><img src="https://static.farktor.com/Library/System/Img/paypal.png"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Container W1180">
                    <div class="row">
                        <div class="col-12">
                            <div class="Footer">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="ps-site-info Box">
                                            <div class="Title D4879 ST15" style="color:#2c2c2c">MyModa</div>
                                            <p class="text-justify black-color p-xs-10" style="margin-bottom: 10px;">
                                                ???????? ???? Mymoda ???????????? ???? ?????????????? ???????????????????? ?? ?????????????????????????? ????????????
                                                ????????????.
                                                ???????????? ???? ?????????? ??
                                                ??????????????????
                                                ???????????? ???? ???????????? ?????? ????????????????????.
                                            </p>
                                            <br>
                                            <a href="//www.facebook.com/Mymodamkk/" target="_blank"><i
                                                    class="font-26 fa fa-facebook fa-footer"></i></a>

                                            <a class="pl-10" href="//www.instagram.com/mymoda.mk/" target="_blank"><i
                                                    class="font-26 fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 ">
                                        <div class="Box">
                                            <a data-toggle="collapse" href="#collapseCategories">
                                                <div class="Title D4879 ST15" style="color:#2c2c2c">??????????????????</div>
                                            </a>
                                            <ul class="collapse" id="collapseCategories">
                                                @foreach ($menuCategories as $item)
                                                    <li class="Item">
                                                        <a class="Link"
                                                            href="{{ route('category', [$item['id'], $item['url']]) }}">{{ $item['title'] }}</a>
                                                    </li>
                                                @endforeach
                                                <ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <div class="Box">
                                            <a data-toggle="collapse" href="#collapseLinks">
                                                <div class="Title D4879 ST15" style="color:#2c2c2c">???????????? ??????????????</div>
                                            </a>
                                            <ul class="collapse" id="collapseLinks">
                                                <li class="Item">
                                                    <a href="/login" class="Link D4879 ST16"
                                                        style="color:#2c2c2c">????????????/????????????????????????</a>
                                                </li>
                                                <li class="Item">
                                                    <a href="/contact" class="Link D4879 ST16"
                                                        style="color:#2c2c2c">??????????????</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="Box">
                                            <a data-toggle="collapse" href="#collapseContact">
                                                <div class="Title D4879 ST15" style="color:#2c2c2c">??????????????</div>
                                            </a>
                                            <table style="width: 100%; text-align: center;" class="collapse"
                                                id="collapseContact">
                                                <tbody class="footer-table" id="footer-mob">
                                                    <tr class="contact-table-row">
                                                        <td class="p-xs-10 font-12">
                                                            <span class="bold">
                                                                <i class="fa fa-map-marker mobile-footer-icon"></i>
                                                                ????. ???????????????????? ????.58 ????.001/??????
                                                                ????-????.0000 - ????????????</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-row font-12">
                                                            <span class="black-color contact-footer-content"><span
                                                                    class="black-color contact-footer-content footer-contact-label">
                                                                    ??????????????</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="contact-table-row">
                                                        <td class="font-12">
                                                            <a href="tel:0038971683682" class="bold">
                                                                <i class="fa fa-phone mobile-footer-icon"></i>
                                                                071/683-682</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-12 table-row">
                                                            <span class="black-color contact-footer-content"><span
                                                                    class="black-color contact-footer-content footer-contact-label">
                                                                    Email</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="contact-table-row">
                                                        <td class="font-12 p-b-xs-10 ">
                                                            <a href="mailto:info@mymoda.mk" class="bold">
                                                                <i class="fa fa-envelope mobile-footer-icon"></i>
                                                                info@mymoda.mk</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs hidden-sm hidden-md Copyright ST24 ST26" style="background:#D9D9D9;color:#000">
                    <div class="text-center ps-footer__copyright">
                        <div class="ps-container-fluid">
                            <div class="flex-center row">
                                <div class="col-lg-4 text-left col-md-4 col-sm-4 col-xs-12" id="copyright">
                                    <p class="copyright-block flex-center">Powered By
                                        <a href="//generadevelopment.com" target="_blank"><img width="80" class="ml-10"
                                                src="{{ url_assets('/mymoda/images/genera-logo.svg') }}">
                                        </a>
                                    </p>
                                </div>




                                <div class="col-lg-4 text-right col-md-4 col-sm-4 col-xs-12 ">

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="payment-methods">

                                    <ul class="ps-footer__social">
                                        <li><a class="black-color" id="pravila-na-kupuvanje"
                                                href="/b/2/pravila-na-kupuvanje">?????????????? ????
                                                ????????????????</a></li>
                                        <li><a class="black-color" id="politika-na-privatnost"
                                                href="/b/1/politika-na-privatnost">???????????????? ????
                                                ????????????????????</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <br><br><br>

        <input type="hidden" name="broj_varijacii" value="{{ count($variations) }}">
    @endif
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    {{-- <script src="{{url_assets("/mymoda/js/elevate-zoom.min.js")}}"></script> --}}
    <script src="{{ url_assets('/mymoda/js/jquery-share.js') }}"></script>
    <script>
        $(document).ready(function() {
            var broj_varijacii = $('input[name="broj_varijacii"]').val();
            if (broj_varijacii < 2) {
                var var1 = true;
                var var2 = true;
            } else {
                var var1 = false;
                var var2 = false;
            }


            $('.modal_click').click(function() {

                var counter = 0;
                $('input[name="variations[]"]:checked').each(function() {
                    counter++;
                });
                var broj_varijacii = $('input[name="broj_varijacii"]').val();
                $('select[name="variations[]"]').each(function() {
                    var text = $(this).children("option").filter(":selected").text();
                    var value = $(this).val();
                    if (value != null)
                        counter++;
                });
                if (counter != broj_varijacii) {
                    $('#open_modal').removeAttr("data-add-to-cart");
                    $('#open_modal').attr("data-toggle", "modal");
                    $('#footer_row').hide();
                }



            });
            $(".fancy-box").fancybox();
            // $("#img-slider .slick-current img").elevateZoom({ zoomType: 'inner' });
            // $('#img-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            //   var img = $(slick.$slides[nextSlide]).find("img");
            //   $('.zoomWindowContainer, .zoomContainer').remove();
            //   $(img).elevateZoom({
            //     zoomType: 'inner'
            //   });
            // }); 

            $('[data-add-to-cart]').click(function() {
                if (!!$(this).data('direct')) {
                    $("#direct_buy").val('true');
                }
            });



            $('.variations_click').click(function() {
                var1 = true;
                if (var2) {
                    $('.disabled').attr("disabled", false);

                    $('.disabled').addClass("direct_buy_button");
                    $('.disabled').removeClass("disabled");
                }
            });

            $('select').on('change', function(e) {
                var2 = true;
                if (var1) {
                    $('.disabled').attr("disabled", false);

                    $('.disabled').addClass("direct_buy_button");
                    $('.disabled').removeClass("disabled");
                }
            });

            $('.variations_click_nomodal').click(function() {
                $('#open_modal').attr("data-add-to-cart", "");
                $('#open_modal').removeAttr("data-toggle");
            });

            $('[data-product-parent]').checked = false;
            $('[data-product-parent]').on('change', function() {
                var parentProductUrl = $(this).val();

            });
            $('#modal_varijacii').on('hidden.bs.modal', function() {
                $('#footer_row').show();
            });
            $('#modal_varijacii').on('hide.bs.modal', function() {
                $('#footer_row').hide();
            })
        });
    </script>
@stop
