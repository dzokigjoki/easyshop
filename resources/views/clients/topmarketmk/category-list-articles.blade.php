@extends('clients.topmarketmk.layouts.default')
@section('content')
<section id="content">
    <div id="category-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">

                <li><a href="{{route('home')}}">Дома</a></li>
                <li class="active">{{$category -> title}}</li>

            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    @include('clients.topmarketmk.category-list-article-leftSide')
                    <div class="col-md-9 col-sm-8 col-xs-12 main-content">

                        {{--<div class="category-toolbar clearfix">--}}
                            {{--<div class="toolbox-filter clearfix">--}}

                                {{--<div class="sort-box">--}}
                                    {{--<span class="separator">Подреди по:</span>--}}
                                    {{--<div class="btn-group select-dropdown">--}}
                                        {{--<div class="form-select form-element medium pull-right">--}}
                                            {{--<select data-sort="" class="form-control" id="sort_by_select">--}}
                                                {{--<option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>--}}
                                                    {{--Најнови--}}
                                                {{--</option>--}}
                                                {{--<option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>--}}
                                                    {{--Ниска--}}
                                                {{--</option>--}}
                                                {{--<option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>--}}
                                                    {{--Висока--}}
                                                {{--</option>--}}
                                                {{--<option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>--}}
                                                    {{--Име (A-Z)--}}
                                                {{--</option>--}}
                                                {{--<option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>--}}
                                                    {{--Име (Z-A)--}}
                                                {{--</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div><!-- End .toolbox-filter -->--}}
                            {{--<div class="toolbox-pagination clearfix">--}}
                                {{--<div id="show_select" class="view-count-box">--}}
                                    {{--<span class="separator">Прикажи:</span>--}}
                                    {{--<div class="btn-group select-dropdown">--}}
                                        {{--<select data-per-page="" class="form-control" id="show_select_element">--}}
                                            {{--<option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>--}}
                                                {{--12--}}
                                            {{--</option>--}}
                                            {{--<option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>--}}
                                                {{--36--}}
                                            {{--</option>--}}
                                            {{--<option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>--}}
                                                {{--99--}}
                                            {{--</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div><!-- End .view-count-box -->--}}

                            {{--</div><!-- End .toolbox-pagination -->--}}


                        {{--</div><!-- End .category-toolbar -->--}}
                        {{--<div class="md-margin"></div><!-- .space -->--}}
                        <div data-products-list="">
                                @include('clients.topmarketmk.partials.category-products-list')
                        </div>

                    </div><!-- End .col-md-9 -->
                </div><!-- End .row -->


            </div><!-- End .col-md-12 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

</section><!-- End #content -->
@endsection