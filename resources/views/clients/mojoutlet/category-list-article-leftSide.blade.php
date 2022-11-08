<aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
        <!-- shopping by block -->
        <div class="collapse-block open">
            <h4 class="collapse-block__title">Филтри:</h4>
            <div class="collapse-block__content">
                <div class="table_cell">
                    <h3>Цена</h3>
                    <div class="range">
                        <input type="text" data-price-slider="" />
                    </div>
                </div>
                @if (count($filters))
                    <div class="table_cell">
                        @foreach($filters as $filter)
                            <fieldset>
                                <legend>{{$filter->name}}</legend>
                                <ul class="filter-list">

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
</aside>