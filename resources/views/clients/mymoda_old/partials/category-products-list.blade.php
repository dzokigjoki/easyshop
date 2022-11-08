<div class="row">
  @if(count($products) > 0)
  {{-- @foreach($/) --}}
  @foreach($products as $product)
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
    <div class="ps-product--1" data-mh="product-item">
      <div class="ps-product__thumbnail">
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <?php
        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
        $price = $product->$myPriceGroup;
        $discountPercentage = (($price - $discount)/$price)*100;
        ?>
        <div class="ps-badge ps-badge--sale-off ps-badge--1st"><span>-{{ (int)$discountPercentage }}%</span></div>
        @endif

        <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt=""><a
          class="ps-btn ps-product__shopping" data-add-to-cart="" value="{{$product->id}}"><i
            class="exist-minicart"></i>Купи</a>
      </div>
      <div class="ps-product__content"><a class="ps-product__title" href="product-detail-1.html">{{$product->title}}</a>
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <span
          class="ps-product__price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
          МКД
          <del>
            {{number_format($product->$myPriceGroup, 0, ',', '.')}} МКД
          </del>
        </span>
        @else
        <span class="ps-product__price">{{number_format($product->$myPriceGroup, 0, ',', '.')}} МКД</span>
        @endif
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>