@extends('clients.betajewels.layouts.default')
@section('content')

<style>
    @media(max-width: 768px){
        .women-tab {
            margin-top: -35px;
        }
    
    }


    @media(min-width: 768px){
        .women-tab {            
            margin-top: -130px;
         }
    }
</style>


        <div class="page-title-overlay" id="page-title-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <h3 class="title" id="category-title">{{$category->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="search-result-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 hidden-xs">
                    @include('clients.betajewels.category-list-article-leftSide')
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="headline">
                                <h2><span class="mr-10 title">{{trans('betajewels.total')}}: </span> <span class="title">{{count($products)}} @if(count($products) == 1)продукт@else продукти@endif</span></h2>
                            </div>
                            <div class="product-tab">
                                <ul class="nav nav-tabs women-tab" role="tablist">
                                    <li id="sort-by" role="presentation">{{trans('betajewels.sort_by')}}:
                                        <select data-sort="" class="form-control" id="sort_by_select">
                                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>
                                                {{trans('betajewels.latest')}}
                                            </option>
                                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>
                                                {{trans('betajewels.low')}}

                                            </option>
                                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>
                                                {{trans('betajewels.high')}}

                                            </option>
                                            <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>
                                                {{trans('betajewels.name_a-z')}}

                                            </option>
                                            <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>
                                                {{trans('betajewels.name_z-a')}}

                                            </option>
                                        </select>
                                    
                                    </li>
                                    {{-- <li role="presentation" class="active">
                                      
                                    </li> --}}
                                    <li class="mr-10 ml-10" role="presentation">{{trans('betajewels.show')}}:
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
                                        </select></li>
                                    {{-- <li role="presentation">
                                     
                                    </li> --}}
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div data-products-list="" class="row">
                                            @include('clients.betajewels.partials.category-products-list')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection