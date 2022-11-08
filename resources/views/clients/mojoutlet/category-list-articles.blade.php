@extends('clients.shopathome.layouts.default')
@section('content')
    <!-- breadcrumbs -->
    {{--<div class="breadcrumbs">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb breadcrumb--ys pull-left">--}}
                {{--<li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>--}}
                {{--<li><a href="{{route('home')}}">Дома</a></li>--}}
                {{--<li class="active">{{$category->title}}</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- two columns -->
            <div class="row">
                <!-- left column -->
            @include('clients.shopathome.category-list-article-leftSide')
            <!-- /left column -->
                <!-- center column -->
                <aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-center text-uppercase title-under">{{$category->title}}</h2>
                    </div>
                    <!-- /title -->
                    <div class="filters-row filters-row-layout border-top-none">


                        <div class="pull-right col-lg-12 col-xs-12 col-sm-12 col-md-5 text-right">
                            {{--<div class="filters-row__items hidden-sm hidden-xs">28 Item(s)</div>--}}


                                <div class="filters-row__select hidden-xs">
                                    <label>Подреди по: </label>
                                    <div class="select-wrapper">
                                        <select data-sort="" id="sort_by_select" name="sort_by" class="select--ys">
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
                                </div>

                                <div class="filters-row__select hidden-sm hidden-xs">
                                    <label>Прикажи: </label>
                                    <div class="select-wrapper">
                                        <select data-per-page="" id="show_select_element" name="results_limit"
                                                class="select--ys show-qty" id="result_limit">
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
                                    <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
                                </div>
                        </div>
                    </div>
                    <!-- /filters row -->
                    <div data-products-list="">
                        @include('clients.shopathome.partials.category-products-list')
                    </div>
                    <!-- filters row -->

                    <!-- /filters row -->
                </aside>
                <!-- center column -->
            </div>
            <!-- /two columns -->
        </div>
    </div>
    <!-- End CONTENT section -->
@endsection