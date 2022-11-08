@extends('clients.alex_filippe.layouts.default')

@section('content')

    <div class="main mt-20">
        <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">

                <!-- BEGIN CONTENT -->
                <div class="col-md-12 margin-bottom-40">
                    <div class="product-page">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="main-image" style="position: relative">
                                    <a class="easyzoom" href="{{$product->image}}">
                                        <img src="{{$product->image}}" alt="{{$product->title}}"/>
                                    </a>
                                    {{--data-BigImgsrc="{{$product->largeImage}}"--}}
                                </div>
                                @if($product->images)
                                    <div class="product-other-images">
                                        <a class="fancybox-button" rel="photos-lib" href="{{$product->image}}"
                                           title="{{$product->title}}">
                                            <img src="{{$product->image}}" title="{{$product->title}}"
                                                 alt="{{$product->title}}"/>
                                        </a>
                                        @foreach($product->images as $img)
                                            <a class="fancybox-button" rel="photos-lib"
                                               href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                               title="{{$product->title}}">
                                                <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                                     title="{{$product->title}}" alt="{{$product->title}}"/>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h1 class="font-32">{{$product->title}}
                                    <div style="font-size: 16px;margin-top: 10px;font-weight: normal;color: dimgray;">
                                        Шифра ({{$product->unit_code}})
                                    </div>
                                </h1>

                                <div class="price-availability-block clearfix">
                                    <div class="price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <strong>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) /  \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} <span>{{\Session::get('selectedCurrency')}}</span></strong>
                                            <strong><div style="display: inline-block;text-decoration: line-through; margin-left: 15px;color: dimgray;font-weight: 400;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}</div> <span style="color: dimgray;">{{\Session::get('selectedCurrency')}}</span></strong>
                                        @else
                                            <strong>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} <span>{{\Session::get('selectedCurrency')}}</span></strong>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <?php $variations = $product->variationValuesAndIds();
                                ?>
                                @if(!empty($variations) && count($variations) > 0)
                                    <label class="control-label">Достапни големини:</label>
                                    <div class="toggle">
                                        @foreach($variations as $variation)
                                            <input type="radio" name="sizeBy" value="{{$variation->id}}" checked="checked" id="{{$variation->value}}" @if($variation->quantity === 0) disabled @endif />
                                            <label for="{{$variation->value}}">{{$variation->value}}</label>
                                        @endforeach
                                    </div>
                                @endif
                                <br>
                                <div class="product-page-cart">
                                    <div class="product-quantity">
                                        <input data-product-quantity="" type="number" min="1" value="1" 
                                               class="form-control input-sm"/>
                                    </div>
                                    <button data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary" type="submit">Додади во
                                        кошничка
                                    </button>
                                </div>
                                <ul class="social-icons">
                                    <li><a class="facebook" target="_blank" data-original-title="facebook"
                                           href="https://www.facebook.com/AlexFilippeMK/"></a></li>
                                    <li><a class="instagram" target="_blank" data-original-title="instagram"
                                           href="https://www.instagram.com/alexfilippe/"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="product-page-content">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#Description" data-toggle="tab"
                                                              aria-expanded="true">Опис на производот</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade active in" id="Description">

                                            @if($product->attributes)
                                                <div class="row">
                                                    @foreach($product->attributes as $name => $attributeList)
                                                        <div class="col-sm-4 col-xs-12 product-attribute">
                                                            <div class="product-attribute-value-wrap">
                                                        <span class="product-attribute-name">
                                                            {{$name}}:
                                                        </span>
                                                                @foreach($attributeList as $attribute)
                                                                    <span class="product-attribute-value">
                                                            {{$attribute->value}}
                                                            </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div style="padding-top: 20px;">
                                                <p style="text-align: justify">
                                                    Нашите чорапи се направени од најдобриот памук. Составот е 85% памук, 12% полиамид и 3% спандекс.
Шевовите на прстите се завршени рачно и на тој начин ви гарантираме крајна удобност во носењето. Петицата и прстите се засилени, со цел поголема издржливост.
<br><br>
Alex Filippe – затоа што е TOO GOOD TO MISS
                                                </p>
                                                <p><strong>Начин на испорака:</strong>&nbsp;</p>
                                                <ul><li>Бесплатна достава &nbsp;до вашиот дом во сите градови низ Македонија&nbsp;</li></ul>
                                                <br>
                                                <img src="{{ url_assets('/alex_filippe/images/socks.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->

            <!-- END SIDEBAR & CONTENT -->

                <!-- BEGIN SIMILAR PRODUCTS -->
                @if(count($relatedProducts) > 0)
                <div class="row margin-bottom-40">
                    <div class="col-md-12 col-sm-12">
                        <h2>Продукти од иста категорија</h2>

                        <div class="owl-carousel owl-carousel4">
                            @foreach($relatedProducts as $product)
                                <div class="product-item">
                                    <a class="pi-img-wrapper"
                                       href="{{route('product', [$product->id, $product->url])}}">
                                        <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive"
                                             alt="{{$product->title}}">

                                        <div>
                                            <span class="btn btn-default">Преглед</span>
                                        </div>
                                    </a>

                                    <h3 class="text-center">
                                        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                    </h3>

                                    <div class="pi-price text-center">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                            <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                        @else
                                            <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        @endif
                                        <br> <br>
                                        <button data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary" type="submit">Додади во кошничка
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <!-- END SIMILAR PRODUCTS -->
            </div>
        </div>


@endsection