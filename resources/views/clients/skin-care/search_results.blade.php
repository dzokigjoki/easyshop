@extends('clients.skin-care.layouts.default')
@section('content')





<div class="container pt-30 container_empty">
    <div class="row">
    @if(count($products))
        <div class="col-md-12">
            <div class="title-holder">
                <div class="title-text text-center">
                    <h1 class="uppercase">Резултати од пребарување - {{ $search }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row pt_search">
                
                @foreach($products as $product)
                <div class="col-md-3 col-xs-4 col-xxs-6 product product-grid">
                    @include('clients.skin-care.partials.product')
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="col-12 pb-50 text-center">

            <img width=75 class="pb-20" src="{{url_assets('/skin-care/img/shop/none.png')}}" />

            <h1>Не е пронајден ниеден продукт</h1>

        </div>

        @endif
    </div>
</div>

@stop