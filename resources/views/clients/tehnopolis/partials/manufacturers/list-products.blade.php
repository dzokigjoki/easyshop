    @if(count($products) == 0)
        <section class="theme_box">
            <p>Нема артикли за овој производител</p>
        </section>
    @else
        <div class="clearfix">
                @foreach($products as $article)
                    <div class="col-md-2 col-sm-3">
                        <a  href="{{route('product', [$article->id, $article->url])}}" class="product-col">
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
                                    <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} <span class="price_currency">ден</span></span>
                                    <span class="price-old">{{number_format($article->$myPriceGroup, 0, ',', '.')}} <span class="price_currency">ден</span></span>
                                @else
                                    <span class="price-new">{{number_format($article->$myPriceGroup, 0, ',', '.')}} <span class="price_currency">ден</span></span>
                                @endif
                            </div>
                            {{--<div class="cart-button button-group">--}}
                            {{--<a class="btn btn-cart button-width" href="{{route('product', [$article->id, $article->url])}}">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                            {{--Купи--}}
                            {{--</a>--}}
                            {{--</div>--}}
                        </a>
                    </div>
                @endforeach
        </div>
    @endif