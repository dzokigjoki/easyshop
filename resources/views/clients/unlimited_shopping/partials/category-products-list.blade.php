<div class="ps-product__columns" data-products-list="">
    @foreach($products as $article)
        <div class="single-product-grid col-md-4 col-sm-4 col-xs-6">
            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                <div class="spg-discount">
                    
                    {{(int)(((EasyShop\Models\Product::getPriceRetail1($article, true, 0)-number_format($article->$myPriceGroup))/number_format($article->$myPriceGroup))*100)}}%
                </div>
            @endif
            <div class="product-img-cont">
                <a href="{{route('product', [$article->id, $article->url])}}">
                    <img src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                </a>
                <a href="{{route('product', [$article->id, $article->url])}}" class="view-product-button ps-btn">
                    Види
                </a>
            </div>
            <a href="{{route('product', [$article->id, $article->url])}}">
                <p style="height: 50px;" class="grid-product-name">
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
            <a class="ps-btn mt-10 boldbtn" value="{{$article->id}}" data-add-to-cart="" href="{{route('product', [$article->id, $article->url])}}">Купи <i class="ps-icon-next"></i></a>
        </div>
    @endforeach
</div>