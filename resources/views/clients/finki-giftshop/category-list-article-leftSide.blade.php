<div id="secondary" class="widget-area" >
    <div  class="sidebar_shop_sidebar">
        <h2 class="widget-title woocommerce-title">Филтри</h2>
    </div>
    <br/>
    <div class="sidebar_shop_sidebar">
        <aside class="widget widget_image">
            <div class="sidebar-filter margin-bottom-25">
                <div class="category-filters-section">
                    <div class="table_cell">
                        <fieldset>
                            <legend>Цена</legend>
                            <div class="range">
                                <input type="text" data-price-slider="" />
                            </div>
                        </fieldset>
                    </div><!--/ .table_cell -->
                    @if (count($filters))
                        <div class="table_cell" style="margin-top: 10px !important;">
                            @foreach($filters as $filter)
                                <br><br>
                                <fieldset>
                                    <legend>{{$filter->name}}</legend>
                                    <ul class="checkboxes_list">
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
                        </div><!--/ .table_cell -->
                    @endif
                </div>
            </div>
        </aside>
    </div>
</div>

