@extends('clients.clothes.layouts.default')
@section('content')
<div class="main">
        <div class="container">
            <div class="main-content">
                <div class="product">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images">
                                <div id="product-showcase">
                                    <div class="gallery">
                                        <div class="full" style="text-align: center; width: 300px; margin: 0 auto;">
                                            <img src="{{$product->image}}" />
                                            <a href="#" class="details"><i class="pe-7s-search"></i></a>
                                        </div>
                                        @if($product->images)
                                            <div class="previews">
                                                <div class="box-content">
                                                    @foreach($product->images as $img)
                                                        <div>
                                                            <a   class="active" rel="photos-lib"
                                                            data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                                title="{{$product->title}}">
                                                                <img class="selected" src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                                                        title="{{$product->title}}" alt="{{$product->title}}"/>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="nav">
                                                    <span class="prev"><i class="fa fa-angle-left"></i></span>
                                                    <span class="next"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- <nav class="breadcrumb">
                                <a href="index.html">ПОЧЕТНА</a> <i class="fa fa-angle-right"></i> <a href="shop-fullwidth.html">MAIN MENU</a> <i class="fa fa-angle-right"></i> <span>PIG ON A STICK</span>
                            </nav> --}}
                            <!-- /.breadcrumb -->
                            <div class="summary">
                                <h2 class="product-name">{{$product->title}}</h2>
                                <div class="price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                        
                                        @else
                                        <span>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                    @endif
                                </div>
                                <div class="short-desc">
                                    This is a <strong>Demo Online Store</strong>. No orders shall be fulfilled.<br />
                                    <strong>Zorka is a Design-Driven Shop Theme for WooCommerce and WordPress.</strong> If you’re planning to start an online store right away, look no further, get this theme on ThemeForest.<br />
                                    This product page demonstrates a “Simple Product“.
                                </div>
                                <div class="product-action">
                                    <div class="clearfix">
                                        <div class="quantity">
                                            <button class="minus-btn"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1" />
                                            <button class="plus-btn"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <button type="submit" class="add-to-cart-btn">ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs vertical-tabs">
                        <ul class="resp-tabs-list hor_1">
                            <li>ОПИС НА ПРОИЗВОДОТ</li>
                        </ul>
                        <div class="resp-tabs-container hor_1">
                            <div>
                                    {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.product-tabs -->
                </div>
                <!-- /.product -->
                <div class="sale-off">
                    <div class="container">
                            <h3>ПРОИЗВОДИ ОД ИСТА КАТЕГОРИЈА</h3>
                            {{-- <h5>Up to 50%</h5> --}}
                            <div id="carousel-8">
                                <div class="box-content">
                                    <div class="showcase">
                                        <div class="row">
                                            <div class="box-product">
                                                @foreach($relatedProducts as $article)
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="product-item">
                                                        <div class="product-thumb">
                                                            <div class="main-img">
                                                                <a href="{{route('product',[$article->id,$article->url])}}">
                                                                    <img class="img-responsive" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="img" />
                                                                </a>
                                                            </div>
                                                            {{-- <div class="overlay-img">
                                                                <a href="single-product.html">
                                                                    <img class="img-responsive" src="assets/images/product-img-5-thumb.jpg" alt="img" />
                                                                </a>
                                                            </div> --}}
                                                            
                                                            <a href="single-product.html" class="details"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <h4 class="product-name"><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h4>
                                                        <p class="product-price">
                                                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                </span>
                                                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                        <span style="color: #D5B473; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                        </span>
                                                                    </span>
                                                            @else
                                                            <span class="product-price-new-home" style="font-weight: bold;">
                                                                    <span id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                            </span>
                                                            </span>
                                                            @endif
                                                        </p>
                                                        <div class="group-buttons">
                                                                <button type="submit" class="add-to-cart" data-add-to-cart=""  value="{{$article->id}}" id="add_to_cart" data-toggle="tooltip" data-placement="top" title="Додади во кошничка">
                                                                        <span>Додади во кошничка</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav">
                                    <span class="prev"><i class="fa fa-angle-left"></i></span>
                                    <span class="next"><i class="fa fa-angle-right"></i></span>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.related-products -->
            </div>
            <!-- /.main-content -->
        </div>
    </div>
@section('scripts')
<script>
    $(document).ready(function() {
        var owl8 = $('#carousel-8 .box-content');
            owl8.owlCarousel( {
               items:1, dots:false, autoHeight:true, rtl:false, smartSpeed: 1500
            }
            );
            $("#carousel-8 .next").click(function() {
                owl8.trigger('next.owl.carousel');
            }
            );
            $("#carousel-8 .prev").click(function() {
                owl8.trigger('prev.owl.carousel');
            }
            );

            });


</script>    
@endsection
@stop