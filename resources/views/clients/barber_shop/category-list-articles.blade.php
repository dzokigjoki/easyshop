@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{ url_assets('/barber_shop/images/page-titles/3.jpg')}}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading mb-20">
                            <h1>{{ $category->title }}</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="/">Почетна</a></li>
                        <li class="active">{{ $category->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!-- Shop #3
    ============================================= -->
    <section id="shop" class="shop shop-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12  col-md-12 product-options">
                    <div class="product-num pull-left pull-none-xs">
                        <span>Прикажи по:</span>
                        <select data-per-page="" name="results_limit" id="result_limit" class="select-prikazi">
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
                    <div class="product-select pull-right text-right pull-none-xs">
                        <span>Sort by:</span>
                        <i class="fa fa-angle-down"></i>
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
            </div>
            <div class="row">
                <!-- Product #1 -->
                <div class="col-xs-12 col-sm-12 col-md-3">
                    {{-- <div class="widget widget-search">
                        <div class="widget--content">
                            <form class="form-search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search here..">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> --}}
        
       
                <div class="widget widget-categories">
                    <div class="widget--title">
                        <h5>категории</h5>
                    </div>
                    <div class="widget--content">
                        <ul class="list-unstyled">
                            @foreach($menuCategories as $item)
                            <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-9">
                <div data-products-list="">
                    @include('clients.barber_shop.partials.category-products-list')
                </div>
            </div>
        </div>
    </section>
@stop