@extends('clients.topprodukti.layouts.default')
@section('content')
<div class="row home-top-sliders">
  <div class="col-sm-8">
    <!-- Slideshow Start-->
    <div class="slideshow single-slider owl-carousel home-top-slider" style="border:1px solid #ccc;background: #fff;">
      <div class="item" > <a href="{{trans('topprodukti.baner1')}}"><img class="img-responsive" src="{{ trans('topprodukti.banerImage1')  }}"  /></a></div>
      <div class="item" > <a href="{{trans('topprodukti.baner2')}}"><img class="img-responsive" src="{{ trans('topprodukti.banerImage2')  }}"  /></a></div>
      <div class="item" > <a href="{{trans('topprodukti.baner3')}}"><img class="img-responsive" src="{{ trans('topprodukti.banerImage3')  }}" /></a></div>

    </div>
    <!-- Slideshow End-->
  </div>
  <div class="col-sm-4 pull-right flip">
    <div class="marketshop-banner">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid #ccc;background: #fff;"> <a href="{{trans('topprodukti.baner4')}}" ><img title="sample-banner1" alt="sample-banner1" src="{{ trans('topprodukti.banerImage4')  }}"></a></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid #ccc;background: #fff;"> <a href="{{trans('topprodukti.baner5')}}" ><img title="sample-banner" alt="sample-banner" src="{{ trans('topprodukti.banerImage5')  }}"></a></div>
      </div>
    </div>
  </div>
</div>

<!-- Bestsellers Product Start-->
<h3 class="subtitle">{{trans('topprodukti.quantity')}}</h3>
<div class="owl-carousel product_carousel">   
  @foreach($bestSellersArticles as $product)
  <div class="product-thumb clearfix">
    <div class="image">
      <a href="{{route('product', [$product->id, $product->url])}}">
        <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
      </a>
    </div>
    <div class="caption">
      <h4>
        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
      </h4>
      @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
       <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 

      @else
        <p class="price"> {{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}} </p>
      @endif            
    </div>
    <div class="button-group">
      <button data-add-to-cart class="btn-primary" type="button" value="{{$product->id}}" onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
    </div>
  </div>
  @endforeach
</div>
<!-- Featured Product End-->
<!-- Banner Start -->
<div class="marketshop-banner">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="{{trans('topprodukti.baner6')}}"><img style="border:1px solid #ccc;" src="{{ trans('topprodukti.banerImage6')  }}"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="{{trans('topprodukti.baner7')}}"><img style="border:1px solid #ccc;" src="{{ trans('topprodukti.banerImage7')  }}"></a></div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="{{trans('topprodukti.baner8')}}"><img style="border:1px solid #ccc;" src="{{ trans('topprodukti.banerImage8')  }}"></a></div>
  </div>
</div>
<!-- Banner End-->
<!-- Categories Product Slider Start-->
<div class="category-module" id="latest_category">
  <h3 class="subtitle">{{trans('topprodukti.recommended')}}</h3>
  <div class="category-module-content">
    <div id="tab-cat1" class="tab_content">
      <div class="owl-carousel latest_category_tabs">
        @foreach($recommendedArticles as $product)
        <div class="product-thumb clearfix">
          <div class="image">
            <a href="{{route('product', [$product->id, $product->url])}}">
              <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
            </a>
          </div>
          <div class="caption">
            <h4>
              <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
            </h4>
            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
       <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 

      @else
        <p class="price"> {{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}} </p>
      @endif          
          </div>
          <div class="button-group">
            <button data-add-to-cart class="btn-primary" type="button" value="{{$product->id}}" onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Categories Product Slider End-->
<!-- Categories Product Slider Start -->
<h3 class="subtitle">{{trans('topprodukti.newest')}}</h3>
<div class="owl-carousel latest_category_carousel">
  @foreach($newestArticles as $product)
  <div class="product-thumb clearfix">
    <div class="image">
      <a href="{{route('product', [$product->id, $product->url])}}">
        <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
      </a>
    </div>
    <div class="caption">
      <h4>
        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
      </h4>
      @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
       <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 

      @else
        <p class="price"> {{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}} </p>
      @endif           
    </div>
    <div class="button-group">
      <button data-add-to-cart class="btn-primary" type="button" value="{{$product->id}}" onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
    </div>
  </div>
  @endforeach  
</div>
<!-- Categories Product Slider End -->
@endsection
