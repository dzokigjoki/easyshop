<aside id="column-left" class="col-sm-3 hidden-xs sidebar">
          <h3 class="subtitle">{{trans('topprodukti.bestsellers')}}</h3>
          <div class="side-item">
            <div class="sidebar-filter margin-bottom-25">
                <div style="margin-bottom: 40px;">
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">{{trans('topprodukti.price')}}</h3>
                        <input type="text" data-price-slider="" />
                    </div>
                </div>
            </div>
          </div>
          <h3 class="subtitle">{{trans('topprodukti.filters')}}</h3>
          <div class="side-item">
                @foreach($filters as $filter)
                    <div class="category-filters-section">
                        <h3>{{$filter->name}}</h3>
                        @foreach($filter->attributes as $attribute)
                            <div class="checkbox">
                                <label>
                                    <input data-attribute="" data-id="{{$attribute->id}}" type="checkbox"
                                            {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}
                                            />{{$attribute->value}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </aside>