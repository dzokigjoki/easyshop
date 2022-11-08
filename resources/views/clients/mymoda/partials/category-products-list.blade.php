<style>
  .no-active-label {
    padding: 50px;
    text-align: center;
  }

  .ps-product__title {
    overflow: hidden !important;
   text-overflow: ellipsis !important;
   display: -webkit-box !important;
   -webkit-line-clamp: 1 !important; /* number of lines to show */
   -webkit-box-orient: vertical !important;
}
</style>
<div class="row products">
  @if(count($products) > 0)
  @foreach($products as $product)
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
    <a href="/p/{{$product->id}}/{{$product->url}}">
      <div class="ps-product--1" data-mh="product-item">
        <div class="ps-product__thumbnail">
          @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
          <?php
        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
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

@if($count > 0)
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
@endif