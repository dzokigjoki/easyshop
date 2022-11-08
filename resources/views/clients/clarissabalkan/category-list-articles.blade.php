@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/listing.css?v=1')}}" rel="stylesheet">
@stop
@section('content')
<main>
    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
        <div class="container">
            <span class="listing_nbsp">&nbsp;</span>
            <h4>{{ $category->title }}</h4>
            <ul class="clearfix listing_selects">
                <li>
                    <a href="#0" class="open_filters">
                        <i class="ti-filter"></i><span>Filters</span>
                    </a>
                </li>
                <li>
                    <div>
                        <select name="sort" id="sort" data-sort="">
                            <option value="created_at"
                                {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови
                            </option>
                            <option value="price-ASC"
                                {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена
                                растечка</option>
                            <option value="price-DESC"
                                {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена
                                опаѓачка</option>
                            <option value="title-ASC"
                                {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)
                            </option>
                            <option value="title-DESC"
                                {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z -
                                A)</option>
                        </select>
                        <select name="pages" id="pages" data-per-page="">
                            <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>
                            <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>
                            <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>
                        </select>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container margin_30">
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2 pb-4">
                        <h4><a href="javascript://">Цена</a></h4>
                        <input type="text" data-price-slider="" />
                    </div>
                    @foreach($filters as $filter)
                    <div class="filter_type version_2">
                        <h4><a href="#filter_{{ $filter->id }}" data-toggle="collapse"
                                class="closed">{{$filter->name}}</a></h4>
                        <div class="collapse" id="filter_{{ $filter->id }}">
                            <ul>
                                @foreach($filter->attributes as $attribute)
                                <li>
                                    <label class="container_check"
                                        for="{{$attribute->id}}">{{$attribute->value}}
                                        <input class="checkbox" data-attribute="" id="{{$attribute->id}}"
                                            data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}"
                                            type="checkbox" id="{{$attribute->id}}"
                                            {{ !is_null($productFilters->attributes) && 
                                                !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="filter_type version_2">
                        <h4><a href="#filter_default" data-toggle="collapse" class="opened">Категории</a></h4>
                        <div class="collapse show" id="filter_default">
                            <ul>
                                @foreach($menu as $row)
                                @if(null === $row->parent)
                                <li>
                                    <a href="{{ $urlLang }}/c/{{ $row->id }}/{{ $row->url }}">{{ $row->title }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </aside>
            <div class="col-lg-9">
                <div data-products-list="">
                    @include('clients.clarissabalkan.partials.category-products-list')
                </div>
            </div>
        </div>
</main>
@stop

@section('scripts')
<script src="{{url_assets('/clarissabalkan/js/sticky_sidebar.min.js')}}"></script>
<script src="{{url_assets('/clarissabalkan/js/specific_listing.js')}}"></script>
@stop