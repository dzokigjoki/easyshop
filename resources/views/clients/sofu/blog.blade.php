@extends('clients.sofu.layouts.default')
@section('content')
<section id="main-container" class="main-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 main-content">
            <article class="blog-detail">
                <div class="row row-blog">
                    <div class="col-md-12">
                        <div class="post-thumbnail">
                            <img alt="{{ $blog->title }}" class="img-fluid" src="{{ \ImagesHelper::getBlogImage($blog, null, 'lg_') }}">
                        </div>
                        <div class="info-blog">
                            <h3><a href="" title="">{{ $blog->title }}</a>
                            </h3>
                            <ul class="post-meta">
                                <li>
                                    <a href="" rel="bookmark">
                                        <time class="entry-date published" datetime="2015-10-28T02:25:45+00:00">{{ date('d/m/Y', strtotime($blog->publish_at)) }}</time>
                                    </a>
                                </li>
                            </ul>
                            <div class="content-post" style="word-wrap: break-word;">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@stop