  <div class="widget widget_shop_categories">
    <div class="side-block">
      <h3 class="blackColor widget-title">Цена:</h3>
      <div class="range">
        <input type="text" data-price-slider="" />
      </div>
    </div>
    <br>
    @if (count($filters))
    <h3 class="blackColor widget-title">Филтри</h3>
    @foreach($filters as $filter)
    <ul>
      <li class="has-sub"><a href="#">{{$filter->name}}</a>
        <ul class="att-list">
          @foreach($filter->attributes as $attribute)
          <li><label>
              <input class="old-checkbox" data-attribute="" id="{{$attribute->id}}" data-id="{{$attribute->id}}"
                data-filter-id="{{$filter->id}}" type="checkbox"
                {{ !is_null($productFilters->attributes) && 
                    !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>

              <label for="{{ $attribute->id }}" class="check">
                <svg width="18px" height="18px" viewBox="0 0 18 18">
                  <path
                    d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z">
                  </path>
                  <polyline points="1 9 7 14 15 4"></polyline>
                </svg>
              </label>




              <label class="filter-label">{{ $attribute->value }}</label></span>
          </li>
          @endforeach
        </ul>
      </li>
    </ul>
    @endforeach


    @endif
  </div>
  {{-- <div class="widget widget_colors">
      <h3 class="widget-title">Color</h3>
      <div class="ps-radio ps-radio--inline black">
        <input class="form-control" type="radio" id="color-1" name="type-1">
        <label for="color-1"></label>
      </div>
      <div class="ps-radio ps-radio--inline white">
        <input class="form-control" type="radio" id="color-2" name="type-1">
        <label for="color-2"></label>
      </div>
      <div class="ps-radio ps-radio--inline brown">
        <input class="form-control" type="radio" id="color-3" name="type-1">
        <label for="color-3"></label>
      </div>
      <div class="ps-radio ps-radio--inline gray">
        <input class="form-control" type="radio" id="color-4" name="type-1">
        <label for="color-4"></label>
      </div>
    </div> --}}

  {{-- <div class="widget widget_filter">
      <h3 class="widget-title">Filter Price</h3>
      <div class="ps-slider" data-default-min="0" data-default-max="500" data-max="1000" data-step="100"
        data-unit="$"></div>
      <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span
          class="ps-slider__value ps-slider__max"></span></p><a class="ps-btn ps-filter__btn ps-btn--fullwidth"
        href="#">Filter</a>
    </div> --}}
