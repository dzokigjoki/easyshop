@if(count($productsChunk) == 0)
    <div class="alert alert-info col-sm-12">
        Нема артикли во оваа категорија
    </div>
@endif

<div class="clearfix">
@foreach($productsChunk as $articles)
    @foreach($articles as $article)
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
                <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
    @endforeach
</div>
<footer class="bottom_box on_the_sides clearfix">
    @if($count > 0)
        <div class="right_side pull-right">
            <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden"@endif>
                    <a href="#" data-page="{{$productFilters->page - 1}}">< </a></li>
                {{--@endif--}}
                @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                        <li class="active"><a href="javascript://">{{$page}}</a></li>
                    @else
                        <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                    @endif
                @endforeach
                <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif><a
                    href="javascript://"
                    data-page="{{$productFilters->page + 1}}"> ></a></li>
            </ul>
        </div>
    @endif
</footer>
