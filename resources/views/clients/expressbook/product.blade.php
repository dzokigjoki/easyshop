@extends('clients.expressbook.layouts.default')

@section('content')

    {{--@if--}}
    <div class="container">

        <div class="hidden-xs hidden-sm row">
            <ul class="breadcrumb">
                <li><a href="home.html">Почетна</a></li>
                {{--<li><a href="books.html">Books</a></li>--}}
                <li class="active">{{$product->title}}</li>
            </ul>

            <div class="divider">
                <img class="img-responsive" src="{{ url_assets('/expressbook/images/shadow.png') }}" alt="">
            </div><!-- /.divider -->
        </div>
        <div class="row inner-top-xs single-book-block">
            <div class="col-md-12 ">
                <!-- .primary block -->
                <div class="single-book primary-block">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="book-cover">
                                <img width="268" height="408" alt="" src="{{$product->image}}"
                                     data-echo="{{$product->image}}">
                            </div><!-- /.book-cover -->
                            <div class="share-button">
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_native_toolbox inner-top-vs"></div>
                            </div>
                            @if(count($product->images) > 0)
                                <ul>
                                    @foreach($product->images as $img)
                                        <li style="display: inline;">
                                            <a class="zoomGalleryActive"
                                               href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                               >
                                                <img style="width:80px;"
                                                     src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"/>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="featured-book-heading">
                                <h1 class="title">{{$product->title}}</h1>

                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="single-book-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}ден.</p>
                                </div>
                                <div class="col-md-3">
                                    <label class="pull-left" id="quantity-label">Количина:</label>
                                    <input data-product-quantity="" id="quantity"
                                           class="product-page-qty pull-left product-page-qty-input form-control" type="number"
                                           value="1" min="1"/>
                                </div>


                            </div>
                            <div id="add-to-cart-button">
                                <div class="add-cart-button btn-group">

                                    {{--<button class="btn btn-single btn-sm" type="button" data-toggle="dropdown"--}}
                                    {{--data-add-to-cart="">--}}
                                    {{--<img src="/{{ url_assets('') }}assets/expressbook/images/add-to-cart.png" alt="">--}}
                                    {{--</button>--}}
                                    <a class="btn btn-single btn-uppercase" data-add-to-cart="">
                                        Додади во кошничка
                                    </a>
                                </div>
                            </div>

                            <div class="description">{!! $product->description !!}
                            </div>
                        </div>
                    </div>                <!-- /.primary block -->

                    <div class="divider inner-top-xs">
                        <img src="{{ url_assets('/expressbook/images/shadow.png') }}" class="img-responsive" alt=""/>
                    </div>

                    <div class="module wow fadeInUp">
                        <div class="module-heading home-page-module-heading">
                            <h2 class="module-title home-page-module-title"><span>Можеби ќе ве интересира</span></h2>
                            {{--<p class="see-all-link"><a href="#">See All</a> &rarr;</p>--}}
                        </div>
                        <div class="module-body">
                            <div class="row text-center">
                                <!-- .related product -->
                                @foreach($relatedProducts as $article)
                                    <div class="col-md-3 col-sm-4">
                                        <div class="book">
                                                <div class="containerce book-cover">
                                                    <img class="slika" width="268" height="408" alt=""
                                                         src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}"
                                                         data-echo="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}">
                                                    <div class="middle">
                                                        <a href="{{route('product', [$product->id, $product->url])}}" class="text">Прегледај</a>
                                                    </div>
                                                </div>
                                            <div class="book-details clearfix">
                                                <div class="book-description">
                                                    <h3 class="book-title"><a
                                                                href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                                    </h3>
                                                    <p class="book-subtitle"><a href="single-book.html">{{$article -> short_description}}</a>
                                                    </p>
                                                </div>
                                                <div class="actions">
                                            <span class="book-price price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>
                                                    <div class="cart-action">
                                                        <a style="cursor: pointer" class="add-to-cart" title=""
                                                           value="{{$article->id}}" data-add-to-cart="">Додади во
                                                            кошничка</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                            <!-- /.related product -->
                            </div>
                        </div>
                    </div>

                    <div class="divider inner-top-xs">
                        <img src="{{ url_assets('/expressbok/images/shadow.png') }}" class="img-responsive" alt=""/>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection