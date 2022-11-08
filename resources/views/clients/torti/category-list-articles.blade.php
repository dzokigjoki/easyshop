@extends('clients.torti.layouts.default')
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
        stroke: #a04699;
        stroke-width: 1.5;
        transform: translate3d(0, 0, 0);
        transition: all 0.2s ease;
    }

    span.irs-slider.to {
        background-color: #a04699 !important;
    }

    span.irs-slider.to.last {
        background-color: #a04699 !important;
    }

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
        stroke: #a04699 !important;
    }

    span.irs-slider.from {
        background-color: #a04699;
    }

    span.irs-slider.to {
        background-color: #a04699;
    }

    .old-checkbox:checked+.check svg {
        stroke: #a04699;
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
<main>
    <div class="product-section product-section-2 woocommerce container-fluid">
        <div class="container">
            <div class="section-header">
                <h3 class="mt-35">{{ $category->title }}</h3>
                <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
            </div>
            @if(count($filters))
            <div class="col-md-3 col-sm-12 col-xs-12 widget-area">
                {{-- <aside class="widget product-widget widget_price-filter">
                    <h3 class="widget-title">Цена</h3>
                    <div class="price-filter">
                        <div id="slider-range"
                            class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all"></span>
                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all"></span>
                        </div>
                        <div class="price-input">
                            <span id="amount">400</span>
                            <span id="amount2">2000</span>
                        </div>
                    </div>
                </aside> --}}
                <aside class="widget widget_categories">
                    @foreach($filters as $filter)
                    <h3 class="widget-title">{{$filter->name}}</h3>
                    <ul class="att-list">
                        @foreach($filter->attributes as $attribute)
                        <li>
                            <label class="flex-centered">
                                <input class="old-checkbox" data-attribute="" id="{{$attribute->id}}"
                                    data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" type="checkbox"
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
                                <label class="filter-label">{{ $attribute->value }}</label></label>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                </aside>
            </div>
            @endif
            @if(count($filters))
            <div class="content-area col-md-9 col-sm-9 col-xs-12">
                @else
                <div class="content-area col-md-12 col-sm-12 col-xs-12">
                    @endif
                    <div data-products-list="">
                        @include('clients.torti.partials.category-products-list')
                    </div>
                </div>
            </div>
        </div>
</main>
@stop