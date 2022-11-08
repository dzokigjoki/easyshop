<div class="widget shop widget_layered_nav dhwc_widget_layered_nav">
    @if (count($filters))
    {{-- <h3 class="widget-title">Филтри</h3> --}}
    @foreach($filters as $filter)
    <h4 href="#">{{$filter->name}}</h4>
    <ul>
        @foreach($filter->attributes as $attribute)
        <li style="display: flex">
            <input style="margin-right:5px;" type="checkbox" data-attribute="" data-id="{{$attribute->id}}" id="filter_{{$attribute->id}}"
                {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
            <label style="font-weight: normal" for="filter_{{$attribute->id}}">{{$attribute->value}}</label>
        </li>
        @endforeach
    </ul>
    </li>
    @endforeach
    @endif
</div>