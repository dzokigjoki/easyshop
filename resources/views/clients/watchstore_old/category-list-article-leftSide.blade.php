<div class="shop catalogue-products">
    <div class="container content-wrapper">
        <div class="row">
            <div class="widget widget-product-categories">
                <div class="category-filters-section">
                    <div class="table_cell">
                        <h3>Цена</h3>
                        <div class="range">
                            <input type="text" data-price-slider="" />
                        </div>
                    </div><!--/ .table_cell -->
                    @if (count($filters))
                        <div class="table_cell" style="margin-top: 10px !important;">
                            @foreach($filters as $filter)
                                <br><br>
                                <h3>{{$filter->name}}</h3>
                                <table class="form-conrol">
                                    @foreach($filter->attributes as $attribute)
                                        <tr>
                                            <td>
                                                <input style="width: auto !important;" class="form-control" type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                                                       id="filter_{{$attribute->id}}"
                                                        {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
                                            </td>
                                            <td>
                                                <label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endforeach
                        </div><!--/ .table_cell -->
                    @endif
                </div>
            </div>

            <!-- END OF SIDEBAR !-->
        </div>
    </div>
</div>