@extends('clients.drbrowns.layouts.default')
@section('content')
    <div class="page-banner" style="background-repeat: no-repeat; background-position: center top; background-image: url('/uploads/category/{{$category->image}}'); background-size: cover;">
        <div class="container fadeInLeft ">
            <h2 class="page-title">{{$category -> title}}</h2>
        </div>
    </div><!-- start of page content -->
    <div class="page-content container">

        <div class="row">
            <!-- start of sidebar -->
            <aside class="sidebar product-sidebar col-lg-3 col-md-4" role="complementary">
                {{--<section id="woocommerce_widget_cart-1" class="widget woocommerce widget_shopping_cart">--}}
                    @include('clients.drbrowns.category-list-article-leftSide')
                {{--</section>--}}
            </aside>
            <!-- end of sidebar -->

            <div class="main col-lg-9 col-md-8" role="main">
                <form style="margin-right: 100px; float:left;" method="get">
                    Подреди по: <select data-sort="" class="form-control" style="border:1px solid #ccc !important">
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
                </form>
                <form style="float:left;" method="get">
                    Прикажи:
                <select data-per-page="" class="form-control" id="show_select_element" style="border: 1px solid #ccc !important">
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
                </form>
                <div class="products-top"></div>
                <div class="row product-listing">
                    <div data-products-list="">
                            @include('clients.drbrowns.partials.category-products-list')
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of page content -->
@endsection
@section('scripts')

    <script>
        // $(document).ready(function(){
        //         $('#sort_by_select').selectric();
        // })
    </script>
@stop