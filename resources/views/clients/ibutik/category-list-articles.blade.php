@extends('clients.ibutik.layouts.default')

@section('content')
<div class="container">
            <header class="page-header">
                <h1 class="page-title">{{$category->title}}</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><a href="{{route('home')}}">Почетна</a></li>
                    <i class="fa fa-angle-right"></i>
                    <li class="active">{{$category->title}}</li>
                </ol>
                <ul class="category-selections clearfix">
                    <li><span class="category-selections-sign">Подреди:</span>
                        <select class="category-selections-select" data-sort="">
                            <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>Најнови</option>
                            <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>Цена (Ниска > Висока)</option>
                            <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>Цена (Висока > Ниска)</option>
                            <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>Име (A - Z)</option>
                            <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>Име (Z - A)</option>
                        </select>
                    </li>
                    <li><span class="category-selections-sign">Прикажи:</span>
                        <select class="category-selections-select"  data-per-page="">
                            <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>
                            <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>
                            <option value="99" selected="selected" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>
                        </select>
                    </li>
                </ul>
            </header>
            <div class="row">
                <div class="col-md-3 beforePaginate">
                    <aside class="category-filters">
                        <div class="category-filters-section">
                            <h3 class="widget-title-sm">Цена</h3>
                            <input type="text" data-price-slider="" />
                        </div>
                        @foreach($filters as $filter)
                            <div class="category-filters-section">
                                <h3 class="widget-title-sm">{{$filter->name}}</h3>
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

                    </aside>
                </div>
                <section  data-products-list="">
                    @include('clients.ibutik.partials.category-products-list')
                </section>
            </div>
        </div>
        <div class="gap"></div>

@endsection