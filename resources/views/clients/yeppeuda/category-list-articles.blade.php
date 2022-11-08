@extends('clients.yeppeuda.layouts.default')
@section('content')


<style>
    .irs-diapason {
        background: #b79d82;
        height: 7px;
    }

    .irs-slider.from,
    .irs-slider.to {
        background: black;
    }
</style>

<!-- Page Title -->
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">{{ $category->title }}</h1>
            </div>

            <div class="pt-10">
                {!! $category->description !!}
            </div>
        </div>
</section>


<div class="content-wrapper oh">

    <!-- Catalogue -->
    <section class="section-wrap pt-40 pb-40 catalogue">
        <div class="container relative">

            <div class="row nomargin shop-filter">
                <div class="col-sm-6 col-xs-6 col-xxs-12 nopadding hidden-xxs">
                    <div class="view-mode">
                        <span>View:</span>
                        <a class="grid grid-active" id="grid"></a>
                        <a class="list" id="list"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6 col-xxs-12 nopadding">

                    <div class="filter_sort">

                        <select data-sort id="sort_by_select" title="Подреди по">
                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                Цена - растечка
                            </option>
                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                Цена - опаѓачка
                            </option>
                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                Најнови
                            </option>
                        </select>
                    </div>
                    <div class="filter_number">
                        <select data-per-page name="results_limit" id="result_limit" title="Прикажи">
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

            <div class="row">

                <!-- Sidebar -->
                <aside class="col-md-3 sidebar left-sidebar">

                    <!-- Filter by Price -->
                    <div class="widget pt-10 pb-10 filter-by-price clearfix">
                        <h4 class="bottom-line pb-30 pb-sml-0 full-grey">Цена</h4>

                        <div data-price-slider="" id="slider-range"></div>

                    </div>
                    @if (count($filters))
                    <h4 class="bottom-line pb-10 pb-sml-10 full-grey">Филтри</h4>
                    @foreach($filters as $filter)
                    <div class="widget filter-by-color">
                        <h3 class="widget-title heading uppercase filter_name relative bottom-line full-grey">{{$filter->name}} <i class="fa fa-chevron-right pull-right"></i></h3>
                        <ul style="display: none" class="color-select list-dividers">
                            @foreach($filter->attributes as $attribute)
                            <li>
                                <input type="checkbox" data-attribute="" id="{{$attribute->id}}" class="input-checkbox" data-id="{{$attribute->id}}" data-filter-id="{{$filter->id}}" class="input-checkbox" {{ !is_null($productFilters->attributes) && 
                                !empty($productFilters->attributes[$filter->id]) && in_array($attribute->id, $productFilters->attributes[$filter->id]) ? 'checked="checked"': ''  }}>
                                <label for="{{$attribute->id}}" class="checkbox-label">{{ $attribute->value }}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    @endif
                </aside> <!-- end sidebar -->

                <div class="col-md-9 pt-sml-20 catalogue-colmb-50">
                    <div class="shop-catalogue grid-view">

                        <div data-products-list="">
                            
                                @include('clients.yeppeuda.partials.category-products-list')
                                    


                        </div> <!-- end row -->
                    </div> <!-- end grid mode -->

                    

                </div> <!-- end col -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end catalog -->

</div> <!-- end content wrapper -->
@stop

@section("scripts")
<script>
    $(document).ready(function() {
        $(".filter_name").click(function() {
            console.log($(this).after().contents());
            if ($(this).children(".fa").hasClass('fa-chevron-right')) {
                $(this).children(".fa").removeClass('fa-chevron-right');
                $(this).children(".fa").addClass('fa-chevron-down');
                $(this).siblings("ul").fadeTo("slow", 1);

            } else {
                $(this).children(".fa").removeClass('fa-chevron-down');
                $(this).children(".fa").addClass('fa-chevron-right');
                $(this).siblings("ul").fadeOut("fast", 0);
            }

        })
    });
</script>
@stop