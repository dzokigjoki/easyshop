<!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="{{URL::to('/')}}"><img class="img-responsive" src="{{\EasyShop\Models\AdminSettings::getField('logo')}}" title="TopProdukti" alt="TopProdukti" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Search Start-->
          <div class="search-col col-table-cell col-lg-5 col-md-5 col-md-push-0 col-sm-6 col-sm-push-6 col-xs-12">
            <div id="search" class="input-group">
              <form action="{{URL::to('/search')}}">
                <input id="filter_name" type="text" name="search" value="" placeholder="{{trans('topprodukti.search')}}" class="form-control input-lg" />
                <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>            
          <!-- Search End-->
          <!-- Mini Cart Start-->
<?php $totalPrice = 0; $totalProducts = 0;?>
          <div class="col-table-cell col-lg-3 col-md-3 col-md-pull-0 col-sm-6 col-sm-pull-6 col-xs-12 inner cart-holder">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle"> <span class="cart-icon pull-left flip"></span> 
              @if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $pid => $product)
                          <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
              @endforeach
              @endif
              <span id="cart-total">              
              <span id="cart-total-quan"><?php echo $totalProducts; ?></span> {{trans('topprodukti.products')}} - <span id="cart-total-price"><?php echo $totalPrice; ?></span>
               {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></button>
              <ul class="dropdown-menu" id="shoppingCart">
                <li>
                  <table class="table">
                    <tbody>
                      
                      @if (Session::has('cart_products'))
                          @foreach(session()->get('cart_products') as $pid => $product)
                          <?php $product = (object)$product; ?>
                      <tr>
                        <td class="text-center"><a href="{{$product->url}}"><img class="img-thumbnail" title="{{$product->title}}" alt="{{$product->title}}" src="{{$product->image}}"></a></td>
                        <td class="text-left"><a href="{{$product->url}}">{{$product->title}}
                            @if(isset($product->variation_value))
                                ({{$product->variation_value}})
                            @endif

                            </a></td>
                        <td class="text-right">x {{$product->quantity}}</td>
                        <td class="text-right">{{$product->quantity * $product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>{{trans('topprodukti.total')}}</strong></td>
                          <td class="text-right">{{$totalPrice}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="{{route('cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {{trans('topprodukti.cart')}}</a></p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
        </div>
      </div>
    </header>
    <!-- Header End-->