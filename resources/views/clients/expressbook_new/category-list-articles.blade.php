@extends('clients.expressbook_new.layouts.default')
@section('content')
    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark">

                            {{ $category->title }}
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $category->title }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- product tab start -->
    <div class="product-tab bg-white pt-30 pb-30">
        <div class="container">
            <div class="grid-nav-wraper bg-lighten2 mb-30">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <nav class="shop-grid-nav">
                            <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="nav-item mr-0">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false"><i
                                            class="fa fa-list"></i></a>
                                </li>
                                <li>
                                    <span class="total-products">Прикажани {{ count($products) }} продукти</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-md-6 position-relative">
                        <div class="shop-grid-button d-flex align-items-center">
                            <span class="sort-by">Сортирај по:</span>
                            <select data-sort="" class="form-select custom-select" aria-label="Default select example">
                                <option value="created_at"
                                    {{ $productFilters->selectedSort == 'created_at' ? 'selected="selected"' : '' }}>
                                    Најнови</option>
                                <option value="price-ASC"
                                    {{ $productFilters->selectedSort == 'price-ASC' ? 'selected="selected"' : '' }}>
                                    Цена (Ниска > Висока)</option>
                                <option value="price-DESC"
                                    {{ $productFilters->selectedSort == 'price-DESC' ? 'selected="selected"' : '' }}>
                                    Цена (Висока > Ниска)</option>
                                <option value="title-ASC"
                                    {{ $productFilters->selectedSort == 'title-ASC' ? 'selected="selected"' : '' }}>Име
                                    (A - Z)</option>
                                <option value="title-DESC"
                                    {{ $productFilters->selectedSort == 'title-DESC' ? 'selected="selected"' : '' }}>
                                    Име (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-products-list="">
                @include('clients.expressbook_new.partials.category-products-list')
                <!-- product-tab-nav end -->
                
            </div>
        </div>
    </div>


    <!-- product tab end -->
@endsection
