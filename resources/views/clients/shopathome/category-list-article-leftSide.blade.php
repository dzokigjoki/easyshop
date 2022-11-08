<div class="col-md-3 hidden-xs hidden-sm">
    <aside class="left-shop">
        <div class="shop-price mb30">
            <div class="table_cell">
                <h1 class="asidetitle">Цена</h1>
                <div class="range">
                    <input type="text" data-price-slider="" />
                </div>
            </div>
        </div>
        @if (count($filters))
        <div class="shop-categories mb30">
            <div class="table_cell">
                @foreach($filters as $filter)
                    <fieldset>
                        <legend class="asidetitle">{{$filter->name}}</legend>
                        <ul>
                            @foreach($filter->attributes as $attribute)
                                <li><a>
                                    <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                                            id="filter_{{$attribute->id}}"
                                            {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
                                    <label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </fieldset>
                @endforeach
            </div>
        </div>
        @endif
        <div class="shop-categories mb30">
            <h1 class="asidetitle">Категории</h1>
            <ul>
                @foreach($menuCategories as $item)
                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </aside>
    <!-- End aside shop -->
</div>