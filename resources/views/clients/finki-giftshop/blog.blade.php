@extends('clients.finki-giftshop.layouts.default')

@section('content')
    <div class="page_wrapper">
        <div class="container">


            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul style="margin-bottom: 0px !important;" class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$blog->title}}</li>

            </ul>
            <br>
        </div>
    </div>
    <div class="page_wrapper">

        <div class="container"><br>
            <div class="title-bg">
                <h3 style="text-align: left;" class="title">{{$blog->title}}</h3>
            </div>
            <br>
            <br>
            @if($blog->image)

                <div class="col-md-10 col-md-offset-1">
                    <img style="margin-right: 40px; margin-top: 23px;" src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}" alt="{{$blog->title}}"
                         class="xsAlign panel panel-default" align="left"/>
                    <p style="padding-right:30px;"></p>
                        {!! $blog->description !!}
                </div>
                {{--<div style="min-height: 200px;" class="col-md-4">--}}
                    {{--<h3>Можеби ќе ве интересира:</h3>--}}
                    {{--<br>--}}
                    {{--<div class="borderCust"></div>--}}
                    {{--<br>--}}
                    {{--<div class="borderCust col-md-12">--}}
                    {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-8">--}}
                                {{--<div class="flat-item-content ">--}}
                                    {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                        {{--<h5>{{$blog->title}}</h5></a>--}}
                                {{--</div>--}}
                            {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                    {{--<div class="borderCust col-md-12">--}}
                        {{--<br>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="item flat-reset">--}}
                                {{--<div class="flat-item-img flat-left images-hover">--}}
                                    {{--<div class="overlay"></div>--}}
                                    {{--<img class="panel panel-default"--}}
                                         {{--src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"--}}
                                         {{--alt="{{$blog->title}}">--}}
                                {{--</div> <!-- /.flat-item-img -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<div class="flat-item-content ">--}}
                                {{--<a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}">--}}
                                    {{--<h5>{{$blog->title}}</h5></a>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.item -->--}}
                    {{--</div>--}}
                {{--</div>--}}
            @else
                <div class="title-desc">
                    <div class="row">
                        <div class="col-md-12">
                            {!!  $blog->description !!}
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection