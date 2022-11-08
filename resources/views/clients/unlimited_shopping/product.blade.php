@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <main class="ps-main">
        <div style="text-align: center !important;" class="ps-product__info">
            <h1 style="color: #27235E;">{{$product->title}}</h1>
        </div>
        <div class="test">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product--detail pt-60">
            <div class="ps-container">
                <div class="row container_product">
                    <div class="col-sm-12">
                        {{--<div class="ps-product__thumbnail">--}}
                            {{--<div class="ps-product__preview">--}}
                                {{--<div class="ps-product__variants">--}}
                                    {{--<div class="item"><img src="{{$product->image}}" alt="{{$product->title}}"></div>--}}
                                    {{--@if($product->images)--}}
                                        {{--@foreach($product->images as $img)--}}
                                            {{--<div class="item"><img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}" alt="{{$product->title}}"></div>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="ps-product__image">--}}
                                {{--<div class="item"><img class="zoom" src="{{$product->image}}" alt="" data-magnify-src="{{$product->image}}"></div>--}}
                                {{--@if($product->images)--}}
                                    {{--@foreach($product->images as $img)--}}
                                        {{--<div class="item"><img class="zoom" src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="" data-magnify-src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"></div>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</div>--}}

                        {{--</div>--}}

                            <div class="hidden-lg hidden-md hidden-sm ps-product__thumbnail--mobile col-md-6">
                                <div class="ps-product__main-img">
                                    <img src="{{$product->image}}" alt="" class="zoom" data-magnify-src="{{$product->image}}">
                                </div>
                                <div class="ps-product__preview owl-slider" data-owl-auto="true"
                                     data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20"
                                     data-owl-nav="true" data-owl-dots="false" data-owl-item="3"
                                     data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                                     data-owl-item-lg="3" data-owl-duration="1000"
                                     data-owl-mousedrag="on">
                                    @if($product->images)
                                        @foreach($product->images as $img)
                                            <div class="item"><img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}" alt=""></div>
                                        @endforeach
                                    @endif

                                    {{--<img src="/assets/global-store/images/shoe-detail/1.jpg" alt="">--}}
                                    {{--<img src="/assets/global-store/images/shoe-detail/2.jpg" alt="">--}}
                                    {{--<img src="/assets/global-store/images/shoe-detail/3.jpg" alt="">--}}
                                </div>
                            </div>
                        <div class="hidden-xs ps-product__thumbnail--mobile col-md-6">
                            <div class="ps-product__main-img">
                                <img src="{{$product->image}}" alt="" class="zoom" data-magnify-src="{{$product->image}}">
                            </div>
                            <div class="ps-product__preview">
                                @if($product->images)
                                    @foreach($product->images as $img)
                                        <div class="item"><img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}" alt=""></div>
                                    @endforeach
                                @endif

                                {{--<img src="/assets/global-store/images/shoe-detail/1.jpg" alt="">--}}
                                {{--<img src="/assets/global-store/images/shoe-detail/2.jpg" alt="">--}}
                                {{--<img src="/assets/global-store/images/shoe-detail/3.jpg" alt="">--}}
                            </div>
                        </div>

                        <div class="ps-product__info col-md-6">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <h3 class="ps-product__price">
                                    Цена: {{(int)(EasyShop\Models\Product::getPriceRetail1($product, true, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                    <del>
                                        {{(int)$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                    </del>
                                </h3>
                                <i style="color:#d24427 !important; font-style:normal; font-size:24px !important;"> Плаќање при достава без ризик</i>


                            @else
                                <h3 class="ps-product__price">
                                    {{(int)$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                </h3>
                            @endif
                               
                            <div class="ps-product__block ps-product__size">

                                <div class="form-group">
                                    <h4 style="float:left; margin-top:12px; padding-right: 10px;" class="mb-10">Количина: </h4><input style="width:80px;" class="form-control" data-product-quantity="" type="number" value="1" min="1">
                                </div>

                                {{-- @if(!$product->variationValuesAndIds()->isEmpty())
                                    <div class="form-group">
                                        <h4 class="mb-10">{{trans('globalstore.size')}}:</h4>
                                        <select class="ps-select selectpicker" data-product-variation="">
                                            @foreach($product->variationValuesAndIds() as $variations)
                                                <option value="{{$variations->id}}">{{$variations->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif --}}
                            </div>
                            <div class="ps-product__shopping"><a class="customButton ps-btn mb-10" value="{{$product->id}}" data-add-to-cart="" href="#">Купи<i class="ps-icon-next"></i></a>
                            </div>



                            @if($product->description)
                                <div class="ps-product__content mt-15">
                                    <ul class="tab-list" role="tablist">
                                        <li class="active"><a aria-controls="tab_01" role="tab" data-toggle="tab">Опис</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content mb-60">
                                    <div class="tab-pane active" role="tabpanel" id="tab_01">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                </div>
                                @endif
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($relatedProducts) > 0)
        <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <div class="row">
                        <div class=" col-sm-12 col-xs-12 ">
                            <h3 class="ps-section__title" data-mask="Слични производи">Слични производи</h3>
                        </div>
                    </div>
                </div>
                <div class="ps-section__content">
                    <div class="container-fluid pl-0 pr-0">
                        <div class="related-products-slider">
                            @foreach($relatedProducts as $article)

                                <div class="single-product-grid col-md-3">
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <div class="spg-discount">
                                            {{(int)(((EasyShop\Models\Product::getPriceRetail1($article, false, 0)/$article->$myPriceGroup)*100)}}%
                                        </div>
                                    @endif
                                    <div class="product-img-cont">
                                        <a href="{{route('product', [$article->id, $article->url])}}">
                                            <img src="{{\ImagesHelper::getProductImage($article)}}" alt="{{$article->title}}">
                                        </a>
                                        <a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">
                                            Види
                                        </a>
                                    </div>
                                    <a href="{{route('product', [$article->id, $article->url])}}">
                                        <p class="grid-product-name">
                                            {{$article->title}}
                                        </p>
                                    </a>
                                    <span style="font-size:25px;" class="product-price-cont">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{(int)EasyShop\Models\Product::getPriceRetail1($article, true, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            <del><span style="color:#565281; font-size: 20px;">{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></del>
                                        @else
                                            {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @endif
                                    </span>
                                    {{--<a href="{{route('product', [$article->id, $article->url])}}" class="grid-product-add-to-cart" data-add-to-cart="" value="{{$article->id}}">--}}
                                    {{--Додади во кошничка--}}
                                    {{--</a>--}}
                                    <a class="ps-btn mt-10" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">Купи <i class="ps-icon-next"></i></a>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </main>

@endsection