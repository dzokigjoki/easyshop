@extends('clients.energy_point_peleti.layouts.default')
@section('content')

<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/css/shop.css')}}">
<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick.css')}}">
<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick-theme.css')}}">
<style>
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    #related li {
        padding: 0 15px !important;
    }

    .card-input-element:checked+.card-input {
        box-shadow: 0 0 1px 1px #ca2028;
    }
</style>
<div class="heading-container">
    <div class="container heading-standar">
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li><span><a href="/" class="home"><span>Почетна</span></a></span></li>
                <li><span>{{ $product->title }}</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container-full">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 no-min-height"></div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="container">
                            <div class="row summary-container">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <h1 class="product_title entry-title mb-35">{{ $product->title }}</h1>
                                    </div>
                                
                                </div>
                                
                                <div class="col-md-6 col-sm-6 entry-image">
                                    <div class="single-product-images">
                                        <div class="single-product-images-slider">
                                            <div class="caroufredsel product-images-slider" data-synchronise=".single-product-images-slider-synchronise" data-scrollduration="500" data-height="variable" data-scroll-fx="none" data-visible="1" data-circular="1" data-responsive="1">
                                                <div class="caroufredsel-wrap">
                                                    <ul class="caroufredsel-items">
                                                        <li class="caroufredsel-item">
                                                            <div class="thumb">
                                                                <img src="{{ $product->image }}" />
                                                            </div>
                                                        </li>
                                                        @if(count($product->images) > 0)
                                                        @foreach($product->images as $img)
                                                        <li class="caroufredsel-item">
                                                            <div class="thumb">
                                                                <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="Product-detail" />
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                    <a href="#" class="caroufredsel-prev"></a>
                                                    <a href="#" class="caroufredsel-next"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-product-thumbnails">
                                            <div class="caroufredsel product-thumbnails-slider" data-visible-min="2" data-visible-max="4" data-scrollduration="500" data-direction="up" data-height="100%" data-circular="1" data-responsive="0">
                                                <div class="caroufredsel-wrap">
                                                    <ul class="single-product-images-slider-synchronise caroufredsel-items">
                                                        <li class="caroufredsel-item selected">
                                                            <div class="thumb">
                                                                <a href="#" data-rel="1" title="Product-detail">
                                                                    <img src="{{ $product->image }}" alt="Product-detail" />
                                                                </a>
                                                            </div>
                                                        </li>
                                                        @if(count($product->images) > 0)
                                                        @foreach($product->images as $img)
                                                        <li class="caroufredsel-item">
                                                            <div class="thumb">
                                                                <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" data-rel="magnific-popup-verticalfit" title="Product-detail">
                                                                    <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" alt="Product-detail" />
                                                                </a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 entry-summary">
                                    <div class="summary">
                                        <p class="price">
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="amount">
                                                {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                МКД
                                            </span>
                                            <span class="amount">
                                                <del>
                                                    {{number_format($product->price, 0, ',', '.')}} МКД</del>
                                                </del>
                                            </span>
                                            @else
                                            <span class="amount">
                                                {{number_format($product->price, 0, ',', '.')}} МКД</del>
                                            </span>
                                            @endif
                                        </p>
                                        <div class="product-excerpt">
                                            <p>
                                                {!! $product->short_description !!}
                                            </p>
                                        </div>
                                        <div class="product-actions res-color-attr">
                                            <div class="cart">
                                                {{-- <div class="product-options-outer">
                                                    <div class="variation_form_section">
                                                        <div class="product-options icons-lg">
                                                            <table class="variations-table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><label>Color</label></td>
                                                                        <td>
                                                                            <div class="select-option swatch-wrapper">
                                                                                <a href="#" title="Green" class="swatch-color green">Green</a>
                                                                            </div>
                                                                            <div class="select-option swatch-wrapper selected">
                                                                                <a href="#" title="Red" class="swatch-color red">Red</a>
                                                                            </div>
                                                                            <div class="select-option swatch-wrapper">
                                                                                <a href="#" title="White" class="swatch-color white">White</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>Size</label></td>
                                                                        <td>
                                                                            <div class="select-option swatch-wrapper selected">
                                                                                <a href="#" title="Extra Large" class="swatch-anchor">
                                                                                    <img src="{{ url_assets('/energy_point_peleti/images/sizes/XL.jpg')}}"
                                                alt="thumbnail" width="35" height="35"/>
                                                </a>
                                            </div>
                                            <div class="select-option swatch-wrapper">
                                                <a href="#" title="Extra Extra Large" class="swatch-anchor">
                                                    <img src="{{ url_assets('/energy_point_peleti/images/sizes/XXL.jpg')}}" alt="thumbnail" width="35" height="35" />
                                                </a>
                                            </div>
                                            <div class="select-option swatch-wrapper">
                                                <a href="#" title="Medium" class="swatch-anchor">
                                                    <img src="{{ url_assets('/energy_point_peleti/images/sizes/M.jpg')}}" alt="thumbnail" width="35" height="35" />
                                                </a>
                                            </div>
                                            <div class="select-option swatch-wrapper">
                                                <a href="#" title="Small" class="swatch-anchor">
                                                    <img src="{{ url_assets('/energy_point_peleti/images/sizes/S.jpg')}}" alt="thumbnail" width="35" height="35" />
                                                </a>
                                            </div>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="single_variation_wrap">
                                    <div class="variations_button">
                                        <div class="quantity">
                                            <input data-product-quantity name="quantity" type="number" class="input-text qty text" value="1" min="1" max="10">
                                        </div>
                                        <button class="button" value="{{$product->id}}" data-add-to-cart="">Додади во
                                            кошничка</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_meta">
                            @if(isset($product->sku))
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku }}</span></span>
                            @endif
                            <span class="posted_in">Категорија: <a href="#">{{ $product->categories[0]->title }}</a></span>
                            <span class="posted_in">Бренд: <a href="#">Energy Point Peleti</a></span>
                            <?php $variations = $product->variationValuesAndIds()->groupBy('name'); ?>
                           
                            <br>
                            <span><button class="btn_guide" data-toggle="modal" data-target="#modalSizes"> <strong>Водич за големини</strong></button></span>
                            <div class="modal fade" id="modalSizes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Водич за големини</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table tabela_sizes">
                                                <thead>
                                                    <tr>
                                                        <th>Големина</th>
                                                        <th>Обем на гради(cm)</th>
                                                        <th>Обем на колк(cm)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>34</td>
                                                        <td>76-81</td>
                                                        <td>84-89</td>
                                                    </tr>
                                                    <tr>
                                                        <td>36</td>
                                                        <td>81-86</td>
                                                        <td>90-94</td>
                                                    </tr>
                                                    <tr>
                                                        <td>38</td>
                                                        <td>86-91</td>
                                                        <td>95-99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>40</td>
                                                        <td>91-97</td>
                                                        <td>100-104</td>
                                                    </tr>
                                                    <tr>
                                                        <td>42</td>
                                                        <td>97-102</td>
                                                        <td>105-109</td>
                                                    </tr>
                                                    <tr>
                                                        <td>44</td>
                                                        <td>102-107</td>
                                                        <td>110-114</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal">Затвори</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            
                            <?php $variations = $product->variationValuesAndIds()->groupBy('name'); ?>
                            <?php $counter = 0 ?>
                            @if(!empty($variations) && count($variations) > 0)
                            @foreach($variations as $key => $value)
                            <h5 class="mt-30">{{ $key }}</h5>
                            @foreach($value as $v)
                            <label>
                                <input data-product-variation type="radio" value="{{$v->id}}" name="variation_{{ $counter }}" class="card-input-element variation_{{ $counter }}" />
                                <div class="panel panel-default card-input">
                                    <div class="panel-body">
                                        {{$v->value}}
                                    </div>
                                </div>
                            </label>
                            @endforeach
                            <br>
                            <?php $counter++ ?>
                            @endforeach
                            @endif
                            @if(isset($parentProducts) && !empty($parentProducts) && count($parentProducts) > 0)
                            <h5 class="mt-30">Боја</h5>
                            @foreach($parentProducts as $parentProduct)
                            <label>
                                <input data-product-parent type="radio" value="{{'/p/'.$parentProduct->id.'/'.$parentProduct->url}}" name="parent_product" class="card-input-element" />
                                <div class="panel panel-default card-input">
                                    <div class="panel-body">
                                        <img width="100" src="{{ ImagesHelper::getProductImage($parentProduct, $id = null, $size = 'lg_') }}" alt="">
                                    </div>
                                </div>
                            </label>
                            @endforeach
                            @elseif(isset($childrenProducts) && !empty($childrenProducts) && count($childrenProducts) >
                            0)
                            <h5 class="mt-30">Боја</h5>
                            @foreach($childrenProducts as $childrenProduct)
                            @if($childrenProduct->id != $product->id)
                            <label>
                                <input data-product-parent type="radio" value="{{'/p/'.$childrenProduct->id.'/'.$childrenProduct->url}}" name="parent_product" class="card-input-element" />
                                <div class="panel panel-default card-input">
                                    <div class="panel-body">
                                        <img width="100" src="{{ ImagesHelper::getProductImage($childrenProduct, $id = null, $size = 'lg_') }}" alt="">
                                    </div>
                                </div>
                            </label>
                            @endif
                            @foreach($childrenProduct->children as $childProduct)
                            @if($childProduct->id != $product->id)
                            <label>
                                <input data-product-parent type="radio" value="{{'/p/'.$childProduct->id.'/'.$childProduct->url}}" name="parent_product" class="card-input-element" />
                                <div class="panel panel-default card-input">
                                    <div class="panel-body">
                                        <img width="100" src="{{ ImagesHelper::getProductImage($childProduct, $id = null, $size = 'lg_') }}" alt="">
                                    </div>
                                </div>
                            </label>
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </div>
                        @if($product->description)
                        <div class="product_meta">
                            <h4>Опис</h4>
                            {!! $product->description !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="related products">
                        <div class="related-title">
                            <h3><span>Можеби ќе ве интересира</span></h3>
                        </div>
                        <ul id="related" class="products" data-columns="5">
                            @foreach($newestArticles as $product)
                            @include('clients.energy_point_peleti.partials.product')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<input type="hidden" name="broj_varijacii" value="{{count($variations)}}">

@stop

@section('scripts')
<script src="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('[data-product-parent]').checked = false;
        $('[data-product-parent]').on('change', function() {
            var parentProductUrl = $(this).val();
            window.location = parentProductUrl;
        });
        $('#related').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        })
    }); 
</script>
@stop