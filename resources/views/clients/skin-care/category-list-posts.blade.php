@extends('clients.skin-care.layouts.default')
@section('content')
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Новости</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- Blog Standard -->
    <section class="section-wrap blog-standard pt-20 pb-10">
        <div class="container relative">
            <div class="row">

                <!-- content -->
                <div class="col-md-12 post-content">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-4 col-xs-6 col-xxs-12">
                            <article class="entry-item">
                                <div class="entry-slider">
                                    <div class="flexslider dots-inside" id="flexslider">

                                        <a href="/b/{{$post->id}}/{{$post->url}}">
                                            <img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" alt="">
                                        </a>

                                    </div>
                                </div> <!-- end slider -->

                                <div class="entry-wrap">
                                    <div class="entry">
                                        <h2 class="entry-title">
                                            <a href="/b/{{$post->id}}/{{$post->url}}">{{ $post->title }}</a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="entry-date">
                                                <i class="fa fa-calendar-o"></i>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('d') }}/
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('M') }}
                                            </li>
                                            <li class="entry-author">
                                                <i class="fa fa-eye"></i>
                                                <a href="#">{{ $post->visits }}</a>
                                            </li>
                                        </ul>
                                        <div class="entry-content">
                                            <p>{{ $post->short_description }}</p>
                                            <a href="/b/{{$post->id}}/{{$post->url}}" class="btn btn-lg btn-dark"><span>Види повеќе</span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>

                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end blog standard -->

</div>
@stop