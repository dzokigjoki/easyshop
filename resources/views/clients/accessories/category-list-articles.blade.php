@extends('clients.accessories.layouts.default')
@section('content')
<div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{$category->title}} </h2>
                {{-- <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shop Left Sidebar</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Content Wrapper Area -->
    <div class="hiraola-content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="hiraola-sidebar-catagories_area">
                        {{-- <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Price</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <!-- <button type="button">Filter</button> -->
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Brand</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                <li>
                                    <a href="javascript:void(0)">Brand 1(15)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Brand 2(16)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Brand 3(16)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Brand 4(17)</a>
                                </li>
                            </ul>
                        </div> --}}
                        {{-- <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Size</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                <li>
                                    <a href="javascript:void(0)">Size 1(17)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Size 2(16)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Size 3(17)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Size 4(17)</a>
                                </li>
                            </ul>
                        </div> --}}
                        
                        <div class="category-module hiraola-sidebar_categories">
                            <div class="category-module_heading">
                                <h5>Категории</h5>
                            </div>
                            <div class="module-body">
                                <ul class="module-list_item">
                                    @foreach($menuCategories as $item)
                                        <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                            <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="product-item-selection_area">
                                <div class="product-short">
                                    <label class="select-label">Подреди по:</label>
                                    <select data-sort="" id="sort_by_select" name="sort_by" class="selectBox nice-select ">
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
                            <div class="product-item-selection_area">
                                <div class="sort-select">
                                    <label class="select-label">Прикажи: </label>
                                    <select data-per-page="" name="results_limit"
                                    class="selectBox show-qty nice-sort" id="result_limit">
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
                        <div data-products-list="">
                                @include('clients.accessories.partials.category-products-list')
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Content Wrapper Area End Here -->
@stop