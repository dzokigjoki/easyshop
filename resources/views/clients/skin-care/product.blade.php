@extends('clients.skin-care.layouts.default')
@section('content')


<div class="content-wrapper oh">

    <!-- Single Product -->
    <section class="section-wrap pt-40 single-product">
        <div class="container-fluid semi-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="product-title pb-20 text-center">{{$product->title}}</h1>
                </div>
                <div class="col-md-5 col-xs-12 product-slider mb-60">

                    <div class="product-image-slider">

                        <div class="text-center">

                            <img class="width_81" src="{{ $product->image }}" alt="product picture" />
                            <i class="ui-zoom zoom-icon"></i>

                        </div>

                        @foreach($product->images as $img)
                        <div class="text-center">

                            <img class="width_81" src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="product picture" />
                            <i class="ui-zoom zoom-icon"></i>

                        </div>
                        @endforeach
                    </div> <!-- end gallery main -->

                    <div class="product-thumbs-slider width_81">
                        @if(count($product->images) > 0)

                        <div class="text-center">
                            <img src="{{ $product->mediumImage }}" alt="product picture" />
                        </div>
                        @foreach($product->images as $img)
                        <div class="text-center">
                            <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}" alt="product picture" />
                        </div>
                        @endforeach

                        @endif
                    </div>
                    <!-- end gallery thumbs -->

                </div> <!-- end col img slider -->

                <div class="col-md-7 col-xs-12 product-description-wrap">
                    <span class="price">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <?php
                        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                        $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                        ?>
                        <del>
                            <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                        </del>
                        <ins>
                            <span class="amount">{{$discount}}МКД</span>
                        </ins>
                        @else
                        <ins>
                            <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                        </ins>
                        @endif
                    </span>
                    <div class="product-actions">
                        <span class="pr-10">Количина:</span>

                        <div class="quantity buttons_added">
                            <input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" />
                            <div class="quantity-adjust">
                                <a href="#" class="plus">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                                <a href="#" class="minus">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </div>
                        </div>

                        <a href="#" value="{{$product->id}}" data-add-to-cart="" class="btn btn-dark btn-lg add-to-cart"><span>Купи</span></a>

                        <a href="#" data-add-to-wish-list="" value="{{$product->id}}" class="product-add-to-wishlist"><i class="fa fa-heart"></i></a>
                    </div>


                    <div class="product_meta">
                        <span class="sku">Шифра: <a href="#">{{ $product->sku }}</a></span>
                        <span class="brand_as">Категорија: <a href="#">{{$firstCategoryTitle}}</a></span>
                    </div>

                    <!-- Accordion -->
                    <div class="panel-group accordion mb-50" id="accordion">
                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="minus">Опис<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>{{$product->short_description}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="minus">Информации<span>&nbsp;</span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {!!$product->description!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col product description -->
            </div> <!-- end row -->

        </div> <!-- end container -->
    </section> <!-- end single product -->


    <!-- Related Products -->
    <section class="section-wrap pt-0 pb-30 shop-items-slider">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <h2 class="heading bottom-line">
                        Поврзани производи
                    </h2>
                </div>
            </div>

            <div class="row">

                <div id="owl-related-items" class="owl-carousel owl-theme">

                    @foreach($relatedProducts as $product)
                    @include('clients.skin-care.partials.product')
                    @endforeach
                </div> <!-- end slider -->

            </div>
        </div>
    </section> <!-- end related products -->
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        $('.product-image-slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.product-thumbs-slider',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }]
        });
        $('.product-thumbs-slider').slick({
            dots: false,
            infinite: false,
            speed: 300,
            arrows: true,
            slidesToShow: 4,
            focusOnSelect: true,
            slidesToScroll: 1,
            asNavFor: '.product-image-slider',
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },{
                breakpoint: 576,
                settings: {
                    slidesToShow: 3,
                }
            }]
        });

        // Remove active class from all thumbnail slides
        $('.product-thumbs-slider .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.product-thumbs-slider .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.product-thumbs-slider .slick-slide').removeClass('slick-active');
            $('.product-thumbs-slider .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

    });
</script>
@stop