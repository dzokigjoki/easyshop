@extends('clients.crystal-bella.layouts.default')
@section('content')

    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <h1 class="text-center">Блог</h1>
                    <div class="main-content">
                        <div class="posts" data-layout="default">
                            <div class="posts-wrap posts-layout-default">
                                @foreach($posts as $post)
                                    <article class="hentry col-md-4 col-sm-6 col-xs-12">
                                        <div class="hentry-wrap">
                                            <div class="entry-featured">
                                                <a href="{{route('blog',[$post->id,$post->url])}}">
                                                    @if($post->image)
                                                        <img width="700" height="450" src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}"/>
                                                    @else
                                                        <img width="700" height="450" src="{{ url_assets('/crystal-bella/images/blog-logo.png') }}" alt="{{$post->title}}"/>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="entry-info">
                                                <div class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('blog',[$post->id,$post->url])}}">{{$post->title}}</a>
                                                    </h2>
                                                </div>
                                                <div class="entry-content">
                                                    {{$post ->short_description}}
                                                </div>
                                                {{--<div class="readmore-link">--}}
                                                    {{--<a href="{{route('blog',[$post->id,$post->url])}}">Прочитај повеќе</a>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                            <div class="paginate">
                                <div class="paginate_links">
                                    <span class='page-numbers current'>1</span>
                                    <a class='page-numbers' href='#'>2</a>
                                    <a class="next page-numbers" href="#">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection