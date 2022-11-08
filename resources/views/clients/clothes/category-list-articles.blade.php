@extends('clients.clothes.layouts.default')
@section('content')
<div class="main">
        <div class="container">
            <div class="header-page">
                <h1>SHOP</h1>
            </div>
            <!-- /.header-page -->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <aside class="widget">
                            <h4 class="widget-title">КАТЕГОРИИ</h4>
                            <ul class="ul-sidebar">
                                    @foreach($menuCategories as $item)
                                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                    <!-- /.sidebar -->
                </div>
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="top-products">
                            <div class="showing-results">
                                <select data-per-page="" name="results_limit" class="selectBox show-qty select-filter" id="result_limit">
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
                            <div class="sortby">
                                    {{-- <select data-sort="" id="sort_by_select" name="sort_by" class="selectBox nice-select "> --}}
                                <select data-sort="" id="sort_by_select" name="sort_by" class="selectBox select-filter">
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
                        <div data-products-list="">
                                @include('clients.clothes.partials.category-products-list')
                        </div>
                        <!-- /.box-product -->
                    </div>
                    <!-- /.main-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.main -->
@stop