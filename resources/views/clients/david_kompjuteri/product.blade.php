@extends('clients.david_kompjuteri.layouts.default')

@section('content')
    <main class="main-wrapper">

        <div class="content-wrapper oh">

            <!-- Single Product -->
            <section class="section-wrap pb-40 single-product">
                <div class="container-fluid semi-fluid">
                    <div class="row">

                        <div class="col-md-6 col-xs-12 product-slider mb-60">

                            <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

                                <div class="gallery-cell">
                                    <a href="{{ $product->image }}" class="lightbox-img">
                                        <img src="{{ $product->image }}" alt="" />
                                        <i class="ui-zoom zoom-icon"></i>
                                    </a>
                                </div>

                                @foreach ($product->images as $img)

                                    <div class="gallery-cell">
                                        <a href="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            class="lightbox-img">
                                            <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                                alt="" />
                                            <i class="ui-zoom zoom-icon"></i>
                                        </a>
                                    </div>

                                @endforeach
                            </div>

                            @if (count($product->images) > 0)
                                <div class="gallery-thumbs">
                                    <div class="gallery-cell">
                                        <img src="{{ $product->image }}" alt="" />
                                    </div>
                                    @foreach ($product->images as $img)
                                        <div class="gallery-cell">
                                            <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'md_') }}"
                                                alt="" />
                                        </div>
                                    @endforeach
                                </div>

                            @endif

                        </div>

                        <div class="col-md-6 col-xs-12 product-description-wrap">

                            <h1 class="product-title product-title-big">{{ $product->title }}</h1>

                            <span class="price">
                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))

                                    <?php
                                    $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                    $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                    ?>

                                    <del>
                                        <span>{{ number_format($product->price, 0, ',', '.') }} МКД</span>
                                    </del>
                                    <ins>
                                        <span class="amount">{{ $discount }} МКД</span>
                                    </ins>
                                @else
                                    <ins>
                                        <span class="amount">{{ number_format($product->price, 0, ',', '.') }}
                                            МКД</span>
                                    </ins>
                                @endif
                            </span>

                            <p class="short-description">{{ $product->short_description }}</p>

                            <div class="product-actions">
                                <span>Кол:</span>

                                <div class="quantity buttons_added">
                                    <input type="number" step="1" min="0" value="1" title="Qty"
                                        class="input-text qty text" />
                                    <div class="quantity-adjust">
                                        <a href="#" class="plus">
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                        <a href="#" class="minus">
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                </div>

                                <a value="{{ $product->id }}" data-add-to-cart=""
                                    class="btn btn-dark btn-lg add-to-cart"><span>Купи</span></a>

                                <a data-add-to-wish-list="" value="{{ $product->id }}" class="product-add-to-wishlist"><i
                                        class="fa fa-heart"></i></a>
                            </div>


                          <!--  <div class="product_meta">
                                <span class="sku">Шифра: <a href="#">{{ $product->sku }}</a></span>
                            </div> -->

                            <!-- Accordion -->
                            {{-- <div class="panel-group accordion mb-50" id="accordion">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                            class="minus">Опис<span>&nbsp;</span>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body"> 
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {!! $product->description !!}


                        </div> <!-- end col product description -->
                    </div> <!-- end row -->

                </div> <!-- end container -->
            </section> <!-- end single product -->


            <!-- Related Products -->
            <section class="section-wrap pt-0 shop-items-slider">
                <div class="container">
                    <div class="row heading-row">
                        <div class="col-md-12 text-center">
                            <h2 class="heading bottom-line">
                                Можеби ќе ви се допадне
                            </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div id="owl-related-items" class="owl-carousel owl-theme">

                            @foreach ($relatedProducts as $product)
                                @include("clients.david_kompjuteri.partials.product")
                            @endforeach
                        </div> <!-- end slider -->

                    </div>
                </div>
            </section> <!-- end related products -->

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->
@stop
