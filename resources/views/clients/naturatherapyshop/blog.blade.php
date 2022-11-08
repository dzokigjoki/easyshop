@extends('clients.naturatherapyshop.layouts.default')
@section('content')
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">{{ $blog->title }}</h1>
                <ul class="entry-meta">
                    <li class="entry-date">
                        <i class="fa fa-calendar-o"></i>
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}/
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}
                    </li>
                    <li class="entry-author">
                        <i class="fa fa-eye"></i>
                        <a href="#">{{ $blog->visits }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- Blog Single -->
    <section class="section-wrap post-single pb-10">
        <div class="container relative">
            <div class="row">

                <!-- content -->
                <div class="col-md-9 post-content mb-50">

                    <article class="entry-item">
                        <div class="entry-img">
                            <img src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}" alt="">
                        </div>
                        <div class="entry-wrap">
                            {!! $blog->description !!}
                        </div>
                    </article>

                </div> <!-- end col -->

                <!-- Sidebar -->
                <aside class="col-md-3 sidebar">
                    <!-- Recent posts -->

                    <div class="widget recent-posts">
                        <h3 class="widget-title heading relative bottom-line full-grey">Најнови постови</h3>
                        <div class="entry-list">
                            <ul class="posts-list">
                                @foreach($related as $newblog)
                                <li class="entry-li">
                                    <article class="post-small clearfix">
                                        <div class="entry-img">
                                            <a href="/b/{{$newblog->id}}/{{$newblog->url}}">
                                                <img src="/uploads/posts/{{$blog->id}}/sm_{{$newblog->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="entry">
                                            <h3 class="entry-title"><a href="/b/{{$newblog->id}}/{{$newblog->url}}">{{ $newblog->title }}</a></h3>
                                            <ul class="entry-meta list-inline">
                                                <li class="entry-date">
                                                    <i class="fa fa-calendar-o"></i>
                                                    {{ \Carbon\Carbon::parse($newblog->created_at)->format('d') }}/
                                                    {{ \Carbon\Carbon::parse($newblog->created_at)->format('M') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="widget tags light clearfix">
                        <h3 class="widget-title heading relative bottom-line full-grey">Прочитај повеќе</h3>
                        <div class="social-icons nobase">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>

                </aside> <!-- end sidebar -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end blog standard -->
</div>
@stop