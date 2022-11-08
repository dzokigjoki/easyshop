@extends('clients.shopathome.layouts.default')
@section('content')
<style>
    .margin-auto {
        margin: 0 auto !important;
    }
</style>
<div class="testimonials2">
    <div class="container">
        <div class="title">
            <h1> {{$category->title}} </h1>
            <div class="title-border"></div>
        </div>
        <div class="row">
            @foreach($categoriesChunked as $categoriesRows)
                {{--{{dd($categoriesChunked)}}--}}
                @foreach ($categoriesRows as $item)
            <div class="col-md-6 col-lg-4">
                <div class="">
                    <a href="{{route('category', [$item->id, $item->url])}}">
                        {{--<img src="/assets/shopathome/upload/teamabout1.jpg" alt="">--}}
                        <img src="{{\ImagesHelper::getCategoryImage($item)}}" class="margin-auto img-responsive"
                             alt="{{$item->title}}">
                    </a>
                    <h4>{{$item->title}}</h4>
                    <div class="team-border"></div>
                </div>
            </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection