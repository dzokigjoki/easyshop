@extends('clients.naturatherapyshop.layouts.default')
@section('content')
    <div class="container pt-30 container_empty">
        <div class="row">
            @if (count($products))
                <div class="col-md-12">
                    <div class="title-holder">
                        <div class="title-text text-center">
                            <h1 class="uppercase">Резултати од пребарување
                        </div>
                    </div>
                    <div style="padding-bottom: 75px;" class="col-md-12">
                        <div class="row pt_search">
                            @foreach ($products as $product)
                                <div class="col-md-3 col-xs-4 col-xxs-6 product product-grid">
                                    @include('clients.naturatherapyshop.partials.product')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div style="margin-top: 75px" class="col-12 pb-50 text-center">
                    <img width=35 class="pb-20" src="{{ url_assets('/naturatherapyshop/img/shop/none.png') }}" />
                    <h4>Нема резултати од пребарувањето</h4>
                </div>
            @endif
        </div>
    </div>
@stop
