
@if (count($filters))
<div class="widget shop-widget widget_product_categories">
    <h5 class="sidebar-title">Филтри</h5>
    <ul class="product-categories">
        @foreach($filters as $filter)
        <li class="cat-item cat-parent filters_mob">
            <a class="filter_name">{{$filter->name}}</a>
            <ul class="children">
                @foreach($filter->attributes as $attribute)
                <li><input class="old-checkbox" data-attribute="" id="{{$attribute->id}}" data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" type="checkbox" {{ !is_null($productFilters->attributes) && 
      !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>
                    <label for="{{ $attribute->id }}" class="check">

                    </label>
                    <label class="filter-label">{{ $attribute->value }}</label></span></li>

                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</div>
@endif