<div class="col-md-3 sidebar-wrap">
    <div class="main-sidebar">
        <div class="collapse-block open">
            <h4 class="collapse-block__title">Филтри:</h4>
            <div class="hidden-xs hidden-sm collapse-block__content">
                <div class="table_cell">
                    <h3>Цена</h3>
                    <div class="range">
                        <input type="text" data-price-slider="" />
                    </div>
                </div>
                @if (count($filters))
                    <div class="widget shop widget_layered_nav dhwc_widget_layered_nav">
                    @foreach($filters as $filter)
                            <fieldset class="">
                                <br>
                                <h4 class="widget-title">{{$filter->name}}</h4>
                                <ul style="list-style: none;">

                                    @foreach($filter->attributes as $attribute)
                                        <li>
                                            <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                                                   id="filter_{{$attribute->id}}"
                                                    {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
                                            <label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>

                                        </li>
                                    @endforeach
                                </ul>
                            </fieldset>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="hidden-xs hidden-sm widget shop widget_product_categories">
            <h4 class="widget-title"><span>Категории</span></h4>
            <ul class="product-categories">
                @foreach($menuCategories as $item)
                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="hidden-xs hidden-sm widget shop widget_products">
            <h4 class="widget-title"><span>Најпродавани</span></h4>
            <ul class="product_list_widget">
                @if(count($bestSellersArticles) > 0)
                    @foreach($bestSellersArticles as $product)
                <li>
                    <a href="{{route('product', [$product->id, $product->url])}}">
                        <img width="100" height="150"
                             src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive"
                             alt="{{$product->title}}">
                        <span class="product-title">{{$product->title}}</span>
                    </a>
                    {{--<del><span class="amount">&#36;20.50</span></del>--}}
                    {{--<ins><span class="amount">&#36;19.00</span></ins>--}}
                </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

