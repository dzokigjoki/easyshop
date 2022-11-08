@extends('clients.shopathome.layouts.default')
@section('content')
<style>
.team-box {
    text-align: center;
}
</style>


    <div class="testimonials2">
        <div class="container">
            <div class="title">
                <h1> {{$category->title}} </h1>
                <div class="title-border"></div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6">
                            <div class="team-box">
                                <a href="{{route('blog', [$post->id, $post->url])}}">
                                    {{--<img src="/assets/shopathome/upload/teamabout1.jpg" alt="">--}}
                                    @if($post->image)
                                    <img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}">
                                    @endif
                                    <h4>{{$post->title}}</h4>
                                {{--{!! $post->short_description !!}--}}
                                </a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection