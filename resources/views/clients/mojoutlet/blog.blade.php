@extends('clients.shopathome.layouts.default')
@section('content')
    {{--<div class="breadcrumbs">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb breadcrumb--ys pull-left">--}}
                {{--<li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>--}}
                {{--<li><a href="{{route('home')}}">Дома</a></li>--}}
                {{--<li class="active">Совети</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div id="pageContent">
        <div class="container">
            <!-- two columns -->
            <div class="row">
                <!-- center column -->
                <div class="col-xl-12 col-lg-12 col-md-12" id="centerColumn">
                    <!-- title -->
                    <div class="title-box">
                        <h1 class="text-center text-uppercase title-under">{{$blog->title}}</h1>
                    </div>
                    <!-- /title -->
                    <!-- Post start -->
                    <div style="text-align: left !important;" class="post">
                        <!-- title post -->
                        <div class="post__title_block">
                            {{--<div class="pull-left">--}}
                                {{--<div class="time">--}}
                                    {{--<span>{{$blog->visits}}</span>--}}
                                    {{--Посети--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="pull-left">
                                {{--<span>Објавено на: <a href="#">{{$blog->created_at}}</a></span>--}}
                            </div>
                        </div>
                        <!-- /title post -->
                        <!-- content post -->
                        @if($blog->image)
                        <p>
                            <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}" alt="{{$blog->title}}" style="height:auto; width:100%;" class="img-responsive"/>
                        </p>
                        @endif
                        <div class="divider divider--xs"></div>
                        <p>
                            {!! $blog->description !!}
                        </p>
                    </div>
                    <!-- /Post end -->
                </div>
                <!-- center column -->
                <div class="divider divider--lg visible-md visible-sm visible-xs"></div>
                <!-- right column -->
            </div>
            <!-- /two columns -->
        </div>
    </div>
    <!-- End CONTENT section -->
@endsection