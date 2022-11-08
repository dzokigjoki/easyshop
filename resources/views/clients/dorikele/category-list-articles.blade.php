@extends('clients.dorikele.layouts.default')
@section('content')
        <!-- Intro Title Section 2 -->
        <div class="section-block intro-title-2-3">
            <div class="media-overlay bkg-black opacity-02">
                <img style="width: 100%" data-src="/uploads/category/{{$category->image}}" alt="{{$category->title}}"/>
            </div>
            <div class="row">
                <div class="column width-12">
                    <div class="title-container">
                        <div class="title-container-inner center color-white">
                            <h1 class="title-xlarge font-alt-2 weight-light color-white mb-0">
                                {{$category -> title}}: </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Intro Title Section 2 End -->

        <!-- Filter -->
        <div class="section-block clearfix no-padding-bottom">
            <div class="row">
                <!-- Content Inner -->
                <!-- Filter -->
                <aside class="sidebarShop column width-3 sidebar right">
                    <div class="sidebar-inner">
                        <div class="widget widget-product-categories">
                            @include('clients.dorikele.category-list-article-leftSide')
                        </div>
                    </div>
                </aside>
                <!-- END OF SIDEBAR !-->
                <div id="primary" class="column width-9 content-inner">
                    <div class="section-block pt-0 pb-50">
                        <div class="row">
                            <div class="column width-4">
                                <div class="product-result-count pd-10">
                                    {{--<label style="font-size: 34px; font-weight: bold;">{{$category->title}}</label>--}}
                                </div>
                            </div>
                            <div style="float:right;" class="column width-3 offset-2">
                                <div class="form-select form-element medium pull-right">
                                    <select data-sort="" class="form-control" id="sort_by_select">
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
                            <div style="float:right;" id="show_select" class="column width-3">
                                <div class="form-select form-element medium pull-right">
                                    <select data-per-page="" class="form-control" id="show_select_element">
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
                    </div>
                    <!-- Filter End -->
                    <div data-products-list="">
                        @include('clients.dorikele.partials.category-products-list')
                    </div>
                </div>
            </div>
        </div>
    <!--  End -->
@endsection