@extends('clients.shopathome.layouts.default')
@section('content')
<div id="content">
    <div class="shop-main container">
        <div class="title">
            <h1> {{$category->title}} </h1>
        </div>
        <div class="row">
            @include('clients.shopathome.category-list-article-leftSide')
            <div class="col-md-9">
                <div class="shop-content">
                    <div class="toolbar">
                        <div class="sort-select">
                            <label>Подреди по</label>
                                <select data-sort="" id="sort_by_select" name="sort_by" class="selectBox">
                                    <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                        Најнови
                                    </option>
                                    <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                        Цена (Ниска > Висока)
                                    </option>
                                    <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                        Цена (Висока > Ниска)
                                    </option>
                                    <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>
                                        Име (A - Z)
                                    </option>
                                    <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                                        Име (Z - A)
                                    </option>
                                </select>
                        </div>
                        <div class="sort-select">
                            <label>Прикажи </label>
                            <select data-per-page="" name="results_limit"
                                    class="selectBox show-qty" id="result_limit">
                                <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>
                                    12
                                </option>
                                <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>
                                    36
                                </option>
                                <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>
                                    99
                                </option>
                            </select>
                        </div>
                    </div>
                    <div data-products-list="">
                         @include('clients.shopathome.partials.category-products-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection