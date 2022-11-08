@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
    <div class="container pt-30 container_empty">
        <div class="row">
            @if (count($products))
                <div class="col-md-12">
                    <div class="title-holder">
                        <div class="title-text text-center">
                        <h1 class="uppercase">{!! trans('naturatherapy/global.search_results') !!}</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row pt_search">
                            @foreach ($products as $product)
                                <div class="col-md-3 col-xs-4 col-xxs-6 product product-grid">
                                    @include('clients.naturatherapyshop_al.partials.product')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div style="margin-top: 75px" class="col-12 pb-50 text-center">
                    <img width=35 class="pb-20" src="{{ url_assets('/naturatherapyshop/img/shop/none.png') }}" />
                    <h4>{!! trans('naturatherapy/global.no_search_results') !!}</h4>
                </div>
            @endif
        </div>
    </div>
@stop
