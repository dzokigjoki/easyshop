@extends('clients.herline.layouts.default')
@section('content')
<style>
    .subheading{
        font-weight: 500;
        line-height:1.7;
        padding-bottom: 17px;
    }
</style>
<link rel='stylesheet' href='{{url_assets('/herline/css/shop.css')}}' type='text/css' media='all' />
<div class="container">
    <div class="row">
        <div class="col-md-12 main-wrap text-center">
            <h2 class="text-center custom_heading">{{$category->title}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 main-wrap text-center">
            <h5 class="text-center subheading">{{$category->description}}</h5>
        </div>
    </div>
</div>
<div class="shop-toolbar">
    <div class="container">
        <div class="row">
            <div class="col-md-9 main-wrap pull-right">
                <form class="shop-ordering clearfix">
                    <div class="shop-ordering-select">
                        <label class="hide">Сортирај по:</label>
                        <div class="form-flat-select">
                            <select data-sort id="sort_by_select" class="ps-select" title="Подреди по">
                                <option value="price-ASC"
                                    {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
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
                            <i class="custom-arrow fa fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="shop-ordering-select">
                        <label class="hide">Прикажи:</label>
                        <div class="form-flat-select">
                            <select data-per-page name="results_limit" id="result_limit" class="ps-select"
                                title="Прикажи">
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
                            <i class="custom-arrow fa fa-angle-down"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar-wrap">
                <div class="widget shop widget_price_filter">
                    <h4 class="widget-title"><a href="javascript://">Цена</a></h4>
                    <input type="text" data-price-slider="" />
                </div>
                <h3 class="pb-30">Филтри <a class="pull-right" data-toggle="collapse" href="#filters"
                        aria-expanded="false" aria-controls="filters">
                        <i class="fa fa-caret-right" id="caret"></i></a></h3>
                <div class="main-sidebar collapse" id="filters">
                    @include('clients.herline.category-list-article-leftSide')
                </div>
            </div>
            <div class="col-md-9 main-wrap">
                <div class="main-content">
                    <div class="shop-loop grid">
                        <div data-products-list="">
                            @include('clients.herline.partials.category-products-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



@stop


@section('scripts')
<script type='text/javascript' src='{{url_assets('/herline/js/core.min.js')}}'></script>
<script type='text/javascript' src='{{url_assets('/herline/js/widget.min.js')}}'></script>
<script type='text/javascript' src='{{url_assets('/herline/js/mouse.min.js')}}'></script>
<script type='text/javascript' src='{{url_assets('/herline/js/slider.min.js')}}'></script>
<script type='text/javascript' src='{{url_assets('/herline/js/jquery-ui-touch-punch.min.js')}}'></script>
<script type='text/javascript' src='{{url_assets('/herline/js/price-slider.js')}}'></script>
@stop