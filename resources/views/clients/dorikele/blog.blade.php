@extends('clients.dorikele.layouts.default')
@section('content')


    <!-- Intro Title Section 2 -->
    <div class="section-block intro-title-2 intro-title-2-2">
        <div class="media-overlay bkg-charcoal-light opacity-07"></div>
        <div class="row">
            <div class="column width-12">
                <div class="title-container">
                    <div class="title-container-inner">
                        <h1 class="title-xlarge font-alt-2 weight-light mb-0">{{$blog->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Intro Title Section 2 End -->

    <!-- Breadcrum -->
    <div class="section-block pt-50 pb-0">
        <div class="row">
            <div class="column width-12">
                {{--<ul class="breadcrumb mb-50">--}}
                {{--<li>--}}
                {{--<a href="index.html">Demos</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="index.html">Blog</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--Blog Single Post--}}
                {{--</li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
    <!-- Breadcrum End -->

    <div class="section-block clearfix no-padding">
        <div class="row">

            <!-- Content Inner -->
            <div class="column width-12 content-inner blog-single-post">
                <article class="post">
                    <div class="post-content">
                        <p>{!! $blog->description !!}</p>
                        <br>
                    </div>
                </article>
            </div>
        </div>
    </div>

@endsection