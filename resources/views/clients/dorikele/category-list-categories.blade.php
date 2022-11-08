@extends('clients.dorikele.layouts.default')
@section('content')
    <div id="product-grid"
         class="section-block grid-container products fade-in-progressively no-padding-top pb-80"
         data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
         data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-4">
                    @foreach($categoriesChunked as $categoriesRows)
                        @foreach($categoriesRows as $item)
                            <div style="min-height: 470px;" class="grid-item product portrait grid-sizer">
                                <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                     data-hover-speed="700" data-hover-bkg-color="#000000"
                                     data-hover-bkg-opacity="0.01">
                                    <a class="overlay-link" href="{{route('category', [$item->id, $item->url])}}">
                                        <img style="min-height: 350px;" data-src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                                    </a>
                                </div>
                                <div class="product-details center">
                                    <h3 class="product-title">
                                        <a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection




