@extends('clients.shopathome.layouts.default')
@section('content')
    <div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>
            <li><a href="{{route('home')}}">Дома</a></li>
            <li class="active">Совети</li>
        </ol>
    </div>
    </div>
    <div id="pageContent">
        <div class="container">
            <div class="row">
                <div class="blog-layout">
                    <!-- title -->
                    <div class="title-box">
                        <h1 class="text-center text-uppercase title-under">Совети</h1>
                    </div>
                    <!-- /title -->
                    <!-- col -->
                    @foreach($posts as $post)
                    <div style="max-height: 667px !important;" class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <!-- Post start -->
                        <div class="post">
                            <!-- title post -->
                                <figure>
                                    <a href="{{route('blog',[$post->id,$post->url])}}"><img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}" style="width:100%; height: 400px;"></a>
                                </figure>
                                    <br>
                                    <h2 class="post__title text-uppercase"><a href="{{route('blog',[$post->id,$post->url])}}">{{$post->title}}</a></h2>
                            <!-- /title post -->
                            <!-- content post -->
                            <p>
                                {{$post ->short_description}}
                            </p>
                            <!-- /content post -->
                        </div>
                        <!-- /Post end -->
                    </div>
                    <!-- /col -->
                    <div class="divider--xxs clear hidden-sm hidden-xs"></div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End CONTENT section -->
@endsection