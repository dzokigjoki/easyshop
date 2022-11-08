@extends('clients.mymoda.layouts.default')
@section('content')


<style>
  .filter-att {
    padding: 0 20px;
  }

  .old-checkbox {
    display: none;
  }

  .filter-label {
    padding-left: 10px;
    font-weight: 400;
  }

  .att-list {
    padding-top: 10px !important;
  }

  .check {
    cursor: pointer;
    position: relative;
    margin: auto;
    width: 18px;
    height: 18px;
    -webkit-tap-highlight-color: transparent;
    transform: translate3d(0, 0, 0);
  }

  .check:before {
    content: "";
    position: absolute;
    top: -15px;
    left: -15px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(34, 50, 84, 0.03);
    opacity: 0;
    transition: opacity 0.2s ease;
  }

  .check svg {
    position: relative;
    z-index: 1;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke: #c8ccd4;
    stroke-width: 1.5;
    transform: translate3d(0, 0, 0);
    transition: all 0.2s ease;
  }

  /* 
  span.irs-slider.to {
    background-color: #c8ccd4 !important;
  } */

  /* span.irs-slider.to.last {
    background-color: #c8ccd4 !important;
  } */

  .check svg path {
    stroke-dasharray: 60;
    stroke-dashoffset: 0;
  }

  .check svg polyline {
    stroke-dasharray: 22;
    stroke-dashoffset: 66;
  }

  .check:hover:before {
    opacity: 1;
  }

  .check:hover svg {
    stroke: #ca2028;
  }

  span.irs-slider.from {
    background-color: #ca2028;
  }

  span.irs-slider.to {
    background-color: #ca2028;
  }

  .old-checkbox:checked+.check svg {
    stroke: #ca2028;
  }

  .old-checkbox:checked+.check svg path {
    stroke-dashoffset: 60;
    transition: all 0.3s linear;
  }

  .old-checkbox:checked+.check svg polyline {
    stroke-dashoffset: 42;
    transition: all 0.2s linear;
    transition-delay: 0.15s;
  }
</style>

<main class="ps-main">
  <div class="container">
    <div class="row">
     
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="ps-shop">
          <h2>Резултати од пребарувањето - "{{$search}}"</h2>
          <div class="ps-filter ps-filter--shop-sidebar">
        
       
          </div>
          <style>
            .no-active-label {
              padding: 50px;
              text-align: center;
            }
          </style>
          <div class="row products">
            @if(count($products) > 0)
            @foreach($products as $product)
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <a href="/p/{{$product->id}}/{{$product->url}}">
                <div class="ps-product--1" data-mh="product-item">
                  <div class="ps-product__thumbnail">
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <?php
                  $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                  if($product->price != 0){
                  $discountPercentage = (($product->price - $discount)/$product->price)*100;
                  }
                  ?>
                    @if(isset($discountPercentage))
                    <div class="ps-badge ps-badge--sale-hot ps-badge--1st"><span>-{{ (int)$discountPercentage }}%</span>
                    </div>
                    @endif
                    @endif
                    <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="">
                  @if(auth()->user())
          
                    <a
                      class="ps-product__wishlist hidden-xs" data-add-to-wish-list value="{{$product->id}}">
                    <img class="wish-icon" src="{{url_assets('/mymoda/images/icons/wish-icon.png')}}" alt="">  
                    </a>
                    @endif
                    
                    
                    <a
                      class="ps-btn ps-product__shopping hidden-xs" data-add-to-cart="" value="{{$product->id}}"><i
                        class="exist-minicart"></i>Купи</a>
          
                      
                  </div>
                  <div class="ps-product__content"><a class="ps-product__title"
                      href="/p/{{$product->id}}/{{$product->url}}">
                      {{$product->title}}</a>
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <span class="ps-product__price">
                      <span class="discounted-price">
                        {{$discount}}
                        МКД
                      </span>
                      <del class="old-price">
                        {{number_format($product->price, 0, ',', '.')}} МКД
                      </del>
                    </span>
                    @else
                    <span class="ps-product__price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                    @endif
          
                  </div>
                            <div class="text-center">
                    <a class="ps-btn visible-xs" style="margin-top: 10px;" data-add-to-cart="" value="{{$product->id}}"><i
                        class="exist-minicart"></i></a>
                        <a class="ps-btn visible-xs" style="margin-top: 10px;" data-add-to-wish-list value="{{$product->id}}"><i
                          class="fa fa-heart"></i></a>
                  </div>
                  
                
                </div>
              </a>
            </div>
            @endforeach
            @else
            <h1 class="no-active-label">Нема активни продукти</h1>
            @endif
          
          </div>
          
          {{-- @if($count > 0)
          <div class="ps-shop__morelink text-center mt-40">
            <div class="ps-pagination">
              <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden;"@endif><a href="javascript://"
                    data-page="{{$productFilters->page - 1}}"><i class="fa fa-angle-left"></i></a></li>
                @foreach(range(1, $totalPages) as $page)
                @if($productFilters->page == $page)
                <li class="active"><a href="javascript://">{{$page}}</a></li>
                @elseif($page == 1)
                <li><a href="javascript://" data-page="1">1...</a></li>
                @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <li><a href="javascript://"
                    data-page="{{$page}}">{{$page}}</a></li>
                  @elseif($page == $totalPages)
                  <li><a href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a></li>
                  @endif
                  @endforeach
                  <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                    <a href="javascript://" data-page="{{$productFilters->page + 1}}">
                      <i class="ion-chevron-right"></i>
                    </a>
                  </li>
              </ul>
            </div>
          </div>
          @endif --}}
        </div>
      </div>
    </div>
  </div>
</main>
@stop