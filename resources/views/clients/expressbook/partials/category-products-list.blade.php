<div class="row books text-center">

@foreach($products as $article)

    <div class="col-md-3 col-sm-4">
        <div class="book">
            <a href="{{route('product', [$article->id, $article->url])}}">
                <div class="containerce book-cover">
                    <img class="slika" width="140" height="212" alt=""
                         src="{{\ImagesHelper::getProductImage($article)}}"
                         data-echo="{{\ImagesHelper::getProductImage($article)}}">
                    {{--<div class="tag">--}}
                    {{--<span>Најпродавано</span>--}}
                    {{--</div>--}}
                    <div class="middle">
                        <a href="{{route('product', [$article->id, $article->url])}}" class="text">Прегледај</a>
                    </div>
                </div>
            </a>
            <div class="book-details clearfix">
                <div class="book-description">
                    <h3 class="book-title"><a
                                href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                    </h3>
                    <p class="book-subtitle"><a href="{{route('product',[$article->id,$article->url])}}">{{$article -> short_description}}</a>
                    </p>
                </div>
                <div class="actions">
                                            <span class="book-price price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>

                    <div class="cart-action">
                        <a style="cursor: pointer" class="add-to-cart" title=""
                           value="{{$article->id}}" data-add-to-cart="">Додади во кошничка</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
        {{--@endif--}}
</div>