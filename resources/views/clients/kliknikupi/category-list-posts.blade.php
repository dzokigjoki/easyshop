@extends('clients.kliknikupi.layouts.default')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Почетна</a></li>
                <li>Совети</li>
            </ul>
        </div>
    </div>
    <!-- Content -->
    <div id="pageContent">
        <div class="container offset-18">
            {{--<h3 class="block-title large">Совети</h3>--}}
            <div class="row">
                <div class="col-xs-12">
                    @foreach($posts as $post)
                        <div class="col-sm-6 col-md-4">
                            <div class="post has-post-thumbnail">
                                <div class="title-block">
                                    <div class="post-img">
                                        <a href="{{route('blog',[$post->id,$post->url])}}"><img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}" alt=""></a>
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{route('blog',[$post->id,$post->url])}}">{{$post->title}}</a></h2>
                                    </div>

                                </div>
                                <div class="description" style="min-height: 100px;">
                                   {!! $post->short_description !!}
                                </div>

                                {{--<div class="optional-block">--}}
                                    {{--<div class="post-link-more">--}}
                                        {{--<a href="{{route('blog',[$post->id,$post->url])}}" class="btn btn-underline">Види повеќе</a>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            </div>
                        </div>






                        {{--<div class="post">--}}
                            {{--<div class="title-block">--}}
                                {{--<div class="post-title">--}}
                                    {{--<h2><a href="#">{{$post->title}}</a></h2>--}}
                                {{--</div>--}}

                                {{--<div class="post-img">--}}
                                    {{--<a href="{{route('blog', ['id'=>$post->id, 'url'=>$post->url])}}">--}}
                                        {{--<img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}" alt="">--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="description">--}}
                                {{--{!! $post->short_description !!}  </div>--}}

                            {{--<div class="optional-block">--}}
                                {{--<div class="post-link-more">--}}
                                    {{--<a href="{{route('blog', ['id'=>$post->id, 'url'=>$post->url])}}" class="btn btn-underline">Види повеќе</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection