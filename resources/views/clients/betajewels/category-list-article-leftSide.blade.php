@if (count($filters))
<div class="filter">
    <h3>{{trans('betajewels.price')}}</h3>
    <div class="range pb-20">
        <input type="text" data-price-slider=""/>
    </div>

</div>
<div class="brands">
    <h3>Филтри <i class="fa fa-bars"></i></h3>
    @foreach($filters as $filter)
        <h4 class="p-15">{{$filter->name}}</h4>
        <hr>
        <ul>
            @foreach($filter->attributes as $attribute)
                <li>
                    <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                             id="filter_{{$attribute->id}}"
                            {{ !is_null($productFilters->attributes) &&
                            in_array($attribute->id, $productFilters->attributes)
                            ? 'checked="checked"': ''  }}>
                    {{$attribute->value}}
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
@endif
<div class="best-sell">
    <h3>{{trans('betajewels.categories')}}</h3>

    <div id="plCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="brands">
                <ul>
                @foreach($menuCategories as $item)
                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                        <a class="color-black" href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{--<div class="best-sell">--}}
    {{--<h3>Best seller</h3>--}}

    {{--<div id="plCarousel" class="carousel slide" data-ride="carousel">--}}

        {{--<!-- Wrapper for slides -->--}}
        {{--<div class="carousel-inner" role="listbox">--}}
            {{--<div class="item active">--}}
                {{--@foreach($bestSellersArticles as $product)--}}
                    {{--<div class="single-wid-product sel-pd">--}}
                        {{--<a href="{{route('product', [$product->id, $product->url])}}">--}}
                            {{--<img    --}}
                                    {{--src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""--}}
                                    {{--alt="{{$product->title}}">--}}
                        {{--</a>--}}
                        {{--<h2>--}}
                            {{--<a href="{{route('product', [$product->id, $product->url])}}">--}}
                                {{--{{$product->title}}--}}
                            {{--</a>--}}
                        {{--</h2>--}}
                        {{--<div class="product-wid-rating">--}}

                        {{--</div>--}}
                        {{--<div class="product-wid-price">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Left and right controls -->--}}
        {{--<a class="left carousel-control" href="#plCarousel" role="button" data-slide="prev">--}}
            {{--<i class="fa fa-angle-left"></i>--}}
        {{--</a>--}}
        {{--<a class="right carousel-control" href="#plCarousel" role="button" data-slide="next">--}}
            {{--<i class="fa fa-angle-right"></i>--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</div>--}}
