@extends('clients.peletcentar.layouts.default')
@section('content')
    <div class="page_wrapper">
        <div class="container">


            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul style="margin-bottom: 0px !important;" class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$category->title}}</li>

            </ul>
            <br>
        </div>
    </div>
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">

                        {{--@include('clients.peletcentar.category-list-article-leftSide')--}}

                        <div id="primary" class="content-area ">
                            {{--<div class="flat-top-bar-shop flat-reset">--}}
                            {{--<label style="font-size: 34px; font-weight: bold;">{{$category->title}}</label>--}}
                                {{--<div style="margin-right: 37px;" class="flat-right flat-filter">--}}
                                    {{--<label style="font-size: 30px; font-weight: bold;">Подреди по:</label>--}}
                                    {{--<div class="flat-sortby">--}}
                                        {{--<div class="btn-group select-dropdown" style="padding-right: 15px;">--}}
                                        {{--<span class="select">--}}
                                            {{--<select data-sort="" class="form-control"  id="sort_by_select">--}}
                                                {{--<option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>--}}
                                                {{--<option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>--}}
                                                {{--<option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>--}}
                                                {{--<option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>--}}
                                                {{--<option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>--}}
                                            {{--</select>--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div> <!-- /.flat-sortby -->--}}

                                    {{--<div id="show_select">--}}
                                        {{--<span>Прикажи:</span>--}}
                                        {{--<div class="btn-group select-dropdown">--}}
                                            {{--<select data-per-page="" class="form-control" style="width: 80px;" id="show_select_element">--}}
                                                {{--<option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12--}}
                                                {{--</option>--}}
                                                {{--<option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36--}}
                                                {{--</option>--}}
                                                {{--<option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99--}}
                                                {{--</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                        {{--<!-- - - - - - - - - - - - - - End of number of products shown - - - - - - - - - - - - - - - - -->--}}
                                    {{--</div>--}}
                                {{--</div> <!-- /.flat-filter -->--}}
                            {{--</div> <!-- /.flat-top-bar-shop -->--}}
                            <div data-products-list="">
                            @include('clients.peletcentar.partials.category-products-list')
                            </div>
                        </div>

                        {{--<div class="row" data-products-list="">--}}
                            {{----}}
                        {{--</div>--}}

            </div>
        </div>

@endsection