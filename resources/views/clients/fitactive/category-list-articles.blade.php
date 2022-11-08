@extends('clients.fitactive.layouts.default')
@section('content')


<style>
  .filter-att {
    padding: 0 20px;
  }

  .old-checkbox {
    display: none;
  }

  .filter-label {
    padding-left: 10px;
    font-weight: 400;
  }

  .att-list {
    padding-top: 10px !important;
  }

  .check {
    cursor: pointer;
    position: relative;
    margin: auto;
    width: 18px;
    height: 18px;
    -webkit-tap-highlight-color: transparent;
    transform: translate3d(0, 0, 0);
  }

  .check:before {
    content: "";
    position: absolute;
    top: -15px;
    left: -15px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(34, 50, 84, 0.03);
    opacity: 0;
    transition: opacity 0.2s ease;
  }

  .check svg {
    position: relative;
    z-index: 1;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke: #c8ccd4;
    stroke-width: 1.5;
    transform: translate3d(0, 0, 0);
    transition: all 0.2s ease;
  }

  /* 
  span.irs-slider.to {
    background-color: #c8ccd4 !important;
  } */

  /* span.irs-slider.to.last {
    background-color: #c8ccd4 !important;
  } */

  .check svg path {
    stroke-dasharray: 60;
    stroke-dashoffset: 0;
  }

  .check svg polyline {
    stroke-dasharray: 22;
    stroke-dashoffset: 66;
  }

  .check:hover:before {
    opacity: 1;
  }

  .check:hover svg {
    stroke: #ca2028;
  }

  span.irs-slider.from {
    background-color: #ca2028;
  }

  span.irs-slider.to {
    background-color: #ca2028;
  }

  .old-checkbox:checked+.check svg {
    stroke: #ca2028;
  }

  .old-checkbox:checked+.check svg path {
    stroke-dashoffset: 60;
    transition: all 0.3s linear;
  }

  .old-checkbox:checked+.check svg polyline {
    stroke-dashoffset: 42;
    transition: all 0.2s linear;
    transition-delay: 0.15s;
  }
</style>

<main class="ps-main">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        @include('clients.fitactive.category-list-article-leftSide')
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="ps-shop">
          <h2>{{$category->title}}</h2>
          <div class="ps-filter ps-filter--shop-sidebar">
        
            <div class="ps-filter__right">
              <select data-sort id="sort_by_select" class="ps-select" title="Подреди по">
                <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                  Цена - растечка
                </option>
                <option value="price-DESC"
                  {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                  Цена - опаѓачка
                </option>
                <option value="created_at"
                  {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                  Најнови
                </option>
              </select>
              <select data-per-page name="results_limit" id="result_limit" class="ps-select" title="Прикажи">
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
            @include('clients.fitactive.partials.category-products-list')
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@stop