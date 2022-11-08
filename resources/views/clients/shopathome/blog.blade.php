@extends('clients.shopathome.layouts.default')
@section('content')
<style>
.date-publish {
    font-style: unset !important;
}
</style>
    <div id="content">
<div class="blog-container">
        <div class="container">
            <div class="row">
                <h1 style="text-align: center;">    </h1>
                <br><br>
                <div class="col-lg-8">
                    <div class="blog-single clearfix">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    {{--<img alt="" src="/assets/shopathome/upload/blog/blog4.jpg" />--}}
                                    <img alt="" src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}" alt="{{$blog->title}}" />
                                </li>
                            </ul>
                        </div>

                        <div class="blogsingle-inner">

                            {{--<h2>{{$blog->visits}} посети</h2>--}}
                            {!! $blog->description !!}


                            {{--<blockquote>Remember to avoid translating your dreams too literally. Say you dream you are driving a fast sports car at ninety miles per hour around dangerous curves. You lose control, crash and die. Does this mean you're going to have a car crash and die? Highly unlikely. It is far more probable that the dream is telling you something much less literal about yourself.--}}
                                {{--<span>Elizabeth Gilbert</span>--}}
                            {{--</blockquote>--}}


                            <!-- End Share -->
                            <div class="clear"></div>
                        </div>
                        <!-- end signle inner -->

                    </div>
                    <!-- End Signle Blog -->
                </div>
                <!-- End Main Blog -->

                <div class="col-lg-4">
                    <aside>
                        <div class="normal-tabs left-widget mb30">
                            <div class="tabs-widget clearfix">
                                <ul class="tab-links clearfix">
                                    <li class="active"><a>Најнови блогови</a></li>
                                </ul>
                                <div id="description" style="display: block;">
                                    <ul>
                                        @foreach($newest as $blog)
                                        <li>
                                            <a href="{{route('blog', [$blog->id, $blog->url])}}">
                                                @if($blog->image)
                                                <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'sm_')}}" alt="{{$blog->title}}" alt="">
                                                @endif
                                                <strong>{{$blog->title}}</strong>
                                                <span class="date-publish"><i class="fa fa-clock-o"></i>{{  \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- End Tabs -->
                        </div>
                        <!-- End Normal Tabs -->
                    </aside>
                    <!-- End aside -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
