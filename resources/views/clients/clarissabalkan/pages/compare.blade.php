@extends('clients.clarissabalkan.layouts.default')
@section('content')
<link href="{{ url_assets('/clarissabalkan/css/compare.css')}}" rel="stylesheet">
<main class="ps-main" style="padding-top: 30px">
    <div class="container p-0 overFlow compare-page">
        <div class="page_header">
            <h1>Споредба</h1>
        </div>
        <div class="wrapper">
            <div class="compare-table">
                <div class="compare-table-row compare-4-products">
                    <div style="vertical-align: middle;" class="col-xs compare-actions">
                        <img src="{{ url_assets('/clarissabalkan/img/compare.jpg')}}"
                            style="width: auto; margin:0 auto;" />
                    </div>
                    @foreach($compareProducts as $product)
                    <div class="col-xs product-tile">
                        @include('clients.clarissabalkan.partials.product')
                        <a href="{{URL::to('compare/remove/')}}/{{$product->id}}" class="remove-product">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
                @foreach($filterNames as $fName)
                <div class="compare-table-row compare-4-products">
                    <div class="col-xs">
                        {{$fName}}
                    </div>
                    @foreach($new_filters_attributes_fp as $key => $fa)
                    @foreach($fa as $key => $name_value)
                    @if($fName === $key)
                    <div class="col-xs">
                        @if($name_value != '-')
                        {{$name_value->value}}
                        @else
                        {{$name_value}}
                        @endif
                    </div>
                    @else
                    @continue
                    @endif
                    @endforeach
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection