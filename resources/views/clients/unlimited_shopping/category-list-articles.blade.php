@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <main class="ps-main">
        <div class="ps-products-wrap pt-40 pb-80">

            <h1 class="text-center mb-50 naslov">{{$category->title}}</h1>

            <div class="ps-products" data-mh="product-listing">
                <div class="ps-product-action">
                    <p>Прикажи:</p>
                    <div class="ps-product__filter">
                        <select data-per-page="" name="per_page" class="filter-select">
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

                    <div class="new-line"></div>

                    <p>Подреди:</p>
                    <div class="ps-product__filter">
                        <select data-sort="" name="orderby" class="filter-select">
                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>
                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (ниска > висока)</option>
                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цнеа (висока > ниска)</option>
                            <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>
                            <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>
                        </select>
                    </div>

                    <div class="new-line"></div>

                    <div class="ps-product__filter filters-btn-wrap">
                        <button class="open-filters">Филтри</button>
                    </div>
                </div>

                @if(!count($products))

                    <div class="col-sm-12">
                        <h1 class="text-center">Нема достапни продукти</h1>
                    </div>

                @else

                    <div class="ps-product__columns" data-products-list="">

                        @include("clients.unlimited_shopping.partials.category-products-list")

                    </div>

                    <div class="container-fluid pagination-cont">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ps-product-action">
                                    <div class="ps-pagination">
                                        <ul class="pagination">
                                            <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto;"@endif data-page="{{$productFilters->page - 1}}"><i class="fa fa-angle-left"></i></li>
                                            @foreach(range(1, $totalPages) as $page)
                                                @if($productFilters->page == $page)
                                                    <li class="active">{{$page}}</li>
                                                @else
                                                    <li data-page="{{$page}}">{{$page}}</li>
                                                @endif
                                            @endforeach
                                            <li @if($productFilters->page == $totalPages)style="visibility: hidden;"@endif data-page="{{$productFilters->page + 1}}"><i class="fa fa-angle-right"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif


            </div>

            <div class="ps-sidebar">

                @include("clients.unlimited_shopping.category-list-article-leftSide")

            </div>





        </div>
    </main>

@endsection