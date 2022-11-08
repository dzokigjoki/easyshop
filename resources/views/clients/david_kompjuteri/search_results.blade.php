@extends('clients.david_kompjuteri.layouts.default')
@section('content')




    <div class="container pt-30 container_empty">
        <div class="row">
            @if (count($products))
            
                <div class="col-md-12">
                    <div class="title-holder pb-30">
                        <div class="title-text text-center">
                            <h1 class="uppercase">Резултати од пребарување - {{ $search }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row pt_search">

                        @foreach ($products as $product)
                            <div class="col-md-3 col-xs-4 col-xxs-6 product product-grid">
                                @include('clients.david_kompjuteri.partials.product')
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
            
                <div class="col-12 pb-50 text-center">
                    <h1>Не е пронајден ниеден продукт</h1>

                </div>

            @endif
        </div>
    </div>

@stop
