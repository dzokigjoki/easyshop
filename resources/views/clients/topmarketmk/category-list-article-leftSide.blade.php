 <aside class="col-md-3 col-sm-4 col-xs-12 sidebar">
    <div class="widget">
        <div class="panel-group custom-accordion sm-accordion" id="category-filter">
            {{--<div class="panel">--}}
                {{--<div class="accordion-header">--}}
                    {{--<div class="accordion-title"><span>Филтри</span></div><!-- End .accordion-title -->--}}
                    {{--<a class="accordion-btn opened"  data-toggle="collapse" data-target="#category-list-4"></a>--}}
                {{--</div><!-- End .accordion-header -->--}}
                {{--@if (count($filters))--}}
                    {{--<div id="category-list-4" class="collapse in">--}}
                        {{--<div class="panel-body">--}}
                            {{--@foreach($filters as $filter)--}}
                                {{--<h4>{{$filter->name}}</h4>--}}
                                {{--<ul class="category-filter-list jscrollpane clearfix">--}}
                                    {{--@foreach($filter->attributes as $attribute)--}}
                                        {{--<li>--}}
                                            {{--<a href="#">--}}
                                                {{--<input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"--}}
                                                       {{--id="filter_{{$attribute->id}}"--}}
                                                        {{--{{ !is_null($productFilters->attributes) &&--}}
                                                        {{--in_array($attribute->id, $productFilters->attributes)--}}
                                                        {{--? 'checked="checked"': ''  }}>--}}
                                                {{--<label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--@endforeach--}}
                        {{--</div><!-- End .panel-body -->--}}
                    {{--</div><!-- #collapse -->--}}
                {{--@endif--}}
            {{--</div><!-- End .panel -->--}}
            {{--<div class="panel">--}}
                {{--<div class="accordion-header">--}}
                    {{--<div class="accordion-title"><span>Цена</span></div><!-- End .accordion-title -->--}}
                    {{--<a class="accordion-btn opened"  data-toggle="collapse" data-target="#category-list-3"></a>--}}
                {{--</div><!-- End .accordion-header -->--}}

                {{--<div id="category-list-3" class="collapse in">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="price-range">--}}
                            {{--<input type="text" data-price-slider="" />--}}
                        {{--</div><!-- End #price-range -->--}}
                    {{--</div><!-- End .panel-body -->--}}
                {{--</div><!-- #collapse -->--}}
            {{--</div><!-- End .panel -->--}}
            <div class="panel">
                <div class="accordion-header">
                    <div class="accordion-title"><span>Категории</span></div><!-- End .accordion-title -->
                    <a class="accordion-btn opened"  data-toggle="collapse" data-target="#category-list-1"></a>
                </div><!-- End .accordion-header -->

                <div id="category-list-1" class="collapse in">
                    <div class="panel-body">
                        <ul class="category-filter-list jscrollpane">
                            @foreach($menuCategories as $item)
                                <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                    <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- End .panel-body -->
                </div><!-- #collapse -->
            </div><!-- End .panel -->

            {{--<div class="panel">--}}
                {{--<div class="accordion-header">--}}
                    {{--<div class="accordion-title"><span>Brand</span></div><!-- End .accordion-title -->--}}
                    {{--<a class="accordion-btn opened"  data-toggle="collapse" data-target="#category-list-2"></a>--}}
                {{--</div><!-- End .accordion-header -->--}}

                {{--<div id="category-list-2" class="collapse in">--}}
                    {{--<div class="panel-body">--}}
                        {{--<ul class="category-filter-list jscrollpane">--}}
                            {{--<li><a href="#">Samsung (50)</a></li>--}}
                            {{--<li><a href="#">Apple (80)</a></li>--}}
                            {{--<li><a href="#">HTC (20)</a></li>--}}
                            {{--<li><a href="#">Motoroloa (20)</a></li>--}}
                            {{--<li><a href="#">Nokia (11)</a></li>--}}
                        {{--</ul>--}}
                    {{--</div><!-- End .panel-body -->--}}
                {{--</div><!-- #collapse -->--}}
            {{--</div><!-- End .panel -->--}}

        </div><!-- .panel-group -->
    </div><!-- End .widget -->

    <div class="widget featured">
        <h3>Најпродавано</h3>

        <div class="featured-slider flexslider sidebarslider">
            <ul class="featured-list clearfix">
                @if(count($bestSellersArticles) > 0)
                    @foreach($bestSellersArticles as $product)
                        <li>
                            <div class="featured-product clearfix">
                                <figure>
                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                    <img src="{{\ImagesHelper::getProductImage($product)}}"
                                         alt="{{$product->title}}">
                                    </a>
                                </figure>
                                <h5><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h5>
                                {{--<div class="featured-price">--}}
                                    {{--{{$product->price}}--}}
                                {{--</div><!-- End .featured-price -->--}}
                            </div><!-- End .featured-product -->
                        </li>
                     @endforeach
                @endif
            </ul>
        </div><!-- End .featured-slider -->
    </div><!-- End .widget -->
</aside><!-- End .col-md-3 -->