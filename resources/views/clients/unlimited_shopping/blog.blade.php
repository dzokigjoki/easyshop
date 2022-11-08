@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <div class="container">
        <div class="row">
            @if($blog->image)
                <div class="col-sm-12 text-center mb-20 mt-20">
                    <img src="{{\ImagesHelper::getBlogImage($blog)}}" alt="{{$blog->title}}" class="img-responsive" style="margin: 0 auto;">
                </div>
            @endif
            <div class="col-sm-12 text-center mb-20">
                <h1>
                    {{$blog->title}}
                </h1>
            </div>
            <div class="col-sm-12 pt-10 pb-10" style="min-height: 200px;">
                  {!! $blog->description !!}
            </div>
        </div>
    </div>

@endsection