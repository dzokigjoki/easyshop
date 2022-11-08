@extends('clients.hotspot.layouts.default')
@section('content')
<style>
  .category-image {
    border: 1px solid #dddddd;
    width: 100%;
  }

  .mb-35 {
    margin-bottom: 35px;
  }
  .mt-15 {
    margin-top: 15px;
  }
</style>
<main class="ps-main" style="padding-top: 30px">
  <div class="container">
    <div class="ps-shop row">
      @foreach($categoriesChunked as $categoriesRows)
        @foreach ($categoriesRows as $item)
          @if($item->parent == $category->id)
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            <a href="{{route('category', [$item->id, $item->url])}}">
              <div class="ps-product--1" data-mh="product-item">
                <div class="ps-product__thumbnail text-center">
                  @if($item->image)
                  <img style="height: 350px; width: auto;" class="category-image" src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                  @else
                  <img class="category-image"
                    src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png" alt="">
                  @endif
                </div>
                <div class="ps-product__content text-center mb-35 mt-15"><a style="font-size: 24px; font-weight: 500;" class="ps-product__title" href="{{route('category', [$item->id, $item->url])}}">
                    {{$item->title}}</a>
                </div>
              </div>
            </a>
          </div>
          @endif
        @endforeach
      @endforeach
    </div>

  </div>
</main>

@stop