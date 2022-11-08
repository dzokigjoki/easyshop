@extends('clients.naturatherapy.layouts.default')


@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
@endsection


@section('content')



<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">
                        {!! trans('naturatherapy/global.home') !!}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $product->title }}
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="section py-5 py-xl-100">
    <div class="container">
        <div class="row justify-content-lg-between">
            <div class="col-md-6 pr-xl-5 mb-4 mb-md-0">
                <div class="product-gallery mb-3">
                    <div class="img-wrapper position-relative bg-light">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div class="product-badge badge badge-promotion text-uppercase">{!! trans('naturatherapy/global.akciskaponuda') !!}</div>
                        @endif
                    </div>
                </div>

                <div class="product-gallery mb-3">
                    <img src="{{ $product->image }}" class="w-100">

                    @if(count($product->images) > 0)
                    @foreach($product->images as $img) <div class="img-wrapper position-relative bg-light">
                        <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}" class="w-100">
                        @if($product->status_promotion == 1)
                        <div class="product-badge badge badge-promotion text-uppercase">
                            {!! trans('naturatherapy/global.akciskaponuda') !!}</div>
                        <div class="product-badge badge badge-on-sale text-uppercase"><span>50</span>
                            {!! trans('naturatherapy/global.discount') !!}</div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>

                <div class="product-gallery-nav arrows-style-1">
                    <img src="{{ $product->image }}" class="w-100">

                    @if(count($product->images) > 0)
                    @foreach($product->images as $img)
                    <div>
                        <div class="img-wrapper position-relative bg-light">
                            <img src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}" class="w-100">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
            <div class="col-md-6">
                <h1 class="h1 mb-4 mb-lg-4">{{ $product->title }}</h1>
                <div class="short-description dynamic-content ">

                    {!! $product->short_description !!}
                </div>

                <hr class="my-3 my-md-4 my-xl-5">
                <div class="cart-form"">
            <input type=" text" name="product" value="{{ $product->code }}" hidden="">
                    <div class="row">
                        <div class="col-12">
                            @php
                            if( \EasyShop\Models\Product::hasDiscount( $product->discount ) ){
                            $old_price = $product->price_retail_1;
                            $price = EasyShop\Models\Product::getPriceRetail1($product, false, 2);
                            }else{
                            unset($old_price);
                            $price = $product->price_retail_1;
                            }
                            @endphp
                            @if(isset($old_price))
                            <p class="h4 mb-2"><span class="text-del">{{ number_format($old_price * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</span></p>
                            @endif
                            <p class="h2 text-red mb-3 mb-lg-5">{{ number_format($price * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
                        </div>
                        <div class="order-controls-wrapper form-group col-auto mb-0">
                            <input type="number" min="1" max="999" value="1" name="qty" class="form-control h-100 increment-control" id="quantity">
                            <div class="wrapper pl-1">
                                <button type="button" class="controls control-increase">+</button>
                                <button type="button" class="controls control-decrease">-</button>
                            </div>
                        </div>
                        <div class="col-auto align-self-center pl-sm-0">
                            <button data-add-to-cart="" value="{{$product->id}}" type="submit" class="btn btn-secondary">
                                {!! trans('naturatherapy/global.ordernow') !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-style-1">
            <nav class="d-none d-sm-block">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-tab-1-tab" data-toggle="tab" href="#nav-tab-1" role="tab" aria-controls="nav-tab-1" aria-selected="true">

                        {!! trans('naturatherapy/product.description') !!}</a>

                    <!-- <a class="nav-item nav-link" id="nav-tab-2-tab" data-toggle="tab" href="#nav-tab-2" role="tab" aria-controls="nav-tab-2" aria-selected="false">Lexo më shumë</a> -->

                </div>
            </nav>
            <div class="responsive-tabs d-sm-none">
                <select class="custom-select custom-select-style-1 responsive-select" data-tab-selector="#nav-tab">
                    <option value="0" selected="">{!! trans('naturatherapy/product.description') !!}</option>

                    <!-- <option value="1">Lexo më shumë</option> -->

                </select>
            </div>
            <div class="tab-content border-bottom" id="nav-tabContent">
                <div class="tab-pane fade dynamic-content show active" id="nav-tab-1" role="tabpanel" aria-labelledby="nav-tab-1-tab">
                    {!! $product->description !!}
                </div>

                <!-- <div class="tab-pane fade" id="nav-tab-2" role="tabpanel" aria-labelledby="nav-tab-2-tab">
                    {!! $product->short_description !!}

                </div> -->

            </div>
        </div>
        @if(isset($product->youtube_link))
        <div class="row align-items-center mt-4 mt-lg-5">
            <div class="col-md-6 col-xl-7 pr-xl-5 mb-4 mb-md-0">
                @php
                $embedLink = preg_replace('/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', 'https://www.youtube.com/embed/$2',$product->youtube_link);

                @endphp
                <iframe width="100%" height="500" src="{{ $embedLink }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 col-xl-5 pl-xl-4">
                <h2 class="h1 mb-4 mb-lg-5">
                {!! trans('naturatherapy/product.video_header') !!}</h2>
                </p>
                <div class="img-wrapper mb-4 mb-lg-5">
                    <img src="{{ url_assets('/naturatherapy/images/potpis-drvoshanski.png')}}" class="signature signature-md" alt="">
                </div>
                <a href="{{ $product->youtube_link }}" class="btn btn-secondary btn-arrow">{!! trans('naturatherapy/product.video_button') !!}</a>
            </div>
        </div>

        {{-- Else
			<div class="row align-items-center">
				<div class="col-md-6 col-xl-7 pr-xl-5 mb-4 mb-md-0">
					<iframe width="100%" height="500" src="https://www.youtube.com/embed/TJ1f9bF8_9U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="col-md-6 col-xl-5 pl-xl-4">
					<h2 class="h1 mb-4 mb-lg-5">Prezantimi i videos
                    </h2>
					<p class="mb-4 mb-lg-4">Ekstrakti i boronicës së egër është një suplement dietik i marrë nga boronicat e egra, malore të pasura me antioksidantë specifik (antocianina). Përgatitja është menduar kryesisht për njerëzit me diabet për të mbrojtur shëndetin dhe funksionimin e syve, veshkave dhe enëve të gjakut, si dhe për njerëzit me sëmundje vaskulare dhe stres të lartë oksidativ.

                    </p>
					<div class="img-wrapper mb-4 mb-lg-5">
						<img src="assets/images/potpis-drvoshanski.png" class="signature signature-md" alt="">
					</div>
					<a href="#" class="btn btn-secondary btn-arrow">
Shikoni videon</a>
				</div>
			</div>

			--}}
        @endif
    </div>
</section>
@if(isset($relatedProducts) && count($relatedProducts) > 0)
<section class="section bg-primary py-5 py-xl-100">
    <div class="container">
        <h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">{!! trans('naturatherapy/product.similarproducts') !!}</h1>
        <div class="row">

            @foreach( $relatedProducts as $product )
            @include('clients.naturatherapy.partials.product')
            @endforeach

        </div>
    </div>
</section>
@else

<hr class="my-0">
@endif

@endsection