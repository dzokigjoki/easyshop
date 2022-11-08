@extends('clients.fitactive.layouts.default')
@section('content')
<style>
  .category-image {
    border: 1px solid #dddddd;
  }
  .no-active-label {
    padding: 50px;
    text-align: center;
  }
</style>
<main class="ps-main" style="padding-top: 30px">
  <div class="container">
    <div class="ps-shop">
      @if(count($categoriesChunked) > 0)
      @foreach($categoriesChunked as $categoriesRows)
        @foreach ($categoriesRows as $item)
          @if($item->parent == $category->id)
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            <a href="{{route('category', [$item->id, $item->url])}}">
              <div class="ps-product--1" data-mh="product-item">
                <div class="ps-product__thumbnail">
                  @if($item->image)
                  <img src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                  @else
                  <img class="category-image"
                    src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png" alt="">
                  @endif
                </div>
                <div class="ps-product__content"><a class="ps-product__title" href="{{route('category', [$item->id, $item->url])}}">
                    {{$item->title}}</a>
                </div>
              </div>
            </a>
          </div>
          @endif
        @endforeach
      @endforeach
    @else 
    <h1 class="no-active-label">Нема активни категории</h1>
      @endif
    
    </div>

  </div>
</main>

@stop