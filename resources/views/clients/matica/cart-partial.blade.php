<?php $totalPrice = 0; 
  $totalQuantity = 0;
  $newPrice = 0;

  $gradualDiscounts = \EasyShop\Models\GradualDiscount::with('products', 'items')->whereDate('start', '<=', \Carbon\Carbon::now()->format('Y-m-d'))->whereDate('end', '>=', \Carbon\Carbon::now()->format('Y-m-d'))->get();
  $products = session()->get('cart_products');

  if (count($gradualDiscounts) > 0 && count($products) > 0) {
      foreach ($gradualDiscounts as $gradualDiscount) {
          $numberOfCartProductsInGradualDiscount = 0;
          foreach ($gradualDiscount->products as $gradualDiscountProduct) {
              $gradualDiscountProductsIdArray[] = $gradualDiscountProduct->id;
          }
          foreach ($products as $product) {
              if (in_array($product['id'], $gradualDiscountProductsIdArray)) {
                  $numberOfCartProductsInGradualDiscount++;
              }
          }
          if ($numberOfCartProductsInGradualDiscount >= 1) {
              $selectedGradualDiscount = $gradualDiscount;
          }
      }
  }

  // //// Promocija za matica - cat 34
  // $productsPromocijaMatica = \EasyShop\Models\ProductCategory::where('category_id', 34)->get();
  // $productsPromocijaMaticaIds = [];
  // foreach($productsPromocijaMatica as $productPromocijaMatica) {
  //     $productsPromocijaMaticaIds[] = $productPromocijaMatica->product_id;
  // }

  // $totalQuantityPromocijaMatica = 0;
  // if (session()->has('cart_products')) {
  //   foreach (session()->get('cart_products') as $productItem) {
  //     $productItem = (object)$productItem;
  //     if (in_array($productItem->id, $productsPromocijaMaticaIds)) {
  //         $totalQuantityPromocijaMatica += (int)$productItem->quantity;
  //     }
  //   }
  // }
  // //// ==Promocija matica


  // == Promocija an site
  $totalQuantityPromocijaMatica = 0;
  if(isset($selectedGradualDiscount) && !is_null($selectedGradualDiscount)) {
    foreach($products as $product) {
      $newPrice += $product['price']; 
    }

    foreach($selectedGradualDiscount->products as $gradualDiscountProduct) {
      $gradualDiscountProductIds[] = $gradualDiscountProduct->id;  
    }
    
    foreach ($products as $productItem) {
      if (in_array($productItem['id'], $gradualDiscountProductIds)) {
        $totalQuantityPromocijaMatica += (int)$productItem['quantity'];
      }
    }

    foreach ($products as $productItem) {
      foreach($selectedGradualDiscount->items as $item) {
        if ($totalQuantityPromocijaMatica >= $item->number_of_items && in_array($productItem['id'], $gradualDiscountProductIds)) {
          $newPrice = $newPrice - ($item->discount_percentage/100 * $productItem['price'] * (int)$productItem['quantity']);
          break;
        }
      }
    }
  }
?>
@if (session()->has('cart_products') && count(session('cart_products')))
<ul>
  @foreach(session()->get('cart_products') as $product)
  <?php $product = (object)$product;    
    $productMatica = \EasyShop\Models\Product::find($product->id);
    if(isset($productMatica->bundle_price_type) && $productMatica->bundle_price_type == 'percent') {
      $bundleProducts = \EasyShop\Models\Product::whereIn('id', $product->bundle_items[0])->get();
      $bundleProductPrices = 0;
      foreach($bundleProducts as $bundleProduct) {
        $bundleProductPrices += (int)$bundleProduct->price_retail_1;
      } 
      $bundlePriceDiscounted = $bundleProductPrices - (($product->price/100) * $bundleProductPrices);
      $totalPrice += (int)$bundlePriceDiscounted;
    } else {
      $totalPrice += (int)$product->price * $product->quantity;
    }
    $totalQuantity += $product->quantity;

    // //Matica
    // if (in_array($product->id, $productsPromocijaMaticaIds)) { // Cat 34 Promocija
    //     if ($totalQuantityPromocijaMatica >= 10) {
    //       $newPrice += (int)$product->price * (int)$product->quantity -  (65/100 * (int)$product->price * (int)$product->quantity);
    //     } else if ($totalQuantityPromocijaMatica >= 8) {
    //       $newPrice += (int)$product->price * (int)$product->quantity -  (50/100 * (int)$product->price * (int)$product->quantity);
    //     } else if ($totalQuantityPromocijaMatica >= 6) {
    //       $newPrice += (int)$product->price * (int)$product->quantity -  (40/100 * (int)$product->price * (int)$product->quantity);
    //     } else if ($totalQuantityPromocijaMatica >= 4) {
    //       $newPrice += (int)$product->price * (int)$product->quantity -  (30/100 * (int)$product->price * (int)$product->quantity);
    //     } else if ($totalQuantityPromocijaMatica >= 2) {
    //       $newPrice += (int)$product->price * (int)$product->quantity -  (20/100 * (int)$product->price * (int)$product->quantity);
    //     }
    // } else {
    //   $newPrice += (int)$product->price * $product->quantity;
    // }

    // ==Matica
  ?>
  <li>
    <a href="{{$product->url}}">
      <figure><img src="{{ $product->image }}" height="50" class="lazy"></figure>
      @if(isset($productMatica->bundle_price_type) && $productMatica->bundle_price_type == 'percent')
      <strong><span>{{$product->title}} x {{$product->quantity}}</span>{{ (int)$product->price }}% попуст на вкупната
        сума</strong>
      @else
      <strong><span>{{$product->title}} x {{$product->quantity}}</span>{{ (int)$product->price * $product->quantity}}
        ден</strong>
      @endif
    </a>
  </li>
  @endforeach
</ul>
@else
<div class="pb-2">Вашата кошничка моментално е празна</div>
@endif
<div class="total_drop">
  <?php 
      // if ($totalQuantity >=4) {
      //   $newPrice = $totalPrice - (30/100 * $totalPrice);
      // }
    ?>
  <div class="clearfix"><strong>Вкупно</strong>
    @if($totalQuantityPromocijaMatica >= 1)
    <span class="cart_old-price">{{ $totalPrice }} мкд</span> <span>{{ number_format($newPrice, 0, ",", ".") }} мкд</span>
    @else
    <span>{{ $totalPrice }} мкд</span>
    @endif
  </div>
  <a href="{{ URL::to('/cart') }}" class="btn_1">Кошничка</a>
</div>