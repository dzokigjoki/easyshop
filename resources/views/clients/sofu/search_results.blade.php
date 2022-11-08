@extends('clients.sofu.layouts.default')
@section('content')
<div class="content-container">
    <div class="container container_empty">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center">
                    <h2>Резултати од пребарување - {{ $search }}</h2>
                </div>
            </div>
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="shop-loop grid">
                        @if(count($products))
                        <ul data-products-list="" class="products columns-4" data-columns="4">
                            @foreach($products as $product)
                            @if(is_null($product->parent_product))
                            @include('clients.sofu.partials.product')
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <img src="{{url_assets('/sofu/images/no-search.png')}}" style="width:100%;align-self:flex-start;" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop