@extends('clients.watchstore.layouts.default')
@section('content')
        <div class="page-title-overlay" style="background-color: #ffffff; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3 style="color:black; text-align: center;margin-bottom: 0">{{$category->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- PAGE-TITLE-AREA:END -->

    <!--BREADCRUMBS    -->
    {{--<div class="title-breadcrumb">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}
                    {{--<div class="bred-title">--}}
                        {{--<h3>{{$category->title}}</h3>--}}
                    {{--</div>--}}
                    {{--<ol class="breadcrumb">--}}
                        {{--<li><a href="{{route('home')}}"><i class="fa fa-home"></i></a>--}}
                        {{--</li>--}}
                        {{--<li><a>{{$category -> title}}</a>--}}
                        {{--</li>--}}
                    {{--</ol>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--BREADCRUMBS:END    -->

    <!--PRODUCT-LIST-AREA    -->
    <div class="search-result-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    @include('clients.watchstore.category-list-article-leftSide')
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="headline">
                                <h2><span style="margin-right:10px;">{{trans('watchstore.total')}}: </span> <span>{{count($products)}} {{trans('watchstore.products')}}</span></h2>
                            </div>
                            <div class="product-tab">
                                <ul class="nav nav-tabs women-tab" role="tablist">
                                    <li style="margin-right:10px; margin-left:10px;" role="presentation">{{trans('watchstore.sort_by')}}:</li>
                                    <li role="presentation" class="active">
                                        <select data-sort="" class="form-control" id="sort_by_select">
                                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                                {{trans('watchstore.latest')}}
                                            </option>
                                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                                {{trans('watchstore.low')}}

                                            </option>
                                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                                {{trans('watchstore.high')}}

                                            </option>
                                            <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>
                                                {{trans('watchstore.name_a-z')}}

                                            </option>
                                            <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                                                {{trans('watchstore.name_z-a')}}

                                            </option>
                                        </select>
                                    </li>
                                    <li style="margin-right:10px; margin-left:10px;" role="presentation">{{trans('watchstore.show')}}:</li>
                                    <li role="presentation">
                                        <select data-per-page="" class="form-control" id="show_select_element">
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
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div data-products-list="" class="row">
                                            @include('clients.watchstore.partials.category-products-list')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  PRODUCT-LIST:END -->
@endsection