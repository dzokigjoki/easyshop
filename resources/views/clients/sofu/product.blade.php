@extends('clients.sofu.layouts.default')
@section('content')
    <style>

    </style>

    <section id="main-container" class="main-container pt_15">
        <div class="product">

            <div class="ts-infoproduct">
                <div class="left-infoproduct">
                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                        <?php
                        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                        $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                        ?>
                        <span class="onsale">{{ number_format($discountPercentage, 0) }}%</span>
                    @endif


                    <div class="col-md-8 col-md-push-4 pl_35">
                        <div class="slider">
                            <div class="zoom">

                                <img src="{{ $product->image }}" class="wp-post-image height_100" alt="product picture">
                            </div>
                            @if (count($product->images) > 0)
                                @foreach ($product->images as $img)
                                    <div class="zoom">
                                        <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            class="wp-post-image" alt="product picture" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 col-md-pull-8 vertical_responsive">
                        <div class="slider_products">
                            <div class="slider_item">
                                <img src="{{ $product->mediumImage }}" class="attachment-shop_single wp-post-image"
                                    alt="product picture" />
                            </div>
                            @if (count($product->images) > 0)
                                @foreach ($product->images as $img)
                                    <div class="slider_item">
                                        <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'md_') }}"
                                            class="attachment-shop_single wp-post-image" alt="product picture" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <div class="right-infoproduct">
                    <div class="summary entry-summary">
                        <?php $productTitle = explode('-', $product->title);
                        if (!isset($productTitle[1])) {
                            $productTitle[1] = '';
                        }
                        ?>
                        <h3 class="product_title entry-title" itemprop="name">{{ $productTitle[0] }}</h3>
                        @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                            <p class="price">
                                <span class="amount">
                                    <strong>Цена: </strong><span
                                        class="font-Helvetica">{{ EasyShop\Models\Product::getPriceRetail1($product, false, 0) }}
                                        МКД</span>
                                </span>
                                <span class="old-price"> {{ number_format($product->price, 0, ',', '.') }} МКД</span>
                            </p>
                        @else
                            <p class="price">
                                <span class="amount">
                                    <strong>Цена:</strong>
                                    <span class="font-Helvetica">{{ number_format($product->price, 0, ',', '.') }}
                                        МКД</span>
                                </span>
                            </p>
                        @endif
                        <div class="product-addtocart">

                            <form class="variations_form cart">
                                <div class="row row_add_product">
                                    <div class="col-md-12 col-xs-12 pb_15 col-xxs-12">
                                        @if ($productTitle[1] != '')
                                            <div>
                                                <h5 class="mt-30">Димензии</h5>
                                                @if (isset($parentProducts) && !empty($parentProducts) && count($parentProducts) > 0)

                                                    <div class="value pb_15">
                                                        <select id="dimensions" name="attribute_color">
                                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                                <option data-variation-id="{{ $product->id }}"
                                                                    data-variation-old-price="{{ number_format($product->price, 0, ',', '.') }}"
                                                                    data-variation-new-price="{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}"
                                                                    selected value="white">{{ $productTitle[1] }}
                                                                </option>
                                                            @else
                                                                <option data-variation-id="{{ $product->id }}"
                                                                    data-variation-old-price="0"
                                                                    data-variation-new-price="{{ number_format($product->price, 0, ',', '.') }}"
                                                                    selected value="white">{{ $productTitle[1] }}
                                                                </option>

                                                            @endif
                                                            @foreach ($parentProducts as $parentProduct)
                                                                <?php $productTitle = explode('-', $parentProduct->title)[1]; ?>
                                                                <?php
                                                                if ($parentProduct->discount) {
                                                                    $oldPrice = number_format($parentProduct->price_retail_1, 0, ',', '.');
                                                                    $newPrice = EasyShop\Models\Product::getPriceRetail1($parentProduct, false, 0);
                                                                } else {
                                                                    $oldPrice = 0;
                                                                    $newPrice = number_format($parentProduct->price_retail_1, 0, ',', '.');
                                                                }
                                                                ?>
                                                                <option data-variation-id="{{ $parentProduct->id }}"
                                                                    data-variation-new-price="{{ $newPrice }}"
                                                                    data-variation-old-price="{{ $oldPrice }}"
                                                                    value="white">{{ $productTitle }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                @else
                                                    <select id="dimensions" name="attribute_color">
                                                        @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                            <option data-variation-id="{{ $product->id }}"
                                                                data-variation-old-price="{{ number_format($product->price, 0, ',', '.') }}"
                                                                data-variation-new-price="{{ EasyShop\Models\Product::getPriceRetail1($product, false, 0) }}"
                                                                selected value="white">{{ $productTitle[1] }}</option>
                                                        @else
                                                            <option data-variation-id="{{ $product->id }}"
                                                                data-variation-old-price="0"
                                                                data-variation-new-price="{{ number_format($product->price, 0, ',', '.') }}"
                                                                selected value="white">{{ $productTitle[1] }}</option>
                                                        @endif
                                                    </select>
                                                @endif
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-12 col-xs-4 col-xxs-12">
                                        <div class="quantity">
                                            <span>Количина</span>
                                            <input type="number" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-8 col-xxs-12">
                                        <div class="single-product-button ts-product-button">
                                            <div class="variations_button">
                                                <button value="{{ $product->id }}" data-add-to-cart=""
                                                    id="add_to_cart_button"
                                                    class="single_add_to_cart_button product_added button alt"
                                                    type="submit">Додади во кошничка</button>
                                            </div>
                                            @if (auth()->check())
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div style="display:block"
                                                        class="yith-wcwl-add-button yith-wcwl-add-to-wishlist-product show">
                                                        <a data-add-to-wish-list="" value="{{ $product->id }}"
                                                            class="add_to_wishlist color_black" rel="nofollow"></a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="woocommerce-tab-accordion">
                            <div id="tab-description" class="panel entry-content product-descript">
                                {!! $product->description !!} </div>
                        </div>
                        <div class="product-share">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/c/8/zastita-i-odrzuvanje">Грижа и Одржување</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" data-title="{{ $product->title }}" data-toggle="modal"
                                        data-target="#design_product">Продукт по нарачка</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="relate-product">
            <h4 class="title-relate">Поврзани продукти</h4>
            <div class="products">
                <div class="row slider_related_products">
                    @foreach ($relatedProducts as $product)
                        @if (is_null($product->parent_product))
                            @include('clients.sofu.partials.product')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade modal-wrapper" id="design_product">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bottom_35">
                <div class="modal-body text-center">
                    <h5 class="title_modal">Добијте понуда за овој продукт со ваши специфични димензии</h5>
                    <hr>
                    <form action="/kontact" method="POST" id="commentform" class="comment-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4>Напишете ни</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-6"><input type="text" name="name"
                                    placeholder="Вашето име и презиме *" required></div>
                            <div class="col-md-6 col-sm-6"><input type="text" required name="subject"
                                    placeholder="Наслов *"></div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6"><input type="number" required name="phone"
                                    placeholder="Вашиот телефон *"></div>
                            <div class="col-md-6  col-sm-6"><input type="text" name="email" id="email"
                                    class="input-form" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                                    placeholder="Вашата е - пошта *"></div>
                        </div>
                        <div class="message-comment"><textarea name="message" required placeholder="Спецификации... *"
                                rows="5" class="textarea-form"></textarea></div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Слика *</label>
                                <input type="file" name="image" onchange="previewFile(this);" required>
                            </p>
                            <img id="previewImg">
                        </div>
                        <input type="hidden" name="po-naracka" id="po-naracka" value=true>
                        <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
                                value="Испрати">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        const $gl1 = $('.slider');
        const $gl2 = $('.slider_products');
        $(document).ready(function() {

            $("#dimensions").change(function() {

                var id = $(this).find(':selected').data('variation-id');
                var oldPrice = $(this).find(':selected').data('variation-old-price');
                var newPrice = $(this).find(':selected').data('variation-new-price');

                if (oldPrice != 0) {
                    $(".old-price").html(oldPrice + "МКД");
                    $(".amount").html("<strong>Цена: </strong><span class='font-Helvetica'>" + newPrice +
                        " МКД</span>");
                } else {
                    $(".old-price").html("");
                    $(".amount").html("<strong>Цена: </strong><span class='font-Helvetica'>" + newPrice +
                        " МКД</span>");
                }

                $("#add_to_cart_button").val(id);

            });

            $('.slider').slick({
                dots: false,
                infinite: false,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: true,
                asNavFor: $gl2
            });
            $('.slider_products').slick({
                dots: false,
                infinite: false,
                speed: 1000,
                slidesToShow: 3,
                slidesToScroll: 1,
                vertical: true,
                autoplay: false,
                autoplaySpeed: 2000,
                verticalSwiping: true,
                arrows: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            autoplay: true,
                            slidesToShow: 4,
                            vertical: false
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            arrows: false,
                            vertical: false,
                            slidesToShow: 3,
                        }
                    }
                ]
            });
            $('.slider_related_products').slick({
                dots: false,
                infinite: false,
                speed: 1000,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            arrows: false,
                            slidesToShow: 2,
                        }
                    }
                ]
            });
            $(".slider_products .slick-slide").on("click", function() {
                const index = $(this).attr("data-slick-index");
                $gl1.slick("slickGoTo", index);
            });

            $('.zoom').zoom({
                magnify: 0.5
            })

        });
    </script>
@stop
