<div class="grid_item">



  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
  <?php
  
    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
    
    if($product->price != 0){
    $discountPercentage = (($product->price - $discount)/$product->price)*100;
    }
?>
  @if(isset($discountPercentage))
  <span class="ribbon off">-{{ (int)$discountPercentage }}%</span>
  @endif
  @endif
  

  <figure>
    <a href="/p/{{$product->id}}/{{$product->url}}">
      <img class="img-fluid lazy" src="{{url_assets('/clarissabalkan/img/products/product_placeholder_square_medium.jpg')}}"
        data-src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="{{$product->title  }}">
    </a>
  </figure>
  <a href="/p/{{$product->id}}/{{$product->url}}">
    <h3>{{$product->title}}</h3>
  </a>

  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <?php
              $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
              ?>

  @endif

  <div class="price_box">
    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
    <span class="new_price">{{number_format($discount, 0, ',', '.')}} мкд.</span>
    <span class="old_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
    @else
    <span class="new_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
    @endif
  </div>
  <ul>
    @if(auth()->user())
    <li><a data-add-to-wish-list="" value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip" data-placement="left"
        title="Додади во листа на желби"><i class="ti-heart"></i><span>Додади во листа на желби</span></a></li>
    @endif
    {{-- <li><a data-add-to-compare="" value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip"
        data-placement="left" title="Додади за компарација"><i class="ti-control-shuffle"></i><span>Додади за
          компарација</span></a>
    </li> --}}
    <li><a data-add-to-cart="" value="{{$product->id}}" class="tooltip-1" data-toggle="tooltip"
        data-placement="left" title="Купи"><i class="ti-shopping-cart"></i><span>Купи</span></a></li>
  </ul>
</div>