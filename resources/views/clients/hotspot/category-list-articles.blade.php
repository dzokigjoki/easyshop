@extends('clients.hotspot.layouts.default')
@section('style')
<link href="{{url_assets('/hotspot/css/listing.css')}}" rel="stylesheet">
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
          <div>
            <select name="sort" id="sort" data-sort="">
              <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                Најнови</option>
              <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                Цена растечка</option>
              <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                Цена опаѓачка</option>
              <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име
                (A - Z)</option>
              <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                Име (Z - A)</option>
            </select>
            <select name="pages" id="pages" data-per-page="">
              <option value="1000" {{$productFilters->limit == 1000 ? 'selected="selected"': ''}}>1000</option>
            </select>
          </div>
        </li>
        <li>
          <a href="#0" class="open_filters">
            <span>Филтри</span><i class="ti-filter"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /toolbox -->

  <div class="container margin_30">

    <div class="row">
      <aside class="col-lg-3" id="sidebar_fixed">
        <div class="filter_col">
          <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
          {{-- version_2 --}}
          <div class="filter_type version_2 pb-4">
            <h4><a href="javascript://">Цена</a></h4>
            <input type="text" data-price-slider="" />
          </div>
          @foreach($filters as $filter)
          <div class="filter_type version_2">
            <h4><a href="#filter_{{ $filter->id }}" data-toggle="collapse" class="opened">{{$filter->name}}</a></h4>
            <div class="collapse show" id="filter_{{ $filter->id }}">
              <ul>
                @foreach($filter->attributes as $attribute)
                <li>
                  <label class="container_check" for="filterattr_{{$attribute->id}}">{{$attribute->value}}
                    <input type="checkbox" data-attribute="" data-id="{{$attribute->id}}"
                      id="filterattr_{{$attribute->id}}"
                      {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }} />
                    <span class="checkmark"></span>
                  </label>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /filter_type -->
          </div>
          @endforeach
          <div class="filter_type version_2">
            <h4><a href="#filter_default" data-toggle="collapse" class="opened">Категории</a></h4>
            <div class="collapse show" id="filter_default">
              <ul>
                @foreach($menuCategories as $mc)
                <li>
                  <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /filter_type -->
          </div>
        </div>
      </aside>
      <!-- /col -->
      <div class="col-lg-9">
        <div data-products-list="">
          @include('clients.hotspot.partials.category-products-list')
        </div>
      </div>
      <!-- /row -->

    </div>
    <!-- /container -->
</main>
<!-- /main -->
@stop

@section('scripts')
<script src="{{url_assets('/hotspot/js/sticky_sidebar.min.js')}}"></script>
<script src="{{url_assets('/hotspot/js/specific_listing.js')}}"></script>
@stop
{{-- @include('clients.mymoda.partials.category-products-list') --}}