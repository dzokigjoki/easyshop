<div class="quicky-sidebar-catagories_area">

    <div class="quicky-sidebar_categories category-module">
        @if (count($filters))
        <div class="quicky-categories_title">
            <h5>Филтри</h5>
        </div>
        <div class="sidebar-categories_menu">
            @foreach($filters as $filter)
            <ul>
                <li class="has-sub"><a href="javascript:void(0)">{{$filter->name}}<i class="zmdi zmdi-plus"></i></a>
                    <ul>
                        @foreach($filter->attributes as $attribute)
                        <li><input class="old-checkbox" data-attribute="" id="{{$attribute->id}}" data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" type="checkbox" {{ !is_null($productFilters->attributes) && 
      !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>
                            <label for="{{ $attribute->id }}" class="check">

                            </label>
                            <label class="filter-label">{{ $attribute->value }}</label></span></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @endforeach
        </div>
        @endif
    </div>
    <!-- <div class="quicky-sidebar_categories quicky-banner_area sidebar-banner_area">
                            <div class="banner-item img-hover_effect">
                                <div class="banner-img">
                                    <a href="javascript:void(0)">
                                        <img class="img-full" src="assets/images/banner/3-1.jpg" alt="none">
                                    </a>
                                </div>
                            </div>
                        </div> -->
</div>