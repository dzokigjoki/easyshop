        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <div itemscope itemtype="">
            <h1 class="title" itemprop="name">{{$product->title}}</h1>
            <div class="row product-info">
              <div class="col-sm-5">
                <div class="image">
                    <img class="img-responsive" itemprop="image" id="zoom_01" src="{{URL::to('/')}}/{{$product->image}}" title="{{$product->title}}" alt="{{$product->title}}" data-zoom-image="{{URL::to('/')}}/{{$product->image}}" /> 
                </div>
                <div class="center-block text-center" style="display: none;" data-zoom-galery="">
                  <span class="zoom-gallery">
                    <i class="fa fa-search"></i> кликни на сликата за галерија
                  </span>
                </div>
                <div class="image-additional" id="gallery_01">
                @if(count($product->images))
                  <a class="thumbnail" href="#" data-thumbnail="" data-zoom-image="{{URL::to('/')}}/{{$product->image}}" data-image="{{URL::to('/')}}/{{$product->image}}" title="{{$product->title}}">   <img src="{{URL::to('/')}}/{{$product->image}}" title="{{$product->title}}" alt = "{{$product->title}}"/>
                  </a>
                @endif
                @foreach($product->images as $img)
                  <a class="thumbnail" href="#" data-thumbnail="" data-zoom-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}" title="{{$product->title}}">
                      <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}" title="{{$product->title}}" alt = "{{$product->title}}"/>
                  </a>
                @endforeach
                </div>

                @include('clients.topprodukti.product_left')

              </div>
              <div class="col-sm-7">
                <ul class="list-unstyled description">   
                  <li><b>{{trans('topprodukti.code')}}:</b> <span itemprop="mpn">{{$product->unit_code}}</span></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                  <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @else
                  <span class="price">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @endif
                  </li>
                </ul>
                <div id="product">
                  @if(!$product->variationValuesAndIds()->isEmpty())
                  <div class="form-group required">
                    <label class="control-label">Големина:</label>
                    <select data-product-variation class="form-control" id="input-option200" name="option[200]">
                      @foreach($product->variationValuesAndIds() as $variations)
                          <option value="{{$variations->id}}">{{$variations->value}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif
                 
                  
                  <div class="cart">
                    <div>
                      <div class="qty">
                        <label class="control-label" for="input-quantity">Количина</label>
                        <input data-product-quantity="" type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <button data-add-to-cart type="button" id="button-cart" class="btn btn-primary btn-lg">{{trans('topprodukti.orderHere')}}</button>
                    </div>
                    <div>
                    </div>
                  </div>
                 
                </div>
                <!-- AddThis Button BEGIN -->
                {{-- <div class="addthis_toolbox addthis_default_style">  </div>     --}}

                <img src="/assets/topprodukti/image/garancija.png?v=2" id="garancija">
                <div class="product-sp">
                  <p style="font-size: 20px;">&middot; {{trans('topprodukti.orderWithoutRisk')}}</p>
                  <p style="font-size: 20px;">&middot; {{trans('topprodukti.deliveryEverywhere')}}</p>
                  <p style="font-size: 20px;">&middot; {{trans('topprodukti.payOnDelivery')}}</p>
                  <p style="font-size: 20px;">&middot; {{trans('topprodukti.fastDelivery')}}</p>
                </div>
                <!-- AddThis Button END -->


                {{-- Desc --}}
                <ul class="nav nav-tabs" style="padding-top: 10px;">
                  <li class="active"><a href="#tab-description" data-toggle="tab">{{trans('topprodukti.description')}}</a></li>
                </ul>
                <div class="tab-content">
                  <div itemprop="description" id="tab-description" class="tab-pane active" style="font-size: 11pt;">
                    <div class="customiFrame">
                      {!!$product->description!!}
                    </div>
                  </div>
                </div>
                {{-- /Desc --}}

              </div>
            </div>



            



            <h3 class="subtitle">{{trans('topprodukti.productFromSameCategory')}}</h3>
            <div class="owl-carousel related_pro">
@foreach($relatedProducts as $product)
              <div class="product-thumb">
                <div class="image">
                <a href="{{route('product', [$product->id, $product->url])}}">
                  <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
                </a>
                </div>
                <div class="caption">
                  <h4>
                  <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h4>
                  <p class="price"> 
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                  <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @else
                  <span class="price">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @endif
                    
                  </p>                  
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
                </div>
              </div>
@endforeach
            </div>
          </div>
        </div>
        <!--Middle Part End -->