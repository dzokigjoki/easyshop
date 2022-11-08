@extends('clients.topprodukti.layouts.default')
@section('content')
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">{{trans('topprodukti.search')}} - {{$search}}</h1>
          <label></label>
<form action="{{URL::to('/search')}}">
          <div class="row">
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Keywords" value="{{$search}}" name="search">
            </div>
            <div class="col-sm-3">
              <input type="submit" class="btn btn-primary" id="button-search" value="{{trans('topprodukti.find')}}">
            </div>
          </div>
          <br>

          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"></button>
                </div>
              </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">Подреди:</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select onchange="this.form.submit()" name="sort_by" class="form-control col-sm-3">
                  <option @if($order_by == "title_asc" || empty($order_by)) selected="" @endif  value="title_asc">{{trans('topprodukti.name')}} (A - Z)</option>
                  <option @if($order_by == "title_desc") selected="" @endif  value="title_desc">{{trans('topprodukti.name')}} (Z - A)</option>
                  <option @if($order_by == "price_asc") selected="" @endif  value="price_asc">{{trans('topprodukti.price')}} ({{trans('topprodukti.high')}}) </option>
                  <option @if($order_by == "price_desc") selected="" @endif  value="price_desc">{{trans('topprodukti.price')}} ({{trans('topprodukti.low')}}) </option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">{{trans('topprodukti.show')}}:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select onchange="this.form.submit()" name="results_limit" class="form-control">
                  <option @if($results_limit == 20) selected="" @endif value="20" selected="selected">20</option>
                  <option @if($results_limit == 50) selected="" @endif  value="50">50</option>
                  <option @if($results_limit == 75) selected="" @endif  value="75">75</option>
                  <option @if($results_limit == 100) selected="" @endif  value="100">100</option>
                </select>
              </div>
            </div>
          </div>
</form>
          <br />
          <div class="row products-category">
            
@foreach($products as $product)
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" alt="{{$product->title}} " title="{{$product->title}}" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="{{route('product', [$product->id, $product->url])}}"> {{$product->title}} </a></h4>
                    <p class="price"> @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                  <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                  <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @else
                  <span class="price">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span> 
                @endif</p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" value="{{$product->id}}" data-add-to-cart  type="button" onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
                  </div>
                </div>
              </div>
            </div>
@endforeach
          </div>
          <div class="pull-right row">
            <div class="col-sm-12 col-md-12 text-center">
              @if ($products && count($products))
                <li style="list-style-type: none;">{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
              @endif
            </div>
            
          </div>
        </div>
        <!--Middle Part End -->
      </div>
@endsection
@section('scripts')

@endsection