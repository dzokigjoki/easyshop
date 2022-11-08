<aside class="col-md-3 col-sm-4 has_mega_menu">

    <section class="section_offset">

        <h3>Филтри</h3>

        <form class="type_2">

            <div class="table_layout list_view">

                <div class="table_row">

                    <div class="table_cell">

                        <fieldset>

                            <legend>Цена</legend>

                            <div class="range">

                                <input type="text" data-price-slider="" />

                            </div>

                        </fieldset>

                    </div><!--/ .table_cell -->

                    <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
                    @if (count($filters))
                        <div class="table_cell">
                            @foreach($filters as $filter)
                                <fieldset>

                                    <legend>{{$filter->name}}</legend>

                                    <ul class="checkboxes_list">
                                        @foreach($filter->attributes as $attribute)
                                            <li>

                                                <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"  id="filter_{{$attribute->id}}"
                                                        {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}>
                                                <label for="filter_{{$attribute->id}}">{{$attribute->value}}</label>

                                            </li>
                                        @endforeach

                                    </ul>

                                </fieldset>
                            @endforeach



                        </div><!--/ .table_cell -->
                        @endif



                </div><!--/ .table_row -->

            </div><!--/ .table_layout -->

        </form>

    </section>

    <!-- - - - - - - - - - - - - - End of filter - - - - - - - - - - - - - - - - -->


</aside>
