@extends('clients.tehnopolis.layouts.default')
@section('content')
    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->
    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

    <ul class="breadcrumb">
        <li><a href="/">Почетна</a></li>
        <li>{{$product->title}}</li>
    </ul>

    <!-- - - - - - - - - - - - - - End of breadcrumbs - - - - - - - - - - - - - - - - -->

    <div class="row">

        <!-- Primary Content Starts -->
        <div class="col-md-12">
            <h2 class="product-name-xs">{{$product->title}}</h2>
            <!-- Breadcrumb Ends -->
            <!-- Product Info Starts -->
            <div class="row product-info">
                <!-- Left Starts -->
                <div class="col-sm-5 images-block">
                    <a href="{{URL::to('/')}}/{{$product->image}}">
                        <img src="{{URL::to('/')}}/{{$product->image}}" class="img-responsive thumbnail">
                    </a>
                    <ul class="list-unstyled list-inline">
                        @foreach($product->images as $img)
                            <li>
                                <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                    <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                         class="img-responsive thumbnail">
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <!-- Left Ends -->
                <!-- Right Starts -->
                <div class="col-sm-7 product-details">
                    <!-- Product Name Starts -->
                    <div class="product-name-sm">
                        <h2>{{$product->title}}</h2>
                        <!-- Product Name Ends -->
                        <hr>
                    </div>

                    <!-- Manufacturer Starts -->
                    <ul class="list-unstyled manufacturer">
                        @if($product->proizvoditel)
                            <li>
                                <span>Производител:</span>
                                <span>{{$product->proizvoditel->name}}</span>
                            </li>
                        @endif
                        <li>
                            <span>Шифра:</span> <span>{{$product->unit_code}}</span>
                        </li>
                        <li class="product-delivery-info" style="padding-top: 10px;">
                            <label style="color: #333;">- Достава низ цела Македонија</label>
                        </li>
                        <li class="product-delivery-info">
                            <label style="color: #333;">- Бесплатна достава за нарачки над 2000 денари</label>
                        </li>
                        <li class="product-delivery-info">
                            <label style="color: #333;">- Можност за плаќање при достава без никаков ризик!</label>
                        </li>
                    </ul>
                    <!-- Manufacturer Ends -->
                    <hr>
                    <!-- Price Starts -->
                    <div class="price">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )

                            <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                <span class="price_currency">ден.</span>
                            </span>
                            <span class="price-old">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span class="price_currency">ден.</span>
                            </span>
                        @else
                            <div class="price-new">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span class="price_currency">ден.</span>
                            </div>
                        @endif
                    </div>
                    <!-- Price Ends -->
                    <hr>
                    <div class="options clearfix">
                        <div class="form-group form-inline">
                            <div style="float: left;width: 140px;">
                                <label class="control-label text-uppercase" for="input-quantity"
                                       style="float: left;padding-top:6px; padding-right: 5px;">Количина:</label>
                                <input type="number" name="quantity" value="1" size="1" id="input-quantity"
                                       class="form-control" data-product-quantity=""
                                       style="max-width: 50px;margin-right: 5px;float: left">
                            </div>
                            @if($product->total_stock)
                                <button type="button" class="btn btn-cart" data-add-to-cart="" style="float: left">
                                    Нарачај
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-cart disabled" disabled id="dodadi_disabled"
                                        style="float: left">
                                    <i class="fa fa-shopping-cart"></i>
                                    Нема на залиха
                                </button>
                            @endif
                        </div>
                    </div>
                        <hr>
                    @if($product->description)
                        <div class="product-info-box">

                            <div class="content panel-smart">

                                <div class="product-info-box">
                                    <p>
                                        {!!$product->description!!}
                                    </p>
                                    @if($product->proizvoditel->description)
                                    <p>
                                        {!! $product->proizvoditel->description !!}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Right Ends -->
            </div>
            <br><br>
            @if(count($relatedProducts))
            <section class="product-carousel">

                <h2 class="product-head">Можеби ќе ве интересира</h2>

                <div class="row product-list-row">
                    @foreach($relatedProducts as $article)
                        <div class="col-md-2 col-sm-3">
                            <a href="{{route('product', [$article->id, $article->url])}}" class="product-col">
                                <div class="image">
                        <span>
                            <img data-src="{{\ImagesHelper::getProductImage($article)}}"
                                 alt="{{$article->title}}" class="img-responsive product-img"/>
                        </span>
                                </div>
                                <div class="caption">
                                    <h4 class="subcategory-item-heading-constraint">
                                        {{$article->title}}
                                    </h4>
                                </div>
                                <div class="price">
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                            <span class="price_currency">ден</span></span>
                                        <span class="price-old">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency">ден</span></span>
                                    @else
                                        <span class="price-new">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency">ден</span></span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </div>

@endsection



@section('scripts')
    <script>
        //MAGNIFIC POPUP
        $(document).ready(function () {
            $('.images-block').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@stop