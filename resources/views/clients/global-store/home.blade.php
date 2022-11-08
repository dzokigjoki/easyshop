@extends("clients.global-store.layouts.default")

@section("content")

    <div class="header-services smaller-than-600">
        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong> {{trans('globalstore.freeDelivery')}}</strong></p>
            <p class="ps-service"><i class="fa fa-money"></i><strong>{{trans('globalstore.lowestPrices')}}</strong></p>
            <p class="ps-service"><i class="fa fa-check-circle"></i><strong>{{trans('globalstore.highQuality')}}</strong></p>
        </div>
    </div>

    <div class="header-services larger-than-600">
        <div class="ps-services">
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong> {{trans('globalstore.freeDelivery')}}</strong></p>
            <p class="ps-service"><i class="fa fa-money"></i><strong> {{trans('globalstore.lowestPrices')}}</strong></p>
            <p class="ps-service"><i class="fa fa-check-circle"></i><strong> {{trans('globalstore.orderWithoutRisk')}}</strong></p>
        </div>
    </div>

    <main class="ps-main">

        <div class="container-fluid home-top-container">
            <div class="row">
                <div class="banner-slider-container col-md-9 col-sm-12 col-xs-12 pl-0">
                    <div class="slider-cont">
                        <a href="{{route('product', [4, 'slnchev-avtomatichen-ventilator-auto-cool'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/auto_cool.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>

                        <a href="{{route('product', [11, 'ochila-za-bezopasno-shofirane-hd-vision'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/hd_vision.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>
                        <a href="{{route('product', [15, 'elektricheska-chetka-za-izpravyane-na-kosa-straight-artefact'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/kosa.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>
                        <a href="{{route('product', [14, 'vzdushen-divan-lazy-bag'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/lazy_bag.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>

                        <a href="{{route('product', [1, 'six-pack'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/muscles.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>

                        <a href="{{route('product', [2, 'nayser-dayser-nicer-dicer-plus'])}}"
                           class="slider-element slide-bg-1" style='background: url("/assets/global-store/images/nicer_dicer.jpg"); background-size: cover;'>
                            {{--<div class="helper-outter">--}}
                            {{--<div class="helper-inner">--}}
                            {{--<h1>--}}
                            {{--Производ 1--}}
                            {{--</h1>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </a>

                    </div>
                </div>

                <div class="banner-slider-container daily-promotion-container col-md-3 col-sm-4 col-xs-12">
                    <div class="daily-promotion-slider">
                        @foreach($dailyPromotionsArticles as $article)
                            <div class="single-promorion-slide">
                                <a href="{{route('product',[$article->id,$article->url])}}">
                                    <div class="daily-promotion-product">
                                        <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                        <div class="orange-opacity">
                                            <a href="{{route('product',[$article->id,$article->url])}}">
                                                <h3 class="promotion-product-name">
                                                    {{trans('globalstore.promotion')}}:<br>
                                                    {{$article->title}}
                                                </h3>
                                            </a>
                                        </div>

                                    </div>
                                </a>
                                <div class="daily-promotion-time">
                                    <div class="timer">
                                        <div class="time hours-timer">

                                        </div>
                                        <div class="time minutes-timer">

                                        </div>
                                        <div class="time seconds-timer">

                                        </div>

                                        <span>{{trans('globalstore.hours')}}</span>
                                        <span>{{trans('globalstore.minutes')}}</span>
                                        <span>{{trans('globalstore.seconds')}}</span>
                                    </div>
                                    <h2>
                                        {{--{{$article->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            <del>{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</del>
                                        @else
                                            {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @endif
                                    </h2>
                                    {{--<a href="{{route('cart')}}" class="add-to-cart-promotion" data-add-to-cart="" value="{{$article->id}}">--}}
                                        {{--Додади во кошничка--}}
                                    {{--</a>--}}
                                    <a class="ps-btn mt-10" value="{{$article->id}}" data-add-to-cart="" href="{{route('cart')}}">{{trans('globalstore.buy')}} <i class="ps-icon-next"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid mb-20 mt-20">
            <div class="ps-section--features-product ps-section masonry-root pb-40">
                <div class="ps-container">
                    <div class="ps-section__header mb-50">
                        <h3 class="ps-section__title" data-mask="{{trans('globalstore.bestsellers')}}">- {{trans('globalstore.bestsellers')}}</h3>
                    </div>
                    <div class="ps-section__content pb-50">
                        <div style="width:100%" class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                            <div class="ps-masonry">
                                <div class="grid-sizer"></div>
                                @foreach($bestSellersArticles as $article)
                                    {{--<div class="grid-item">--}}
                                        {{--<div class="grid-item__content-wrapper">--}}
                                            {{--<div class="ps-shoe mb-30">--}}
                                                {{--<div class="ps-shoe__thumbnail">--}}
                                                    {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                                        {{--<div class="ps-badge ps-badge--sale"><span>-35%</span></div>--}}
                                                    {{--@endif--}}
                                                    {{--<img src="{{\ImagesHelper::getProductImage($article)}}" alt=""><a class="ps-shoe__overlay" href="{{route('product', [$article->id, $article->url])}}"></a>--}}
                                                {{--</div>--}}
                                                {{--<div class="ps-shoe__content">--}}
                                                    {{--@if($article->images)--}}
                                                        {{--<div class="ps-shoe__variants">--}}
                                                            {{--<div class="ps-shoe__variant normal">--}}
                                                                {{--@foreach($article->images as $img)--}}
                                                                    {{--<img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, "lg_")}}" alt="">--}}
                                                                {{--@endforeach--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--@endif--}}
                                                    {{--<div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('product', [$article->id, $article->url])}} ">{{$article->title}}</a>--}}
                                                        {{--<span class="ps-shoe__price">--}}
                                                            {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                                                {{--<del>{{$article->$myPriceGroup}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</del>--}}
                                                                {{--{{EasyShop\Models\Product::getPriceRetail1($article, false, 0)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                                            {{--@else--}}
                                                                {{--{{$article->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                                            {{--@endif--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="add-to-cart-button" data-add-to-cart="" value="{{$article->id}}">ДОДАДИ ВО КОШНИЧКА</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                    <!-- Racno napraven -->
                                    <div class="single-product-grid col-md-3 col-sm-4 col-xs-6">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <div class="spg-discount">
                                                {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) - $article->$myPriceGroup)/$article->$myPriceGroup)*100)}}%
                                            </div>
                                        @endif
                                        <div class="product-img-cont">
                                            <a href="{{route('product', [$article->id, $article->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                            </a>
                                            <a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">
                                                {{trans('globalstore.view')}}
                                            </a>
                                        </div>
                                        <a href="{{route('product', [$article->id, $article->url])}}">
                                            <p style="height:50px;" class="grid-product-name">
                                                {{$article->title}}
                                            </p>
                                        </a>
                                        <span style="font-size:25px;" class="product-price-cont">
                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                {{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                <del><span style="color:#565281; font-size: 20px;">{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></del>
                                            @else
                                                {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            @endif
                                        </span>
                                        {{--<a href="{{route('product', [$article->id, $article->url])}}" class="grid-product-add-to-cart" data-add-to-cart="" value="{{$article->id}}">--}}
                                            {{--Додади во кошничка--}}
                                        {{--</a>--}}
                                        <a class="ps-btn mt-10 boldbtn" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">{{trans('globalstore.buy')}}<i class="ps-icon-next"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-20">
            <div class="ps-section--features-product ps-section masonry-root pb-40">
                <div class="ps-container">
                    <div class="ps-section__header mb-50">
                        <h3 class="ps-section__title" data-mask="{{trans('globalstore.recommended')}}">- {{trans('globalstore.recommended')}}</h3>
                    </div>
                    <div class="ps-section__content pb-50">
                        <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                            <div class="ps-masonry">
                                <div class="grid-sizer"></div>

                                @foreach($recommendedArticles as $article)

                                    <div class="single-product-grid col-md-3 col-sm-4 col-xs-6">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <div class="spg-discount">
                                                {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)-$article->$myPriceGroup)/$article->$myPriceGroup)*100)}}%
                                            </div>
                                        @endif
                                        <div class="product-img-cont">
                                            <a href="{{route('product', [$article->id, $article->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                            </a>
                                            <a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">
                                                {{trans('globalstore.view')}}
                                            </a>
                                        </div>
                                        <a href="{{route('product', [$article->id, $article->url])}}">
                                            <p class="grid-product-name">
                                                {{$article->title}}
                                            </p>
                                        </a>
                                        <span style="font-size:25px;" class="product-price-cont">
                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                {{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                <del><span style="color:#565281; font-size: 20px;">{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></del>
                                            @else
                                                {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                            @endif
                                        </span>
                                        {{--<a href="{{route('product', [$article->id, $article->url])}}" class="grid-product-add-to-cart" data-add-to-cart="" value="{{$article->id}}">--}}
                                            {{--Додади во кошничка--}}
                                        {{--</a>--}}
                                            <a class="boldbtn ps-btn mt-10" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">{{trans('globalstore.buy')}}<i class="ps-icon-next"></i></a>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="container-fluid mb-20 mt-20">--}}
            {{--<div class="ps-section--features-product ps-section masonry-root pt-40 pb-40">--}}
                {{--<div class="ps-container">--}}
                    {{--<div class="ps-section__header mb-50">--}}
                        {{--<h3 class="ps-section__title" data-mask="ЕКСКЛУЗИВНИ">- ЕКСКЛУЗИВНИ ПРОИЗВОДИ</h3>--}}
                    {{--</div>--}}
                    {{--<div class="ps-section__content pb-50">--}}
                        {{--<div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">--}}
                            {{--<div class="ps-masonry">--}}
                                {{--<div class="grid-sizer"></div>--}}

                                {{--@foreach($exclusiveArticles as $article)--}}

                                    {{--<div class="single-product-grid col-md-3 col-sm-4 col-xs-6">--}}
                                        {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                            {{--<div class="spg-discount">--}}
                                                {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($article, false, 0)-$article->$myPriceGroup)/$article->$myPriceGroup)*100)}}%--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                        {{--<div class="product-img-cont">--}}
                                            {{--<a href="{{route('product', [$article->id, $article->url])}}">--}}
                                                {{--<img src="{{\ImagesHelper::getProductImage($article)}}" alt="{{$article->title}}">--}}
                                            {{--</a>--}}
                                            {{--<a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">--}}
                                                {{--Прегледај--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        {{--<a href="{{route('product', [$article->id, $article->url])}}">--}}
                                            {{--<p class="grid-product-name">--}}
                                                {{--{{$article->title}}--}}
                                            {{--</p>--}}
                                        {{--</a>--}}
                                        {{--<span class="product-price-cont">--}}
                                            {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                                {{--{{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                                {{--<del>{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</del>--}}
                                            {{--@else--}}
                                                {{--{{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                        {{--<a href="{{route('product', [$article->id, $article->url])}}" class="grid-product-add-to-cart" data-add-to-cart="" value="{{$article->id}}">--}}
                                            {{--Додади во кошничка--}}
                                        {{--</a>--}}
                                            {{--<a class="ps-btn mt-10" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">Додади во кошничка<i class="ps-icon-next"></i></a>--}}
                                    {{--</div>--}}

                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="container-fluid pl-0 pr-0">
            <div class="ps-section--offer">
                <div class="ps-column"><a class="ps-offer" href="{{route('product', [5, 'trimer-ss-senzor-yes-finish-touch'])}}"><img src="/assets/global-store/images/banner/finish-touch.jpg" alt=""></a></div>
                <div class="ps-column"><a class="ps-offer" href="{{route('product', [6, 'chetka-za-pochistvane-na-kosmi-ot-domashni-lyubimci'])}}"><img src="/assets/global-store/images/banner/remover.jpg" alt=""></a></div>
            </div>

        </div>

        {{--<div class="ps-section ps-home-blog pt-30 pb-30">--}}
            {{--<div class="ps-container">--}}
                {{--<div class="ps-section__header mb-50">--}}
                    {{--<h2 class="ps-section__title" data-mask="НОВОСТИ">- НАШИ НОВОСТИ</h2>--}}
                {{--</div>--}}
                {{--<div class="ps-section__content">--}}
                    {{--<div class="row">--}}
                        {{--@foreach($lastBlogs as $blog)--}}
                            {{--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">--}}
                                {{--<div class="ps-post">--}}
                                    {{--<div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{route('blog', [$blog->id, $blog->url])}}"></a><img src="{{\ImagesHelper::getBlogImage($blog)}}" alt="{{$blog->title}}"></div>--}}
                                    {{--<div class="ps-post__content"><a class="ps-post__title" href="{{route('blog', [$blog->id, $blog->url])}}">{{$blog->title}}</a>--}}
                                        {{--<p>{{$blog->short_description}}</p><a class="ps-morelink" href="{{route('blog', [$blog->id, $blog->url])}}">Повеќе<i class="fa fa-long-arrow-right"></i></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </main>

@endsection
@if($dailyPromotionsArticles)
    <script>

        // Set the date we're counting down to
        var countDownDate = new Date();
        countDownDate.setHours(24,0,0,0);
        countDownDate = countDownDate.getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with propper id

            $(".hours-timer").html(hours);
            $(".minutes-timer").html(minutes);
            $(".seconds-timer").html(seconds);

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);

    </script>
@endif