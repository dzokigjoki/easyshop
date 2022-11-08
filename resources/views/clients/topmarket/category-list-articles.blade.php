@extends('clients.topmarket.layouts.default')
@section('content')


    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="secondary_page_wrapper">

        <div class="container">

            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$category->title}}</li>

            </ul>
            <br>
            <div class="row">

                @include('clients.topmarket.category-list-article-leftSide')

                <main class="col-md-9 col-sm-8">


                    <section class="section_offset">
                        <div class="title-bg">
                            <h2 class="title">{{$category->title}}</h2>
                        </div>
                    </section>

                    <!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->


                    <br>
                    <div class="section_offset">
                        <header>
                            <div>
                                <!-- - - - - - - - - - - - - - Sort by - - - - - - - - - - - - - - - - -->
                                <span>Подреди по:</span>
                                <div class="btn-group select-dropdown" style="padding-right: 15px;">
                                        <span class="select">
                                            <select data-sort="" class="form-control"  id="sort_by_select">
                                                <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>
                                                <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>
                                                <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>
                                                <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>
                                                <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>
                                            </select>
                                        </span>
                                </div>
                                <!-- - - - - - - - - - - - - - End of sort by - - - - - - - - - - - - - - - - -->
                                <!-- - - - - - - - - - - - - - Number of products shown - - - - - - - - - - - - - - - - -->
                             <div id="show_select">
                                <span>Прикажи:</span>
                                <div class="btn-group select-dropdown">
                                <select data-per-page="" class="form-control" style="width: 80px;" id="show_select_element">
                                    <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12
                                    </option>
                                    <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36
                                    </option>
                                    <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99
                                    </option>
                                </select>
                                </div>
                                <!-- - - - - - - - - - - - - - End of number of products shown - - - - - - - - - - - - - - - - -->
                            </div>
                            </div>

                            <div class="right_side">

                                <!-- - - - - - - - - - - - - - Product layout type - - - - - - - - - - - - - - - - -->

                                <div class="layout_type buttons_row" data-table-container="#products_container">

                                    <a href="#" data-table-layout="grid_view"
                                       class="button_grey middle_btn icon_btn active tooltip_container"><i
                                                class="icon-th"></i></a>

                                    <a href="#" data-table-layout="list_view list_view_products"
                                       class="button_grey middle_btn icon_btn tooltip_container"><i
                                                class="icon-th-list"></i></a>

                                </div>

                                <!-- - - - - - - - - - - - - - End of product layout type - - - - - - - - - - - - - - - - -->

                            </div>

                        </header>

                        <div data-products-list="">
                            @include('clients.topmarket.partials.category-products-list')
                        </div>

                    </div>

                    <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->

                </main>

            </div><!--/ .row -->

        </div><!--/ .container-->

    </div><!--/ .page_wrapper-->

@endsection