@extends('clients.lilit.layouts.default')
@section('content')
<div id="wrapper" class="marginTop wide-wrap">
        <div class="hidden-xs offcanvas-overlay"></div>
        <div class="heading-container">
            <div class="container heading-standar">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li><span><a href="{{route('home')}}" class="home"><span>Home</span></a></span></li>
                        <li><span>{{$category->title}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-9 main-wrap pull-right">
                    {{--<div class="view-mode">--}}
                        {{--<a class="grid-mode active" title="Grid"><i class="fa fa-th"></i></a>--}}
                        {{--<a class="list-mode" title="List" href="#"><i class="fa fa-th-list"></i></a>--}}
                    {{--</div>--}}
                    <form class="shop-ordering clearfix">
                        <div class="shop-ordering-select">
                            <label class="hide">Подреди по:</label>
                            <div class="form-flat-select">
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
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                        <div class="shop-ordering-select">
                            <label class="hide">Прикажи:</label>
                            <div class="form-flat-select">
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
                                <i class="fa fa-angle-down"></i>
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
                @include('clients.lilit.category-list-article-leftSide')
                <div class="col-md-9 main-wrap">
                    <div data-products-list="" class="main-content">
                        @include('clients.lilit.partials.category-products-list')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection