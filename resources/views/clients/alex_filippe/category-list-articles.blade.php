@extends('clients.alex_filippe.layouts.default')

@section('content')

    <style>
        .irs-slider {
            background: #777;
        }
        .irs-diapason {
            background: #FFB848;
        }
    </style>

    @if($category->id != '7')
    <div class="title-wrapper" style="background: url('{{url_assets('/alex_filippe/test-sliki/category-img.jpg')}}') center;">
    @else
    <div class="title-wrapper" style="background: url('{{url_assets('/alex_filippe/images/women-socks.png')}}') center;"> 
    @endif
        <div class="container">
            <div class="container-inner">
                {{-- <h1><span>{{$category->title}}</span></h1> --}}
            </div>
        </div>
    </div>
    
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                {{-- <div class="sidebar col-md-3 col-sm-5">

                    <div class="sidebar-filter margin-bottom-25">
                        <div style="margin-bottom: 40px;">
                            <div class="category-filters-section">
                                <h3 class="widget-title-sm">Цена</h3>
                                <input type="text" data-price-slider="" />
                            </div>
                        </div>

                        <h2>Филтри</h2>
                        @foreach($filters as $filter)
                            <div class="category-filters-section">
                                <h3>{{$filter->name}}</h3>
                                @foreach($filter->attributes as $attribute)
                                    <div class="checkbox">
                                        <label>
                                            <input data-attribute="" data-id="{{$attribute->id}}" type="checkbox"
                                                    {{ !is_null($productFilters->attributes) && in_array($attribute->id, $productFilters->attributes) ? 'checked="checked"': ''  }}
                                                    />{{$attribute->value}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div> --}}
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="row list-view-sorting clearfix">
                        <div class="col-md-2 col-sm-2 list-view">
                            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="pull-right">
                                <label class="control-label">Прикажи:</label>
                                <select class="form-control input-sm" data-per-page="">
                                    <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>
                                    <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>
                                    <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <label class="control-label">Подреди по:</label>
                                <select class="form-control input-sm" data-sort="">
                                    <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>
                                    <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>
                                    <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>
                                    <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>
                                    <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <!-- BEGIN PRODUCT LIST -->
                    <div data-products-list="">
                        @include('clients.alex_filippe.partials.category-products-list')
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

@endsection