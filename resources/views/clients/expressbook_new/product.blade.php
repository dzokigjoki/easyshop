@extends('clients.expressbook_new.layouts.default')

@section('content')



    <!-- product-single start -->
    <section class="product-single theme1 pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div>
                        <div class="product-sync-init mb-20">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="{{ $product->image }}" alt="product-thumb" />
                                </div>
                            </div>
                            @if (count($product->images) > 0)
                                @foreach ($product->images as $img)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="product-thumb" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="product-sync-nav single-product">
                        <div class="single-product">
                                <div class="product-thumb">
                                    <img src="{{ $product->image }}" alt="product-thumb" />
                                </div>
                            </div>
                            @if (count($product->images) > 0)
                                @foreach ($product->images as $img)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="product-thumb" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="single-product-info">
                        <div class="single-product-head">
                            <h2 class="title mb-20">{{ $product->title }}</h2>
                        </div>
                        <div class="product-body mb-40">
                            <div class="d-flex align-items-center mb-30">
                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                    <span class="product-price mr-20"><del
                                            class="del">{{ number_format($product->price, 0, ',', '.') }}
                                            МКД</del>
                                        <span class="onsale">
                                            {{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}МКД</span></span>
                                @else
                                    <span class="product-price mr-20"><span
                                            class="onsale">{{ number_format($product->price, 0, ',', '.') }}
                                            МКД</span></span>
                                @endif
                            </div>
                            {!! $product->description !!}
                        </div>
                        <div class="product-footer">
                            <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                                <div class="count d-flex">
                                    <input type="number" data-product-quantity="" id="quantity" min="1" max="10" step="1"
                                        value="1" />
                                    <div class="button-group">
                                        <button class="count-btn increment">
                                            <i class="fas fa-chevron-up"></i>
                                        </button>
                                        <button class="count-btn decrement">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button data-add-to-cart="" class="btn btn-dark btn--xl mt-5 mt-sm-0">
                                        <span class="mr-2"><i class="ion-android-add"></i></span>
                                        Додади во кошничка
                                    </button>
                                </div>
                            </div>
                            <div class="addto-whish-list">
                                <a data-add-to-wish-list="" value="{{ $product->id }}"><i class="icon-heart"></i> Листа на
                                    желби</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-single end -->

    <!-- new arrival section start -->
    <section class="theme1 bg-white pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Можеби ќе ве интересира</h2>
                        <p class="text mt-10">Погледнете ги сличните производи</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product-slider-init theme1 slick-nav">
                        @foreach ($relatedProducts as $article)
                            @include('clients.expressbook_new.partials.product')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new arrival section end -->

@stop
