@extends('clients.torti.layouts.default')
@section('content')
<main>
    <div class="product-section product-section-1 woocommerce container-fluid">
        <div class="container">
            <div class="mt-35 section-header">
                <h3>{{ $category->title }}</h3>
                <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
            </div>
            <ul class="products">
                @foreach($categoriesChunked as $categoriesRows)
                @foreach ($categoriesRows as $item)
                @if($item->parent == $category->id)
                <li class="product">
                    <a href="{{route('category', [$item->id, $item->url])}}">
                        <div class="product-img-box">
                            <img src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                        </div>
                        <div class="detail-box">
                            <h3>{{ $item->title }}</h3>
                        </div>
                    </a>
                </li>
                @endif
                @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</main>
@stop