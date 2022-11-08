@extends('clients.naturatherapyshop_alb.layouts.default')
@section('content')
<style>
    .irs-diapason {
        background: #b79d82;
        height: 7px;
    }

    .irs-slider.from,
    .irs-slider.to {
        background: black;
    }
</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">{{ $category->title }}</h1>
            </div>
        </div>
</section>
<div class="content-wrapper oh">
    <section class="section-wrap pt-40 pb-40 catalogue">
        <div class="container relative">
            <div class="row nomargin shop-filter">
                <div class="col-sm-6 col-xs-6 col-xxs-12 nopadding hidden-xxs">
                    <div class="view-mode">
                        {{-- <span>{!! trans('naturatherapy/global.program') !!}</span>
                        <a class="grid grid-active" id="grid"></a>
                        <a class="list" id="list"></a> --}}
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6 col-xxs-12 nopadding">
                    <div class="filter_sort">
                        <select data-sort id="sort_by_select" title="Подреди по">
                            <option value="order-ASC"
                                {{$productFilters->selectedSort == 'order-ASC' ? 'selected="selected"': ''}}>
                                Të rekomanduara
                            </option>
                            <option value="price-ASC"
                                {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                Çmimi - në rritje
                            </option>
                            <option value="price-DESC"
                                {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                Çmimi - në zbritje                           
                            </option>
                            <option value="created_at"
                                {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                Të fundit
                            </option>
                        </select>
                    </div>
                    <div class="filter_number">
                        <select data-per-page name="results_limit" id="result_limit" title="Shfaqje">
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
            </div>
            <div class="row">
                <aside class="col-lg-3 sidebar left-sidebar">
                    <div class="widget pt-10 pb-10 filter-by-price clearfix">
                        <h4 class="bottom-line filter_heading pb-30 pb-sml-0 full-grey">{!! trans('naturatherapy/global.price') !!}</h4>
                        <div data-price-slider="" id="slider-range"></div>
                    </div>
                    @if (count($filters))
                    <h4 class="bottom-line filter_heading pb-30 pt-30 pb-sml-10 full-grey">{!! trans('naturatherapy/global.filters') !!}</h4>
                    @foreach($filters as $filter)
                    <div class="widget filter-by-color">
                        <h3 class="widget-title heading uppercase filter_name relative bottom-line full-grey">
                            {{$filter->name}} <i class="fa fa-chevron-right pull-right"></i></h3>
                        <ul style="display: none" class="color-select list-dividers">
                            @foreach($filter->attributes as $attribute)
                            <li>
                                <input type="checkbox" data-attribute="" id="{{$attribute->id}}" class="input-checkbox"
                                    data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" class="input-checkbox"
                                    {{ !is_null($productFilters->attributes) && 
                                !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>
                                <label for="{{$attribute->id}}" class="checkbox-label">{{ $attribute->value }}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    @endif
                </aside>
                <div class="col-lg-9 pt-sml-20 catalogue-colmb-50">
                    <div class="shop-catalogue grid-view">
                        <div data-products-list="" class="row items-grid">
                            @include('clients.naturatherapyshop_alb.partials.category-products-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@section("scripts")
<script>
    $(document).ready(function() {
        $(".filter_name").click(function() {
            if ($(this).children(".fa").hasClass('fa-chevron-right')) {
                $(this).children(".fa").removeClass('fa-chevron-right');
                $(this).children(".fa").addClass('fa-chevron-down');
                $(this).siblings("ul").fadeTo("slow", 1);
            } else {
                $(this).children(".fa").removeClass('fa-chevron-down');
                $(this).children(".fa").addClass('fa-chevron-right');
                $(this).siblings("ul").fadeOut("fast", 0);
            }
        })
    });
</script>
@stop