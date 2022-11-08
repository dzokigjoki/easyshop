@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div class="container offset-0">
        <div class="row">
            <!-- col-center -->
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="content offset-10">
                    <div class="slick-slider-indent">
                        <div class="slick-slider slick-slider-content" id="banner-slider">
                            {{-- samo na prviot da ja nema klasata  class="slick-slide"  za da go pokazuva a drugite da gi krie --}}

                            {{--<div class="slick-slide">--}}
                                {{--<a href="{{route('product',['149','chetka-za-ispravuvanje-na-kosa-digitalna'])}}">--}}
                                {{--<img src="/assets/kliknikupi/images/slider/comb-baner.jpg" alt="">--}}
                                {{--</a>--}}
                            {{--</div>--}}


                            {{--<div class="slick-slide">--}}
                                {{--<a href="{{route('category',['43','veligdenski-ponudi'])}}">--}}
                                    {{--<img src="/assets/kliknikupi/images/slider/veligden.jpg" alt="">--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            <div class="slick-slide">
                                <a href="{{route('product',['1008','hd-vision-ochila-za-dnevno-i-nokjno-gledanje-2-para'])}}">
                                <img src="/assets/kliknikupi/images/slider/baner-hd-vision.jpg" alt="">
                                </a>
                            </div>
                            {{--<div class="slick-slide">--}}
                                {{--<a href="{{route('category',['8','gradina'])}}">--}}
                                    {{--<img src="/assets/kliknikupi/images/slider/baner-crevo.jpg" alt="">--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            <div class="slick-slide">
                                <a href="{{route('category',['14','blutut-uredi'])}}">
                                    <img src="/assets/kliknikupi/images/slider/baner-zvucnici.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="content offset-10" style="box-shadow: 0px 0px 10px 0px #e03f25;">
                    <div class="slick-slider-indent">
                        <div class="slick-slider slick-slider-content" id="srce">
                            <?php $i = 0; ?>
                            @foreach($dailyPromotionsArticles as $article)
                                {{-- samo na prviot da ja nema klasata  class="slick-slide"  za da go pokazuva a drugite da gi krie --}}
                                <div <?php echo $i++ > 0 ? 'class="slick-slide"' : ''; ?>>

                                    <div class="product slick-slider-product human-heart">
                                        <div class="product_inside" id="impulsiranje">
                                            <div class="product_inside_hover">
                                                <button class="btn btn-product_addtocart" data-add-to-cart=""
                                                        value="{{$article->id}}">
                                                    <span class="icon icon-shopping_basket"></span>
                                                    Додади во кошничка
                                                </button>
                                            </div>
                                            <div class="image-box">
                                                <a href="{{route('product', [$article->id, $article->url])}}">
                                                    <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}"/>
                                                    {{--<i class="human-heart fa fa-heart-o" style="color:red" alt="human heart"></i>--}}

                                                </a>
                                                <a href="{{route('product', [$article->id, $article->url])}}"
                                                   data-toggle="modal" data-target="" class="quick-view">
											<span>
											<span class="icon icon-visibility"></span>Прегледај
											</span>
                                                </a>
                                                @if($article->is_exclusive)
                                                    <div class="countdown_box">
                                                        <div class="countdown_inner">
                                                            {{--Treba da se zeme datum od baza--}}

                                                            @if((int)substr($article->discount['end_date'],0,4) >= 2099)
                                                                <div class="countdown"
                                                                     data-date="{{\Carbon\Carbon::tomorrow()}}"></div>
                                                            @else
                                                                <div class="countdown"
                                                                     data-date="{{\Carbon\Carbon::tomorrow()}}"></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>

                                            <h2 class="title">
                                                <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                            </h2>

                                            <div class="price view" style="margin-top: -19px;">
                                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                    {{--namalena cena--}}
                                                    {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency"> ден.</span>
                                                    {{--stara cena--}}
                                                    <span class="old-price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        ден.</span>

                                                @else
                                                    {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                    <span
                                                            class="price_currency"> ден.</span>

                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">

            <h2 class="block-title text-left small">Најпродавани</h2>


            <div  id="productSlider" class="carousel-products-5 carouselTab slick-arrow-top slick-arrow-top1 products-mobile-arrow  row "
                 id="carousel1">

                @foreach($bestSellersArticles as $article)
                    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 slick-slide" style="">
                        <div class="style_prevu_kit">
                            <div class="product">
                                <div class="product_inside">
                                    <div class="image-box">

                                            <img class="home-image" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                <div class="label-sale">Заштеда <?php $percent = ((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)) / (int)$article->$myPriceGroup * 100?>
                                                    {{(int)$percent}}%
                                                </div>
                                            @endif

                                        <a href="{{route('product', [$article->id, $article->url])}}"
                                           data-toggle="modal" data-target="" class="quick-view">
                                            <span><span class="icon icon-visibility"></span>Прегледај</span>

                                            <a class="btn btn-product_addtocart" data-add-to-cart="" value="{{$article->id}}"><i class="fa fa-cart"></i> Додади во кошничка</a>
                                        </a>

                                        {{--<div class="product_inside_hover">--}}
                                            {{--<button class="btn btn-product_addtocart" data-add-to-cart=""--}}
                                                    {{--value="{{$article->id}}">--}}
                                                {{--<span class="icon icon-shopping_basket"></span>--}}
                                                {{--Додади во кошничка--}}
                                            {{--</button>--}}
                                        {{--</div>--}}

                                    </div>

                                    <h2 class="title">
                                        <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h2>

                                    <div class="price view">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{--namalena cena--}}
                                            {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                            <span class="price_currency"> ден.</span>
                                            {{--stara cena--}}
                                            <span class="old-price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>

                                        @else
                                            {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency"> ден.</span>

                                        @endif
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

        <div class="content  hidden-mobile">
            <hr class="hr-offset-1">
        </div>


        {{--<div class="container offset-0">--}}
            {{--<div class="row">--}}
                {{--<div class="carousel-products-mobile blog-thumb-listing">--}}
                    {{--@foreach($lastBlogs as $blog)--}}
                        {{--<div class="col-xs-6 col-sm-4">--}}
                            {{--<div class="blog-thumb">--}}
                                {{--<a class="img">--}}
                                    {{--<img class="home-image" src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</a>--}}
                                {{--<a class="title"--}}
                                   {{--href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">{{$blog->title}}</a>--}}

                                {{--<p>--}}
                                    {{--{{$blog->short_description}}--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="content" style="">

            <h2 class="block-title text-left small">Препорачано</h2>
            <br>

            <div  id="productSlider1" class="carousel-products-5 carouselTab slick-arrow-top slick-arrow-top1 products-mobile-arrow  row">

                @foreach($recommendedArticles as $article)
                    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 slick-slide" style="">
                        <div class="style_prevu_kit">
                            <div class="product">
                                <div class="product_inside">
                                    <div class="image-box">

                                        <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <div class="label-sale">Заштеда <?php $percent = ((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)) / (int)$article->$myPriceGroup * 100?>
                                                {{(int)$percent}}%
                                            </div>
                                        @endif

                                        <a href="{{route('product', [$article->id, $article->url])}}"
                                           data-toggle="modal" data-target="" class="quick-view">
                                            <span><span class="icon icon-visibility"></span>Прегледај</span>

                                            <a class="btn btn-product_addtocart" data-add-to-cart="" value="{{$article->id}}"><i class="fa fa-cart"></i> Додади во кошничка</a>
                                        </a>

                                        {{--<div class="product_inside_hover">--}}
                                        {{--<button class="btn btn-product_addtocart" data-add-to-cart=""--}}
                                        {{--value="{{$article->id}}">--}}
                                        {{--<span class="icon icon-shopping_basket"></span>--}}
                                        {{--Додади во кошничка--}}
                                        {{--</button>--}}
                                        {{--</div>--}}

                                    </div>

                                    <h2 class="title">
                                        <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h2>

                                    <div class="price view">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{--namalena cena--}}
                                            {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                            <span class="price_currency"> ден.</span>
                                            {{--stara cena--}}
                                            <span class="old-price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>

                                        @else
                                            {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency"> ден.</span>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- col-left -->
    </div>
@endsection




