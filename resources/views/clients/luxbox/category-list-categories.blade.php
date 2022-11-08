@extends('clients.luxbox.layouts.default')
@section('content')
<div class="page-content">


  <!-- Categories Section -->
  <section class="categories-hp-1 categories-product-page section-box">
    <div class="container">
      <div class="categories-content">
        <div class="row">
          <div class="col-lg-12">
            <h6 class="special-heading">{{ $category->title }}</h6>
          </div>
          @foreach($categoriesChunked as $categoriesRows)
          @foreach ($categoriesRows as $item)

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="categories-detail lighting">
              <a @if($item->title=="П маси")
                href="/naskoro"
                @else
                href="{{route('category', [$item->id, $item->url])}}"
                @endif
                class="images">
                @if($item->image)
                <img class="category-image" src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                @else
                <img src="{{url_assets('/luxbox/images/hp-1-categories-1.jpg')}}" alt="">
                @endif
                <div class="product">
                  <a @if($item->title=="П маси")
                    href="/naskoro"
                    @else
                    href="{{route('category', [$item->id, $item->url])}}"
                    @endif
                    >
                    <span class="name">
                      <span class="line">- </span>
                      {{ $item->title }}
                    </span>
                  </a>
                </div>
            </div>
          </div>
          @endforeach
          @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- End Categories Section -->
</div>

@stop