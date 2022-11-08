@extends('clients.sofu.layouts.default')
@section('content')
<section class="page-banner">
    <h2 class="page-title">Новости</h2>
</section>
<section id="main-container" class="main-container">
    <div class="row">
        <div class="col-sm-12 main-content main-right blog-fullwidth">
            @foreach($blogs as $blog)
            <article class="blog-item">
                <div class="row row-blog">
                    <div class="col-md-6 col-sm-6 col-50">
                        <div class="images-blog img-post">
                            <a href="{{ route('blog', [$blog->id, $blog->url]) }}">
                                <img src="{{ \ImagesHelper::getBlogImage($blog) }}" alt="{{ $blog->title }}">
                            </a>
                            <span class="icon-hover"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-50">
                        <div class="info-blog">
                            <h3><a href="{{ route('blog', [$blog->id, $blog->url]) }}" title="">{{ $blog->title }}</a>
                            </h3>
                            <ul class=" post-meta">
                                <li>
                                    <a href="" rel="bookmark">
                                        <time>{{ date('M d, Y', strtotime($blog->publish_at)) }}</time>

                                    </a>
                                </li>
                            </ul>
                            <div class="content-post">
                                {{ $blog->short_description }}
                            </div>
                            <a class="read-more nr-button" href="{{ route('blog', [$blog->id, $blog->url]) }}">Прочитај повеќе</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

    </div>
</section>
@stop