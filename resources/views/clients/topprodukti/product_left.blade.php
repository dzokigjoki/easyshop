      <!--Right Part Start -->
        <aside id="column-left" class="col-sm-12 hidden-xs">
          <h3 class="subtitle">{{trans('topprodukti.newest')}}</h3>
          <div class="side-item">
@foreach($newestArticles as $product)
            <div class="product-thumb clearfix">
              <div class="image">
                <a href="{{ route('product', [$product->id, $product->url]) }}">
                  <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
                </a>
              </div>
              <div class="caption">
                <h4><a href="{{ route('product', [$product->id, $product->url]) }}">{{$product->title}}</a></h4>
                <p class="price">
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                  <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @else
                  <span class="price">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @endif
                </p>
              </div>
            </div>
@endforeach
          </div>
      </aside>
        <!--Right Part End -->